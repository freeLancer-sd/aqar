<aside class="main-sidebar" id="sidebar-wrapper" dir="rtl">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" dir="rtl">
    {{--    <section class="col-md-3 float-right col-1 pl-0 pr-2 width show collapse" id="sidebar" aria-expanded="true">--}}

    <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('logo.png')}}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                    <p> @lang('lang.main.site') @endlang</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
            @endif
            <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> @lang('lang.main.online') @endlang</a>
            </div>
        </div>

        <!-- search form (Optional) -->
{{--        <form action="#" method="get" class="sidebar-form">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" name="q" class="form-control" placeholder="بحث..."/>--}}
{{--                <span class="input-group-btn">--}}
{{--            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>--}}
{{--            </button>--}}
{{--          </span>--}}
{{--            </div>--}}
{{--        </form>--}}
        <!-- Sidebar Menu -->
        @if(Auth()->user()->role == 1 || Auth()->user()->role == 2)
            <ul class="sidebar-menu"  dir="rtl" data-widget="tree">
                @include('layouts.menu')
            </ul>
        @else
            <ul class="sidebar-menu"  dir="rtl" data-widget="tree">
                @include('layouts.user-menu')
            </ul>
    @endif

    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
