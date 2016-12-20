@extends('layouts.app')

@section('title')
     All Bullding
@endsection

@section('styles')
     {!! Html::style('src/global/bulldingAll.css') !!}
@endsection

@section('content')
     <div class="container">
          <div class="row profile">
               <div class="col-md-3">
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
               </div>
               <div class="col-md-9">
                    <div class="profile-content">
                         @include('website.bullding.sharefile', ['bulldings' => $bulldingAll])
                         <div class="pagination col-md-6 col-mdmd-offset-3">
                      {!! $bulldingAll->render() !!}
                    </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
