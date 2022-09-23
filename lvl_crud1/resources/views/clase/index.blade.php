@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
             <h1>Listado Del Curso</h1>
             <a href="{{ route('clase.create') }}" class="btn btn-primary">CREAR CURSO</a>

            @if(Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
             </div>
             @endif

             <table class="table">

              <thead>
                <th>Nombre Docente</th>
                <th>Nombre Estudiante</th>  
                <th>Asignatura</th>
                <th>Acciones</th>
              </thead>
       
              <tbody>

                @forelse ($clases as $detail)
                <tr>
                    <td>{{$detail->docente}}</td>
                    <td>{{$detail->estudiante}}</td>
                    <td>{{$detail->asignatura}}</td>
                    <td>
                        <a href="{{ route('clase.edit', $detail)}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clase.destroy', $detail)}}" method="POST" class="d-inline">
                           @method('DELETE') 
                           @csrf
                           <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Estas seguro que deseas eliminar el Curso?')">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="3"> No hay Registros</td>
                </tr>    

                @endforelse
             </tbody>
            </table>
            @if ($clases->count())
                {{$clases->links()}};
            @endif
        </div>
       
@endsection
