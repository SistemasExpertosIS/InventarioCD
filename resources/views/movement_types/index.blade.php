@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Movement Types</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('movementTypes.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('movement_types.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('movement_types.confirmdelete')
    @section('scripts')
    <script>
        $('#borrarTipoMovimiento').on('show.bs.modal', function (e) {
            var dataId = $(e.relatedTarget).data('id');
            var form = $('#formBorrarTM');
            form.attr('action', form.attr('action').replace('REQ_ID', dataId));
        });
    </script>
    @endsection
@endsection

