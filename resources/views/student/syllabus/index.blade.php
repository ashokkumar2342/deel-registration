  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">     
      <h1>Syllabus <small>List</small> </h1>       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body"> 
                <div class="row">
                  <div class="col-xs-12">    
                      
                  </div>
                </div>
             </div>
        </div>    
      </section>
      <!-- /.content -->

  @endsection
  @push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

  @endpush
  @push('scripts')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
          $('#class_fee_details_data_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   