@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
             <h1>Listado De Profesores</h1>
             <a href="{{ route('profesor.create') }}" class="btn btn-primary">CREAR PROFESOR</a>

            @if(Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
             </div>
             @endif

             <table class="table">

              <thead>
                <th>Nombre y Apellido</th>
                
                <th>Materia</th>
                <th>Acciones</th>
              </thead>
       
              <tbody>

                @forelse ($profesors as $detail)
                <tr>
                    <td>{{$detail->name}}</td>
                    <td>{{$detail->materia}}</td>
                    <td>
                        <a href="{{ route('profesor.edit', $detail)}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('profesor.destroy', $detail)}}" method="POST" class="d-inline">
                           @method('DELETE') 
                           @csrf
                           <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Estas seguro que deseas eliminar el profesor?')">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="3"> No hay Registros</td>
                </tr>    

                @endforelse
             </tbody>
            </table>
            @if ($profesors->count())
                {{$profesors->links()}};
            @endif
        </div>
       
@endsection
