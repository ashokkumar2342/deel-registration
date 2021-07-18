<table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
             
            <th>Resolution No.</th>
            <th>Date</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($ResolutionDetails as $ResolutionDetail)
        
        <tr>
             
            <td>{{ $ResolutionDetail->resolution_no}}</td>
            <td>{{ date('d-m-Y',strtotime($ResolutionDetail->reg_date))}}</td>
             
             
            <td class="text-nowrap"> 
                <a onclick="callPopupLarge(this,'{{ route('admin.Master.resolution.edit',$ResolutionDetail->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

                <a class="btn btn-danger btn-xs" success-popup="true" select-triger="village_select_box" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.Master.resolution.delete',Crypt::encrypt($ResolutionDetail->id)) }}') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></a>
                
            </td>
        </tr> 
       @endforeach
    </tbody>
</table>