@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset('images/IMG_6666.png') }})">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h5 class="text-uppercase text-primary">{{ $v->content_1 }}</h5>
							<h2 class="fw-bold text-dark text-uppercase" style="font-size: 42px;">{{ $v->content_2 }}</h2>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if (count($categories))
	<section class="py-5">
		<h2 class="text-center position-relative fw-bold mb-5 text-uppercase font-size-26">Categorías <span class="position-absolute rboder"></span></h2>
		<div class="container row mx-auto mt-5">
			@foreach ($categories as $c)
				<div class="col-sm-12 col-md-3 mb-3">
					<div class="card producto">
						<div class="position-relative">  
							<a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="mas position-absolute">
								<img src="{{ asset('images/plus.svg') }}" class="img-fluid">
							</a>
							@if ($c->image)
								<img src="{{ asset($c->image) }}" class="img-fluid img-product" style="">
							@else
								<img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="">
							@endif
						</div>
						<div class="card-body">
							<p class="card-text mb-0 text-center fw-bold">
								<a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="font-size-19">{{$c->name}}</a>
							</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section>
@endif
@if (count($products))
	<section class="py-5 bg-light">
		<h2 class="text-center position-relative fw-bold mb-5 text-uppercase font-size-26">Productos destacados <span class="position-absolute rboder"></span></h2>
		<div class="container row mx-auto mt-5">
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-3 mb-3">
					@include('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
		</div>
	</section>
@endif
@endsection