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
    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit cum minima, explicabo similique earum eveniet molestias optio quibusdam quisquam architecto beatae nisi sequi debitis harum! Quod magnam provident dolore corrupti.</h1>

    <div class="container-fluid ">  
        <div class="table-responsive card">         
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th class="center">#</th>
              <th class="center">Jugador</th>
              <th class="center">Goles</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($goles as $gol)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                      <td class="center"> {{$gol->jugador->nombre}}</td>
                      <td class="center"> {{$gol->goles}}</td>
                </tr>    
                  @endforeach
          </tbody>
        </table>
      </div>
      </div>
  </div>  
    {{-- <button class="boton btn-lg"><span>ver mas partidos</span></button>
    <button class="boton"><span> equipos</span></button> --}}
  </div>
</body>
</html>