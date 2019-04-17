<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Correo electrónico</th>
        <th>Estado</th>
        <th>Rol</th>
        <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->Name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->State !!}</td>
            <td>{!! $user->Rol !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <!--<a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>-->
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarUsuario" data-id="{{ $user->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>