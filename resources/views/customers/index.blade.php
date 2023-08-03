    @extends('dash.blank')
    @section('content')
        <x-form.alert name="success" class="alert-success"></x-form.alert>
        <x-form.alert name="error" class="alert-danger"></x-form.alert>
        <div class="container">
            <div class="row">

                @foreach ($customers as $customer)
                    {{-- حجزنا 3 اعمدة * 4صفوف يعني 12   --}}
                    <div class="col-md-3">
                        <x-form.card :customer="$customer">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-dark">Edit</a>

                            <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                            </form>
                        </x-form.card>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 pt-4">
                {{ $customers->links() }}
            </div>
        </div>
    @endsection
