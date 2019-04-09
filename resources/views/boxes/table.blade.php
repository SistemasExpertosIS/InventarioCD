<table class="table table-responsive" id="boxes-table">
    <thead>
        <tr>
            <th>Quantity</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($boxes as $box)
        <tr>
            <td>{!! $box->Quantity !!}</td>
            <td>{!! $box->Description !!}</td>
            <td>
                {!! Form::open(['route' => ['boxes.destroy', $box->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('boxes.show', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('boxes.edit', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>