<table class="table table-responsive" id="transferD-table">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Traslado</th>
            <th>Caja</th>
            <th>Producto</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transferDs as $transferD)
        <tr>
            <td>{!! $transferD->Cantidad !!}</td>
            <td>{!! $transferD->Estado !!}</td>
            <td>{!! $transferD->DescripcionTM !!}</td>
            <td>{!! $transferD->DescripcionCaja !!}</td>
            <td>{!! $transferD->Producto !!}</td>
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