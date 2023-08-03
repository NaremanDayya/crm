@extends('dash.blank')
@section('content')
<div class="container">
    <h1> Edit customers</h1>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <x-form.alert name="error" class="alert-danger"></x-form.alert>

    <form action="{{ route('customers.update', $customers->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('customers._form',[
            'button_label' => 'Edit Customer'
        ])
    </form>
</div>
@endsection
{{-- @extends('dash.blank')
@section('content')
<h1>Hi</h1>
@endsection --}}