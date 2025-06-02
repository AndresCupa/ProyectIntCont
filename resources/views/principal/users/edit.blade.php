@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Actualizar usuarios

                    @can('principal.users.index')
                        <a href="{{ route('principal.users.index') }}" class="btn btn-sm btn-outline-primary float-right" style="margin-left: 20px !important;">
                            Regresar
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    
                    {{ Form::model($user, ['route' => ['principal.users.update', $user->id], 'method' => 'PUT']) }}
                        @csrf
                        @include('principal.users.partials.forme')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection