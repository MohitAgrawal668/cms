@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form action="{{ route('user.update',['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <div class="form-group my-4">
                            <label for="about">About me</label>
                            <textarea name="about" id="about" class="form-control">{{ $user->about }}</textarea>
                            <small id="helpId" class="text-danger">
                              @error('about')
                                  {{ $message }}
                              @enderror
                            </small>
                        </div>
                        <button type="submit" class="btn btn-info my-4">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


