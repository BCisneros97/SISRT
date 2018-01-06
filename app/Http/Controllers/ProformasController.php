<?php

namespace App\Http\Controllers;

use App\Proforma;
use App\Cliente;
use App\Pieza;

class ProformasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proformas = Proforma::all();

        return view('proformas.index', compact('proformas'));
    }

    public function create()
    {
        $codigo_gen = Proforma::selectRaw("concat(repeat('0',7-length(max(substr(codigo, 1, 7))+1)),max(substr(codigo, 1, 7))+1,'-',2018) cod_gen")
                                ->whereRaw('year(fecha) = 2018')
                                ->first()
                                ->cod_gen;
        $codigo_gen = $codigo_gen ? $codigo_gen : '0000001-2018';

        return view('proformas.create', compact('codigo_gen'));
    }

    public function show(Proforma $proforma)
    {
        return view('proformas.show', compact('proforma'));
    }

    public function store()
    {
        $this->validate(request(), [
            'codigo' => 'required',
            'fecha' => 'required|date',
            'mano_de_obra' => 'required',
        ]);
        // dd(request()->all());

        // Cliente ya existe
        if ($cliente = Cliente::find(request('ruc_c'))) {
            $cliente->razon_social = request('razon_social');
            $cliente->direccion = request('direccion');
            $cliente->save();
        }
        else {
            Cliente::create([
                'ruc' => request('ruc_c'),
                'razon_social' => request('razon_social'),
                'direccion' => request('direccion')
            ]);
        }

        $proforma = Proforma::create([
            'codigo' => request('codigo'),
            'fecha' => request('fecha'),
            'mano_de_obra' => request('mano_de_obra'),
            'precio_mano_obra' => request('precio_mano_obra'),
            'tipo' => request('tipo'),
            'ruc_c' => request('ruc_c'),
            'dni_u' => auth()->user()->dni
        ]);

        foreach (request('nombre_pieza') as $i => $nombre) {
            if (! $pieza = Pieza::where('nombre', '=', $nombre)->first()) {
                $pieza = Pieza::create(['nombre' => $nombre]);
            }

            $proforma->piezas()->attach($pieza->id, [
                'cantidad' => request('cantidad')[$i],
                'precio' => request('precio')[$i]
            ]);

        }
        // dd($proforma);
        return redirect('/proformas');
    }

    public function destroy(Proforma $proforma)
    {
        $proforma->eliminado = true;
        $proforma->save();

        return redirect()->back();
    }
}
