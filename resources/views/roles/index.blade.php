@extends('components.app-layouts')
@section('title')
    ROLES
@endsection
@section('component')
    @session('success')
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ROLES</th>
                <th scope="col">PERMISOS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $registros)
                <tr>
                    <th scope="row">{{ $registros->id }}</th>
                    <td>{{ $registros->name }}</td>
                    <td>
                        @foreach ($registros->permissions as $permisos)
                            <li>{{ $permisos->name }}</li>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Modificar</a></li>
                                <li>
                                    <form action="{{ route('Roles.destroy', $registros->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('Roles.create') }}" class="d-grid gap-2">
        <button class="btn btn-primary" type="button">CREAR ROL</button>
    </a>
@endsection
