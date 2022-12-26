@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}"><img src="{{ asset('images/company/Group_3285.svg') }}"></a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('categoria', ['id'=> $product->category->id]) }}" class="text-decoration-none">{{$product->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($categories as $c)
                        <li class="py-2 ps-3 @if($product->category->id == $c->id) active @endif"> 
                            <a href="{{ route('categoria', ['id' => $c->id]) }}" class="text-decoration-none">{{$c->name}}</a>
                        </li>                        
                    @endforeach
                </ul>
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    @foreach ($product->images as $k => $pi)
                                        <div class="carousel-item  @if(!$k) active @endif">
                                            <img src="{{ asset($pi->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                            min-height: 240px; min-width: 100%; max-width: 100%;" alt="{{$product->name}}">
                                        </div>                                    
                                    @endforeach
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                    min-width: 100%; max-width: 100%;"> 
                                    </div>                                   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        @if (count($product->images))
                            <div class="d-sm-none d-md-block col-md-5">
                                <ul class="d-flex p-0" style="list-style: none;">
                                    @foreach ($product->images as $pi)
                                        <li class="me-2" style="border:1px solid #FD0D1B">
                                            <img src="{{ asset($pi->image) }}" width="85" style="height: 100%; object-fit: cover;">
                                        </li>                 
                                    @endforeach
                                </ul>
                            </div>   
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="col-sm-12">
                            @if ($product->code)
                                <span class="fw-bold text-primary">COD. {{ $product->code }}</span>
                            @endif
                            <h1 class="mb-3 font-size-26">{{ $product->name }}</h1>
                            <div class="mb-sm-2 mb-md-5 fw-light font-size-15">
                                <p>{{ $product->description }}</p>
                            </div>
                            @if ($product->width || $product->length)
                                <div class="mb-sm-2 mb-md-5 fw-light font-size-15">
                                    <strong class="fw-bold d-block mb-2">Medidas</strong>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="text-start">
                                                    <img src="{{ asset('images/Group_3186.svg') }}" alt="">
                                                    Ancho
                                                </td>
                                                <td class="text-end">{{$product->width}} cm</td>
                                            </tr>
                                            <tr>
                                                <td class="text-start">
                                                    <img src="{{ asset('images/Group_3188.svg') }}" alt="">
                                                    Largo
                                                </td>
                                                <td class="text-end">{{$product->length}} cm</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>                 
                            @endif
                            @if($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 px-3 d-flex justify-content-between btn btn-outline-danger rounded-pill font-size-15 w-sm-100 w-md-50 align-items-center fw-bold" style="width: 180px;">
                                    <span class="text-uppercase">ficha técnica</span>
                                    <i class="fas fa-download"></i>
                                </a>     
                            @endif
                        </div>
                    </div>
                </div>
                @if (count($product->variableProducts))
                    <div class="row mb-5">
                        <div class="col-sm-12 table-responsive">
                            <table id="tableVP" class="table">
                                <thead class="text-capitalize bg-primary text-white">
                                    <tr class="text-white">
                                        <th scope="col" class="fw-light">c&oacute;digo</th>
                                        <th scope="col" class="fw-light">Nombre</th>
                                        <th scope="col" class="fw-light" width="120">cantidad</th>
                                        <th scope="col" class="fw-light"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variableProducts as $vProduct)
                                        <tr>
                                            <td>COD. {{$vProduct->code}}</td>
                                            <td>{{$vProduct->name}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" min="0" @isset($vps[$vProduct->id]) value="{{$vps[$vProduct->id]['value']}}" @endisset class="form-control">
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-outline-danger rounded-pill fw-bold addVP" style="width: 110px;"
                                                data-id="{{$vProduct->id}}"
                                                data-productid="{{$product->id}}"
                                                @if(count($product->images)) 
                                                    data-image="{{ asset($product->images()->first()->image) }}" 
                                                @else 
                                                    data-image="{{ asset('images/default.jpg') }}"
                                                @endif
                                                data-code="{{$vProduct->code}}"
                                                data-name="{{$vProduct->name}}"
                                                data-url="{{ route('vp.store') }}"
                                                >cotizar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                  
                @endif
                <div class="row mb-5">
                    <div class="col-sm-12 mb-3">
                        <h5 class="text-uppercase font-size-20" style="color: #606163;">productos relacionados</h5>
                    </div>
                    @foreach ($relatedProducts as $p)
                        <div class="col-sm-12 col-md-4">
                            @includeIf('paginas.partials.producto', ['p' => $p])
                        </div>       
                    @endforeach
                </div>                    
            </section>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
