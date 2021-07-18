<table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr> 
            <th>Property ID</th>
            <th>Property Detail</th>  
            <th>Party Detail</th>
            <th>Photo Detail</th>
            <th>Deed Final</th>
            <th>Registry No.</th>
            <th>Scan Upload</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($statusShows as $statusShow)
        
        <tr>
             
            <td>{{ $statusShow->property_id}}</td>
            @for ($counter = 1; $counter<=$statusShow->status ; $counter++)
                <td class="text-nowrap"> 
                    <a href="#" class="btn btn-xs btn-danger" success-popup="true" button-click="btn_show" title="Reset" onclick="if (confirm('Are you Sure to reset Status')){callAjax(this,'{{ route('admin.report.status.delete',[$statusShow->id,$counter]) }}') } else{console_Log('cancel') }">Delete</a> 
                </td>
            @endfor
            @for ($counter; $counter<= 6; $counter++)
                <td class="text-nowrap"> 
                    &nbsp; 
                </td>
            @endfor 
            
        </tr> 
       @endforeach
    </tbody>
</table>