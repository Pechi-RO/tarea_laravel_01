@extends('layout.uno')
@section('titulo')
Crear articles
@endsection
@section('cabecera')
Nuevo articles
@endsection
@section('contenido')
<div class="bg-gray-300 rounded py-4 px-2">
    <form action="{{route('articles.store')}}" method="POST">
    @csrf
    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre articles</label>
        <input type="text" name="nombre" id="nombre" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="nombre">
        @error('nombre')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">descripcion articles</label>
        <input type="text" name="descripcion" id="descripcion" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="descripcion" required>
        @error('descripcion')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <button type="submit" class="bg-green hover:bg-green-700 text-white font-bold"><i class="fas fa-save"></i></button>
        <a href="{{route('articles.index')}}"><i class="fas fa-backward"></i></a>
    </div>
    </form>

</div>

@endsection