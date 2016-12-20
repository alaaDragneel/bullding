@if(Session::has('fail'))
     <script type="text/javascript">
     swal({
          title: "faild",
          text: "{{ Session::get('fail') }}",
          timer: 2000,
          showConfirmButton: false
     });
     </script>
@endif

@if(Session::has('success'))
     <script type="text/javascript">
     swal({
          type: "success",
          title: "{{ Session::get('success') }}",
          text: "Successfully this message will disappear after 4s",
          timer: 4000,
          showConfirmButton: false
     });
     </script>
@endif
