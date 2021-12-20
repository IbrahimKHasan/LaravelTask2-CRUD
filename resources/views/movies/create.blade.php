@extends('layout.master')
@section('title','Add Movies')
@section('content')
<div class="container" style="box-shadow: 2px -1px 25px -1px rgba(0,0,0,0.75);">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="/img/dblack.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="/img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Movies</h1>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="{{route('movies.index')}}" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="{{route('movies.create')}}" class="tm-nav-link active">Add Movies</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Add Movies</h2>
			</header>
			{{-- <div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Pizza</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Salad</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Noodle</a></li>
					</ul>
				</nav>
			</div> --}}
        <div class="col-lg-4" style="margin:auto;padding-bottom:30px">
            <form method="POST" action="{{route('movies.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  {{-- <label for="exampleInputEmail1">Movie Name</label> --}}
                  <input name="movie_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Movie Name">
                </div>
                <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Movie Description</label> --}}
                    <input name="movie_description" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Movie Description">
                  </div>
                  <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Movie Gener</label> --}}
                    <input name="movie_gener" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Movie Gener">
                  </div>
                  <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Movie Gener</label> --}}
                    <input name="movie_img" type="file" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                  </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        @if ($errors->any())
        <div class="m-auto text-center">
            @foreach ($errors->all() as $error)
                <li style="color:red;list-style-type:none">
                        {{$error}}
                </li>
            @endforeach
        </div>
    @endif
    </div>
@endsection
