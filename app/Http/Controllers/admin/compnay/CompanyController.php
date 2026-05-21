<?php

namespace App\Http\Controllers\admin\compnay;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\company\StoreRequest;
use App\Http\Requests\admin\company\UpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $path = $request->file('logo')->store('images/logo', 'public');
        $validated['logo'] = $path;
        Company::create($validated);
        return redirect()->route('admin.company.index');
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
        $company = Company::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $company = Company::findOrFail($id);

        if($request->file('logo')){
            $path = $request->file('logo')->store('images/logo', 'public');
            $validated['logo'] = $path;
        }
    
        $validated['password'] = !empty($validated['password'])
            ? $validated['password']
            : $company->password;
       
        $company->update($validated);
        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('admin.company.index');
    }
}
