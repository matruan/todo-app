@extends('layouts.app')
@section('content')
  <h1>Lista de Tareas</h1>
  @foreach($tasks as $task)
  <div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
    <div class="card-body">
        <p>
        {{ $task->description }}
        @if($task->isCompleted())
          <span 
             style="
               font-size: 12px;
               font-weight: bold;
               background-color: #7FFFD4;
               padding: 2px;
               border-radius: 10px;">completado</span>
        @endif
        </p>
        @if(!$task->isCompleted())
        <form action="/tasks/{{ $task->id }}" method="POST">
          @method('PATCH')
          @csrf
            <button class="btn btn-light btn-block" input="submit">Completar</button>
        </form>
        @else
        <form action="/tasks/{{ $task->id }}" method="POST">
            @method('DELETE')
            @csrf
            
              <button input="submit" class="btn btn-light">
                <i class="fa-solid fa-trash-can"></i>  
              </button>
          </form>
        @endif
    </div>
  </div>
  @endforeach

  <a href="/tasks/create"  class="btn btn-primary btn-lg btn-block">Nueva tarea</a>
@endsection