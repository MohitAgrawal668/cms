@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</div>

                <div class="card-body">
                    <form action="{{ isset($post) ? route('post.update',['post' => $post->id]) : route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($post))
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <div class="form-group my-4">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="">{{ isset($post) ? $post->description : '' }}</textarea>
                            <small id="helpId" class="text-danger">
                              @error('description')
                                  {{ $message }}
                              @enderror
                            </small>
                        </div>
                        <div class="form-group my-4">
                            <label for="">Content</label>
                            <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                            <trix-editor input="content"></trix-editor>
                            <small id="helpId" class="text-danger">
                              @error('content')
                                  {{ $message }}
                              @enderror
                            </small>
                        </div>
                        <div class="form-group my-4">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" placeholder="">
                            @if(isset($post))
                                @if(file_exists('storage/uploads/'.$post->image))
                                    <img src="{{asset('storage/uploads/'.$post->image)}}" alt="" style="width:100px;height:60px;">
                                @endif
                            @endif    
                            <small id="helpId" class="text-danger">
                              @error('image')
                                  {{ $message }}
                              @enderror
                            </small>
                        </div>
                        <div class="form-group my-4">
                            <label for="">Published At</label>
                            <input type="text" name="published_at" id="published_at" class="form-control" placeholder="" {{ isset($post) ? $post->published_at : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="category" class='form-control'>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"  @if(isset($post)){{ $post->category_id == $category->id ? "selected" : ""}}@endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small id="helpId" class="text-danger">
                              @error('category')
                                  {{ $message }}
                              @enderror
                            </small>
                        </div>
                        @if($tags->count()>0)
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="tag[]" id="tag" class='form-control js-example-basic-single' multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" @if(isset($post))@if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>    
                        @endif
                        <button type="submit" class="btn btn-info my-4">{{ isset($post) ? 'Update Post' : 'Save Post' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("css")
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section("script")
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $("#published_at").flatpickr({
            enableTime:true,
            dateFormat:"d M Y h:i",
            defaultDate: ["{{isset($post->published_at) ? $post->published_at : date('d M Y h:i')}}"]
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
