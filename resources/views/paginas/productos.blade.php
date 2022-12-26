@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}"><img src="{{ asset('images/company/Group_3285.svg') }}"></a></li>
			<li class="breadcrumb-item active" aria-current="page">Productos</li>
		</ol>
	</div>
</div>
@isset($categories)
    <div>
        <div class="container">
            <div class="">
                @if ($categories->count())
                    <section class="producto row font-size-14 my-5">
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
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos categorías cargadas en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset
@isset($products)
    <div>
        <div class="container">
            <div class="">
                @if (count($products))
                    <section class="producto row font-size-14 my-5">
                        @foreach ($products as $p)
                            <div class="col-sm-12 col-md-3 mb-3">
                                @includeIf('paginas.partials.producto', ['p' => $p])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos productos cargados en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
