<table class="table table-responsive" id="transferM-table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Movimiento</th>
            <th>Usuario emisor</th>
            <th>Sucursal receptora</th>
            <th>Sucursal emisora</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transferMs as $transferM)
        <tr>
            <td>{!! $transferM->Description !!}</td>
            <td>{!! $transferM->TipoMovimiento !!}</td>
            <td>{!! $transferM->UsuarioEmisor !!}</td>
            <td>{!! $transferM->SucursalReceptora !!}</td>
            <td>{!! $transferM->SucursalEmisora !!}</td>
            <td>{!! $transferM->State !!}</td>
            <td>       
                @if ($transferM->State == "Pendiente" && $transferM->UsuarioEmisor == $usuarioRegistrado->Name)
                    <div class='btn-group'>  
                        <a class="btn btn-primary btn-xs" href="{!! route('transferDs.crear', [$transferM->id]) !!}"><i class="fa fa-plus-square"></i></a>                       
                        <a href="{!! route('transferMs.show', [$transferM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('transferMs.movimiento', [$transferM->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-check-square"></i></a>
                        <a href="{!! route('transferMs.rechazarMovimiento', [$transferM->id]) !!}"class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></a>
                    </div>
                @else
                    <div class='btn-group'>                        
                        <a href="{!! route('transferMs.show', [$transferM->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarTransferM" data-id="{{ $transferM->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                @endif
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>