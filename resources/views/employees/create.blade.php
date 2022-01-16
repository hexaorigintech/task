
<style>
    .form-group{
        margin-top: 8px !important;
    }
    .form-control{
        border-radius: 0px !important;
    }
</style>
<!-- Emp modal -->

<div id="emp-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <form action="{{route('employee.store')}}" method="POST">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Employee Registration</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">


                <div class="form-group">
                    <label for="name">Department </label>
                    <select name="department_id"   class="form-control form-control-sm @error('department_id') is-invalid @enderror">
                        <option value="" selected disabled>Select Department</option>
                        @foreach ($departments as $data)
                         <option @if(old('department_id')==$data->id) selected @endif value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>

                    @error('department')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror

                </div>


                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="name" class="form-control form-control-sm @error('name') is-invalid @enderror">
                    
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="name">DOB</label>
                    <input type="date" name="dob" value="{{old('dob')}}" class="form-control form-control-sm @error('dob') is-invalid @enderror">
                    
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>

                <div class="form-group">
                    <label for="name">Position</label>
                    <select name="position"  class="form-control form-control-sm @error('position') is-invalid @enderror">
                        <option value="" selected disabled>Select Position</option>
                        <option @if(old('position')=="web") selected @endif value="web">Web Developer</option>
                        <option  @if(old('position')=="mobile") selected @endif value="mobile">Mobile Developer</option>
                        <option  @if(old('position')=="desktop") selected @endif  value="desktop">Desktop Developer</option>
                    </select>

                    
                    @error('position')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror

                </div>
                


                <div class="form-group">
                    <label for="name">Employee Type</label>
                    <select name="type_of_employee" class="form-control form-control-sm emp-type @error('type_of_employee') is-invalid @enderror">
                        <option value="" selected disabled>Select Employee Type</option>
                        <option  @if(old('type_of_employee')=="monthly") selected @endif  value="monthly" >Monthly</option>
                        <option @if(old('type_of_employee')=="hourly") selected @endif  value="hourly">Hourly</option>
                    </select>
                    
                    @error('type_of_employee')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>


                    
                    <div class="form-group">
                        <label for="name">Numbe of Hours</label>
                        <input type="number" value="{{old('hrs')  }}"  placeholder="hrs" name="hrs" class="form-control form-control-sm @error('hrs') is-invalid @enderror">
                        @error('hrs')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>

            
                <div class="form-group">
                    <label for="name">Rate</label>
                    <input type="number" value="{{old('rate')}}"  placeholder="Rate" name="rate" class="form-control form-control-sm @error('rate') is-invalid @enderror">
                    @error('rate')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>


               



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</form>
</div><!-- /.modal -->




<!-- XML modal -->

<div id="xml-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <form action="{{route('import.xml')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Import Employees </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
               <input type="file" name="xmlFile" class="form-control form-control-sm @error('email') is-invalid @enderror" required >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> <span class="uil-download-alt"></span> Import  </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</form>
</div><!-- /.modal -->
