@extends('dash.blank')
@section('content')
<div class="container">
    <h1> Customer Details: {{ $customers->full_name }} </h1>
    <h3>{{ $customers->phone_number }}</h3>
    
    <div class="row">
        <div class="col-md-3">
            <div class="border rounded p-3 text-center">
                <span class="text-success fs-2">{{ $customers->Country}}-{{ $customers->City}}</span>
            </div>
        </div>
              
    </div>
 </div>
 @endsection