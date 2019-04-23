<table class="table table-responsive" id="transferM-table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Tipo de movimiento</th>
            <th>Usuario receptor</th>
            <th>Usuario emisor</th>
            <th>Sucursal receptora</th>
            <th>Sucursal emisora</th>
            <th>Transporte</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transferMs as $transferM)
        <tr>
            <td>{!! $transferM->Description !!}</td>
            <td>{!! $transferM->TipoMovimiento !!}</td>
            <td>{!! $transferM->UsuarioReceptor !!}</td>
            <td>{!! $transferM->UsuarioEmisor !!}</td>
            <td>{!! $transferM->SucursalReceptora !!}</td>
            <td>{!! $transferM->SucursalEmisora !!}</td>
            <td>{!! $transferM->Placa !!}</td>
            <td>                
                <div class='btn-group'>
                    <a href="{!! route('transferMs.show', [$transferM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transferMs.edit', [$transferM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarTransferM" data-id="{{ $transferM->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>