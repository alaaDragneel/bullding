@extends('admin.layouts.adminMaster')

@section('title')
     Edit User {{ $user->name }}
@endsection

@section('content')

     <section class="content-header">
          <h1>Edit User {{ $user->name }}</h1>
          <ol class="breadcrumb">
               <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="{{ route('users') }}">Users and Members</a></li>
               <li><a href="{{ route('edit.user', ['user_id' => $user->id]) }}">Edit User {{ $user->name }}</a></li>
          </ol>
     </section>

     <section class="content">
          <div class="row">
               {{-- start the taps --}}

               <div class="col-md-12">
                    <div class="nav-tabs-custom">
                         <ul class="nav nav-tabs">
                              <li class="active"><a href="#all" data-toggle="tab" aria-expanded="true">all Bullding</a></li>
                              <li class=""><a href="#Approved" data-toggle="tab" aria-expanded="false">Approved Bullding</a></li>
                              <li class=""><a href="#UnApproved" data-toggle="tab" aria-expanded="false">UnApproved Bullding</a></li>
                              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
                         </ul>
                         <div class="tab-content">
                              <div class="tab-pane active" id="all">
                                   <!-- /.box-header -->
                                   <div class="box-body">
                                        <div class="table-responsive">
                                             <table class="table no-margin">
                                                  <thead>
                                                       <tr>
                                                            <th>ID</th>
                                                            <th>Bulding name</th>
                                                            <th>Price</th>
                                                            <th>square</th>
                                                            <th>Rooms</th>
                                                            <th>place</th>
                                                            <th>Bulding type</th>
                                                            <th>operation type</th>
                                                            <th>status</th>
                                                            <th>Change Status</th>
                                                            <th>Add On</th>
                                                            <th>Image</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($bullding as $all)
                                                            <?php
                                                                 $stat = $all->status;
                                                                 $status = $stat === 0 ? 1 : 0;
                                                                 $statusBtn = $stat === 0 ? 'Approve' : 'UnApprove';
                                                            ?>
                                                            <tr>
                                                                 <td>{{ $all->id }}</td>
                                                                 <td>
                                                                      <a href="{{ route("admin.bulldings.edit", ['id' => $all->id]) }}">
                                                                           {{ $all->name }}
                                                                      </a>
                                                                 </td>
                                                                 <td><span class="label label-warning">{{ $all->price }}</span></td>
                                                                 <td><span class="label label-success">{{ $all->square }}</span></td>
                                                                 <td><span class="label label-danger">{{ $all->rooms }}</span></td>
                                                                 <td><span class="label label-primary">{{ place()[$all->place] }}</span></td>
                                                                 <td><span class="label label-danger">{{ type()[$all->type] }}</span></td>
                                                                 <td><span class="label label-primary">{{ rent()[$all->rent] }}</span></td>
                                                                 <td><span class="label label-info">{{ status()[$all->status] }}</span></td>
                                                                 <td><a href="{{ route('admin.bulldings.changeStatus', ['id' => $all->id, 'status' => $status]) }}" class="btn btn-primary btn-xs">{{ $statusBtn }}</a></td>
                                                                 <td><span class="label label-warning">{{ $all->created_at }}</span></td>
                                                                 <td>
                                                                      <img src="{{ asset(checkImage($all->image)) }}" class="img-responsive img-thumbnail" style="width: 100%; height: auto;" >
                                                                 </td>
                                                            </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                             <div class="pagination col-md-6 col-md-offset-3">
                                                  {{ $bullding->appends(Request::query())->render() }}
                                             </div>
                                        </div>
                                        <!-- /.table-responsive -->
                                   </div>
                                   <!-- /.box-body -->

                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="Approved">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                             <div class="table-responsive">
                                                  <table class="table no-margin">
                                                       <thead>
                                                            <tr>
                                                                 <th>ID</th>
                                                                 <th>Bullding Name</th>
                                                                 <th>Price</th>
                                                                 <th>square</th>
                                                                 <th>Rooms</th>
                                                                 <th>place</th>
                                                                 <th>Bulding type</th>
                                                                 <th>operation type</th>
                                                                 <th>status</th>
                                                                 <th>UnApprove</th>
                                                                 <th>Add On</th>
                                                                 <th>Image</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach ($bulldingEnabled as $enable)
                                                                 <tr>
                                                                      <td>{{ $enable->id }}</td>
                                                                      <td>
                                                                           <a href="{{ route("admin.bulldings.edit", ['id' => $enable->id]) }}">
                                                                                {{ $enable->name }}
                                                                           </a>
                                                                      </td>
                                                                      <td><span class="label label-warning">{{ $enable->price }}</span></td>
                                                                      <td><span class="label label-success">{{ $enable->square }}</span></td>
                                                                      <td><span class="label label-danger">{{ $enable->rooms }}</span></td>
                                                                      <td><span class="label label-primary">{{ place()[$enable->place] }}</span></td>
                                                                      <td><span class="label label-danger">{{ type()[$enable->type] }}</span></td>
                                                                      <td><span class="label label-primary">{{ rent()[$enable->rent] }}</span></td>
                                                                      <td><span class="label label-info">{{ status()[$enable->status] }}</span></td>
                                                                      <td><a href="{{ route('admin.bulldings.changeStatus', ['id' => $enable->id, 'status' => 0]) }}" class="btn btn-primary btn-xs">UnApprove</a></td>
                                                                      <td><span class="label label-warning">{{ $enable->created_at }}</span></td>
                                                                      <td>
                                                                           <img src="{{ asset(checkImage($enable->image)) }}" class="img-responsive img-thumbnail" style="width: 100%; height: auto;" >
                                                                      </td>
                                                                 </tr>
                                                            @endforeach
                                                       </tbody>
                                                  </table>
                                                  <div class="pagination col-md-6 col-md-offset-3">
                                                       {{ $bulldingEnabled->appends(Request::query())->render() }}
                                                  </div>
                                             </div>
                                             <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.box-body -->
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="UnApproved">
                                   <!-- /.box-header -->
                                   <div class="box-body">
                                        <div class="table-responsive">
                                             <table class="table no-margin">
                                                  <thead>
                                                       <tr>
                                                            <th>ID</th>
                                                            <th>Bullding Name</th>
                                                            <th>Price</th>
                                                            <th>square</th>
                                                            <th>Rooms</th>
                                                            <th>place</th>
                                                            <th>Bulding type</th>
                                                            <th>operation type</th>
                                                            <th>status</th>
                                                            <th>Approve</th>
                                                            <th>Add On</th>
                                                            <th>Image</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($bulldingWaiting as $waiting)
                                                            <tr>
                                                                 <td>{{ $waiting->id }}</td>
                                                                 <td>
                                                                      <a href="{{ route("admin.bulldings.edit", ['id' => $waiting->id]) }}">
                                                                           {{ $waiting->name }}
                                                                      </a>
                                                                 </td>
                                                                 <td><span class="label label-warning">{{ $waiting->price }}</span></td>
                                                                 <td><span class="label label-success">{{ $waiting->square }}</span></td>
                                                                 <td><span class="label label-danger">{{ $waiting->rooms }}</span></td>
                                                                 <td><span class="label label-primary">{{ place()[$waiting->place] }}</span></td>
                                                                 <td><span class="label label-danger">{{ type()[$waiting->type] }}</span></td>
                                                                 <td><span class="label label-primary">{{ rent()[$waiting->rent] }}</span></td>
                                                                 <td><span class="label label-info">{{ status()[$waiting->status] }}</span></td>
                                                                 <td><a href="{{ route('admin.bulldings.changeStatus', ['id' => $waiting->id, 'status' => 1]) }}" class="btn btn-primary btn-xs">Approve</a></td>
                                                                 <td><span class="label label-warning">{{ $waiting->created_at }}</span></td>
                                                                 <td>
                                                                      <img src="{{ asset(checkImage($waiting->image)) }}" class="img-responsive img-thumbnail" style="width: 100%; height: auto;" >
                                                                 </td>
                                                            </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                             <div class="pagination col-md-6 col-md-offset-3">
                                                  {{ $bulldingWaiting->appends(Request::query())->render() }}
                                             </div>
                                        </div>
                                        <!-- /.table-responsive -->
                                   </div>
                                   <!-- /.box-body -->
                              </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="settings">
                                   @include('admin.users.editForm')
                              </div>
                              <!-- /.tab-pane -->
                         </div>
                         <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
               </div>

               {{-- end the taps --}}
          </div>
     </section>


@endsection
