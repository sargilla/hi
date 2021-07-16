{{-- Sin VUE --}}
{{-- <section class="slider-element slider-parallax swiper_wrapper clearfix" style="height: 550px;" data-loop="true">
    <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
            @foreach ($campos['imagenes'] as $key => $item)
                <div class="swiper-slide" style="background-image: url('images/original/{{ $item['imagen'] }}'); background-position: center top;">
                    <div class="container clearfix">
                        <div  class="slider-caption">
                            <h2>{{ $item['titulo'] }}</h2>
                            <div>
                                {{ $item['texto'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
        <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
    </div>
</section> --}}

{{-- Con VUE --}}
{{--
    elementDirection = element.attr('data-direction'),
    elementSpeed = element.attr('data-speed'),
    elementAutoPlay = element.attr('data-autoplay'),
    elementLoop = element.attr('data-loop'),
    elementEffect = element.attr('data-effect'),
    elementGrabCursor = element.attr('data-grab'),
    slideNumberTotal = element.find('.slide-number-total'),
    slideNumberCurrent = element.find('.slide-number-current'),
    sliderVideoAutoPlay = element.attr('data-video-autoplay'),
    sliderSettings = element.attr('data-settings');
--}}
<swiper-slider loop="true" autoplay="5000" style="height: 350px;"
    class="slider-element slider-parallax swiper_wrapper clearfix">
    @foreach ($campos['imagenes'] as $key => $item)
    <div class="swiper-slide"
        style="background-image: url('images/original/{{ $item['archivo'] }}'); background-position: center top;">
        <div class="container clearfix">
            @if (isset($item['titulo']) || isset($item['texto']))
            <div class="slider-caption">
                @if (isset($item['titulo']))
                <h2>{{ $item['titulo'] }}</h2>
                @endif
                @if (isset($item['texto']))
                <div>
                    {{ $item['texto'] }}
                    @isset ($item['link'])
                    <p><a href="{{ $item['link']}}"
                            class="button button-border button-amber button-3d button-large button-rounded tright nomargin text-right mt-2"
                            target="{{ (isset($item['target']) && $item['target'] == 'blank') ? '_blank' : '' }}">Leer
                            más</a></p>
                    @endisset
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
    @endforeach
</swiper-slider>
