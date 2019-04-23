<table class="table table-responsive" id="boxes-table">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($boxes as $box)
        <tr>
            <td>{!! $box->Quantity !!}</td>
            <td>{!! $box->Description !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('boxes.show', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('boxes.edit', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarCaja" data-id="{{ $box->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>