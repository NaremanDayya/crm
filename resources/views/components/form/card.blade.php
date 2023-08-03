<div class="card">
    <div class="h-100">

    <div class="card-body ">
        <h5 class="card-title"> {{ $customer->full_name }}</h5>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('customers.show',$customer->id) }}" class="btn btn-sm btn-primary">View</a>
            {{ $slot }}
        </div>
    </div>
    </div>
</div>
