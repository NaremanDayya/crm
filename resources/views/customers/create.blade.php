    <div class="container">
        <h1> Add Customer</h1>
        <form action="{{ route("customers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('customers._form',[
                'button_label' => 'Add Customer'
            ])
            </form>
    </div>
