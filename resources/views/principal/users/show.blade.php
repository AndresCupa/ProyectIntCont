@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Ver Usuarios

                    @can('principal.users.index')
                        <a href="{{ route('principal.users.index') }}" class="btn btn-sm btn-outline-primary float-right" style="margin-left: 20px !important;">
                            Regresar
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $user->name }}</p>
                    <p><strong>Correo Electronico</strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
