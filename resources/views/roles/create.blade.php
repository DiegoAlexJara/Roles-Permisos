@extends('components.app-layouts')
@section('title')
    CREAR ROLES
@endsection
@section('component')

    <form action="{{route('Roles.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ROL</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
        </div>
        <div class="form-group mb-3">
            <label for="permissions">ASIGNAR PERMISOS</label>
            <select name="permissions[]" id="permissions" class="form-control" multiple>
                @foreach($permisos as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">CREAR ROL</button>
        </div>
    </form>
@endsection
