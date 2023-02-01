<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return \response($libros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'anio' => 'required',
            'pais' => 'required',
            'idioma' => 'required',
        ]);

        Libro::create($request->all());
        return \response("Libro " . $request->nombre . " guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return \response($libro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Libro::findOrFail($id)->update($request->all());
        $nombreLibro = Libro::findOrFail($id)->nombre;
        return \response("Libro " . $nombreLibro . " actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nombreLibro = Libro::findOrFail($id)->nombre;
        Libro::destroy($id);
        return \response("Libro " . $nombreLibro . " eliminado");
    }

    public function autor(Autor $autor)
    {
        $libros = Libro::where('autor_id', $autor->id);
        return \response($libros);
    }
}
