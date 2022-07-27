<?php

namespace App\Http\Controllers;

use App\Events\AddToCart;
use App\Jobs\OrderCheckout;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    public function addItem(Item $item, Request $request)
    {
        $inputs = $request->validate([
            'quantity' => 'required|lte:'. $item->quantity,
        ]);

        DB::beginTransaction();

        $order = $request->user()->orders()->firstOrCreate(['status' => 'active'], ['number' => Str::random()]);

        $order->items()->attach($item, $inputs);

        $item->decrement('quantity', $inputs['quantity']);

        DB::commit();

        AddToCart::dispatch($request->user(), $item, $inputs['quantity']);

        $request->session()->flash('alert', [
            'type' => 'info',
            'message' => sprintf("L'article %s a été ajouté en %s exemplaires.", $item->name, $inputs['quantity'])
        ]);

        return redirect()->route('items.index');
    }

    public function checkout(Order $order, Request $request)
    {
        $order->update(['status' => 'paid']);

        OrderCheckout::dispatch(Auth::user(), $order);

        $request->session()->flash('alert', ['type' => 'info', 'message' => "La commande $order->number a été réglé."]);

        return back();
    }

    public function demoMail(Order $order)
    {
        return view('mails.OrderCheckout', ['user'=> Auth::user(), 'order' => $order]);
    }
}
