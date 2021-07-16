<div id="carousel" class="carousel slide w-100 mb-5 col-xl-8 col-md-10 mx-auto" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($campos['imagenes'] as $key => $item)
            <li data-target="#carousel" data-slide-to="{{ $loop->index }}" class="{{ ($key == $loop->index) ? 'active' : '' }}"></li>
        @endforeach
    </ol> 
    <div class="carousel-inner">
        @foreach ($campos['imagenes'] as $item)
        <div class="carousel-item {{($loop->first) ? 'active':''}}">
            @if (isset($item['archivo']))
                <img class="d-block w-100" src="images/slideshow/{{ $item['archivo'] }}" alt="{{ $item['archivo'] }}">
            @else 
                <img class="d-block w-100" src="images/slideshow/noimage.jpg" alt="noimage">
            @endif
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>
