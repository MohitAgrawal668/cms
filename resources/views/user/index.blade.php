@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-default">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th class="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;   
                                @endphp
                                @foreach ($users as $user)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="">
                                        <td scope="row">{{$i}}.</td>
                                        <td><img src="{{ Gravatar::get($user->email); }}" style="width:50px;height:50px;border-radius:50%;"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            @if($user->role == 'writer')
                                                <a href="{{route('user.makeAdmin',['user' => $user->id])}}" class="btn btn-success btn-sm">Make Admin</a>
                                            @endif
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

@endsection
