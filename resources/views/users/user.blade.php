<x-layout title="User">

    @foreach ($users as $user)
        <x-user :user="$user" />
    @endforeach

    <h2 style="margin-top:20pt;text-align:center">
        How does that compare?
    </h2>

    <div class="exchange-rates">
        @foreach( $convertedRates as $rate )
            <div class="card">
                <h3>{{$rate->to}}</h3>
                <h1>{{$rate->hourly}}</h1>
            </div>
        @endforeach
    </div>

</x-layout>