@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Box
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($box, ['route' => ['boxes.update', $box->id], 'method' => 'patch']) !!}

                        @include('boxes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection