@php
 $campos_mayus = [];
  foreach($campos['opcionales'] as $campo)
  {
    $campos_mayus[] = ucfirst($campo);
  }
  $campos['opcionales'] = $campos_mayus;
@endphp
{{-- <section id="content">
    <div class="content-wrap">        
        <div class="container clearfix">            
            <div class="postcontent nobottommargin">
                <div class="form-widget">
                    <h3>Envíenos un mensaje</h3>                       
                    <div class="form-result"></div>
                    <form action="{{ route('mensajes.store')}}" method="POST" class="nobottommargin">
                        <div class="form-process"></div>
                        <div class="col_one_third">
                            <label for="nombre">Nombre Completo <small>*</small></label>
                            <input  type="text" 
                                    name="nombre" 
                                    id="nombre" 
                                    value="{{ old('nombre') }}" 
                                    class="sm-form-control {{ $errors->has('nombre') ? ' error' : ' required' }}" 
                                    placeholder="Ingrese su nombre y apellido" 
                                    {{ $errors->has('nombre') ? 'autofocus' : ''}} />
                            @if ($errors->has('nombre'))
                            <div class="help-block" for="nombre">{{ $errors->first('nombre') }}</div>
                            @endif
                        </div>
                        <div class="col_one_third">
                            <label for="email">Email <small>*</small></label>
                            <input  type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    class="sm-form-control {{ $errors->has('email') ? ' error' : ' required' }}" 
                                    placeholder="Ingrese su email" 
                                    {{ $errors->has('email') ? 'autofocus' : ''}} />
                            @if($errors->has('email'))
                            <div class="help-block" for="email">{{ $errors->first('email') }}</div>
                            @endif
                            <label for="template-contactform-email">e-mail <small>*</small></label>
                                                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                        </div>
                        <div class="col_one_third col_last">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                                class="sm-form-control {{ $errors->has('telefono') ? ' error' : ' required' }}"
                                placeholder="Ingrese su teléfono" {{ $errors->has('telefono') ? 'autofocus' : ''}} />
                            @if ($errors->has('telefono'))
                            <div class="help-block" for="telefono">{{ $errors->first('telefono') }}</div>
                            @endif
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <label for="template-contactform-message">Mensaje <small>*</small></label>
                            <textarea name="mensaje" id="" cols="30" rows="10" class="sm-form-control {{ $errors->has('telefono') ? ' error' : ' required' }}" {{ $errors->has('telefono') ? 'autofocus' : ''}}>{{old('mensaje')}}</textarea>
                            @if ($errors->has('mensaje'))
                            <div class="help-block" for="mensaje">{{ $errors->first('mensaje') }}</div>
                            @endif
                        </div>
                        <div class="col_full">
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                            <div class="help-block" for="mensaje">Debe comprobar que es un humano</div>
                            @endif
                        </div>
                        <div class="col_full">
                            <button type="submit" class="button button-3d nomargin">Enviar Mensaje</button>
                        </div>
                        <input type="hidden" name="prefix" value="template-contactform-">
                    </form>
                </div>
            </div>
            <div class="sidebar col_last nobottommargin">
                <h3>Contáctenos</h3>
                <abbr title="Phone Number"><strong>Teléfono:</strong></abbr> {{ config('general.empresa.telefono') }}<br>
                <abbr title="Email Address"><strong>Email:</strong></abbr> <a href="mailto:{{ config('general.empresa.email')}}"> {{ config('general.empresa.email')}}</a><br>
                <abbr title="Facebook"><strong>Facebook:</strong></abbr> <a href="https://web.facebook.com/{{ config('general.empresa.facebook')}}">{{ config('general.empresa.facebook')}}</a>
            </div>
        </div>
    </div>
</section> --}}

<div class="col-lg-10 mx-auto py-3 bg-dark my-5">
    <div class="alert alert-teal text-center mb-0">
        <h2 class="text-center text-white">Contactanos!</h2>

    </div>
    <div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137"
          width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="p-3">
        <form action="{{ route('mensajes.store')}}" method="POST" class="mx-auto">
            <h3 class="text-center text-white mb-3">
                Complete el formulario!!!
            </h3>
            <div class="row m-0">
                @foreach ($campos["opcionales"] as $campo)

                <!-- Name -->
                @if($campo == "Mensaje")
            <div class="form-group mt-3 col-12 col-md-6 ">
                <textarea rows="5"  class="form-control p-3" name="{{$campo}}"
                placeholder="{{$campo}}">
                    </textarea>
                </div>
                @else
                <div class="form-group mt-3 col-12 col-md-6 ">
                    <input type="text" class="form-control p-3" name="{{$campo}}"
                placeholder="{{$campo}}">
                </div>
                @endif
                <!-- Send button -->

                @endforeach
            </div>
            <div class="col mt-3">
                <button class="btn btn-primary text-white col-12"type="submit">Enviar!</button>
            </div>
            
        </form>
    </div>
    
</div>
