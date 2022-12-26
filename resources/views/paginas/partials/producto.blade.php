<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas position-absolute">
            <img src="{{ asset('images/plus.svg') }}" class="img-fluid">
        </a>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0 fw-bold">
            <a href="{{ route('producto', ['product'=>$p->id]) }}" class="text-primary font-size-13">COD. {{$p->code}}</a><br>
            <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="font-size-18">{{$p->name}}</a>
        </p>
    </div>
</div>