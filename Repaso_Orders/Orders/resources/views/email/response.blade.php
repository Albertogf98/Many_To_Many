@extends('layouts.master')
@section('content')
{{ __('Mensaje de notificación, tu correo se ha enviado correctamente.')  }}<br>
    {{ __('Mensaje enviado por el usuario ') . auth()->user()->email  }}<br>
    {{ __('Cuerpo del mensaje:') }}<br>
    {{ $messege  }}
@endsection
