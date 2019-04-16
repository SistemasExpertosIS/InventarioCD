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
                <div class='btn-group'>
                    <a href="{!! route('boxes.show', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('boxes.edit', [$box->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarCaja"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>
        @include('boxes.confirmdelete')

    @endforeach
    </tbody>
</table>