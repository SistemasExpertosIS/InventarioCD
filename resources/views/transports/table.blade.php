<table class="table table-responsive" id="transports-table">
    <thead>
        <tr>
            <th>Plate</th>
        <th>Drivername</th>
        <th>Driveridentity</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transports as $transport)
        <tr>
            <td>{!! $transport->Plate !!}</td>
            <td>{!! $transport->Drivername !!}</td>
            <td>{!! $transport->DriverIdentity !!}</td>
            <td>
                {!! Form::open(['route' => ['transports.destroy', $transport->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transports.show', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transports.edit', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>