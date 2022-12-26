<div class="pre-footer text-uppercase text-center text-white p-3" style="background-color: #444444">
    <span class="font-size-14 color-white">seguinos en</span>
    <a href="{{$data->facebook}}" class="py-1 px-2 text-white rounded-circle border border-2 border-white mx-2">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="{{$data->instagram}}" class="py-1 px-2 text-white rounded-circle border border-2 border-white">
        <i class="fab fa-instagram"></i>
    </a>
</div>
<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start bg-primary">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-2 d-sm-none d-md-block">
                <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block img-fluid">
            </div>
            <div class="col-sm-12 col-md-2 col-lg-1 d-sm-none d-md-block">
                <h6 class="text-uppercase text-white font-weight-600">secciones</h6>
                <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-white">empresa</a>
                <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-white">productos</a>
                <a href="{{ route('cotizacion') }}" class="d-block text-uppercase text-decoration-none text-white">cotizaci&oacuten</a>
                <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-white">contacto</a>
            </div>
            <div class="col-sm-12 col-md-3 text-white mb-sm-4 mb-md-0">
                <div class="row">
                    <div class="col-sm-12 newsletter">
                        <h6 class="text-uppercase text-white font-weight-600">SUSCRIBITE AL NEWSLETTER</h6>
                        <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                            @csrf
                            <div class="">
                                <label class="visually-hidden" for="">Username</label>
                                <div class="input-group font-size-12">
                                    <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="border-radius: 15px 0 0 15px; background-color: #f9f9f9;">
                                    <button type="submit" id="" class="input-group-text" style="border-radius: 0 15px 15px 0; background-color: #9c030f;"><i class="far fa-paper-plane text-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-white font-weight-600">contacto</h6>
                    <div class="d-flex text-white">
                        <i class="fas fa-map-marker-alt color-azul-oscuro d-block me-2 mb-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between mt-3">
                        <div class="w-md-50 w-sm-100">
                            <h6 class="fw-bold text-white font-size-15">Administraci&oacute;n</h6>
                            <div class="text-white">
                                <div class="d-flex">
                                    <i class="fas fa-envelope color-azul-oscuro d-block me-2 mb-3"></i><span class="d-block"></span>
                                    <a href="mailto:{{ $data->email }}" class="text-white text-decoration-none">{{ $data->email }}</a>
                                </div>
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt color-azul-oscuro d-block me-2 mb-3"></i>
                                    <a href="tel:{{ $data->phone1}}" class="text-white text-decoration-none">{{ $data->phone1 }}</a>  
                                </div>        
                            </div>
                        </div>
                        @if ($data->email2 || $data->phone2)
                        <div class="w-md-50 w-sm-100">
                            <h6 class="fw-bold text-white font-size-15">Ventas</h6>
                            <div class="text-white">
                                @if($data->email2)
                                    <div class="d-flex">
                                        <i class="fas fa-envelope color-azul-oscuro d-block me-2 mb-3"></i><span class="d-block"></span>
                                        <a href="mailto:{{ $data->email2 }}" class="text-white text-decoration-none">{{ $data->email2 }}</a>
                                    </div>                                   
                                @endif
                                @if($data->phone2)
                                    <div class="d-flex">
                                        <i class="fas fa-phone-alt color-azul-oscuro d-block me-2 mb-3"></i>
                                        <a href="tel:{{ $data->phone2}}" class="text-white text-decoration-none">{{ $data->phone2 }}</a>  
                                    </div>                                 
                                @endif
                            </div>
                        </div>                     
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-white p-2 font-size-13" style="background-color:#9c030f;">
    <div class="container">
        <div class="row">
            <div class="col">
                <span><i class="far fa-copyright"></i> Copyright 2021 MarPack. Todos los derechos reservados</span>
            </div>
        </div>
    </div>
</div>
@isset($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>     
@endisset