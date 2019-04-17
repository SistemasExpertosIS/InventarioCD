<table class="table table-responsive" id="transferMs-table">
    <thead>
        <tr>
            <th>Description</th>
        <th>Idmovementtype</th>
        <th>Iduserreceives</th>
        <th>Idusersends</th>
        <th>Idbranchreceives</th>
        <th>Idbranchsends</th>
        <th>Idtransport</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transferMs as $transferM)
        <tr>
            <td>{!! $transferM->Description !!}</td>
            <td>{!! $transferM->idMovementType !!}</td>
            <td>{!! $transferM->idUserReceives !!}</td>
            <td>{!! $transferM->idUserSends !!}</td>
            <td>{!! $transferM->idBranchReceives !!}</td>
            <td>{!! $transferM->idBranchSends !!}</td>
            <td>{!! $transferM->idTransport !!}</td>
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