<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.company.index' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return response()->view('cms.company.create' , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'Name' => 'required|string|min:3|max:20',
            'Email' => 'required|string|min:3|max:20',
            'Password' => 'required|string|min:3|max:20',
            'Status' => 'required|string|min:3|max:20',
            'Description' => 'required|string|min:3|max:20',

          ]);

          if ( ! $validator->fails()) {
              $companies = new Company();
              $companies->Name = $request->get('Name');
              $companies->Email = $request->get('Email');
              $companies->Password = $request->get('Password');
              $companies->Status = $request->get('Status');
              $companies->Description = $request->get('Description');

              $isSaved = $companies->save();
             return response()->json([
                 'icon' => $isSaved ? 'success' : 'error' ,
                 'title' => $isSaved ? "isSaved is Successfully" : "isSaved is Failed" ,
             ] , $isSaved ? 200 : 400);
            }
            else{
             return response()->json([
                 'icon' => 'error' ,
                 'title' => $validator->getMessageBag()->first(),
             ] , 400);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies=Company::findOrFail($id);
        return response()->view('cms.company.show' , compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=Company::findOrFail($id);
        return response()->view('cms.company.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'Name' => 'required|string|min:3|max:20',
            'Email' => 'required|string|min:3|max:20',
            'Password' => 'required|string|min:3|max:20',
            'Status' => 'required|string|min:3|max:20',
            'Description' => 'required|string|min:3|max:20',

          ]);

          if ( ! $validator->fails()) {
              $companies = new Company();
              $companies->Name = $request->get('Name');
              $companies->Email = $request->get('Email');
              $companies->Password = $request->get('Password');
              $companies->Status = $request->get('Status');
              $companies->Description = $request->get('Description');

              $isUpdate = $companies->save();
             return response()->json([
                 'icon' => $isUpdate ? 'success' : 'error' ,
                 'title' => $isUpdate ? "Updated is Successfully" : "Updated is Failed" ,
             ] , $isUpdate ? 200 : 400);
            }
            else{
             return response()->json([
                 'icon' => 'error' ,
                 'title' => $validator->getMessageBag()->first(),
             ] , 400);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::destroy($id);
    }
}
