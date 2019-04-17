@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Traslados detalle</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('transferDs.create') !!}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('transfer_ds.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('transfer_ds.confirmdelete')
    @section('scripts')
    <script>
        $('#borrarTransferD').on('show.bs.modal', function (e) {
            var dataId = $(e.relatedTarget).data('id');
            var form = $('#formBorrarTD');
            form.attr('action', form.attr('action').replace('REQ_ID', dataId));
        });
    </script>
    @endsection
@endsection

