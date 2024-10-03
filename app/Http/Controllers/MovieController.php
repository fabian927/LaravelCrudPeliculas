<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class MovieController extends Controller
{
    public function index(){
        $peliculas = Movie::paginate(6);
        return view('movies.proximosEstrenos')->with('peliculas',$peliculas);
    }
    public function show($id)
    {
        $detalle = Movie::find($id);

        return view('movies.detallePelicula')->with('detalle',$detalle);        
    }

    public function create()
    {
        $this->authorize('create', Movie::class);

        $generos = Genre::all();

        return view('movies.incluirPelicula')->with('generos',$generos);
    }

    public function save(Request $request){
        $reglas =[
            'title' => 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'length' => 'required|numeric',
            'genre_id' => 'required',
            'release_date' => 'date'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio',
            //'unique' => 'El campo :attribute ya existe',
            'numeric' => 'El campo :attribute debe ser numérico',
            'date' => 'El campo :attribute debe ser una fecha válida'
        ];

        $this->validate($request,$reglas,$mensajes);

        $nuevaPelicula = new Movie($request->all());
        $nuevaPelicula->save();
        return redirect('proximosEstrenos');
    }

    public function search(Request $request)
    {
            
        $input = $request->input('busqueda');
        
        $peliculas = Movie::where('title','LIKE','%'.$input.'%')->paginate(20);
        return view('movies.proximosEstrenos')->with('peliculas',$peliculas);
        
    }


    public function edit($id)
    {
        
        $generos = Genre::all();

        $pelicula = Movie::find($id);

        $idGenero = $pelicula->genre_id;
        $nombreGenero = Genre::find($idGenero);
        //dd($idGenero);
        //dd($nombreGenero);
        // dd($pelicula->genres);

        // return view('movies.editarPelicula')->with('pelicula', $pelicula)->with('genero', $genero)->with('generos', $generos);
        return view('movies.editarPelicula')
            ->with('pelicula', $pelicula)
            // ->with('idGenero', $idGenero)
            // ->with('nombreGenero',$nombreGenero)
            ->with('generos', $generos);

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $reglas =[
            'title' => 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'length' => 'required|numeric',
            'genre_id' => 'required',
            'release_date' => 'date'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio',
            //'unique' => 'El campo :attribute ya existe',
            'numeric' => 'El campo :attribute debe ser numérico',
            'date' => 'El campo :attribute debe ser una fecha válida'
        ];

        // $this->validate($request,$reglas,$mensajes);
        
        $pelicula = Movie::find($id);
        $changes = array_diff($request->all(), $pelicula->toArray());

        $pelicula->update($changes);
        

        //  $pelicula->title = $request->input('title') !== $pelicula->title ? $request->input('title') : $pelicula->title;
         // El titulo va a ser igual a lo que salga de este if ternario.
        //  $pelicula->rating = $request->input('rating') !== $pelicula->rating ? $request->input('rating') : $pelicula->rating;
        //  $pelicula->awards = $request->input('awards') !== $pelicula->awards ? $request->input('awards') : $pelicula->awards;
        //  $pelicula->length = $request->input('length') !== $pelicula->length ? $request->input('length') : $pelicula->length;
        //  $pelicula->release_date = $request->input('release_date') !== $pelicula->release_date ? $request->input('release_date') : $pelicula->release_date;
        //  $pelicula->genre_id = $request->input('genre_id') !== $pelicula->genre_id ? $request->input('genre_id') : $pelicula->genre_id;
        //  $pelicula->save();

         return redirect('proximosEstrenos');
    }

        public function destroy($id){
            $peliculaBorrar = Movie::find($id);
            //dd($peliculaBorrar);
            $peliculaBorrar->delete();
            return redirect('proximosEstrenos');
        }
}
