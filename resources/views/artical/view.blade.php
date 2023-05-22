@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Crud</title>
    <link data-minify="1"
        href="https://www.bacancytechnology.com/blog/wp-content/cache/min/1/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css?ver=1672663261"
        rel="stylesheet" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('images/artical/'.$artical->file_name)}}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$artical->title}}</h3>

                            <p class="text-muted text-center">{{$artical->detail}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="post clearfix">
                                        
                                    @livewire('comment-section', ['article' => $artical])
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://www.bacancytechnology.com/blog/wp-content/cache/min/1/b810c1e775732c06a03141e7fcdf81a0.js" data-minify="1" defer></script>
    
    @livewireScripts
</body>

</html>

@endsection