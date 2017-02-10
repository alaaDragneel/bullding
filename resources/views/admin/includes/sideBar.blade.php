<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
   <div class="pull-left image">
     <img src="{{asset('src/backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
   </div>
   <div class="pull-left info">
     <p>{{ Auth::user()->name }}</p>
     <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
   </div>
</div>
<!-- search form -->
<form action="#" method="get" class="sidebar-form">
   <div class="input-group">
     <input type="text" name="q" class="form-control" placeholder="Search...">
         <span class="input-group-btn">
           <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
           </button>
         </span>
   </div>
</form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
   <li class="header">Admin Menu</li>

   <li class="{{ Request::is('admin/site_setting') || Request::is('admin/dashboard') ? 'active' : '' }} treeview">
     <a href="#">
       <i class="fa fa-dashboard"></i> <span>Dashboard</span>
       <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
       </span>
     </a>
     <ul class="treeview-menu">
       <li {{ Request::is('admin') || Request::is('admin/dashboard') ? 'active' : '' }}><a href="{{ route('dashboard') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
       <li {{ Request::is('admin/site_setting') ? 'active' : '' }}><a href="{{ route('siteSetting') }}"><i class="fa fa-circle-o"></i> Site Setting</a></li>
     </ul>
   </li>
   {{-- users --}}
   <li class="{{ Request::is('admin/user*') ? 'active' : '' }} treeview">
     <a href="#">
       <i class="fa fa-users"></i> <span>Users</span>
       <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
       </span>
     </a>
     <ul class="treeview-menu">
       <li {{ Request::is('admin/users') ? 'class=active' : '' }}><a href="{{ route('users') }}"><i class="fa fa-eye"></i> Show All Users</a></li>
       <li {{ Request::is('admin/users/create') ? 'class=active' : '' }}><a href="{{ route('add.user') }}"><i class="fa fa-plus"></i>Add User</a></li>
     </ul>
   </li>
   {{-- bullding --}}
   <li class="{{ Request::is('admin/bullding*') ? 'active' : '' }} treeview">
     <a href="#">
       <i class="fa fa-users"></i> <span>Bulldings</span>
       <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
       </span>
     </a>
     <ul class="treeview-menu">
          <li {{ Request::is('admin/bulldings/create') ? 'class=active' : '' }}><a href="{{ route('admin.bulldings.create') }}"><i class="fa fa-plus"></i>Add Bullding</a></li>
       <li {{ Request::is('admin/bullding') ? 'class=active' : '' }}><a href="{{ route('admin.bulldings.index') }}"><i class="fa fa-eye"></i> Show All Bullding</a></li>
     </ul>
   </li>
   {{-- contact --}}
   <li class="{{ Request::is('admin/contacts*') ? 'active' : '' }} treeview">
     <a href="#">
       <i class="fa fa-users"></i> <span>Site Message</span>
       <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
       </span>
     </a>
     <ul class="treeview-menu">
       <li {{ Request::is('admin/contacts') ? 'class=active' : '' }}><a href="{{ route('admin.contacts.index') }}"><i class="fa fa-eye"></i> Show All messages</a></li>
     </ul>
   </li>
   <li class="header">LABELS</li>
   <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
   <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
   <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
</ul>
</section>
<!-- /.sidebar -->
</aside>
