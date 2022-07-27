<h1>Bonjour {{ $user->name }}</h1>

<p>Voici le rapport avec en PJ l'export des items</p>

<pre>
    @php 
        var_dump($order);
        var_dump($user);
    @endphp

    {{-- @foreach($item as $order->items)
       
    @endforeach --}}
</pre>