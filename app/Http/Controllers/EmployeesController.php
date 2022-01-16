<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['departments'] = Department::orderBy('id','DESC')->get();

        if(isset($request->pagLength))
        {
           $data['employees'] = Employee::join('departments','departments.id','employees.department_id')->select('employees.*','departments.name as department')->orderBy('id','DESC')->paginate($request->pagLength);
        } 
        else {
            $data['employees'] = Employee::join('departments','departments.id','employees.department_id')->select('employees.*','departments.name as department')->orderBy('id','DESC')->paginate('10');
        }
       
        return view('employees.index',$data);
    }


    public function empByDepartment($id)
    {
    
        $data['employees'] = Employee::join('departments','departments.id','employees.department_id')->where('departments.id',$id)->select('employees.*','departments.name as department')->orderBy('id','DESC')->paginate('10');
        $data['departments'] = Department::orderBy('id','DESC')->get();
        return view('employees.index',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importXml(Request $request)
    { 
        // selected file
        $xmlFile = $request->xmlFile;
        $file = $xmlFile->getClientOriginalName();
        
        $xmlDataString = file_get_contents($file); // get content of selected file
        $xmlObject = simplexml_load_string($xmlDataString); // take data form xml as a string array
                
        $json = json_encode($xmlObject); // encoded to json array 
        $phpDataArray = json_decode($json, true);  // make an array of it of php 

    
        if(count($phpDataArray['employee']) > 0){ //if ther is emplyess
            
            $empArr = array();
            $notImportedRecords = 0;
            
            foreach($phpDataArray['employee'] as $index => $data) { // foreach start
            
              if(!empty($data['full_name']) || !empty($data['department_id']) || !empty($data['type_of_employee'])) // not empty if started
              {
              // if employee type is hourly   
                if($data['type_of_employee']=='hourly') // type if start
                {
                    // check if number of hrs and amount per hr is not empth
                    if(!empty($data['number_of_hours']) && !empty($data['amount_per_hour']))
                    {
                        $empArr[] = [
                            "name" => $data['full_name'],
                            "dob" => $data['date_of_birth'],
                            "department_id" => $data['department_id'],
                            "position" => $data['position'],
                            "type_of_employee" => $data['type_of_employee'],
                            "number_of_hours" => $data['number_of_hours'],
                            "amount_per_hour" => $data['amount_per_hour'],
                            "monthly_rate" => $data['number_of_hours'] * $data['amount_per_hour'],
                        ];
                    }else{ $notImportedRecords++; }
                } // type if end
                else
                { // type else start

                     // check if monthly_rate is not empth
                     if(!empty($data['monthly_rate']))
                     {
                       $empArr[] = [
                        "name" => $data['full_name'],
                        "dob" => $data['date_of_birth'],
                        "department_id" => $data['department_id'],
                        "position" => $data['position'],
                        "type_of_employee" => $data['type_of_employee'],
                        "number_of_hours" => 0,
                        "amount_per_hour" => 0,
                        "monthly_rate" => $data['monthly_rate'],
                    ];
                   }else{ $notImportedRecords++; }
                } //type else end
            }else{ $notImportedRecords++; } // not empty if end
            } // foreach end


         
            Employee::insert($empArr);

            if($notImportedRecords>0)
            {
                
                return redirect()->back()->with(['empSuccessImport'=>'','ImportedRec'=>count($empArr),'totalRec'=> count($phpDataArray['employee']) ]);
            }
            else
            {  
                return redirect()->back()->with(['empSuccessImport'=>'']);
            }
             
        }

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
       if($request->type_of_employee=="hourly")
       {

        $this->validate($request,[
            'name' => 'required',
            'dob' => 'required',
            'department_id' => 'required',
            'position' => 'required',
            'type_of_employee' => 'required',
            'hrs' => 'required',
            'rate' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->department_id = $request->department_id;
        $employee->position = $request->position;
        $employee->type_of_employee = $request->type_of_employee;
        $employee->number_of_hours = $request->hrs;
        $employee->amount_per_hour = $request->rate;
        $employee->monthly_rate = $request->hrs * $request->rate;
        $employee->save();

           
       }
       else
       {

        $this->validate($request,[
            'name' => 'required',
            'dob' => 'required',
            'department_id' => 'required',
            'position' => 'required',
            'type_of_employee' => 'required',
            'rate' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->department_id = $request->department_id;
        $employee->position = $request->position;
        $employee->type_of_employee = $request->type_of_employee;
        $employee->number_of_hours = 0;
        $employee->amount_per_hour = 0;
        $employee->monthly_rate = $request->rate;
        $employee->save();

       }
      

        return redirect()->back()->with('empSuccess','');
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
       if($request->type_of_employee=="hourly")
       {

        $this->validate($request,[
            'name' => 'required',
            'dob' => 'required',
            'department_id' => 'required',
            'position' => 'required',
            'type_of_employee' => 'required',
            'hrs' => 'required',
            'rate' => 'required',
        ]);

        $employee =  Employee::find($request->id);
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->department_id = $request->department_id;
        $employee->position = $request->position;
        $employee->type_of_employee = $request->type_of_employee;
        $employee->number_of_hours = $request->hrs;
        $employee->amount_per_hour = $request->rate;
        $employee->monthly_rate = $request->hrs * $request->rate;
        $employee->save();

           
       }
       else
       {

        $this->validate($request,[
            'name' => 'required',
            'dob' => 'required',
            'department_id' => 'required',
            'position' => 'required',
            'type_of_employee' => 'required',
            'rate' => 'required',
        ]);

        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->department_id = $request->department_id;
        $employee->position = $request->position;
        $employee->type_of_employee = $request->type_of_employee;
        $employee->number_of_hours = 0;
        $employee->amount_per_hour = 0;
        $employee->monthly_rate = $request->rate;
        $employee->save();

       }
      


        return redirect()->back()->with('empSuccessUpdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        return redirect()->back()->with('empSuccessDelete','');
        
    }
}
