@extends('layout.nav')

@section('content')
<br>
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endforeach
@if(session('result'))
<div class="alert alert-warning">{{ session('result') }}</div>
@endif
<div class="cashier-form">
    <form action="supplier/0/0" method="POST">
        @csrf
       <div class="firts-cashier-row">
           <div>
                <label>Name Supplier: </label>
                <input type="text" name="name" placeholder="Name Supplier" >
           </div>
           <div>
                <label>Email Supplier: </label>
                <input type="email" name="email" placeholder="Email Supplier" >
           </div>
           <div>
                <label>Address Supplier: </label>
                <input type="text" name="address" placeholder="Address Supplier" >
           </div>
       </div>
       <div class="second-cashier-row">
        <div>
            <label>PhoneNumber Supplier: </label>
            <input type="number" name="phonenumber" placeholder="PhoneNumber Supplier" >
       </div>
        </div>
        <div class="cashier-form-btn">
            <button>Submit</button>
        </div>
       </form>
       <p>_______________________________________________________________________________________________________</p>
<div class="row justify-content-center mt-3"> 
    @foreach ($supplier as $supp)
    <div class="card text-center radius-20 m-5" style="width: 18rem;">
        <i class="ion-android-bus text-success" style="font-size: 100px"></i>
        <div class="card-body" style="color: black">
            <small>CompanyName: {{ $supp->companyname }}</small>
            <br>
            <small>Email: {{ $supp->email }}</small>
            <br>
            <small>Address: {{ $supp->address }}</small>
            <br>
            <small>PhoneNumber: {{ $supp->phonenumber }}</small>
            <br>
            <br>
            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $supp->id }}"><i class="ion-edit"></i></span>
            <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $supp->id }}"><i class="ion-trash-a"></i></span>
        </div>
    </div>
  <!-- Modal Delete -->
  <div class="modal fade" id="delete{{ $supp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
            <form action="supplier/1/{{ $supp->id }}" method="POST">
                @csrf
                <span class="text-danger"><i class="ion-trash-a"></i> Do You Want To Delete <span class="text-success">{{ $supp->companyname }} </span>?</span><br><br>
                <button class="btn btn-danger w-100 radius-20">Yes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Edit -->
  <div class="modal fade" id="edit{{ $supp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
            <form action="supplier/2/{{ $supp->id }}" method="POST">
                @csrf
                <div class="firts-cashier-row-edit">
                    <div>
                         <label>Name Supplier: </label>
                         <input type="text" name="name" value="{{ $supp->companyname }}" placeholder="Name Supplier" >
                    </div>
                    <div>
                         <label>Email Supplier: </label>
                         <input type="email" name="email" value="{{ $supp->email }}" placeholder="Email Supplier" >
                    </div>
                    <div>
                         <label>Address Supplier: </label>
                         <input type="text" name="address" value="{{ $supp->address }}" placeholder="Address Supplier" >
                    </div>
                    <div>
                        <label>PhoneNumber Supplier: </label>
                        <input type="number" name="phonenumber" value="{{ $supp->phonenumber }}" placeholder="PhoneNumber Supplier" >
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

</div>
<div class="pig">
<small>{{ $supplier->links() }}</small> 
</div>
@endsection