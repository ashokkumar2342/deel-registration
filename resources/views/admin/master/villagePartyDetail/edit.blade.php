<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.village.party.detail.store',$VillPartyDetail->id) }}" method="post" class="add_form" no-reset="true" reset-input-text="" select-triger="party_select_box" button-click="btn_close">
        {{ csrf_field() }}
        <div class="box-body"> 
        <div class="row"> 
            <input type="hidden" name="states" value="{{ $VillPartyDetail->states_id }}"> 
            <input type="hidden" name="district" value="{{ $VillPartyDetail->districts_id }}"> 
            <input type="hidden" name="block" value="{{ $VillPartyDetail->blocks_id }}"> 
            <input type="hidden" name="village" value="{{ $VillPartyDetail->village_id }}"> 
            <input type="hidden" name="party_type" value="{{ $VillPartyDetail->party_type }}"> 
          <div class="col-lg-4 form-group">
              <label>Name(English)</label>
              <input type="text" name="name_e" id="name_e" class="form-control" maxlength="50" value="{{ $VillPartyDetail->name_e }}"> 
          </div>
          <div class="col-lg-4 form-group">
              <label>Name(Local Lang.)</label>
              <input type="text" name="name_l" id="name_l" class="form-control" maxlength="50" value="{{ $VillPartyDetail->name_l }}"> 
          </div>
          <div class="col-lg-4 form-group">
              <label>Age</label>
              <input type="text" name="age" id="age" class="form-control" maxlength="50" value="{{ $VillPartyDetail->age }}"> 
          </div>
          <div class="col-lg-4 form-group">
              <label>Father Name(English)</label>
              <input type="text" name="fname_e" id="fname_e" class="form-control" maxlength="50" value="{{ $VillPartyDetail->fname_e }}"> 
          </div>
          <div class="col-lg-4 form-group">
              <label>Father Name(Local Lang.)</label>
              <input type="text" name="fname_l" id="fname_e" class="form-control" maxlength="50" value="{{ $VillPartyDetail->fname_e }}"> 
          </div>
          <div class="col-lg-4 form-group">
              <label>Relation</label>
              <select name="relation" class="form-control">
                  <option selected disabled>Select Relation</option>
              @foreach ($relations as $relation)
                  <option value="{{$relation->id}}"{{$VillPartyDetail->relation_id==$relation->id?'selected':''}}>{{$relation->relation_e}}</option>
              @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label>Designation(Eng.)</label>
              <input type="text" name="designation_e" id="designation_e" class="form-control" maxlength="50" value="{{ $VillPartyDetail->designation_e }}"> 
          </div>
          <div class="col-lg-6 form-group">
              <label>Designation(Local.)</label>
              <input type="text" name="designation_l" id="designation_l" class="form-control" maxlength="50" value="{{ $VillPartyDetail->designation_l }}"> 
          </div> 
        </div>
        </div> 
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

