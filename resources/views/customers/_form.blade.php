@extends('dash.blank')
@section('content')

<x-form.floating-control>
    <x-slot:label>
        <label for="first_name">First Name</label>
    </x-slot:label>
    <x-form.input name="first_name" :value="$customers->first_name" placeholder=" First Name"></x-form.input>
    <x-form.input-error name="first_name"></x-form.input-error>
</x-form.floating-control>

<x-form.floating-control>
    <x-slot:label>
        <label for="last_name">Last Name</label>
    </x-slot:label>
    <x-form.input name="last_name" :value="$customers->last_name" placeholder=" Last Name"></x-form.input>
    <x-form.input-error name="last_name"></x-form.input-error>
</x-form.floating-control>

<x-form.floating-control>
    <x-slot:label>
        <label for="phone_number">Phone_number</label>
    </x-slot:label>
    <x-form.input name="phone_number" :value="$customers->phone_number" placeholder="Customers Phone"></x-form.input>
    <x-form.input-error name="phone_number"></x-form.input-error>
</x-form.floating-control>

<x-form.floating-control>
    <x-slot:label>
        <label for="city">City</label>
    </x-slot:label>
    <x-form.input name="city" :value="$customers->City" placeholder="City"></x-form.input>
    <x-form.input-error name="city"></x-form.input-error>
</x-form.floating-control>

<x-form.floating-control>
    <x-slot:label>
        <label for="country">Country</label>
    </x-slot:label>
    <x-form.input name="country" :value="$customers->Country" placeholder=" Country"></x-form.input>
    <x-form.input-error name="country"></x-form.input-error>
</x-form.floating-control>



<button type="submit" class="btn btn-primary">{{ $button_label }}</button>
@endsection
