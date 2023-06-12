@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts <a href="{{route("post.create")}}" class='btn btn-info btn-sm' style="float:right">Create</a> &nbsp;&nbsp; <a href="{{route("post.trashed")}}" class='btn btn-danger btn-sm' style="float:right">trashed List</a> </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-default">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th class="col">Published At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($posts as $post)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="">
                                        <td scope="row">{{$i}}.</td>
                                        <td><img src="{{ asset('storage/uploads/'.$post->image) }}" style="width;100px;height:60px;object-fit:contain;" alt=""></td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->published_at }}</td>
                                        <td><a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;<a href="{{route('post.move_to_trash',['post' => $post->id])}}" class="btn btn-danger btn-sm">Trash</a></td>
                                    </tr>            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <form action="" method="post" id="deleteForm">
        @csrf
        @method("DELETE")
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" onclick="close_delete_box()" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Sure you want to delete this
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="close_delete_box()">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>

    </form>
    
  </div>
@endsection
@section('script')
<script>
  function show_delete_box(id)
    {
        $("#deleteModal").removeClass('fade');
        $("#deleteModal").addClass('show');
        $("#deleteModal").css('display',"block");
        $("#deleteForm").attr("action","category/"+id);
    }
  function close_delete_box()
    {
        $("#deleteModal").addClass('fade');
        $("#deleteModal").removeClass('show');
        $("#deleteModal").css('display',"none");
    }  
</script>    
@endsection