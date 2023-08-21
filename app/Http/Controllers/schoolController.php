<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\student;
use Illuminate\Http\Request;

class schoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=student::orderBy('id','desc')->paginate(5);
        return view('home',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'required|integer',//numeric for float and integer
            'class'=>'required',
            'courses' => 'required|array',

            
        ]);

      
        $request['courses']=implode(' ',$request['courses']);
        
        $student=$request->except('_token');
        student::create($student);
       return redirect()->route('add')->withsuccess("saved");
       //return view('add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //dd(explode(' ',$student->courses));
        //$student=student::find($id);
        return view('view',compact('student'));
    }

    public function back()
    {
        return view('home');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        
        return view('update',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
         $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'required|integer',//numeric for float and integer
            'class'=>'required',
            'courses' => 'required|array',

            
        ]);
        $request['courses']=implode(' ',$request['courses']);
        $data=$request->all();
         $student->update($data);
        return redirect()->route('home')->withupdate('Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()->route('home')->withdelete('delete');
    }
}
