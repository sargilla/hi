@component('mail::message')
# Mensaje enviado a {{ config('app.name')}}

Los datos son los siguientes:<br>
- **Nombre:** {{$mensaje->nombre}}
- **Email:** {{$mensaje->email}}
@if ($mensaje->asunto)
- **Asunto:** {{$mensaje->asunto}}
@endif
@if ($mensaje->telefono)
- **Telefono:** {{$mensaje->telefono}}
@endif
@if ($mensaje->empresa)
- **Empresa:** {{$mensaje->empresa}}
@endif
@if ($mensaje->puesto)
- **Puesto:** {{$mensaje->puesto}}
@endif
@if ($mensaje->localidad)
- **Localidad:** {{$mensaje->localidad}}
@endif
@if ($mensaje->provincia)
- **Provincia:** {{$mensaje->provincia}}
@endif
@if ($mensaje->pais)
- **Pais:** {{$mensaje->pais}}
@endif

## Mensaje
{{$mensaje->mensaje}}


@if ($mensaje->archivo)
Este mensaje fue enviado con un archivo, puede descargarlo desde el siguiente link:
@component('mail::button', ['url' => secure_asset('storage/uploads/'. $mensaje->archivo)])
Ver el archivo
@endcomponent
@endif

Saludos ,<br>
{{ config('app.name') }}
@endcomponent
