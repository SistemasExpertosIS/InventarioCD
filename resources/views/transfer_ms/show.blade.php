@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Traslados
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transfer_ms.show_fields')
                    <a href="{!! route('transferMs.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
