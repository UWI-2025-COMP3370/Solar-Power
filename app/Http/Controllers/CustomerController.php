<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    // List all customers
    public function index(): View
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    // Show create form
    public function create(): View
    {
        return view('customer.create');
    }

    // Store new customer
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'address'   => 'required|string',
            'mobile'    => 'required|string|max:20',
            'telephone' => 'nullable|string|max:20',
            'email'     => 'required|email|unique:customers,email',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    // Show edit form
    public function edit(Customer $customer): View
    {
        return view('customer.edit', compact('customer'));
    }

    // Update customer
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'address'   => 'required|string',
            'mobile'    => 'required|string|max:20',
            'telephone' => 'nullable|string|max:20',
            'email'     => 'required|email|unique:customers,email,' . $customer->id,
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Delete customer
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
