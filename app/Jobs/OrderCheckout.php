<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Order;
use App\Models\Report;
use App\Mail\ReportItems;
use App\Events\SendReportFinish;
use App\Mail\ReportOrderCheckout;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderCheckout implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    //Variable non typé pour le Auth::user
    public $user;
    public Order $order;

    public function __construct($user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }
    
    public function handle()
    {
        Mail::to($this->user)->send(new ReportOrderCheckout());
        // Mail::to($user)->send('test');
        // SendReportFinish::dispatch($this->report);
    }
}
