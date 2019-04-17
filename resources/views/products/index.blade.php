@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Productos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('products.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('products.confirmdelete')
    @section('scripts')
    <script>
        $('#borrarProducto').on('show.bs.modal', function (e) {
            var dataId = $(e.relatedTarget).data('id');
            var form = $('#formBorrarProducto');
            form.attr('action', form.attr('action').replace('REQ_ID', dataId));
        });
    </script>
    @endsection
@endsection


