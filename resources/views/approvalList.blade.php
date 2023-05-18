@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped text-center table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%">ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lists)>0)
                                @foreach($lists as $key => $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>
                                            <!-- <a href="" class="btn btn-xs bg-gradient-primary" title="Edit"><i class="fas fa-edit"></i></a> -->
                                            <a href="{{ URL('/admin/catalogue/product-status/' . $list->id . '/' . '1') }}" id="{{ $list->id }}" class="btn btn-xs bg-gradient-primary" style="display: none"> Approve </a>
                                            <button type="button" class="btn btn-xs bg-gradient-danger" onclick="return (confirm('Are you sure?'))?document.getElementById('{{$list->id}}').submit():false" title="Delete"><i class="fas fa-trash"></i></button>
                                            <form id="{{$list->id}}" action="" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="9">@lang('cmn.empty_table')</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection