<div id="dep-modal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <form action="{{route('department.update')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Edit Department</h4>
                    @if($errors->any())
					<a href="{{route('departments')}}"  class="btn-close"></a>
					@else
					 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
					@endif
                </div>
                <div class="modal-body">
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
                        <label for="name">Description</label>

                        <textarea name="description" placeholder="Description" class="form-control form-control-sm @error('description') is-invalid @enderror" cols="30" rows="10">{{$data->description}}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    @if($errors->any())
					<a href="{{route('departments')}}" type="button" class="btn btn-light">Close</a>
					@else
					 <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
					@endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

