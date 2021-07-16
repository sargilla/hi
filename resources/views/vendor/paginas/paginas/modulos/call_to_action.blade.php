 <div class="txtsomos-home container" style="background: url({{ asset('/images/original/'.$modulo['campos']['imagen']) }}) center center no-repeat">
 	<div class="row">
 		<div class="col-md-12 text-center">
 			{!! $modulo['campos']['texto'] !!}
 		</div>                
 	</div>
 	<div class="row">
 		<div class="col-md-5"></div>
 		<div class="col-md-2">
 			<a class="btn btn-block btn-leer" href="{{ $modulo['campos']['link_boton']}}">{{ $modulo['campos']['texto_boton'] }}</a>
 		</div>
 		<div class="col-md-5"></div>
 	</div>	
 </div>    
