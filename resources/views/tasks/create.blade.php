@extends('layouts.app')
@section('content')
  <h1>Nueva tarea</h1>
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif
    
  <form method="POST" action="/tasks">
    <div class="form-group">
      @csrf
      <label for="description">Descripción de la tarea</label>
        <input style="margin-bottom: 20px;" class="form-control" name="description" />
      </div>
    
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Crear tarea</button>
      </div>
  </form>
@endsection