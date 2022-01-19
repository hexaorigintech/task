@extends('layouts.master')
@section('content')
<div class="card">
    <h3 class="card-header" style="display: flex; justify-content: space-between;">
        Departments List
        <div class="buttons">
            <button class="btn btn-sm btn-success pull-right" data-bs-toggle="modal" data-bs-target="#dep-modal"><span class="uil-plus-square"></span> &nbsp; Add New Department</button>
        </div>
    </h3>
    <div class="card-body">
        <table id="basic-datatable" class="table dt-responsive nowrap w-100" style="margin-top: -2%;">
            <div class="form-gourp col-md-1" style="position: absolute;">
              <form action="{{route('departments')}}" method="GET" id="pagLengthFrm">  
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
                    <th>Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @php $id=0; @endphp
                @foreach ($departments as $data)
                 <tr>
                    <td>{{++$id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->description}}</td>

                    <td style="width: 16%;">
                        <a onclick="return confirm('Are you sure!')" href="{{route('department.delete',['id'=>$data->id])}}" class="btn btn-sm btn-danger"> <span class="uil-trash-alt"></span> &nbsp; Delete </a>
                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#dep-modal{{$data->id}}"><span class="uil-edit"></span> &nbsp; Edit</button>
                    </td>
                 </tr>
                 @include('departments.edit')
                @endforeach
            </tbody>
        </table>
        <div class="pagination" style="display: flex; justify-content: space-between;">
            {!! $departments->links() !!}
            <p>
                Total {!! $departments->total() !!} Per Page {!! $departments->perPage() !!}
            </p>
        </div>
    </div>
    <!-- end card-body-->
</div>

@include('departments.create') 
@endsection 

@section('scripts') 

@if($errors->any())
<script>
    $(function () {
        $("#dep-modal").modal("show");
    });
</script>
@endif 

@if(\Session::has('depSuccess'))
<script>
    $.NotificationApp.send("Done", "You have successfully added new department", "bottom-right", "success", "success");
</script>
@endif 

@if(\Session::has('depSuccessUpdate'))
<script>
    $.NotificationApp.send("Done", "You have successfully updated an department", "bottom-right", "success", "success");
</script>
@endif 

@if(\Session::has('depSuccessDelete'))
<script>
    $.NotificationApp.send("Done", "You have successfully deleted an department", "bottom-right", "success", "success");
</script>
@endif

<script>
    $(function () {
        $(".choicebox").on("change", function () {
            $("#pagLengthFrm")[0].submit();
        });
    });
</script>

@endsection
