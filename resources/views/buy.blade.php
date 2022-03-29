@extends('layout.nav')

@section('content')
<br>
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
@endforeach
@if(session('result'))
<div class="alert alert-success">{{ session('result') }}</div>
@endif
<div class="cashier-form">
    <form action="buy/0/0" method="POST">
        @csrf
        <div class="firts-cashier-row">
            <div>
                <label>Barcode Stock: </label>
                <input type="text" name="id" placeholder="Barcode Stock">
            </div>
            <div>
                <label>Name Stocks: </label>
                <input type="text" name="name" placeholder="Name Stocks">
            </div>
            <div>
                <label>Supplier: </label>
                <select name="supplier_id">
                    @foreach ($Suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->companyname }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Count Stocks: </label>
                <input type="text" name="count" placeholder="Count Stocks">
            </div>
        </div><br>
        <div class="firts-cashier-row">
            <div>
                <label>Price Stocks: </label>
                <input type="number" name="price" placeholder="Price Stocks">
            </div>
            <div>
                <label>Expire Stocks: </label>
                <input type="date" name="expire_date">
            </div>
            <div>
                <label>is Debt ?</label>
                <select name="is_debt">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div>
                <label>Type: </label>
                <select name="type">
                    <option value="0">Barcode</option>
                    <option value="1">Qrcode</option>
                </select>
            </div>
        </div>
        <div class="cashier-form-btn">
            <button>Submit</button>
        </div>
    </form>
    <p>_______________________________________________________________________________________________________</p>
    @include('layout.buycard')
</div>
@endsection
