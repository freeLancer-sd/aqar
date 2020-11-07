<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/conditions.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', __('models/conditions.fields.body').':') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('conditions.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#body').summernote();
        });
    </script>
@endpush