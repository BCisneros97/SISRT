<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\ConsultaRUC;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = Proveedor::all();

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function consultar(Proveedor $proveedor)
    {
        $res = ConsultaRUC::consultar($proveedor->ruc);

        return view('proveedores.consultar', compact('res'));
    }

    public function store()
    {
        $this->validate(request(),[
            'ruc' => 'required',
            'razon_social' => 'required'
        ]);

        Proveedor::create(request([
            'ruc',
            'razon_social',
            'direccion',
            'telefono',
            'numero_cuenta',
            'rubro'
        ]));

        return redirect('/proveedores');
    }
}