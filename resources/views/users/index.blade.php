@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Usuarios</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('users.confirmdelete')
    @section('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
        $('#borrarUsuario').on('show.bs.modal', function (e) {
            var dataId = $(e.relatedTarget).data('id');
            var form = $('#formBorrarUsuario');
            form.attr('action', form.attr('action').replace('REQ_ID', dataId));
        });
    </script>
    @endsection
@endsection

