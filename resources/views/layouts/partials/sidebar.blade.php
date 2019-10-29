<div class="content">

<div class="navigation">
    <!-- Admin -->
    @if(Request::is('admin*'))
    <h5 class="title">Navigation</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">
        <li class="{{ Request::is('admin/dashboard') ? 'current' : '' }}">
            <a class="waves-effect" href="{{ route('admin.dashboard') }}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
        </li>
        <li class="{{ Request::is('admin/category*') ? 'current' : '' }}">
            <a class="waves-effect" href="{{ route('admin.category.index')}}"><i class="menu-icon mdi mdi-calendar"></i><span>Category</span></a>
        </li>
        <li class="{{ Request::is('admin/food*') ? 'current' : '' }}">
            <a class="waves-effect" href=""><i class="menu-icon mdi mdi-email"></i><span>Food Item</span><span class="notice notice-danger">New</span></a>
        </li>
        <li class="{{ Request::is('admin/slider*') ? 'current' : '' }}">
            <a class="waves-effect" href="{{ route('admin.slider.index')}}"><i class="menu-icon mdi mdi-calendar"></i><span>Slider</span></a>
        </li>
        <li class="{{ Request::is('admin/item*') ? 'current' : '' }}">
            <a class="waves-effect" href="{{ route('admin.item.index')}}"><i class="menu-icon mdi mdi-calendar"></i><span>Item</span></a>
        </li>
    </ul>
    <!-- /.menu js__accordion -->
    @endif
</div>
<!-- /.navigation -->
</div>
<!-- /.content -->