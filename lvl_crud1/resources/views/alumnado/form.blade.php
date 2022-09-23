@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
          @if (isset($alumnado))
          <h1>Editar Estudiante</h1>
         @else
            <h1>Crear Estudiante</h1>
        @endif
        @if (isset($alumnado))
        <form action="{{ route('alumnado.update', $alumnado) }}" method="POST" >
            @method('PUT')

           @else
            <form action="{{ route('alumnado.store') }}" method="POST" >
            @endif
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre Del alumnado" value="{{ old('name') ?? @$alumnado->name}}">
                    <p class="form-text">Escriba el Nombre del Estudiante</p>
                    @error('name')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                
                </div>
                <div>
                    <label for="carrera" class="form-label">Carrera</label>
                    <input type="text" name="carrera" class="form-control" placeholder="carrera del alumnado" value="{{ old('carrera') ?? @$alumnado->carrera}}">
                    <p class="form-text">Escriba La Carrera</p>
                    @error('carrera')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                @if (isset($alumnado))
                <button type="submit">Editar Estudiante</button>
                @else
                <button type="submit">Guardar Estudiante</button>
                @endif
          </form>

        </form>
        
        </div>

@endsection