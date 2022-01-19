<div id="emp-modal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <form action="{{route('employee.update')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Edit Employee</h4>
                    @if($errors->any())
					<a href="{{route('employees')}}"  class="btn-close"></a>
					@else
					 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
					@endif
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Department </label>
                        <select name="department_id" class="form-control form-control-sm @error('department_id') is-invalid @enderror">
                            <option value="" selected disabled>Select Department</option>
                            @foreach ($departments as $datas)
                            <option @if($data->department_id==$datas->id) selected @endif value="{{$datas->id}}">{{$datas->name}}</option>
                            @endforeach
                        </select>

                        @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$data->name}}" placeholder="name" class="form-control form-control-sm @error('name') is-invalid @enderror" />

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">DOB</label>
                        <input type="date" name="dob" value="{{$data->dob}}" class="form-control form-control-sm @error('dob') is-invalid @enderror" />

                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Position</label>
                        <select name="position" class="form-control form-control-sm @error('position') is-invalid @enderror">
                            <option value="" selected disabled>Select Position</option>
                            <option @if($data->position=="web") selected @endif value="web">Web Developer</option>
                            <option @if($data->position=="mobile") selected @endif value="mobile">Mobile Developer</option>
                            <option @if($data->position=="desktop") selected @endif value="desktop">Desktop Developer</option>
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
                            <option @if($data->type_of_employee=="monthly") selected @endif value="monthly" >Monthly</option>
                            <option @if($data->type_of_employee=="hourly") selected @endif value="hourly">Hourly</option>
                        </select>

                        @error('type_of_employee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Numbe of Hours</label>
                        <input type="number" value="{{$data->number_of_hours}}" placeholder="hrs" name="hrs" class="form-control form-control-sm @error('hrs') is-invalid @enderror" />
                        @error('hrs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Rate</label>
                        <input
                            type="number"
                            value="{{$data->type_of_employee=='hourly' ? $data->amount_per_hour : $data->monthly_rate }}"
                            placeholder="Rate"
                            name="rate"
                            class="form-control form-control-sm @error('rate') is-invalid @enderror"
                        />
                        @error('rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    @if($errors->any())
					<a href="{{route('employees')}}" type="button" class="btn btn-light">Close</a>
					@else
					 <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
					@endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
