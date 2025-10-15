<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit; // include the Visit model
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VisitRequest;
use Illuminate\Support\Facades\Gate;
use DB;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Gate::authorize('view', Visit::class);
        return view('visit.index', ['visits' => Visit::all(), ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Gate::authorize('create', Visit::class);
        return view('visit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitRequest $request): RedirectResponse
    {
        //Gate::authorize('create', Visit::class);
            
        Visit::create([
            'technician_name' =>$request->technician_name,
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->email,
            'roof_size'=>$request->roof_size,
            'roof_type'=>$request->roof_type,
            'monthly_consumption_kwh'=>$request->monthly_consumption_kwh,
            'shaded'=>$request->shaded,
            'notes'=>$request->notes,
        ]);
            return redirect(route('visit.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit) : View
    {
        //Gate::authorize('view', $visit);
        return view('visit.show', ['visit' => $visit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit): View
    {
        //Gate::authorize('update', $visit);
        return view('visit.edit', ['visit' => $visit ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        //Gate::authorize('update', $visit);

        $visit->update($request->only([
            'technician_name',
            'customer_name',
            'customer_email',
            'roof_size',
            'roof_type',
            'monthly_consumption_kwh',
            'shaded',
            'notes',
        ]));

        return redirect()->route('visit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit): RedirectResponse
{
 $visit->delete();
 return redirect(route('visit.index'));

    }
}
