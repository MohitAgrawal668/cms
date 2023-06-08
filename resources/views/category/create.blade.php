@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($category) ? 'Edit Category' : 'Create Category'}}</div>

                <div class="card-body">
                    <form action="{{ isset($category) ? route('category.update', ['category' => $category->id]) : route('category.store')}}" method="post">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($category) ? $category->name : '' }}">
                          <small id="helpId" class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <button type="submit" class="btn btn-info my-4">{{isset($category) ? 'Update Category' : 'Create Category'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
