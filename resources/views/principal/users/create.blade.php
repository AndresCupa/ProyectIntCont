@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Regirtrar nuevo usuarios

                    @can('principal.users.index')
                        <a href="{{ route('principal.users.index') }}" class="btn btn-sm btn-outline-primary float-right" style="margin-left: 20px !important;">
                            Regresar
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    
                    {{ Form::open(['route' => 'principal.users.store', 'method' => 'post', 'action' => 'javascript:void(0)','files' => true]) }}
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