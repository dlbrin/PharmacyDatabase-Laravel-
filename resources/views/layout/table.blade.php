<table class="table mt-5 table-hover table-responsive-sm table-borderless radius-10" style="background-color: white">
    <thead>
      <tr class="text-center">
        <th scope="col">Cashier</th>
        <th scope="col">Barcode</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Price At</th>
        <th scope="col">Expire Date</th>
        <th scope="col">Created At</th>
        <th scope="col">Sold At</th>
        <th scope="col">Piece</th>
        @if(Request::segment(1) != 'sellers')
        <th scope="col">Undo</th>
        @endif
      </tr>
    </thead>
    <tbody>
    @foreach ($solds as $sold)
      <tr class="text-center">
        <td>{{ $sold->cashier->name }}</td>
        <td>
          @if($sold->stocks_one->type == 0)
            {!! DNS1D::getBarcodeSVG("$sold->stock_id", 'C128' , 1, 53 ) !!}
            @else
            {!! DNS2D::getBarcodeSVG("$sold->stock_id", 'QRCODE' , 2,2) !!}
            @endif
        </td>
        <td>{{ $sold->stocks_one->name }}</td>
        <td>{{ number_format($sold->stocks_one->price , 0 , '.' , '.') }} IQD</td>
        <td>{{ number_format($sold->price_at , 0 , '.' , '.') }} IQD</td>
        <td>{{ $sold->stocks_one->expire_date }}</td>
        <td>{{ $sold->created_at }}</td>
        <td>{{ $sold->updated_at }}</td>
        <td style="background-color: crimson; color: white">{{ $sold->piece }}</td>
        @if(Request::segment(1) != 'sellers')
        <td style="background-color: rgb(62, 9, 206); color: white" onclick="undo(`{{ $sold->id }}`)"><i class="ion-arrow-return-left"></i></td>
        @endif
      </tr>
    @endforeach
    </tbody>
  </table>