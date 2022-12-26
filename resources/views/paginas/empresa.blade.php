@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}"><img src="{{ asset('images/company/Group_3285.svg') }}"></a></li>
			<li class="breadcrumb-item active" aria-current="page">Empresa</li>
		</ol>
	</div>
</div>
@isset($sliders)
	@if (count($sliders))
		<div id="sliderHeroEmpresa" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($sliders as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{ $k}}"></button>					
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($sliders as $k => $v)
				<div class="carousel-item @if(!$k) active @endif">
					<img src="{{ asset($v->image) }}" class="d-block w-100" alt="...">
				</div>				
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($company)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="mb-3 font-size-20 text-primary fw-bold">{!! $company->content_1 !!}</div>
			<div class="row font-size-15 fw-light" style="color: #707070;">
				<div class="col-sm-12 col-md-6">{!! $company->content_2 !!}</div>
				<div class="col-sm-12 col-md-6">{!! $company->content_3 !!}</div>
			</div>
		</div>
	</div>	
@endif
@endsection