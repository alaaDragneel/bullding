@extends('admin.layouts.adminMaster')

@section('title')
	Dashboard
@endsection

@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>


		<ol class="breadcrumb">
			<li>
				<a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
			</li>


			<li>
				<a href="{{ route('dashboard') }}">Home</a>
			</li>
		</ol>
	</section>
	<!-- Main content -->


	<section class="content">
		<!-- Info boxes -->


		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->


				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{ $usersCount }}</h3>


						<p>Total Users</p>
					</div>


					<div class="icon">
						<i class="ion ion-ios-people"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->


			<div class="col-lg-3 col-xs-6">
				<!-- small box -->


				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{ $contactCount }}</h3>


						<p>Total messages</p>
					</div>


					<div class="icon">
						<i class="ion ion-email"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->


			<div class="col-lg-3 col-xs-6">
				<!-- small box -->


				<div class="small-box bg-green">
					<div class="inner">
						<h3>{{ $activeBulldingCount }}</h3>


						<p>Published Bullding</p>
					</div>


					<div class="icon">
						<i class="ion-ios-home"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->


			<div class="col-lg-3 col-xs-6">
				<!-- small box -->


				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{ $waitingBulldingCount }}</h3>


						<p>Waiting Bullding</p>
					</div>


					<div class="icon">
						<i class="ion ion-load-d"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->


		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Yearly Bullding Report In Current Year</h3>


						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" type="button">
                                        <i class="fa fa-minus"></i>
                                   </button>


							<button class="btn btn-box-tool" data-widget="remove" type="button"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header -->


					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<p class="text-center"><strong>Chart Explain The Added Bullding Per Year</strong>
								</p>


								<div class="chart">
									<!-- Sales Chart Canvas -->
									<canvas id="salesChart" style="height: 180px;">
									</canvas>
								</div>
								<!-- /.chart-responsive -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- ./box-body -->

				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->


		<div class="row">
			<!-- Left col -->


			<div class="col-md-8">
				<!-- MAP & BOX PANE -->


				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Bullding Report</h3>


						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" type="button">
                                        <i class="fa fa-minus"></i>
                                   </button> <button class="btn btn-box-tool" data-widget="remove" type="button">
                                        <i class="fa fa-times"></i>
                                   </button>
						</div>
					</div>
					<!-- /.box-header -->


					<div class="box-body no-padding">
						<div class="row">
							<div class="col-md-9 col-sm-8">
								<div class="pad">
									<!-- Map will be created here -->


									<div id="world-map-markers" style="height: 325px;">
									</div>
								</div>
							</div>
							<!-- /.col -->


							<div class="col-md-3 col-sm-4">
								<div class="pad box-pane-right bg-green" style="min-height: 280px">
									<div class="description-block margin-bottom">
										<h5 class="description-header">{{ $activeBulldingCount }}</h5>
										<span class="description-text">Published</span>
									</div>
									<!-- /.description-block -->


									<div class="description-block margin-bottom">
										<h5 class="description-header">{{ $waitingBulldingCount }}</h5>
										<span class="description-text">Waiting</span>
									</div>
									<!-- /.description-block -->


									<div class="description-block">
										<h5 class="description-header">{{ $activeBulldingCount + $waitingBulldingCount }}</h5>
										<span class="description-text">All Bullding</span>
									</div>
									<!-- /.description-block -->
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->


				<div class="row">
					<!-- /.col -->
                         <div class="col-md-6">


                              <div class="box box-info">
                                   <div class="box-header with-border">
                                        <h3 class="box-title">Latest Messages</h3>


                                        <div class="box-tools pull-right">
                                             <button class="btn btn-box-tool" data-widget="collapse" type="button"><i class="fa fa-minus"></i></button> <button class="btn btn-box-tool" data-widget="remove" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                   </div>
                                   <!-- /.box-header -->


                                   <div class="box-body">
                                        <div class="table-responsive">
                                             <table class="table no-margin">
                                                  <thead>
                                                       <tr>
                                                            <th>Contact ID</th>

                                                            <th>Name</th>

                                                            <th>Status</th>

                                                            <th>Type</th>
                                                       </tr>
                                                  </thead>


                                                  <tbody>
                                                       @foreach ($lastContact as $contact)
                                                            <tr>
                                                                 <td>
                                                                      {{ $contact->id }}
                                                                 </td>

                                                                 <td>
                                                                      <a href="{{ route('admin.contacts.edit', ['id' => $contact->id]) }}">
                                                                           {{ $contact->contactName }}
                                                                      </a>
                                                                 </td>

                                                                 <td>
                                                                      <span class="label label-{{ $contact->view === 0 ? 'danger' : 'primary' }}">
                                                                           {{ $contact->view === 0 ? 'New' : 'Seen' }}
                                                                      </span>
                                                                 </td>

                                                                 <td>
                                                                      <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                           {{ contact()[$contact->contactType] }}
                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                       @endforeach

                                                  </tbody>
                                             </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                   </div>
                                   <!-- /.box-body -->


                                   <div class="box-footer text-center">
                                        <a href="{{ route('admin.contacts.index') }}">View All messages</a>
                                   </div>
                                   <!-- /.box-footer -->

                              </div>
                         </div>


					<div class="col-md-6">
						<!-- USERS LIST -->


						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Latest Members</h3>


								<div class="box-tools pull-right">
									<span class="label label-danger">{{ $usersCount }} New Members</span> <button class="btn btn-box-tool" data-widget="collapse" type="button"><i class="fa fa-minus"></i></button> <button class="btn btn-box-tool" data-widget="remove" type="button"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<!-- /.box-header -->


							<div class="box-body no-padding">
								<ul class="users-list clearfix">
                                             @foreach ($lastUser as $user)
                                                  <li>
                                                       <img alt="{{ $user->name }} Image" src="{{ asset(avatar()) }}">
                                                       <a class="users-list-name" href="{{ route('edit.user', ['user_id' => $user->id]) }}">{{ $user->name }}</a>
                                                       <span class="users-list-date">{{ $user->created_at->format('d.M.Y') }}</span>
                                                  </li>
                                             @endforeach

								</ul>
								<!-- /.users-list -->
							</div>
							<!-- /.box-body -->


							<div class="box-footer text-center">
								<a class="uppercase" href="{{ route('users') }}">View All Users</a>
							</div>
							<!-- /.box-footer -->
						</div>
						<!--/.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<!-- /.box -->
			</div>
			<!-- /.col -->


			<div class="col-md-4">
				<!-- PRODUCT LIST -->


				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Recently Added Bullding</h3>


						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" type="button">
                                        <i class="fa fa-minus"></i>
                                   </button>
                                   <button class="btn btn-box-tool" data-widget="remove" type="button">
                                        <i class="fa fa-times"></i>
                                   </button>
						</div>
					</div>
					<!-- /.box-header -->


					<div class="box-body">
						<ul class="products-list product-list-in-box">
                                   @foreach ($lastBullidngs as $bullding)
                                        <li class="item">
                                             <div class="product-img">
                                                  <img alt="{{ $bullding->name }} Image" src="{{ checkImage($bullding->image) }}">
                                             </div>


                                             <div class="product-info">
                                                  <a class="product-title" href="{{ route('admin.bulldings.edit', ['id' => $bullding->id]) }}">{{ $bullding->name }}
                                                       <span class="label label-{{ $bullding->status === 0 ? 'danger' : 'primary' }} pull-right">{{ $bullding->price }}</span>
                                                  </a>
                                                   <span class="product-description">{{ $bullding->small_dis }}</span>
                                             </div>
                                        </li>
                                        <!-- /.item -->
                                   @endforeach

						</ul>
					</div>
					<!-- /.box-body -->


					<div class="box-footer text-center">
						<a class="uppercase" href="{{ route('admin.bulldings.index') }}">View All Products</a>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
