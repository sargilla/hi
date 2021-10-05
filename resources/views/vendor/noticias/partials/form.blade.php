{!! Form::fl_text('nombre', __('productos.nombre'), null, ['class'=>'control-label col-md-3'], ['class'=>'form-control', 'required'=>'required', 'minlength'=> 5 ,'placeholder'=> 'Ingrese el nombre del producto'], $errors) !!}
{!! Form::fl_text('codigo', __('productos.codigo'), null, ['class'=>'control-label col-md-3'], ['class'=>'form-control' ,'placeholder'=> 'Ingrese el código del producto'], $errors) !!}
<div class="row form-group">
	<div class="col-md-6">
		{!! Form::fl_text('precio', 'Precio', null, ['class'=>'control-label col-md-3'], ['class'=>'form-control' ,'placeholder'=> 'Ingrese el precio del producto'], $errors) !!}
	</div>
	<div class="col-md-6">
		{!! Form::fl_text('precio_mayorista', 'Precio Mayorista', null, ['class'=>'control-label col-md-3'], ['class'=>'form-control' ,'placeholder'=> 'Ingrese el precio del producto'], $errors) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('categoria_id', __('productos.categoria') , ['class' =>'control-label col-md-3']) !!}
	<div class="col-lg-9">
		{!! Form::select('categoria_id', $categorias , old('categoria_id'), ['class'=>'form-control selectCategoria','placeholder' => '', 'required'=>'required']) !!}
	</div>
</div>
{!! Form::fl_textarea('descripcion', __("productos.descripcion"), null, ['class'=>'control-label col-md-3'],['class'=>'form-control editor', 'rows'=>5, 'required'=>'required']) !!}
<div class="form-group">
	{!! Form::label('imagenes', __('productos.imagenes') , ['class' =>'control-label col-md-3']) !!}
	<div class="col-lg-9">
		<p id="cargando_imagenes"></p>
		<div id="progress_imagenes" class="progress progress-striped progress-sm hidden">
	        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
	              <span class="sr-only"></span>
	    	</div>	
		</div>
		<div class="alert alert-warning fade in">
			<strong>La primera imagen sera la principal del producto</strong><br> Puede reordenar arrastrando las imagenes si lo desea.
		</div>
    	<div class="lista_archivos" id="lista_imagenes">
			@isset ($producto->imagenes)
				@foreach ($producto->imagenes as $key => $imagen)
					<article class="media">
						<a class='pull-left thumb p-thumb'>
                            <img src="/storage/Productos/imagenes/{{ $imagen['name']}}" height='65px'/>
                        </a> 
                        <div class='media-body'>  
                            <p>Archivo: {{ $imagen['name']}} </p>
	                        <div class='input-group'> 
	                            <input name='imagenes[{{$key}}][title]' class='form-control' type='text' placeholder='Ingrese un título' value='{{ $imagen['title'] }}'/>
	                            <span class='input-group-btn'>
	                                <button class='btn btn-danger borrar' type='button' data-archivo='imagenes/{{ $imagen['name']}}'>
	                                <i class='fa fa-times'></i></button>
	                            </span>
	                        </div>
                     	</div>
                     	<input name="imagenes[{{$key}}][name]" type="hidden" value="{{$imagen['name']}}" />
					</article>	
				@endforeach
			@endisset
    	</div>
		<span class="btn btn-primary active fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>{{__('productos.agregar_imagenes')}}</span>
			{!! Form::file('imagenes', ['class'=>'form-control fileupload', 'multiple'=>'multiple', 'data-url'=> route('uploadsEnProductos') , 'data-tipo'=>'imagenes' ]) !!}
		</span>
	</div>
</div> 
{{--
<div class="form-group">
	{!! Form::label('documentos', __('productos.documentos') , ['class' =>'control-label col-md-3']) !!}
	<div class="col-lg-9">
		<p id="cargando_documentos"></p>
		<div id="progress_documentos" class="progress progress-striped progress-sm hidden">
	        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
	              <span class="sr-only"></span>
	    	</div>	
		</div>
    	<div class="lista_archivos" id="lista_documentos">
    		@isset ($producto->documentos)
				@foreach ($producto->documentos as $key => $documento)
					<article class="media">
						<a class='pull-left thumb p-thumb'>
                            <img src="/images/pdf.svg" height='65px' />
                        </a> 
                        <div class='media-body'>  
                            <p>Archivo: {{ $documento['name']}} </p>
	                        <div class='input-group'> 
	                            <input name='documentos[{{$key}}][title]' class='form-control' type='text' placeholder='Ingrese un título' value='{{ $documento['title'] }}'/>
	                            <span class='input-group-btn'>
	                                <button class='btn btn-danger borrar' type='button' data-archivo='documentos/{{ $documento['name']}}'>
	                                <i class='fa fa-times'></i></button>
	                            </span>
	                        </div>
                     	</div>
                     	<input name="documentos[{{$key}}][name]" type="hidden" value="{{$documento['name']}}" />
					</article>	
				@endforeach
			@endisset
    	</div>
		<span class="btn btn-primary active fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>{{__('productos.agregar_documentos')}}</span>
			{!! Form::file('documentos', ['class'=>'form-control fileupload', 'multiple'=>'multiple', 'data-url'=> route('uploadsEnProductos') , 'data-tipo'=>'documentos' ]) !!}
		</span>
	</div>
</div> 

 <div class="form-group">
	{!! Form::label('links', __('productos.links') , ['class' =>'control-label col-md-3']) !!}
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-6">
				{!! Form::text('link_text',isset($producto->links) ? $producto->links['link_text']: null, ['class' =>'form-control','placeholder'=> 'Ingrese el Texto del Link']) !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('link', isset($producto->links) ? $producto->links['link']: null, ['class' =>'form-control','placeholder'=> 'Ingrese el Link']) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::fl_text('videos', __('productos.videos'), null, ['class'=>'control-label col-lg-3'], ['class'=>'form-control','placeholder'=> 'Ingrese el link del video'], $errors) !!} --}}
<variantes inline-template>
	<div class="form-group">
		<label class="col-lg-3">Variantes</label>
		<div class="col-lg-9">
	  		<multiselect v-model="value" name="variantes" :options="options" :multiple="true" group-values="valores" group-label="variante" :group-select="true" placeholder="Busque una Variante" track-by="nombre" label="nombre"><span slot="noResult">No encotramos lo que buscas, cambiá la consulta.</span></multiselect>
	  	</div>
	</div>
</variantes>
{!! Form::fl_labelCheck('publicado', __("productos.publicar_producto"), true ,['class'=>'btn btn-primary active']) !!}
<div class="form-group">
	<div class="col-lg-offset-3 col-lg-9">
		{!! Form::submit($submitButton, ['class'=>'btn btn-success']) !!}
		<a class="btn btn-default" type="button" href="{{ URL::previous() }}">{{ __('productos.volver') }}</a>
	</div>
</div>
