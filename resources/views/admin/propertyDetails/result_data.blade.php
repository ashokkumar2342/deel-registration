<div class="col-lg-12">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i>Import Successfully</h5> 
    </div>
</div> 
<table class="table" id="_imported_datatable">
	<thead>
	   <tr>  
	       <th>Prno</th>
	       <th>Property Id</th>
	       <th>Remarks</th>
	        
	   </tr>
	</thead>
	<tbody>
	@foreach ($tmp_upload_propertys as $tmp_upload_property) 
	   <tr style="{{ $tmp_upload_property->upload_status==2?'background-color: #b1333f':'' }}"> 
	       <td>{{ $tmp_upload_property->srno }}</td>
	       <td>{{ $tmp_upload_property->property_id }}</td>
	       <td>{{ $tmp_upload_property->remarks }}</td>
	        
	       
	        
	   </tr>
	@endforeach
	</tbody>
</table>