@endsection

@section('scripts')
<script>
/* ChartJS
* -------
* Here we will create a few charts using ChartJS
*/

//-----------------------
//- MONTHLY SALES CHART -
//-----------------------

// Get context with jQuery - using jQuery's .get() method.
var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.
var salesChart = new Chart(salesChartCanvas);

var salesChartData = {
     labels: ["January", "February", "March", "April", "May", "June", "July", "September", "October", "November", "December"],
     datasets: [
          {
               label: "Bullding",
               fillColor: "rgba(60,141,188,0.9)",
               strokeColor: "rgba(60,141,188,0.8)",
               pointColor: "#3b8bba",
               pointStrokeColor: "rgba(60,141,188,1)",
               pointHighlightFill: "#fff",
               pointHighlightStroke: "rgba(60,141,188,1)",
               data: [
                    @foreach ($chartBuillding as $chart)
                         {{ $chart->counting }},
                    @endforeach
               ]
          }
     ]
};

/* jVector Maps
* ------------
* Create a world map with markers
*/
$('#world-map-markers').vectorMap({
     map: 'world_mill_en',
     normalizeFunction: 'polynomial',
     hoverOpacity: 0.7,
     hoverColor: false,
     backgroundColor: 'transparent',
     regionStyle: {
          initial: {
               fill: 'rgba(210, 214, 222, 1)',
               "fill-opacity": 1,
               stroke: 'none',
               "stroke-width": 0,
               "stroke-opacity": 1
          },
          hover: {
               "fill-opacity": 0.7,
               cursor: 'pointer'
          },
          selected: {
               fill: 'yellow'
          },
          selectedHover: {}
     },
     markerStyle: {
          initial: {
               fill: '#00a65a',
               stroke: '#111'
          }
     },
     markers: [
          @foreach ($mapping as $map)
          {latLng: [{{ $map->langtuide }}, {{ $map->latitiute }}], name: '{{ $map->name }}'},
          @endforeach
     ]
});
</script>
@endsection
