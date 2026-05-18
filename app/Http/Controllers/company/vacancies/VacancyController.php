<?php

namespace App\Http\Controllers\company\vacancies;

use App\Http\Controllers\Controller;
use App\Http\Requests\company\vacancy\StoreRequest;
use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = Vacancy::where('company_id', Auth::guard('company')->id())->get();
        return view('company.vacancy.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['company_id'] = Auth::guard('company')->id();
        $validatedData['date_posted'] = Carbon::now()->toDateString();
        Vacancy::create($validatedData);
        return redirect()->route('company.vacancy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if ($vacancy->company_id !== Auth::guard('company')->id()) {
            return redirect()->route('company.vacancy.index');
        }
        return view('company.vacancy.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if ($vacancy->company_id !== Auth::guard('company')->id()) {
            return redirect()->route('company.vacancy.index');
        }
        $validatedData = $request->validated();
        $validatedData['status'] = $validatedData['status'] ?? 'open';
        $vacancy->update($validatedData);
        return redirect()->route('company.vacancy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if ($vacancy->company_id !== Auth::guard('company')->id()) {
            return redirect()->route('company.vacancy.index');
        }
        $vacancy->delete();
        return redirect()->route('company.vacancy.index');
    }
}
