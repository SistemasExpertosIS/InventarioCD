@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Tipo de movimiento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($movementType, ['route' => ['movementTypes.update', $movementType->id], 'method' => 'patch']) !!}

                        @include('movement_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection