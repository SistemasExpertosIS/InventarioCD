<table class="table table-responsive" id="movementTypes-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Abreviatura</th>
            <th>Entrada</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($movementTypes as $movementType)
        <tr>
            <td>{!! $movementType->Name !!}</td>
            <td>{!! $movementType->Abv !!}</td>
            <td>{!! $movementType->Entry !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('movementTypes.show', [$movementType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('movementTypes.edit', [$movementType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarTipoMovimiento" data-id="{{ $movementType->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>
        @include('movement_types.confirmdelete')
    @endforeach
    </tbody>
</table>