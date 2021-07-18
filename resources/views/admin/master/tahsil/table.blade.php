<table id="block_datatable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>State</th>
            <th>District</th>
            <th>Code</th>
            <th>Name (English)</th>
            <th>Name (Local Language)</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($Tahsils as $Tahsil)
        
        <tr>
             
            <td>{{ $Tahsil->state_name}}</td>
            <td>{{ $Tahsil->disrict_name}}</td>
            <td>{{ $Tahsil->code }}</td>
            <td>{{ $Tahsil->name_e }}</td>
            <td>{{ $Tahsil->name_l }}</td>
             
            <td class="text-nowrap"> 
                <a onclick="callPopupLarge(this,'{{ route('admin.Master.TehsilEdit',$Tahsil->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                <a href="{{ route('admin.Master.TehsilDelete',Crypt::encrypt($Tahsil->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
        </tr> 
       @endforeach
    </tbody>
</table>