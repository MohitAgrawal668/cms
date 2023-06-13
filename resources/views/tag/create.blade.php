@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($tag) ? 'Edit tag' : 'Create tag'}}</div>

                <div class="card-body">
                    <form action="{{ isset($tag) ? route('tag.update', ['tag' => $tag->id]) : route('tag.store')}}" method="post">
                        @csrf
                        @if(isset($tag))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($tag) ? $tag->name : '' }}">
                          <small id="helpId" class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <button type="submit" class="btn btn-info my-4">{{isset($tag) ? 'Update tag' : 'Create tag'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
