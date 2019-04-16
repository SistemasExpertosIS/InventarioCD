<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Code</th>
        <th>Description</th>
        <th>State</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->Name !!}</td>
            <td>{!! $product->Code !!}</td>
            <td>{!! $product->Description !!}</td>
            <td>{!! $product->State !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarProducto"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>
        @include('products.confirmdelete')
    @endforeach
    </tbody>
</table>