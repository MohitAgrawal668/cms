@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Create Category</div>

                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <button type="submit" class="btn btn-info my-4">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
