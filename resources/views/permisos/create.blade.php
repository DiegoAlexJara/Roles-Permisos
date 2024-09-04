@extends('components.app-layouts')
@section('title')
    CREAR PERMISOS
@endsection
@section('component')

    <form action="{{route('Permisos.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">PERMISOS</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>
        <div class="form-group mb-3">
            <label for="roles">ASIGNAR A ROLES</label>
            <select name="roles[]" id="roles[]" class="form-control" multiple>
                @foreach($roles as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">CREAR PERMISOS</button>
        </div>
    </form>
@endsection
