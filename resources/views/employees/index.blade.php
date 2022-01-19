@extends('layouts.master')
@section('content')

<div class="row">
    @if(\Session::has('ImportedRec') && \Session::has('totalRec'))
    <div class="alert alert-danger" role="alert"><i class="dripicons-wrong me-2"></i> <strong>{{\Session::get('ImportedRec') }}</strong> has been imported out of <strong>{{ \Session::get('totalRec')}}</strong></div>
    @endif
</div>

<div class="card">
    <h3 class="card-header" style="display: flex; justify-content: space-between;">
        Employees Lists
        <div class="buttons">
            <button class="btn btn-sm btn-dark pull-right" data-bs-toggle="modal" data-bs-target="#xml-modal"><span class="uil-download-alt"></span> &nbsp; Import XML</button>
            &nbsp;
            <button class="btn btn-sm btn-success pull-right" data-bs-toggle="modal" data-bs-target="#emp-modal"><span class="uil-plus-square"></span> &nbsp; Add New Employee</button>
        </div>
    </h3>
    <div class="card-body">
        <table id="basic-datatable" class="table dt-responsive nowrap w-100" style="margin-top: -2%;">
            <div class="form-gourp" style="position: absolute; width: 5% !important;">
                <form action="{{route('employees')}}" method="GET" id="pagLengthFrm">  
                    @csrf
                    <select name="pagLength" class="form-control form-control-sm choicebox">
                        <option @if(isset($_GET['pagLength']) && $_GET['pagLength']==10) selected @endif value="10" selected> 10 </option>
                        <option @if(isset($_GET['pagLength']) && $_GET['pagLength']==25) selected @endif value="25" > 25 </option>
                        <option @if(isset($_GET['pagLength']) && $_GET['pagLength']==50) selected @endif value="50" > 50 </option>
                        <option @if(isset($_GET['pagLength']) && $_GET['pagLength']==100) selected @endif value="100" > 100 </option>
                    </select>
                </form>
            </div>
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Postion</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Department</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @php $id=0; @endphp 
                @foreach ($employees as $data)
                 <tr>
                    <td>{{++$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->dob}}</td>
                    <td>{{$data->position}}</td>
                    <td class="text text-capitalize">
                        {{$data->type_of_employee}} @if($data->type_of_employee=="hourly")
                        <span style="font-size: 12px !important;" class="badge badge-dark-lighten"> ( hrs {{$data->number_of_hours}} rate {{$data->amount_per_hour}}) </span> @endif
                    </td>
                    <td>{{$data->monthly_rate}}</td>

                    <td>{{$data->department}}</td>
                    <td style="width: 16%;">
                        <a onclick="return confirm('Are you sure!')" href="{{route('employee.delete',['id'=>$data->id])}}" class="btn btn-sm btn-danger"> <span class="uil-trash-alt"></span> &nbsp; Delete </a>
                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#emp-modal{{$data->id}}"><span class="uil-edit"></span> &nbsp; Edit</button>
                    </td>
                 </tr>
                 @include('employees.edit')
               @endforeach
            </tbody>
        </table>
        <div class="pagination" style="display: flex; justify-content: space-between;">
            {!! $employees->links() !!}
            <p>
                Total {!! $employees->total() !!} Per Page {!! $employees->perPage() !!}
            </p>
        </div>
    </div>
    <!-- end card-body-->
</div>
@include('employees.create')
@endsection


@section('scripts') 

@if($errors->any())
<script>
    $(function () {
        $("#emp-modal").modal("show");
    });
</script>
@endif

@if(\Session::has('empSuccess'))
<script>
    $.NotificationApp.send("Done", "You have successfully added new employee", "bottom-right", "success", "success");
</script>
@endif @if(\Session::has('empSuccessUpdate'))
<script>
    $.NotificationApp.send("Done", "You have successfully updated an employee", "bottom-right", "success", "success");
</script>
@endif @if(\Session::has('empSuccessDelete'))
<script>
    $.NotificationApp.send("Done", "You have successfully deleted an employee", "bottom-right", "success", "success");
</script>
@endif @if(\Session::has('empSuccessImport'))
<script>
    $.NotificationApp.send("Done", "You have successfully imported XML employee list", "bottom-right", "success", "success");
</script>
@endif

<script>
    $(function () {
        $(".empHourly").hide();

        $(".choicebox").on("change", function () {
            $("#pagLengthFrm")[0].submit();
        });
    });
</script>

@endsection
