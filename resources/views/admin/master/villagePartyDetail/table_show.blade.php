<div class="col-lg-12 table-responsive"> 
<table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr> 
            <th>Party Type</th>
            <th>Name(Eng.)</th>
            <th>Name(Local.)</th>
            <th>Relation</th>
            <th>Father Name(Eng.)</th>
            <th>Father Name(Local.)</th>
            <th>Designation</th>
            <th>Designation</th>
            <th>Age</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($VillPartyDetails as $VillPartyDetail)
        
        <tr>
             
            <td>
                @if ($VillPartyDetail->party_type==1)
                    First Party
                @else
                    Witness 
                @endif
            </td>
            <td>{{ $VillPartyDetail->name_e}}</td>
            <td>{{ $VillPartyDetail->name_l}}</td>
            <td>{{ $VillPartyDetail->Relation->relation_e}}</td>
            <td>{{ $VillPartyDetail->fname_e}}</td>
            <td>{{ $VillPartyDetail->fname_l}}</td>
            <td>{{ $VillPartyDetail->designation_e}}</td>
            <td>{{ $VillPartyDetail->designation_l}}</td>
            <td>{{ $VillPartyDetail->age}}</td>
             
             
             
            <td class="text-nowrap"> 
                <a onclick="callPopupLarge(this,'{{ route('admin.Master.village.party.detail.edit',$VillPartyDetail->id) }}')" title="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

                <a class="btn btn-danger btn-xs" success-popup="true" select-triger="party_select_box" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.Master.village.party.detail.delete',Crypt::encrypt($VillPartyDetail->id)) }}') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></a>
                
            </td>
        </tr> 
       @endforeach
    </tbody>
</table>
</div>