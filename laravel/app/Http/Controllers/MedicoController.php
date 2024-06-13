<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->query('search') ?? "";

        $medicos = Medico::where('nome', 'like', '%' . $query . '%')->latest()->Paginate(100);

        return view('medico.index',[
            'medicos' => $medicos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {   
        Medico::create([
            'nome'=>request('nome'),
            'crm'=>request('crm'),
            'numero'=>request('numero')
        ]);

        return redirect('/medico');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('medico.edit',['medico' => $medico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Medico $medico)
    {
        $medico->update([
            'nome'=>request('nome'),
            'crm'=>request('crm'),
            'numero'=>request('numero')
        ]);

        return redirect('/medico');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect('/medico');
    }
}
