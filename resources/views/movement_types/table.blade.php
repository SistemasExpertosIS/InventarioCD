<table class="table table-responsive" id="movementTypes-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Abv</th>
        <th>Entry</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($movementTypes as $movementType)
        <tr>
            <td>{!! $movementType->Name !!}</td>
            <td>{!! $movementType->Abv !!}</td>
            <td>{!! $movementType->Entry !!}</td>
            <td>
                {!! Form::open(['route' => ['movementTypes.destroy', $movementType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('movementTypes.show', [$movementType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('movementTypes.edit', [$movementType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>