<?php $authUser = Auth::user(); ?>
<div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">{{ countAllBulldingAppendToStatus(0) }}</span>
               </a>
               <ul class="dropdown-menu">
                    <li class="header">You have {{ countAllBulldingAppendToStatus(0) }} Waiting Bullding</li>
                    <li>
                         <!-- inner menu: contains the actual data -->
                         <ul class="menu">
                              @foreach (\App\Bullding::where('status', 0)->get() as $waiting)
                                   <li>
                                        <a href="{{ route("admin.bulldings.edit", ['id' => $waiting->id]) }}" class="pull-left">
                                             {{ $waiting->name }}
                                        </a>
                                        <a href="{{ route('admin.bulldings.changeStatus', ['id' => $waiting->id, 'status' => 1]) }}" class="pull-right label label-warning" style="padding: 7px; margin: 10px;">
                                             Approve
                                        </a>
                                        <div class="clearfix"></div>
                                   </li>
                              @endforeach
                         </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
               </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">{{ countUnReadMessage() }}</span>
               </a>
               <ul class="dropdown-menu">
                    <li class="header">You have {{ countUnReadMessage() }} tasks</li>
                    <li>
                         <!-- inner menu: contains the actual data -->
                         <ul class="menu">
                              <!-- Task item -->
                              @foreach (unReadMessage() as $valueMessage)
                                   <li>
                                        <a href="{{ route('admin.contacts.edit', ['id' => $valueMessage->id]) }}">
                                             <h3>
                                                  {{ $valueMessage->contactName }}
                                                  <small class="pull-right">{{ $valueMessage->created_at }}</small>
                                             </h3>
                                        </a>
                                   </li>
                              @endforeach
                              <!-- end task item -->
                         </ul>
                    </li>
                    <li class="footer">
                         <a href="{{ route('admin.contacts.index') }}">View all tasks</a>
                    </li>
               </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset(avatar()) }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ $authUser->name }}</span>
               </a>
               <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                         <img src="{{ asset(avatar()) }}" class="img-circle" alt="User Image">

                         <p>
                              {{ $authUser->name }} - Web Developer
                              <small>Member since {{ $authUser->created_at->format('M. Y') }}</small>
                         </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                         <div class="pull-left">
                              <a href="{{ route('edit.user', ['user_id' => $authUser->id]) }}" class="btn btn-default btn-flat">Profile</a>
                         </div>
                         <div class="pull-right">
                              <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                         </div>
                    </li>
               </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
     </ul>
</div>
