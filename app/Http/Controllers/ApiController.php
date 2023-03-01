<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Student::all();
        return ['data'=>$data, "status"=>200];
    }

    /**
     * Show the form for creating a new resource.
     */
 
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'father_name'=>'required',
            'contact'=>'required|integer|digits:10|unique:App\Models\Student,contact',
            'email'=>'required|email|unique:App\Models\Student,email',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        Student::create($data);
        return ['msg'=>"data incerted success full", "status"=>200];
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

    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name'=>'required',
            'father_name'=>'required',
            'contact'=>'required|integer',
            'email'=>'required|email',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        $vUpdate=Student::find($id);
        $vUpdate->update($data);
        return ['msg'=>"data update success full", "status"=>200];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Student::find($id);
        $data->delete();
        return ['msg'=>"data deleted successfully","status"=>200];
    }
}
