<div class="row justify-content-center mt-3">
    @foreach ($GetBuy as $buy)
    <div class="card text-center radius-20 m-5" style="width: 18rem;">
        @if($buy->is_debt == 1)
        <span class="isdebt">Debt !</span>
        @else
        @endif
        <div class="mt-4" style="min-height: 30px;">
            @if($buy->type == 0)
            {!! DNS1D::getBarcodeSVG("$buy->id", 'C128' , 2, 53 ) !!}
            @else
            {!! DNS2D::getBarcodeSVG("$buy->id", 'QRCODE' , ) !!}
            @endif
        </div>
        
        <div class="card-body" style="color: black; text-align: left">
            <small>Barcode: {{ $buy->id }}</small><br>
            <small>Name: {{ $buy->name }}</small>
            <br>
            <small>Supplier: {{ $buy->one_supplier->companyname }}</small>
            <br>
            <small>count: {{ $buy->count }}</small>
            <br>
            <small>price: {{ number_format($buy->price , 0 , '.' , '.') }} IQD</small>
            <br>
            <small>Expire Date: {{ $buy->expire_date }}</small>
            <br>
            <small>Is Debt: {{ $buy->is_debt == 0 ? "No" : "Yes" }}</small>
            <br>
            <small>Created At: {{ $buy->created_at }}</small>
            <br>
            <br>
            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $buy->id }}"><i
                    class="ion-edit"></i></span>
            <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $buy->id }}"><i
                    class="ion-trash-a"></i></span>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete{{ $buy->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="buy/1/{{ $buy->id }}" method="POST">
                        @csrf
                        <span class="text-danger"><i class="ion-trash-a"></i> Do You Want To Delete <span
                                class="text-success">{{ $buy->name }} </span>?</span><br><br>
                        <button class="btn btn-danger w-100 radius-20">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{ $buy->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="buy/2/{{ $buy->id }}" method="POST">
                        @csrf
                        <div class="firts-cashier-row-edit">
                            <div>
                                <label>Barcode Stocks: </label>
                                <input type="text" name="id" value="{{ $buy->id }}"
                                    placeholder="Barcode Stocks">
                            </div>
                            <div>
                                <label>Name Stocks: </label>
                                <input type="text" name="name" value="{{ $buy->name }}"
                                    placeholder="Name Stocks">
                            </div>
                            <div>
                                <label>Supplier: </label>
                                <br>
                                <select name="supplier_id">
                                    @foreach ($Suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->companyname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>Count Stocks: </label>
                                <input type="text" name="count" value="{{ $buy->count }}"
                                    placeholder="Count Stocks:">
                            </div>
                            <div>
                                <label>Price Stocks: </label><br>
                                <input type="number" name="price" value="{{ $buy->price }}"
                                    placeholder="rice Stocks:">
                            </div>
                            <div>
                                <label>Expire Stocks: </label>
                                <input type="date" name="expire_date" value="{{ $buy->expire_date }}">
                            </div>
                            <div>
                                <label>is Debt ? </label><br>
                                <select name="is_debt">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div><br>
                            <div>
                                <label>Type: </label><br>
                                <select name="type">
                                    <option value="0">Barcode</option>
                                    <option value="1">Qrcode</option>
                                </select>
                            </div><br>
                            <div class="cashier-form-btn-edit">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>