<table class="table table-responsive" id="transports-table">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Nombre del Conductor</th>
            <th>ID del Conductor</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transports as $transport)
        <tr>
            <td>{!! $transport->Plate !!}</td>
            <td>{!! $transport->Drivername !!}</td>
            <td>{!! $transport->DriverIdentity !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('transports.show', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transports.edit', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarTransporte" data-id="{{ $transport->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>