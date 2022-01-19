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

    protected $employeesArray = []; // employees array it will fill when user import emplyees xml file form frontend
    protected $notImportedRecords = 0; // it will count all records which has null and empty records

    public function index(Request $request)
    {
        $data['departments'] = Department::orderBy('id', 'DESC')->get();

        if (isset($request->pagLength)) {
            // if ther is page lenth in request then take pagination by page length
            $data['employees'] = Employee::join('departments', 'departments.id', 'employees.department_id')
                ->select('employees.*', 'departments.name as department')
                ->orderBy('id', 'DESC')
                ->paginate($request->pagLength);
        } else {
            $data['employees'] = Employee::join('departments', 'departments.id', 'employees.department_id')
                ->select('employees.*', 'departments.name as department')
                ->orderBy('id', 'DESC')
                ->paginate('10');
        }

        return view('employees.index', $data);
    }

    public function empByDepartment($id)
    {
        // Take employee by department id
        $data['employees'] = Employee::join('departments', 'departments.id', 'employees.department_id')
            ->where('departments.id', $id)
            ->select('employees.*', 'departments.name as department')
            ->orderBy('id', 'DESC')
            ->paginate('10');

        $data['departments'] = Department::orderBy('id', 'DESC')->get();
        return view('employees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importXml(Request $request)
    {
        $xmlFile = $request->xmlFile;
        $file = $xmlFile->getClientOriginalName();

        $xmlDataString = file_get_contents($file);
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        if (count($phpDataArray['employee']) > 0) {
            // if the emplyee xml file has emplyees
            foreach ($phpDataArray['employee'] as $data) {
                if (!empty($data['full_name']) || !empty($data['department_id']) || !empty($data['type_of_employee'])) {
                    // Check if ther is no empty column avalible
                    if ($data['type_of_employee'] == 'hourly') {
                        //Check if employee type is hourly
                        $this->addHourlyEmplyeesToArray($data);
                    } else {
                        $this->addMonthlyEmplyeesToArray($data);
                    }
                } else {
                    // it will count all the records which has null and empty columns
                    $this->notImportedRecords++;
                }
            }

            Employee::insert($this->employeesArray);

            if ($this->notImportedRecords > 0) {
                return redirect()
                    ->back()
                    ->with(['empSuccessImport' => '', 'ImportedRec' => count($this->employeesArray), 'totalRec' => count($phpDataArray['employee'])]);
            } else {
                return redirect()
                    ->back()
                    ->with(['empSuccessImport' => '']);
            }
        } else {
            return redirect()
                ->back()
                ->with(['emptyFile' => 'There are no records avalible in xml employee file']);
        }
    }

    public function addHourlyEmplyeesToArray($data)
    {
        if (!empty($data['number_of_hours']) && !empty($data['amount_per_hour'])) {
            // check if number of hrs and amount per hr is not empth
            $this->employeesArray[] = [
                "name" => $data['full_name'],
                "dob" => $data['date_of_birth'],
                "department_id" => $data['department_id'],
                "position" => $data['position'],
                "type_of_employee" => $data['type_of_employee'],
                "number_of_hours" => $data['number_of_hours'],
                "amount_per_hour" => $data['amount_per_hour'],
                "monthly_rate" => $data['number_of_hours'] * $data['amount_per_hour'],
            ];
        } else {
            $this->notImportedRecords++;
        }
    }

    public function addMonthlyEmplyeesToArray($data)
    {
        // check if monthly_rate is not empth
        if (!empty($data['monthly_rate'])) {
            $this->employeesArray[] = [
                "name" => $data['full_name'],
                "dob" => $data['date_of_birth'],
                "department_id" => $data['department_id'],
                "position" => $data['position'],
                "type_of_employee" => $data['type_of_employee'],
                "number_of_hours" => 0,
                "amount_per_hour" => 0,
                "monthly_rate" => $data['monthly_rate'],
            ];
        } else {
            $this->notImportedRecords++;
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
        if ($request->type_of_employee == "hourly") {
            $this->validate($request, [
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
        } else {
            $this->validate($request, [
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

        return redirect()
            ->back()
            ->with('empSuccess', '');
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
        if ($request->type_of_employee == "hourly") {
            $this->validate($request, [
                'name' => 'required',
                'dob' => 'required',
                'department_id' => 'required',
                'position' => 'required',
                'type_of_employee' => 'required',
                'hrs' => 'required',
                'rate' => 'required',
            ]);

            $employee = Employee::find($request->id);
            $employee->name = $request->name;
            $employee->dob = $request->dob;
            $employee->department_id = $request->department_id;
            $employee->position = $request->position;
            $employee->type_of_employee = $request->type_of_employee;
            $employee->number_of_hours = $request->hrs;
            $employee->amount_per_hour = $request->rate;
            $employee->monthly_rate = $request->hrs * $request->rate;
            $employee->save();
        } else {
            $this->validate($request, [
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

        return redirect()
            ->back()
            ->with('empSuccessUpdate', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
        return redirect()
            ->back()
            ->with('empSuccessDelete', '');
    }
}
