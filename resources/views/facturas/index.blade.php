@extends('layouts.index')

@section('titulo')
    Facturas de servicio
@endsection

@section('href_nuevo')
    "/servicios"
@endsection

@section('cabeceras')
    <th scope="col">#</th>
    <th scope="col">Fecha</th>
    <th scope="col">Anulado</th>
    <th scope="col">Total</th>
@endsection

@section('cuerpo')
    @foreach ($facturas as $factura)
        <tr>
            <th scope="row">{{ $factura->id }}</th>
            <td>{{ $factura->fecha }}</td>
            <td>{{ $factura->anulado ? 'Si' : 'No' }}</td>
            <td>{{ $factura->total() }}</td>
            <td>
                @include('layouts.dropdown')
                    <a href="/facturas/{{$factura->id}}" class="dropdown-item">
                        Mostrar
                    </a>
                    <a href="/facturas/{{$factura->id}}/anular" class="dropdown-item">
                        Anular
                    </a>
                    <a href="/facturas/{{$factura->id}}/eliminar" class="dropdown-item">
                        Eliminar
                    </a>
                </div></div>
            </td>
        </tr>
    @endforeach
@endsection

@section('footer')
    <script>
        var link = document.getElementById('nav_facturas');
        link.setAttribute('class', 'nav-link active');
    </script>
@endsection
