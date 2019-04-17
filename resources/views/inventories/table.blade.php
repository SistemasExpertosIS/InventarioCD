<table class="table table-responsive" id="inventories-table">
    <thead>
        <tr>
            <th>Quantity</th>
        <th>Idbranch</th>
        <th>Idproduct</th>
        <th>Idmovementtype</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inventories as $inventory)
        <tr>
            <td>{!! $inventory->Quantity !!}</td>
            <td>{!! $inventory->idBranch !!}</td>
            <td>{!! $inventory->idProduct !!}</td>
            <td>{!! $inventory->idMovementtype !!}</td>
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