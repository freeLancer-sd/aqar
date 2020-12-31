@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/advs.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($adv, ['route' => ['advs.update', $adv->id], 'method' => 'patch', 'files' => true, 'enctype'=>'multipart/form-data']) !!}

                    @include('advs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
