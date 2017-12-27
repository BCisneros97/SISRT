@extends('layouts.master')

@section('contenido')
    <div class="col-sm-8 blog-main">
        <h2>Resultado de la consulta</h2>
        <hr>
        <ul>
            @foreach ($res as $key => $value)
                <li>
                    {{ $key }}: {{ $value }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection