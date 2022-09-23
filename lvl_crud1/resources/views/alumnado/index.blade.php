@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
             <h1>Listado De Estudiantes</h1>
             <a href="{{ route('alumnado.create') }}" class="btn btn-primary">CREAR ESTUDIANTE</a>

            @if(Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
             </div>
             @endif

             <table class="table">

              <thead>
                <th>Nombre y Apellido</th>
                
                <th>carrera</th>
                <th>Acciones</th>
              </thead>
       
              <tbody>

                @forelse ($alumnados as $detail)
                <tr>
                    <td>{{$detail->name}}</td>
                    <td>{{$detail->carrera}}</td>
                    <td>
                        <a href="{{ route('alumnado.edit', $detail)}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('alumnado.destroy', $detail)}}" method="POST" class="d-inline">
                           @method('DELETE') 
                           @csrf
                           <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Estas seguro que deseas eliminar el Estudiante?')">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="3"> No hay Registros</td>
                </tr>    

                @endforelse
             </tbody>
            </table>
            @if ($alumnados->count())
                {{$alumnados->links()}};
            @endif
        </div>
       
@endsection