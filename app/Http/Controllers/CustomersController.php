<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::user()
            ->latest()
            ->filter(request(['search']))
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('customers.index', compact('customers'));
        $success = session('success');
        return view('customers.index', compact('customers', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', [
            'customers' => new Customer(),
        ])
            ->with('success', 'Customer added successfully♥');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $validated = $request->validated();
        $customer = Customer::create($validated);
        return redirect()->route('customers.index')
            ->with('success', 'your Customer created successfully♥');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::user()->findOrFail($id);
        return view('customers.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::user()->findOrFail($id);
        // dd($customers);
        return view('customers.edit', [
            'customers' => $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request ,string $id)
    {
        
        $validated = $request->validate( [
            'first_name' => ['required','string','max:255', function($attribute,$value ,$fail){
            if ($value == 'admin'){
               return $fail('This :attribute value is forbidden!');
            }
       }],
        'last_name' => ['required','string','max:255', function($attribute,$value ,$fail){
        if ($value == 'admin'){
           return $fail('This :attribute value is forbidden!');
        }
   }],
       'city' => 'nullable|string|max:255',
       'country' => 'nullable|string|max:255',
       'phone_number' => 'required|string|max:255',

    ]);
        $customers = Customer::user()->findOrFail($id);
        // dd($customers);
        $customers->update($validated);
        return redirect()->route('customers.index')
            ->with('success', 'your Customer updated successfully♥');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers = Customer::user()->findOrFail($id);
        $customers->delete();
        return redirect()->route('customers.index')
            ->with('success', "your Customer $customers->full_name deleted successfully!");
    }
}
