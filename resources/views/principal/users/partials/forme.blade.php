<div class="row">
    <div class="form-group">
        {{ Form::label('name','Usuario') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email','Correo') }}
        {{ Form::text('email',null,['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password','Contraseña') }}
        {{ Form::input('password','password',null,['class'=>'form-control']) }}
    </div>
</div>

<div class="row" style="margin-top:20px;">
    <h3>Listado de roles</h3>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach($roles as $role)
            <li>
                <label>
                    {{ Form::checkbox('roles[]', $role->id, null) }}
                    {{ $role->name }}
                    <em>( {{ $role->description ?: 'Sin descripción' }} )</em>
                </label>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="form-group" style="margin-top:20px;">
    <button type="submit" class="btn btn-sm btn-primary"> Guardar </button>
</div>