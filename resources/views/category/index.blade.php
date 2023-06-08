@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories <a href="{{route("category.create")}}" class='btn btn-info btn-sm' style="float:right">Create</a></div>

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
                                @foreach ($categories as $category)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="">
                                        <td scope="row">{{$i}}.</td>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{route('category.edit',['category' => $category->id ])}}"><button class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button></a></td>
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
@endsection
