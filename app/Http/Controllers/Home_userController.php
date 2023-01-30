<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use App\Models\Partido;
use Illuminate\Http\Request;
use App\Models\Eliminatoria;
class Home_userController extends Controller
{
    public function index()

    {
        $eliminatorias = Eliminatoria::all();
        $partidos = Partido::orderby('id','desc')->paginate(4);
        $grupos = Grupo::all();
        $equipos = Equipo::orderby('id','desc')->paginate(4);
        return view('user.index',compact('grupos','partidos','equipos','eliminatorias'));

    }
}
