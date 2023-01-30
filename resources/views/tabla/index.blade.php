@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Tabla de posiciones por grupo</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @foreach ($grupos as $grupo)
        <a href="/grupos/{{$grupo->id}}/equipos" class="btn btn-outline-info btn-lg">{{$grupo->nombre}}</a>
            @endforeach 
        {{-- <div class="container">
            @foreach ($grupos as $grupo)
            <a href="/grupos/{{$grupo->id}}/equipos" class="btn btn-info">{{$grupo->nombre}}</a>
                @endforeach 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table-responsive table">
                        <tr>
                            <th>No</th>
                            <th></th>
                            <th>equipo</th>
                            <th>pj</th>
                            <th>pg</th>
                            <th>pe</th>
                            <th>pp</th>
                            <th>gf</th>
                            <th>gc</th>
                            <th>df</th>
                            <th>puntos</th>
                        </tr>
                        @php
                        $row =1; 
                        @endphp
                        @forelse($equipos as $equipo)
                            @php
                             if ($row<=3){
                             $e = 'class=table-primary';
                             }
                            elseif ($row<=6) {
                                $e = 'class=table-info';
                            }
                            elseif ($row>=18) {
                                $e = 'class=table-danger';
                            }
                             else  {
                               $e = "";
                            }  
                            @endphp                    
                        <tr {{$e}}>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="imagenes/{{$equipo->imagen}}" width="5%" class="logo">
                              </td>
                            <td>{{ $equipo->nombre }}</td>
                            <td>{{ $equipo->pj }}</td>
                            <td>{{ $equipo->pg }}</td>
                            <td>{{ $equipo->pp }}</td>
                            <td>{{ $equipo->pe }}</td>
                            <td>{{ $equipo->gf }}</td>
                            <td>{{ $equipo->gc }}</td>
                            <td>{{ $equipo->gd }}</td>    
                            <td>{{ $equipo->puntos }}</td>
                            @php
                            $row ++;
                            @endphp
                        </tr>
                       
                    @empty
                        <tr>
                            <td colspan="6">sin equipos</td>
                        </tr>
                        
                    @endforelse
                   
                    </table> 
    
                </div>
            </div>
        </div> --}}

    </div>

</div>
@stop

@section('css')
    
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop