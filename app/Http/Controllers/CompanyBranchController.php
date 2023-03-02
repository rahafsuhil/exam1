<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranch;
use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_branches = CompanyBranch::with('company_branches')->orderBy('id', 'desc')->get();
        return response()->view('cms.company_branches.index' , compact('company_branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_branches = CompanyBranch::all();
        return response()->view('cms.company_branches.create' , compact('company_branches'));
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
              $company_branches = new CompanyBranch();
              $company_branches->Name = $request->get('Name');
              $company_branches->Email = $request->get('Email');
              $company_branches->Password = $request->get('Password');
              $company_branches->Status = $request->get('Status');
              $company_branches->Description = $request->get('Description');

              $isSaved = $company_branches->save();
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
        $company_branches=CompanyBranch::findOrFail($id);
        return response()->view('cms.company_branches.show' , compact('company_branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_branches=CompanyBranch::findOrFail($id);
        return response()->view('cms.company_branches.edit', compact('company_branches'));
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
              $company_branches = new CompanyBranch();
              $company_branches->Name = $request->get('Name');
              $company_branches->Email = $request->get('Email');
              $company_branches->Password = $request->get('Password');
              $company_branches->Status = $request->get('Status');
              $company_branches->Description = $request->get('Description');

              $isUpdate = $company_branches->save();
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
        $company_branches = CompanyBranch::destroy($id);
    }
}
