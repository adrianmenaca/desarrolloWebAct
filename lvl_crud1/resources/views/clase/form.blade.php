@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
          @if (isset($clase))
          <h1>Editar Curso</h1>
         @else
            <h1>Crear curso</h1>
        @endif
        @if (isset($clase))
        <form action="{{ route('clase.update', $clase) }}" method="POST" >
            @method('PUT')

           @else
            <form action="{{ route('clase.store') }}" method="POST" >
            @endif
                @csrf
                <div class="mb-3">
                    <label for="docente" class="form-label">Nombre Docente</label>
                    <input type="text" name="docente" class="form-control" placeholder="Nombre Del Docente" value="{{ old('docente') ?? @$clase->docente}}">
                    <p class="form-text">Escriba el Nombre del Docente</p>
                    @error('docente')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                
                </div>
                <div class="mb-3">
                    <label for="estudiante" class="form-label">Nombre Estudiante</label>
                    <input type="text" name="estudiante" class="form-control" placeholder="Nombre Del Estudiante" value="{{ old('estudiante') ?? @$clase->estudiante}}">
                    <p class="form-text">Escriba el Nombre del Estudiante</p>
                    @error('estudiante')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                
                </div>
                <div>
                    <label for="asignatura" class="form-label">asignatura</label>
                    <input type="text" name="asignatura" class="form-control" placeholder="asignatura" value="{{ old('asignatura') ?? @$clase->asignatura}}">
                    <p class="form-text">Escriba La asignatura</p>
                    @error('asignatura')
                    <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                @if (isset($clase))
                <button type="submit">Editar Curso</button>
                @else
                <button type="submit">Guardar Curso</button>
                @endif
          </form>

        </form>
        
        </div>

@endsection