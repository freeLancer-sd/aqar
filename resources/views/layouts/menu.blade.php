<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('propertyTypes*') ? 'active' : '' }}">
    <a href="{{ route('propertyTypes.index') }}"><i
            class="fa fa-edit"></i><span>@lang('models/propertyTypes.plural')</span></a>
</li>

<li class="{{ Request::is('propertyCategories*') ? 'active' : '' }}">
    <a href="{{ route('propertyCategories.index') }}"><i
            class="fa fa-edit"></i><span>@lang('models/propertyCategories.plural')</span></a>
</li>

<li class="{{ Request::is('properties*') ? 'active' : '' }}">
    <a href="{{ route('properties.index') }}"><i
            class="fa fa-edit"></i><span>@lang('models/properties.plural')</span></a>
</li>

<li class="{{ Request::is('images*') ? 'active' : '' }}">
    <a href="{{ route('images.index') }}"><i class="fa fa-edit"></i><span>@lang('models/images.plural')</span></a>
</li>

<li class="{{ Request::is('properties*') ? 'active' : '' }}">
    <a href="{{ route('properties.index') }}"><i class="fa fa-edit"></i><span>@lang('models/properties.plural')</span></a>
</li>

<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{{ route('sliders.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sliders.plural')</span></a>
</li>

