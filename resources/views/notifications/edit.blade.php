@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/notifications.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($slider, ['route' => ['notifications.update', $slider->id], 'method' => 'patch']) !!}

                        @include('notifications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
