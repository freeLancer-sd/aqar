<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', __('models/users.fields.mobile').':') !!}
    <p>{{ $user->mobile }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', __('models/users.fields.email_verified_at').':') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <p>{{ $user->role }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/users.fields.status').':') !!}
    <p>{{ $user->status }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', __('models/users.fields.remember_token').':') !!}
    <p>{{ $user->remember_token }}</p>
</div>

