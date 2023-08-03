@extends('dash.blank')
@section('content')
<h1> Edit customers</h1>
  
<form action="{{ route('customers.update', $customers->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('customers._form',[
        'button_label' => 'Edit Customer'
    ])
</form>
@endsection

{{-- @extends('dash.blank')
@section('content')
<h1>Hi</h1>
@endsection --}}