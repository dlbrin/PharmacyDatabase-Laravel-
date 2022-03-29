@extends('layout.nav')

@section('content')
<div class="row justify-content-lg-start m-3">
@foreach ($lists as $key => $value)
<span class="btn btn-danger m-2 w-25">
    {{ $key }} : {{ $value }}
</span>
@endforeach
</div>
@include('layout.table')
@endsection