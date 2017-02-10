@extends('admin.layouts.adminMaster')

@section('title')
	statistics Of Adding Bullding Of the Year {{ $year }}
@endsection

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>statistics Of Adding Bullding Of the Year {{ $year }}</h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ route('show.bullding.statistics') }}">statistics Of Adding Bullding Of the Year {{ $year }}</a></li>
	  </ol>
	</section>
	<section class="content">
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
                                        {!! Form::open(['route' => 'show.bullding.statistics', 'method' => 'post']) !!}
                                        <div class="row">
                                          <div class="col-md-3">

                                               <select id="year" style="width: 50%;" name="year">
                                                    @for ($i= $year; $i < 2100; $i++)
                                                         <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                               </select>
                                               <input type="submit" name="submit" value="Show statistics" class="btn btn-primary btn-xs">
                                          </div>
                                        </div>
                                        {!! Form::close() !!}

                                        <p class="text-center">
                                             <strong>statistics Of Adding Bullding Of the Year {{ $year }}</strong>

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
     </section>

@endsection

@section('scripts')
<script>
$('#year').select2();
/* ChartJS
* -------
* Here we will create a few charts using ChartJS
*/

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
                    @foreach ($new as $chart)
                    @if (is_array($chart))
                    {{ $chart['counting'] }},
                    @else
                    {{ $chart }},
                    @endif
                    @endforeach
               ]
          }
     ]
};
</script>
@endsection
