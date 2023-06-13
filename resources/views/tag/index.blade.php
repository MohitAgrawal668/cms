@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tags <a href="{{route("tag.create")}}" class='btn btn-info btn-sm' style="float:right">Create</a></div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-default">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($tags as $tag)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="">
                                        <td scope="row">{{$i}}.</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <a href="{{route('tag.edit',['tag' => $tag->id ])}}"><button class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button></a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="show_delete_box({{ $tag->id }})"><i class="fas fa-trash"></i></button>
                                        </td>
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
                Sure you want to delete this tag
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
        $("#deleteForm").attr("action","tag/"+id);
    }
  function close_delete_box()
    {
        $("#deleteModal").addClass('fade');
        $("#deleteModal").removeClass('show');
        $("#deleteModal").css('display',"none");
    }  
</script>    
@endsection