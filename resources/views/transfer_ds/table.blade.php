<table class="table table-responsive" id="transferDs-table">
    <thead>
        <tr>
            <th>Quantity</th>
        <th>State</th>
        <th>Idtransferm</th>
        <th>Idbox</th>
        <th>Idproduct</th>
            <th colspan="3">Action</th>
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
                {!! Form::open(['route' => ['transferDs.destroy', $transferD->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transferDs.show', [$transferD->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transferDs.edit', [$transferD->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>