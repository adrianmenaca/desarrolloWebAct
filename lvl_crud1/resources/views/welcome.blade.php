@extends('theme.base')
@section('content')
        <div class="container py-5 text-center">
             <h1>UNIVERSIDAD DE LA COSTA</h1>
             <a href="{{ route('profesor.index') }}" class="btn btn-primary">PROFESOR</a>
             <a href="{{ route('alumnado.index') }}" class="btn btn-primary">ESTUDIANTE</a>
             <a href="{{ route('clase.index') }}" class="btn btn-primary">CURSO</a>


             
            
           

        <div>

@endsection
