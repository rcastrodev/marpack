<header class="header py-2 d-sm-none d-md-block">
    <div class="container" style="padding-bottom: 20px; border-bottom: 3px solid #f8f8f8;">
        <div class="row align-items-end">
            <div class="col-md-4 d-flex flex-column">
                <a href="tel:{{$data->phone1}}" class="d-flex mb-2">
                    <img src="{{ asset('images/Path_3902.svg') }}" class="d-block me-3"><span>{{ $data->phone1 }}</span>
                </a>
                <a href="mailto:{{ $data->email }}" class="d-flex me-2">
                    <img src="{{ asset('images/Path_1069.svg') }}" class="d-block me-3 img-fluid"><span>{{ $data->email }}</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('index') }}"><img src="{{ asset($data->logo_header) }}" class="d-block mx-auto" height="90"></a>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
                <form action="{{ route('productos') }}" method="get" class="position-sm-static rposition" style="right: 20px;">
                    <div class="input-group">
                        <input type="text" name="b" class="form-control">
                        <button class="nav-link color-primario font-size-13 btn"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <a href="{{$data->facebook}}" class="px-1" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$data->instagram}}" class="px-1" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand d-sm-block d-md-none" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                
                <li class="nav-item @if(Request::is('categoria/*') ||  Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('categoria/*') || Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item @if(Request::is('cotizacion') || Request::is('cotizacion/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('cotizacion') || Request::is('cotizacion/*')) active @endif" href="{{ route('cotizacion') }}">Cotizaci&oacute;n</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
                <li class="d-sm-block d-md-none">
                    <form action="{{ route('productos') }}" method="get" class="position-sm-static rposition" style="right: 20px;">
                        <div class="input-group">
                            <input type="text" name="b" class="form-control">
                            <button class="nav-link color-primario font-size-13 btn"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>  
