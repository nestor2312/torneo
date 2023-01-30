<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>inicio</title>
   <link rel="stylesheet" href="/css/estilo.css">
   <link rel="stylesheet" href="/css/uno.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
</head>
<body class="user">
  <ul class="nav nav justify-content-end fondo ">
    <li class="nav-item">
      <a class="nav-link link" href="matches">Partidos</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Tabla de posiciones</a>
      <div class="dropdown-menu">
        @foreach ($grupos as $grupo)
       
        {{-- <a href=" {{ url('/grupos'.'/'.$grupo->id'/'.'equipos') }}" class="dropdown-item link">{{$grupo->nombre}}</a> --}}
        <a href=" {{ url('/group/'.$grupo->id.'/teams') }}" class="dropdown-item link">{{$grupo->nombre}}</a>
            @endforeach 
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link link dropdown-toggle" data-toggle="dropdown" href="#">Estadisticas</a>
      <div class="dropdown-menu">
        <a class="dropdown-item link" href=" {{ url('goleador') }}">Goleadores</a>
        <a class="dropdown-item link" href=" {{ url('asistidor') }}">Asistidores</a>
      </div>
    </li>
  </ul>
  <div class="container">
    {{-- <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit cum minima, explicabo similique earum eveniet molestias optio quibusdam quisquam architecto beatae nisi sequi debitis harum! Quod magnam provident dolore corrupti.</h1> --}}
    
    <div class="row mt-5">
      <div class="col-sm-5">
        <div class="card ">
          <div class="card-header bg-secondary text-white center font-weight-bold">Equipos</div>
          <table class="table">
            <tbody>
              @foreach ($equipos as $equipo)
                    <tr>
                      <td  class="center">
                        <img class=" logo" src="imagenes/{{$equipo->imagen}}">
                      </td>
                        <th class="text-left"> {{$equipo->nombre}}</th>
                  </tr>    
                    @endforeach
            </tbody>
          </table>  
          <button class="botonUno btn-block" ><span><a href="matches" class="matches">ver mas Equipos</a></span></button>   
        </div>
      </div>
      <div class="col-sm-7">
        <div class="card ">
          <div class="card-header bg-secondary text-white center font-weight-bold">Proximos partidos</div>
          <div class="table-responsive card">         
            <table class="table">
              <tbody>
                @foreach ($partidos as $partido)
                <tr>
                  <th class="center"> <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo"></th>
                  <th class="text-left">{{ $partido->equipoA->nombre }}</th>
                    <th class="center" >{{ $partido->marcador1 }}</th>
                    <th class="center" style="width: 5px">-</th>
                    <th class="center" >{{ $partido->marcador2 }}</th>
                    <th class="text-right">{{ $partido->equipoB->nombre }}</th>
                    <th class="center" >
                      <img src=" {{ url('imagenes').'/'.$equipo->imagen}}" width="5%" class="logo"></th> 
                    </tr>
                {{-- @empty
                                <tr>
                                    <td colspan="6">No hay equipos</td>
                                </tr> --}}
                @endforeach
              </tbody>
            </table>
          </div>
         
        
        </div>
        <button class="botonUno btn-block" ><span><a href="matches" class="matches">ver mas partidos</a></span></button>   
      </div>
      <div class="col-sm-12">
        <div class="card mt-2">
          <div class="card-header bg-secondary text-white center font-weight-bold">Fase eliminatoria</div>
          <div class="col-md-12 d-flex justify-content-center table-responsive" >
            <table class="eliminatorias-user">  
            <tr >
            <th class="borde color">CUARTOS</th>
            <th class="borde color">SEMIFINAL</th>
            <th class="borde color">FINAL</th>
            <th class="borde color">CAMPEON</th>
            </tr>
            
            @foreach ($eliminatorias as $eliminatoria)
              
            <tr>
            <td></td>
            </tr>
              <tr>
                  <td class="borde">{{$eliminatoria->a}}</td>
              </tr>      
                <tr>
                    <td class="solido"></td>
                    <td class="borde">{{$eliminatoria->avsb}}</td>
                </tr>
                <tr>
                    <td class="borde">{{$eliminatoria->b}}</td>
                    <td class="solido"></td>
                </tr>
                <tr>
                    <td ></td>
                    <td class="solido"></td>
                    <td class="borde">{{$eliminatoria->abvscd}}</td>
                  </tr>
                <tr>
                  <td class="borde">{{$eliminatoria->c}}</td>
                  <td class="solido"></td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td class="solido"></td>
                  <td class="borde">{{$eliminatoria->cvsd}}</td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td class="borde">{{$eliminatoria->d}}</td>
                  <td></td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td ></td>
                  <td ></td>
                  <td class="solido"></td>
                  <td class="borde">{{$eliminatoria->campeon}}</td>      
              </tr>
              <tr>
                  <td class="borde">{{$eliminatoria->e}}</td>
                  <td></td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td class="solido"></td>
                  <td class="borde">{{$eliminatoria->evsf}}</td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td class="borde">{{$eliminatoria->f}}</td>
                  <td class="solido"></td>
                  <td class="solido"></td>
              </tr>
              <tr>
                  <td></td>
                  <td class="solido"></td>
                  <td class="borde">{{$eliminatoria->efvsgh}}</td>
                </tr>
              <tr>
                <td class="borde">{{$eliminatoria->g}}</td>
                <td class="solido"></td>
            </tr>
            <tr>
                <td class="solido"></td>
                <td class="borde">{{$eliminatoria->gvsh}}</td>
            </tr>
            <tr>
                <td class="borde">{{$eliminatoria->h}}</td>
            </tr>
            @endforeach
        </div>
      </div>
    </div>
  </div>  
   
   
  </div>
</body>
</html>