@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}"><img src="{{ asset('images/company/Group_3285.svg') }}"></a></li>
			<li class="breadcrumb-item active" aria-current="page">
                @isset($category)
                    {{ $category->name }}
                @endisset
            </li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section>
            <div class="container row py-md-5 py-sm-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($categories as $c)
                            <li class="py-2 ps-3 @if($category->id == $c->id) active @endif"> 
                                <a href="{{ route('categoria', ['id' => $c->id]) }}" class="text-decoration-none">{{$c->name}}</a>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14">
                    <div class="row">
                        @isset($products)
                            @foreach ($products as $p)
                                <div class="col-sm-12 col-md-4 mb-3">
                                    @include('paginas.partials.producto', ['p' => $p])
                                </div>
                            @endforeach                    
                        @endisset
                    </div>

                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
