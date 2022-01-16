<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->pagLength))
        {
            $data['departments'] = Department::orderBy('id','DESC')->paginate($request->pagLength);
        } 
        else {
            $data['departments'] = Department::orderBy('id','DESC')->paginate(15);
        }
       
        return view('departments.index',$data);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation of summited form
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $dep = new Department();
        $dep->name = $request->name;
        $dep->description = $request->description;
        $dep->save();

        return redirect()->back()->with('depSuccess','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validation of summited form
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $dep = Department::find($request->id);
        $dep->name = $request->name;
        $dep->description = $request->description;
        $dep->save();

        return redirect()->back()->with('depSuccessUpdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id',$id)->delete();
        return redirect()->back()->with('depSuccessDelete','');
        
    }

}
