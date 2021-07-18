 
 <table class="table table-bordered">
   <thead>
     <th>Property ID</th>
     <th>Name</th>
     <th>Aadhar</th>
     <th>Mobile</th> 
     <th>Action</th> 
   </thead>
   <tbody>
    @foreach ($datas as $data)
    <tr>
     <td>{{$data->property_id}}</td>
     <td>{{$data->oname_e}}</td>
     <td>{{$data->oaadhar}}</td>
     <td>{{$data->omobile}}</td>
     <td> 
        @if ($data->status==0)
        <button class="btn btn-danger btn-xs" success-popup="true" button-click="parent_info_tab" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.deed.property.detail.delete',Crypt::encrypt($data->id)) }}') } else{console_Log('cancel') }"  >Delete</button>
        @endif 
     </td> 
         
      
    </tr>
       
    @endforeach
   </tbody>
 </table> 