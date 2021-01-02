<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', __('models/users.fields.mobile').':') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>


<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    {!! Form::select('role', ['1'=>'مدير', "2"=>"مشرف", "3"=>"عضو"], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('models/users.fields.status').':') !!}
    {!! Form::select('status', ['1'=>'مفعل', "2"=>"ملغي"], null, ['class' => 'form-control']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $(function () {
            //Initialize Select2 Elements
            $('select2').select2();
        });
    </script>
@endpush
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
