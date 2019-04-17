<table class="table table-responsive" id="transferDs-table">
    <thead>
        <tr>
        <th>Cantidad</th>
        <th>Estado</th>
        <th>Traslado</th>
        <th>Caja</th>
        <th>Producto</th>
        <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transferDs as $transferD)
        <tr>
            <td>{!! $transferD->Quantity !!}</td>
            <td>{!! $transferD->State !!}</td>
            <td>{!! $transferD->idTransferM !!}</td>
            <td>{!! $transferD->idBox !!}</td>
            <td>{!! $transferD->idProduct !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('transferDs.show', [$transferD->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transferDs.edit', [$transferD->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarTransferD" data-id="{{ $transferD->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>