@extends('layout.uno')
@section('titulo')
Editar article
@endsection
@section('cabecera')
Editando article:{{$articles->id}}
@endsection
@section('contenido')
<form name="as" action="{{route('articles.update',$articles)}}" method="POST">
    @csrf
    @method("PUT")
<div class="w-3/4 mx-auto bg-gray-400 rounded py-4 px-2">
    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
    <input type="text" value="{{$articles->nombre}}" name="nombre" id="nombre" class="py-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Nombre" required>
    @error('nombre')
    <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
    @enderror
    
</div>

<div class="mt-2">
    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
    <textarea name="descripcion" class="py-1 focus:ring-indigo-500 focus:border-indigo-500
     block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">{{$articles->descripcion}}</textarea>
    @error('descripcion')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
</div>
<div class="mt-2">
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Editar</button>
<button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" onclick="history.back(-1)"><i class="fas fa-backward"></i> Volver</button>

</div>
</div>
</form>
@endsection