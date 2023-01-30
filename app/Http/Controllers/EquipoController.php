<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class EquipoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $grupos = Grupo::all();
        $equipos = Equipo::orderby('id','desc')->paginate(5);
        return view('equipos.index',compact('equipos','grupos'));
    }
    //     public function index(Grupo $grupo){
    //     $grupos = Grupo::all();
    //     $equipos = $grupo->equipos;
    //     return view('equipos.index',compact('equipos','grupos'));
    // }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('equipos.create',compact('grupos'));
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
            'grupo_id' => 'required','nombre' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

    //     $imagenes = $request->file('imagen')->store('public/imagenes');
    
    //     $url = Storage::url($imagenes);
      
    //     $equipo =  new Equipo;
    //     $equipo -> grupo_id = $request->get('grupo_id');
    //     $equipo -> nombre = $request->get('nombre');
      
    //    $equipo ->save();
    //     Equipo::create(
    //         ['url'=> $url]
    //     );

    //     return redirect('equipos');

    $equipo = $request->all();
    
         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = 'imagenes/';
             $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenProducto);
             $equipo['imagen'] = "$imagenProducto";             
         }
         
         Equipo::create($equipo);
        
      
         return redirect('equipos');
        // $equipo =  new Equipo;
        // $equipo -> grupo_id = $request->get('grupo_id');
        // $equipo -> nombre = $request->get('nombre');
        // $equipo -> imagen = $request->get('imagen');
        // $equipo ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $grupos = Grupo::all();
        return view('equipos.edit',compact('equipo','grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required', 'descripcion' => 'required'
        ]);
         $prod = $request->all();
         if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['imagen'] = "$imagenProducto";
         }else{
            unset($prod['imagen']);
         }
         $equipo->update($prod);
         return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('equipos');
    }

    
}
