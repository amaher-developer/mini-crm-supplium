<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employ;
use App\Http\Requests\EmployRequest;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('global.employees_list');

        $request_array = ['id'];
        foreach ($request_array as $item) $$item = request()->has($item) ? request()->$item : false;
        $employees = Employ::orderBy('id', 'DESC');
        //apply filters
        $employees->when($id, function ($query) use ($id) {
            $query->where('id','=', $id);
        });
        $search_query = request()->query();

        $employees = $employees->paginate(10);
        $total = $employees->total();

        return view('Admin.employ_list', compact('employees','title', 'total', 'search_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('global.employ_add');
        $companies = Company::get();
        return view('Admin.employ_form', ['employ' => new Employ(),'title'=>$title,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployRequest $request)
    {
        $employ_inputs = $request->except(['_token']);
        Employ::create($employ_inputs);
        return redirect(route('listEmploy'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function show(Employ $employ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function edit(Employ $employ)
    {
        $employ = Employ::find($employ->id);
        $title = trans('global.employ_edit');
        $companies = Company::get();
        return view('Admin.employ_form', ['employ' => $employ,'companies' => $companies,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function update(EmployRequest $request, Employ $employ)
    {
        $employ =Employ::find($employ->id);
        $employ_inputs = $request->except(['_token']);
        $employ->update($employ_inputs);
        return redirect(route('listEmploy'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employ $employ)
    {

        $employ = Employ::find($employ->id);
        $employ->delete();
        return redirect(route('listEmploy'));
    }

}
