<table class="table table-responsive" id="branches-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Abreviatura</th>
            <th>Usuario</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($branches as $branch)
        <tr>
            <td>{!! $branch->Name !!}</td>
            <td>{!! $branch->City !!}</td>
            <td>{!! $branch->Abv !!}</td>
            <!--Se muestra el usuario en vez del id-->
            <td>{!! $branch->Usuario !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('branches.show', [$branch->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('branches.edit', [$branch->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarSucursal" data-id="{{ $branch->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>