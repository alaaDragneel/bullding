@extends('admin.layouts.adminMaster')

@section('title')
	Bullding
@endsection

@section('styles')
	<!-- DataTables -->
{!! Html::style('src/backend/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
	    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>users Tables</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users') }}">Bulldings</a></li>
      </ol>
    </section>
	@include('includes.infoBox')
    <section class="content">
	<div class="row">
	  <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bullding Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					<div class="col-sm-12">
						<table id="myTableData" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                   				<thead>
                   					<tr role="row">
									<th>#ID</th>
									<th >Name</th>
									<th >Price</th>
									<th >Add On</th>
									<th >Status</th>
									<th >type</th>
									<th >Actions</th>
								</tr>
                   				</thead>
			                   <tbody>
							    {{-- dataTable --}}
					    		</tbody>
							<tfoot>
                   					<tr role="row">
									<th>#ID</th>
									<th >Name</th>
									<th >Price</th>
									<th >Add On</th>
									<th >Status</th>
									<th >type</th>
									<th colspan="2">More Information</th>

								</tr>
                   				</tfoot>

                 			</table>
					</div>
				</div>
			</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
	<!-- DataTables -->
	{!! Html::script('src/backend/plugins/datatables/jquery.dataTables.min.js') !!}
	{!! Html::script('src/backend/plugins/datatables/dataTables.bootstrap.min.js') !!}

	<script type="text/javascript">

 var lastIdx = null;

$('#myTableData tfoot th').each( function () {
	var classname = 'form-control'
 if($(this).index()  < 3 ){
	var title = $(this).html();
	$(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" search by '+title+'" />');
}else if($(this).index() == 3){
	$(this).html( '<select class="' + classname + '"><option value="0"> User </option><option value="1"> Admin </option></select>' );
 }

});
var url = "{{ route('bullding.data') }}";
var table = $('#myTableData').DataTable({
 processing: true,
 serverSide: true,
 ajax: url,
 columns: [
	{data: 'id', name: 'id'},
	{data: 'name', name: 'name'},
	{data: 'price', name: 'price'},
	{data: 'status', name: 'status'},
	{data: 'type', name: 'type'},
	{data: 'created_at', name: 'created_at'},
	{data: 'actions', name: ''},
 ],
 // "language": {
 // "url": "{{-- Request::root()  --}}/admin/cus/Arabic.json"<th>#ID</th>
 // },
 "stateSave": false,
 "responsive": true,
 "order": [[0, 'desc']], // 0 the first culomn zero index
 "pagingType": "full_numbers",
 aLengthMenu: [
	[25, 50, 100, 200, -1],
	[25, 50, 100, 200, "All"]
 ],
 iDisplayLength: 25,
 fixedHeader: true,

 "oTableTools": {
	"aButtons": [
	    {
		   "sExtends": "csv",
		   "sButtonText": "Exel File",
		   "sCharSet": "utf16le"
	    },
	    {
		   "sExtends": "copy",
		   "sButtonText": "Copy the Information",
	    },
	    {
		   "sExtends": "print",
		   "sButtonText": "Print",
		   "mColumns": "visible",


	    }
	],

	"sSwfPath": "{{ Request::root()  }}/src/backend/cus/copy_csv_xls_pdf.swf"
 },

 "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
 ,initComplete: function ()
 {
	var r = $('#myTableData tfoot tr');
	r.find('th').each(function(){
	    $(this).css('padding', 8);
	});
	$('#myTableData thead').prepend(r);
	$('#search_0').css('text-align', 'center');
 }

});

table.columns().eq(0).each(function(colIdx) {
 $('input', table.column(colIdx).footer()).on('keyup change', function() {
	table
		   .column(colIdx)
		   .search(this.value)
		   .draw();
 });




});



table.columns().eq(0).each(function(colIdx) {
 $('select', table.column(colIdx).footer()).on('change', function() {
	table
		   .column(colIdx)
		   .search(this.value)
		   .draw();
 });

 $('select', table.column(colIdx).footer()).on('click', function(e) {
	e.stopPropagation();
 });
});


$('#myTableData tbody')
	.on( 'mouseover', 'td', function () {
	    var colIdx = table.cell(this).index().column;

	    if ( colIdx !== lastIdx ) {
		   $( table.cells().nodes() ).removeClass( 'highlight' );
		   $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
	    }
	} )
	.on( 'mouseleave', function () {
	    $( table.cells().nodes() ).removeClass( 'highlight' );
	} );

	</script>
@endsection
