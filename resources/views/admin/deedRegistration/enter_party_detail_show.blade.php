<div class="card" style="margin-top: 30px">
  <div class="card-header defalt">
    <h3 class="card-title"><b>First Party Detail</b></h3>
  </div>
  <table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>  
            <th>Name</th>
            <th>Designation</th>
            <th>Age</th> 
        </tr>
    </thead>
    <tbody>
      @foreach ($first_party as $RegPartyDetail)
        <tr>
          <td>{{$RegPartyDetail->name_e}} - {{$RegPartyDetail->name_l}} {{$RegPartyDetail->relation_e}} {{$RegPartyDetail->fname_e}} - {{$RegPartyDetail->fname_l}}</td>
          <td>{{$RegPartyDetail->designation_e}} - {{$RegPartyDetail->designation_l}}</td>
          <td>{{$RegPartyDetail->age}}</td>
        </tr>
      @endforeach 
    </tbody>
  </table>
</div>
<div class="card" style="margin-top: 30px">
  <div class="card-header">
    <h3 class="card-title">Second Party Detail</h3>
  </div>
  <table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>  
            <th>Name</th>
            <th>Relation</th>
            <th>Relation Name (E)</th> 
            <th>Relation Name (H)</th> 
            <th></th> 
        </tr>
    </thead>
    <tbody>
      @foreach ($second_party as $RegPartyDetail)
        <tr>
          <td>{{$RegPartyDetail->name_e}} - {{$RegPartyDetail->name_l}}</td>
          <td>
            <select class="form-control" name="relation" id="relation">
              @foreach ($relations as $relation)
                <option value="{{$relation->id}}" {{$relation->id==$RegPartyDetail->relation_id?'selected':''}}>{{$relation->relation_e}}</option>
              @endforeach
            </select>
          </td>
          <td>{{$RegPartyDetail->fname_e}}</td>
          <td>
            <input type="text" name="fname_l" class="form-control" id="fname_l" value="{{$RegPartyDetail->fname_l}}">
          </td>
          <td>
            <a href="#" class="btn btn-info" success-popup="true" button-click="btn_show" onclick="callAjax(this,'{{ route('admin.deed.registration.enter.party.detail.save',$RegPartyDetail->id) }}'+'?fname_l='+$('#fname_l').val()+'&relation='+$('#relation').val())">Save</a>
          </td>
        </tr>
      @endforeach 
    </tbody>
  </table>
</div> 
<div class="card" style="margin-top: 30px">
  <div class="card-header">
    <h3 class="card-title">Witness Detail</h3>
  </div>
  <table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>  
            <th>Name</th>
            <th>Designation</th>
            <th>Age</th> 
        </tr>
    </thead>
    <tbody>
      @foreach ($witness_party as $RegPartyDetail)
        <tr>
          <td>{{$RegPartyDetail->name_e}} - {{$RegPartyDetail->name_l}} {{$RegPartyDetail->relation_e}} {{$RegPartyDetail->fname_e}} - {{$RegPartyDetail->fname_l}}</td>
          <td>{{$RegPartyDetail->designation_e}} - {{$RegPartyDetail->designation_l}}</td>
          <td>{{$RegPartyDetail->age}}</td>
        </tr>
      @endforeach 
    </tbody>
  </table>
</div>
<div class="row"> 

  <input type="hidden" name="proses_by" id="proses_by" value="0"> 
  <input type="hidden" name="deed_detail_id" id="deed_detail_id" value="{{$deed_detail_id}}"> 
    @if ($deed_status == 1 || $deed_status == 2)
      <div class="col-lg-6 form-group text-center">
        <input type="submit" class="btn btn-success form-control" value="Submit" onclick="$('#proses_by').val(1)"> 
      </div> 
    @endif
    @if($deed_status == 2)
      <div class="col-lg-6 form-group text-center"> 
        <input type="submit" class="btn btn-danger form-control" value="Reset" onclick="$('#proses_by').val(2)">
      </div>
    @endif
     
</div>
  