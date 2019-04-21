@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="margin-top: 5px;margin-bottom: 8px" class="pull-left">Reportes</h1>
        <!--<h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('transferDs.create') !!}">Nuevo</a>
        </h1>-->
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-sm-12 col-md-3 col-lg-3">
                            <h3>Total inventario</h3>
                            <a class="btn btn-primary" target="_blank" style="margin-top: 5px;margin-bottom: 5px" href="/reporte-inventario">Ver reporte</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

