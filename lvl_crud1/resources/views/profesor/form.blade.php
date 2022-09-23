@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
          @if (isset($profesor))
          <h1>Editar profesor</h1>
         @else
            <h1>Crear Profesor</h1>
        @endif
        @if (isset($profesor))
        <form action="{{ route('profesor.update', $profesor) }}" method="POST" >
            @method('PUT')

           @else
            <form action="{{ route('profesor.store') }}" method="POST" >
            @endif
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre Del Profesor" value="{{ old('name') ?? @$profesor->name}}">
                    <p class="form-text">Escriba el Nombre del Profesor</p>
                    @error('name')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                
                </div>
                <div>
                    <label for="materia" class="form-label">Materia</label>
                    <input type="text" name="materia" class="form-control" placeholder="Materia del Profesor" value="{{ old('materia') ?? @$profesor->materia}}">
                    <p class="form-text">Escriba La Materia</p>
                    @error('materia')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                @if (isset($profesor))
                <button type="submit">Editar Profesor</button>
                @else
                <button type="submit">Guardar Profesor</button>
                @endif
          </form>

        </form>
        
        </div>

@endsection