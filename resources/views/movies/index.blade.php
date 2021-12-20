@extends('layout.master')
@section('title','Movies - Home')
@section('content')
<body>
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
								<li class="tm-nav-li"><a href="{{route('movies.index')}}" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="{{route('movies.create')}}" class="tm-nav-link">Add Movie</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to Movies</h2>
			</header>
			<!-- Gallery -->
			<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
                    @foreach ($movies as $movie)
					<article class="col-lg-4 col-md-4 col-sm-6 col-12 tm-gallery-item" style="margin-bottom: 90px">
                            <a href="{{route('movies.show',$movie->id)}}"><img src="img/{{$movie->movie_img}}" alt="Image" class="img-fluid tm-gallery-img"/></a>
                            <a href="{{route('movies.show',$movie->id)}}"><h4 class="tm-gallery-title">{{$movie->movie_name}}</h4></a>
							<p class="tm-gallery-description">{{$movie->movie_description}}</p>
                            <p class="tm-gallery-description"><span style="font-weight:bolder">Movie Gener: </span>{{"$movie->movie_gener"}}</p>
                            <form action="/movies/{{$movie->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
                            </form>
                            <button><a style="text-decoration:none" href="{{route('movies.edit',$movie->id)}}">Edit</a></button>
					</article>
                    @endforeach
		</main>
	</div>
</body>
@endsection
