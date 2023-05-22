@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Artical</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <!-- <div class="card-header"> 
                    <div class="card-tools">
                        <a class="btn btn-xs-app bg-success">
                            <i class="fas fa-plus"></i> Add
                        </a>
                    </div>
                </div> -->
                <form action="{{ route('artical.update', ['artical' => $artical]) }}" method="post" 
                enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="name" name="title" id="title" class="form-control" 
                            value="{{ $artical->title }}" placeholder="Title" required>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" class="form-control" 
                            placeholder="Detail" required>
                            {{ $artical->detail }}
                            </textarea>
                            @if ($errors->has('detail'))
                                <span class="text-danger">{{ $errors->first('detail') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">File</label>
                            <div class="custom-file"> 
                                <input type="hidden" name="old_image" id="old_image" 
                                value="{{ $artical->file_name }}">                                
                                <input type="file" name="file_name" id="file_name" 
                                class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                            </div> 
                        </div>
                    </div>
                    
                    <input type="hidden" name="created_by_id" id="created_by_id" 
                    Value="{{Auth::user()->id}}">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <span>Edit </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection