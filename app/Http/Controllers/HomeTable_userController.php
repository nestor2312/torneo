<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeTable_userController extends Controller
{
    public function index(Grupo $grupo){
        $grupos = Grupo::all();
        $equipos = DB::select('SELECT e.`nombre`, e.`imagen`,
        SUM(CASE WHEN u.GF > u.GA THEN 3 ELSE 0 END + CASE WHEN u.GF = u.GA THEN 1 ELSE 0 END) puntos,
        COUNT(CASE WHEN u.GF > u.GA THEN 1 END) pg,
        COUNT(CASE WHEN u.GF < u.GA THEN 1 END) pp,
        COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pe,
        COUNT(CASE WHEN u.GF > u.GA THEN 1 END) + COUNT(CASE WHEN u.GF < u.GA THEN 1 END) +  COUNT(CASE WHEN u.GF = u.GA THEN 1 END) pj,
        SUM(u.GF) AS "gf",
        SUM(u.GA) AS "gc",
        SUM(u.GF - u.GA) AS "gd"
    FROM (
        SELECT p.equipoA_id as team_id, p.marcador1 as GF, p.marcador2 as GA FROM partidos p
        UNION ALL
        SELECT p.equipoB_id as team_id, p.marcador2 as GF, p.marcador1 as GA FROM partidos p
    ) u 
    INNER JOIN equipos e 
        ON u.team_id = e.id where grupo_id = :id
    GROUP BY e.id order by puntos desc', ['id' => $grupo->id]);
    

// return   $equipos;
        return view('user.table',compact('equipos','grupos'));
    }
}
