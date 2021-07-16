<div class="subscribe-line subscribe-line-image" style="background-image: url('/images/planetario.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="text-center">
                    <h3 class="title">{{ $campos['titulo']}}</h3>
                    <p class="description">
                        {{ $campos['texto']}}
                    </p>
                </div>
                <div class="card card-raised card-form-horizontal">
                    <div class="card-body ">
                        <form method="POST" action="{{ route('newsletters.suscribir') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-6 ">
                                    <div class="form-group {{ $errors->has('email') ? 'has-danger is-focused' : ''}}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">mail</i>
                                                </span>
                                            </div>
                                            <input type="email" placeholder="{{ $campos['placeholder']}}" class="form-control" aria-label="{{ $campos['placeholder']}}" {{ ($errors->has('email')) ? 'autofocus' : ''}} name="email" required>
                                        </div>
                                        @if($errors->has('email'))
                                        <span class="bmd-help">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 ">
                                    <button type="submit" class="btn btn-primary btn-block">{{ $campos['texto_boton']}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
