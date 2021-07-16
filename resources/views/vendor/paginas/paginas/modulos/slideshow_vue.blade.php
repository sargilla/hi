<slideshow :autoplay="true">
	@foreach ($campos['imagenes'] as $item)
		<img class="carousel-cell" src="images/slideshow/{{ $item['archivo'] }}" alt="{{ $item['archivo'] }}">
	@endforeach
</slideshow>
