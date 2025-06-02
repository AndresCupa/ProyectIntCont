<div class="btn-group btn-group-sm">
  <a href="{{ route('principal.users.show', $users->id) }}" class="btn btn-sm btn-secondary">Ver</a>
  <a href="{{ route('principal.users.edit', $users->id) }}" class="btn btn-sm btn-success">Editar</a>

  {{ Form::open(['route'=> ['principal.users.destroy',$users->id], 'method' => 'DELETE'])}}
    <button class="btn btn-sm btn-danger">Elimiar</button>
  {{ Form::close() }}

</div>