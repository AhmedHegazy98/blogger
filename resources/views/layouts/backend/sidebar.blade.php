<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    {{--<div class="user-panel">--}}
      {{--<div class="pull-left image">--}}
        {{--<img src="http://127.0.0.1:8000/{{Auth::user()->image}}" class="img-circle" alt="User Image">--}}
      {{--</div>--}}
      {{--<div class="pull-left info">--}}
        {{--<p>{{ Auth::user()->name }}</p>--}}
        {{--<a href=""><i class="fa fa-circle text-success"></i> Online</a>--}}
      {{--</div>--}}
    {{--</div>--}}

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
        <a href="{{url('/')}}"><span> <i class="fa fa-dashboard"></i> Main page</span></a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil"></i>
          <span>Blog</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

              @role('admin')
              <li>
                <a href="{{ url('/backend/blog') }}"><i class="fa fa-circle-o"></i> All Posts</a>
              </li>
              <li>
                <a href="{{ url('/backend/provement') }}"><i class="fa fa-circle-o"></i> Posts need approve </a>
              </li>
              @endrole
              <li>
                <a href="{{ url('/auther', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> My Posts</a>
              </li>
        </ul>
      </li>



      @role('admin')
      <li>
        <a href="{{url('/backend/categories')}}"><i class="fa fa-folder"></i><span>Categories</span></a>
      </li>
      <li>
        <a href="{{url('/backend/users')}}"><i class="fa fa-users"></i> <span>Users</span></a>
      </li>
      @endrole

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
