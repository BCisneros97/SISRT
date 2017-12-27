@extends('layouts.master')

@section('contenido')
    <div class="col-sm-8 blog-main">
        <h2>Registrar proveedor</h2>
        <hr>

        <form method="POST" action="/proveedores">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="ruc">RUC:</label>
                <input type="text" class="form-control" id="ruc" name="ruc" required maxlength="11">
            </div>

            <div class="form-group">
                <label for="razon_social">Razón social:</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono">
            </div>

            <div class="form-group">
                <label for="numero_cuenta">Número de cuenta:</label>
                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta">
            </div>

            <div class="form-group">
                <label for="rubro">Rubro:</label>
                <input type="text" class="form-control" id="rubro" name="rubro">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
@endsection
