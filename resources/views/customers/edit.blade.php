<div class="container">
<h1> Edit customers</h1>
  
<form action="{{ route('customers.update', $customers->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('customers._form',[
        'button_label' => 'Edit Customer'
    ])
</form>
</div>