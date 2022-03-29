@extends('layout.nav')

@section('content')
<br>
@if($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{ $error }}</div>
     @endforeach
     @endif
     @if(session('result'))
     <div class="alert alert-warning">{{ session('result') }}</div>
     @endif
   <div class="cashier-form">
       <form action="cashier" method="POST">
        @csrf
       <div class="firts-cashier-row">
           <div>
                <label>Name Cashier: </label>
                <input type="text" name="name" placeholder="Name Cashier" >
           </div>
           <div>
                <label>Email Cashier: </label>
                <input type="email" name="email" placeholder="Email Cashier" >
           </div>
           <div>
                <label>Password Cashier: </label>
                <input type="password" name="password" placeholder="Password Cashier" >
           </div>
       </div>
       <div class="second-cashier-row">
           <div>
                <label>Rule Cashier: </label>
                <select name="rule" >
                    <option value="0">Cashier</option>
                    <option value="">Admin</option>
                </select>
           </div>
        </div>
        <div class="cashier-form-btn">
            <button>Submit</button>
        </div>
       </form>
       <p>_______________________________________________________________________________________________________</p>
       <div class="row justify-content-center mt-3"> 
         @foreach ($cashiers as $cashier)
       <div class="card text-center radius-20 m-5" style="width: 18rem;">
        <i class="ion-person text-success" style="font-size: 100px"></i>
        <div class="card-body" style="color: black">
          <small>Name: {{ $cashier->name }}</small>
          <br>
          <small>Email: {{ $cashier->email }}</small>
          <br>
          <small>Rule: {{ $cashier->rule == 0 ? "Cashier" : "Admin" }}</small>
        </div>
      </div>
      @endforeach
       </div>
   </div>
@endsection