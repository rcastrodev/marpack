@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}"><img src="{{ asset('images/company/Group_3285.svg') }}"></a></li>
			<li class="breadcrumb-item active" aria-current="page">Contacto</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.663341871406!2d-58.6844622847687!3d-34.66320418044416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc082a17737e7%3A0x57a351b09c2a1eca!2sMarpack!5e0!3m2!1ses!2sve!4v1627489551287!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <div class="d-flex">
                        <i class="fas fa-map-marker-alt text-primary text-primary d-block me-2 mb-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-envelope text-primary d-block me-2 mb-3"></i><span class="d-block">{{ $data->email }}</span>                        
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-phone-alt text-primary d-block me-2 mb-3"></i>
                        <span>{{ $data->phone1 }} / {{ $data->phone2 }}</span>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-8">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <button type="submit" class="text-uppercase btn btn-danger font-size-14 py-2 px-4 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton ">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
