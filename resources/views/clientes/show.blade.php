@extends('layouts.master')

@section('titulo')
    Modificar cliente
@endsection

@section('contenido')
    <div class="col-sm-8">
        <h2>Cliente {{ $cliente->ruc }}</h2>
        <hr>
        <form action="/clientes/{{ $cliente->ruc }}" method="post">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="ruc">RUC:</label>
                <input type="text" class="form-control" id="ruc" readonly maxlength="11" value="{{ $cliente->ruc }}">
            </div>

            <div class="form-group">
                <label for="razon_social">Razón social:</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ $cliente->razon_social }}" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
@endsection

@section('footer')
    <script>
        var link = document.getElementById('nav_clientes');
        link.setAttribute('class', 'nav-link active');
    </script>
@endsection
