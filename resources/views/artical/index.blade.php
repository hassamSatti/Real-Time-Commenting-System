@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Artical List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('artical.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Artical</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a class="btn btn-xs-app bg-success" href="{{ route('artical.create') }}">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable_admin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articals as $artical)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{ asset('images/artical/'.$artical->file_name)}}">
                                       {{$artical->file_name}} 
                                    </a>
                                </td> 
                                <td>{{ $artical->title }}</td>
                                <td>{{ $artical->detail }}</td>
                                <td>{{ $artical->created_by }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="{{ route('artical.edit', $artical->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('artical.show', $artical->id) }}">View</a>
                                            <form action="{{ route('artical.destroy', $artical->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>                                     
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
@endsection
