<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Estado</th>
            <th colspan="3">Acción</th>
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
                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrarProducto" data-id="{{ $product->id }}"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
            </td>
        </tr>        
    @endforeach
    </tbody>
</table>
