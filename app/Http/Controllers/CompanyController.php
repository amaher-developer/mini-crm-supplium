<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('global.companies_list');

        $request_array = ['id'];
        foreach ($request_array as $item) $$item = request()->has($item) ? request()->$item : false;
        $companies = Company::orderBy('id', 'DESC');
        //apply filters
        $companies->when($id, function ($query) use ($id) {
            $query->where('id','=', $id);
        });
        $search_query = request()->query();

        $companies = $companies->paginate(10);
        $total = $companies->total();

        return view('Admin.company_list', compact('companies','title', 'total', 'search_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('global.company_add');
        return view('Admin.company_form', ['company' => new Company(),'title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company_inputs = $this->prepare_inputs($request->except(['_token']));
        $company = Company::create($company_inputs);

        // send email
        Mail::send([], [], function ($message) use ($company) {
            $message->to([$company['email']])
                ->subject($company['name_'.\request('lang')])
                ->setBody(trans('global.send_mail'));
        });

        return redirect(route('listCompany'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        $title = trans('global.company_edit');
        return view('Admin.company_form', ['company' => $company,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company =Company::find($company->id);
        $company_inputs = $this->prepare_inputs($request->except(['_token']));
        $company->update($company_inputs);
        return redirect(route('listCompany'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::find($company->id);
        $company->delete();
        return redirect(route('listCompany'));
    }

    private function prepare_inputs($inputs)
    {
        $input_file = 'logo';

        if (request()->hasFile($input_file)) {
            $file = request()->file($input_file);
            $filename = rand(0, 20000) . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = base_path(Company::$uploads_path);
            $upload_success = $file->move($destinationPath, $filename);
            if ($upload_success) {
                $inputs[$input_file] = $filename;
            }
        }
        return $inputs;
    }
}
