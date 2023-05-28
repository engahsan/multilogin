@extends('layouts.app')
   
@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid"></div>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- card-header -->
            <div class="card"> 
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped text-center table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lists)>0)
                                @foreach($lists as $key => $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>
                                            <!-- <a href="" class="btn btn-xs bg-gradient-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ URL('/admin/catalogue/product-status/' . $list->id . '/' . '1') }}" id="{{ $list->id }}" class="btn btn-xs bg-gradient-primary" style="display: none"> Approve </a>
                                            <button type="button" class="btn btn-xs bg-gradient-danger" onclick="return (confirm('Are you sure?'))?document.getElementById('{{$list->id}}').submit():false" title="Delete"><i class="fas fa-trash"></i></button>
                                            <form id="{{$list->id}}" action="" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> -->
                                            
                                                <a class="btn btn bg-gradient-danger" href="{{ Url('/user-status/' . $list->id . '/' . '0') }}" id="{{ $list->id }}" >Dicline</a>
                                                
                                
                                                <a class="btn btn bg-gradient-success" href="{{ Url('/user-status/' . $list->id . '/' . '1') }}" id="{{ $list->id }}" >Approve</a>
                                                
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="9">Table is empty</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection