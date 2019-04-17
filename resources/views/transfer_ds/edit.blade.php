@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Traslado detalle
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transferD, ['route' => ['transferDs.update', $transferD->id], 'method' => 'patch']) !!}

                        @include('transfer_ds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection