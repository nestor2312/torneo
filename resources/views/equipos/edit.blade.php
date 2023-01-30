

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 form">
  <p class="col-xs-12 col-sm-12 col-md-12 text-center form-title">equipo</p>
  <form class="form-horizontal" action="/equipos/{{$equipo->id}}" method="POST" >
    @csrf
    @method('PUT')
    <!-- nombre -->
<div class="form-group col-xs-12 col-sm-6 col-md-6 form">
  <label class="control-label col-xs-12 col-sm-4 col-md-4" >grupo:</label>
  <div class="col-xs-12 col-sm-8 col-md-8">
    {{-- <select name="grupo_id" id="" class="form-control ">
      @foreach ($grupos as $grupo)
      <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
      @endforeach
  </select> --}}
  <select name="grupo_id" id="" class="form-control ">
    @foreach ($grupos as $grupo)
    @if($grupo->id == $equipo->grupo_id)
        <option value="{{$grupo->id}}" selected> {{ $grupo->nombre }}</option>
    @else
        <option value="{{$grupo->id}}"> {{ $grupo->nombre }}</option>
    @endif
@endforeach
</select>
  </div>
</div>
<div class="form-group col-xs-12 col-sm-6 col-md-6 form">
  <label class="control-label col-xs-12 col-sm-4 col-md-4" >nombre:</label>
  <div class="col-xs-12 col-sm-8 col-md-8">
    <input type="text" class="form-control"  name="nombre" value="{{$equipo->nombre}}">
  </div>
</div>
</div>
<div class="grid grid-cols-1 mt-5 mx-7">
  <img src="/imagen/{{ $equipo->imagen }}" width="200px" id="imagenSeleccionada">
</div>
{{-- <div class="grid grid-cols-1 mt-5 mx-7">
  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
      <div class='flex items-center justify-center w-full'>
          <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
              <div class='flex flex-col items-center justify-center pt-7'>
              <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
              <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
              </div>
          <input name="imagen" id="imagen" type='file' class="hidden" />
         
          </label>
      </div>
  </div> --}}

<button type="submit" class="btn btn-info">Actualizar</button>
<a href="/equipos" class="btn btn-danger">Cancelar</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@stop