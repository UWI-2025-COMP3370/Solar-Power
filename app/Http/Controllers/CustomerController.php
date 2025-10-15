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
            'name'      => 'required|string|max:255|regex:~^[a-zA-Z ]+$~',
            'address'   => 'required|string|regex:~^[a-zA-Z0-9\s.,#-()\']+$~',
            'mobile'    => 'required|string|max:20|min:7|regex:~^[0-9+ - /()]+$~',
            'telephone' => 'nullable|string|max:20|min:7|regex:~^[0-9+ - /()]+$~',
            'email'     => 'required|email|unique:customers,email',
        ],[
            'name.regex' => 'The name may only contain letters, spaces, apostrophes, hyphens, and periods.',
            'address.regex' => 'The address may only contain letters, numbers, spaces, commas, periods, #, parentheses, slashes, hyphens, and apostrophes.',
            'mobile.regex' => 'The mobile number may only contain digits, spaces, plus (+), hyphens (-), slashes (/), and parentheses.',
            'telephone.regex' => 'The telephone number may only contain digits, spaces, plus (+), hyphens (-), slashes (/), and parentheses.',
    ]);

        Customer::create($validated);

        return redirect()->route('customer.index')->with('success', 'Customer created successfully!');
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
            'name'      => 'required|string|max:255|regex:~^[a-zA-Z ]+$~',
            'address'   => 'required|string|regex:~^[a-zA-Z0-9\s.,#-()\']+$~',
            'mobile'    => 'required|string|max:20|min:7|regex:~^[0-9+ - /()]+$~',
            'telephone' => 'nullable|string|max:20|min:7|regex:~^[0-9+ - /()]+$~',
            'email'     => 'required|email|unique:customers,email' . $customer->id,
        ],[
            'name.regex' => 'The name may only contain letters, spaces, apostrophes, hyphens, and periods.',
            'address.regex' => 'The address may only contain letters, numbers, spaces, commas, periods, #, parentheses, slashes, hyphens, and apostrophes.',
            'mobile.regex' => 'The mobile number may only contain digits, spaces, plus (+), hyphens (-), slashes (/), and parentheses.',
            'telephone.regex' => 'The telephone number may only contain digits, spaces, plus (+), hyphens (-), slashes (/), and parentheses.',
    ]);

        $customer->update($validated);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }

    // Delete customer
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }
}
