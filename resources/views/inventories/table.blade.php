<table class="table table-responsive" id="inventory-table">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Sucursal</th>
            <th>Producto</th>
            <th>Tipo de movimiento</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inventories as $inventory)
        <tr>
            <td>{!! $inventory->Cantidad !!}</td>
            <td>{!! $inventory->Sucursal !!}</td>
            <td>{!! $inventory->Producto !!}</td>
            <td>{!! $inventory->TipoMovimiento !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('inventories.show', [$inventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inventories.edit', [$inventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarInventario" data-id="{{ $inventory->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>