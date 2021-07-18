<div class="col-lg-12 table-responsive"> 
<table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr> 
            <th>Sachiv Name(Eng.)</th>
            <th>Sachiv Name(Loc.)</th>
            <th>Sachiv Age</th> 
            <th>Sarpanch Name(Eng.)</th>
            <th>Sarpanch Name(Loc.)</th>
            <th>Sarpanch Age</th>
            <th>Panch1 Name(Eng.)</th>
            <th>Panch1 Name(Loc.)</th>
            <th>Panch1 Age</th>
            <th>Panch2 Name(Eng.)</th>
            <th>Panch2 Name(Log)</th>
            <th>Panch2 Age</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($GramSachivDetails as $GramSachivDetail)
        
        <tr>
             
            <td>{{ $GramSachivDetail->sachiv_name_e}}</td>
            <td>{{ $GramSachivDetail->sachiv_name_l}}</td>
            <td>{{ $GramSachivDetail->sachiv_age}}</td>
            <td>{{ $GramSachivDetail->sarpanch_name_e}}</td>
            <td>{{ $GramSachivDetail->sarpanch_name_l}}</td>
            <td>{{ $GramSachivDetail->sarpanch_age}}</td>
            <td>{{ $GramSachivDetail->panch1_name_e}}</td>
            <td>{{ $GramSachivDetail->panch1_name_l}}</td>
            <td>{{ $GramSachivDetail->panch1_age}}</td>
            <td>{{ $GramSachivDetail->panch2_name_e}}</td>
            <td>{{ $GramSachivDetail->panch2_name_l}}</td>
            <td>{{ $GramSachivDetail->panch2_age}}</td>
             
             
             
            <td class="text-nowrap"> 
                <a onclick="callPopupLarge(this,'{{ route('admin.Master.gram.sachiv.detail.edit',$GramSachivDetail->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

                <a class="btn btn-danger btn-xs" success-popup="true" select-triger="village_select_box" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.Master.gram.sachiv.detail.delete',Crypt::encrypt($GramSachivDetail->id)) }}') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></a>
                
            </td>
        </tr> 
       @endforeach
    </tbody>
</table>
</div>