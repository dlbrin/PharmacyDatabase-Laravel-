<div class="sale-invoice">
    <img src="{{ asset('assets/img/pharmacy.png') }}" alt="">
    @foreach ($solds as $sold)
    <div class="invoice-data">  
        <div>
            <h3>{{ $sold->stocks_one->name }}</h3>
        </div>
        <div>
            <h3>{{ $sold->piece }}</h3>
        </div>
        <div>
            <h3>{{ number_format($sold->price_at * $sold->piece , 0 , '.' , '.') }} IQD</h3>
        </div>
    </div>
    @endforeach
    <div class="invoice-all-price">

        @php
        $sum = 0;

        for($i = 0; $i < count($solds); $i++){
            $k = $solds[$i]['price_at'] * $solds[$i]['piece'];
            $sum += $k;
        }
        @endphp
        <h2>All Money : {{ number_format($sum , 0 , '.' , '.') }} IQD</h2>
    </div>
</div>
<a href="clean">Clean</a>