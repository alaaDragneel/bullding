<div class="col-md-3">
     @if (Auth::check())
     <div class="profile-sidebar">
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
               <div class="profile-usertitle-name">
                    <h2>Member Options</h2>
               </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR MENU -->
          <div class="profile-usermenu">
               <ul class="nav">
                    <li class="{{ Request::is('user/editSetting') ? 'active' : '' }}">
                         <a href="{{ route('user.editSetting') }}">
                              <i class="fa fa-edit"></i>
                              Edit the personal information
                         </a>
                    </li>
                    <li class="{{ Request::is('user/show/bullding') ? 'active' : '' }}">
                         <a href="{{ route('user.show.bullding') }}">
                              <i class="fa fa-building"></i>
                              My Bullding
                         </a>
                    </li>
                    <li class="{{ Request::is('user/show/bullding/approved') ? 'active' : '' }}">
                         <a href="{{ route('user.show.bullding.approved') }}">
                              <i class="fa fa-check"></i>
                              My Approved Bullding
                         </a>
                    </li>
                    <li class="{{ Request::is('user/show/bullding/unappreved') ? 'active' : '' }}">
                         <a href="{{ route('user.show.bullding.unappreved') }}">
                              <i class="fa fa-clock-o"></i>
                              My UnApproved Bullding
                         </a>
                    </li>
                    <li class="{{ Request::is('users/bullding/create') ? 'active' : '' }}">
                         <a href="{{ route('users.create.bullding') }}">
                              <i class="fa fa-plus"></i>
                              Add Bullding
                         </a>
                    </li>
               </ul>
          </div>
          <!-- END MENU -->
     </div>
     <br>
     @endif
     <div class="profile-sidebar">
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
               <div class="profile-usertitle-name">
                    <h2>Fillter</h2>
               </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR MENU -->
          <div class="profile-usermenu">
               <ul class="nav">
                    <li class="{{ Request::is('bullding/show/all') ? 'active' : '' }}">
                         <a href="{{ route('show.all.bullding') }}">
                              <i class="glyphicon glyphicon-eye-open"></i>
                              All Bullding
                         </a>
                    </li>
                    <li class="{{ Request::is('bullding/show/rent') ? 'active' : '' }}">
                         <a href="{{ route('show.rent.bullding') }}">
                              <i class="glyphicon glyphicon-yen"></i>
                              Rent
                         </a>
                    </li>
                    <li class="{{ Request::is('bullding/show/own') ? 'active' : '' }}">
                         <a href="{{ route('show.own.bullding') }}">
                              <i class="glyphicon glyphicon-ok"></i>
                              Buy
                         </a>
                    </li>
                    <li class="{{ Request::is('bullding/show/apartment') ? 'active' : '' }}">
                         <a href="{{ route('show.apartment.bullding') }}">
                              <i class="glyphicon glyphicon-home"></i>
                              apartment
                         </a>
                    </li>
                    <li class="{{ Request::is('bullding/show/Shaleh') ? 'active' : '' }}">
                         <a href="{{ route('show.Shaleh.bullding') }}">
                              <i class="glyphicon glyphicon-bookmark"></i>
                              Shaleh
                         </a>
                    </li>
                    <li class="{{ Request::is('bullding/show/home') ? 'active' : '' }}">
                         <a href="{{ route('show.home.bullding') }}">
                              <i class="glyphicon glyphicon-bed"></i>
                              home
                         </a>
                    </li>
               </ul>
          </div>
          <!-- END MENU -->
     </div>
     <br>
     <div class="profile-sidebar">
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
               <div class="profile-usertitle-name">
                    <h2>Advanced Search</h2>
               </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR MENU -->
          <div class="profile-usermenu" style="padding: 10px;">
               {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
               <ul class="nav">
                    <li style="margin-bottom: 10px;">
                         {!! Form::text("price_from", null, ['class' => 'form-control', 'placeholder' => 'Bulding Price from...']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::text("price_to", null, ['class' => 'form-control', 'placeholder' => 'Bulding Price to...']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::select("place", place(), null, ['class' => 'form-control', 'placeholder' => 'Rooms place']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::select("rooms", roomsNu(), null, ['class' => 'form-control', 'placeholder' => 'Rooms numbers']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::select("type", type(), null, ['class' => 'form-control', 'placeholder' => 'Bullding Type']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::select("rent", rent(), null, ['class' => 'form-control', 'placeholder' => 'Bullding rent OR Buy']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::text("square", null, ['class' => 'form-control', 'placeholder' => 'Bulding square...']) !!}
                    </li>
                    <li style="margin-bottom: 10px;">
                         {!! Form::submit("search", ['class' => 'btn btn-primary btn-block btn-sm']) !!}
                    </li>
               </ul>
               {!! Form::close() !!}
          </div>
          <!-- END MENU -->
     </div>

</div>
