<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.gram.sachiv.detail.store',$GramSachivDetail->id) }}" method="post" class="add_form" button-click="btn_close" select-triger="village_select_box">
        {{ csrf_field() }}
        <div class="box-body"> 
        <div class="row"> 
            <input type="hidden" name="states" value="{{ $GramSachivDetail->states_id }}"> 
            <input type="hidden" name="district" value="{{ $GramSachivDetail->districts_id }}"> 
            <input type="hidden" name="block" value="{{ $GramSachivDetail->blocks_id }}"> 
            <input type="hidden" name="village" value="{{ $GramSachivDetail->village_id }}"> 
          <div class="col-lg-4">
              <label>Sachiv Name E</label>
              <input type="text" name="sachiv_name_e" id="sachiv_name_e" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sachiv_name_e }}"> 
          </div>
          <div class="col-lg-4">
              <label>Sachiv Name L</label>
              <input type="text" name="sachiv_name_l" id="sachiv_name_l" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sachiv_name_l }}"> 
          </div>
          <div class="col-lg-4">
              <label>Sachiv Age</label>
              <input type="text" name="sachiv_age" id="sachiv_age" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sachiv_age }}"> 
          </div>
          <div class="col-lg-4">
              <label>Sarpanch Name E</label>
              <input type="text" name="sarpanch_name_e" id="sarpanch_name_e" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sarpanch_name_e }}"> 
          </div>
          <div class="col-lg-4">
              <label>Sarpanch Name L</label>
              <input type="text" name="sarpanch_name_l" id="sarpanch_name_l" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sarpanch_name_l }}"> 
          </div>
          <div class="col-lg-4">
              <label>Sarpanch Age</label>
              <input type="text" name="sarpanch_age" id="sarpanch_age" class="form-control" maxlength="50" value="{{ $GramSachivDetail->sarpanch_age }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch1 Name E</label>
              <input type="text" name="panch1_name_e" id="panch1_name_e" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch1_name_e }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch1 Name L</label>
              <input type="text" name="panch1_name_l" id="panch1_name_l" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch1_name_l }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch1 Age</label>
              <input type="text" name="panch1_age" id="panch1_age" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch1_age }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch2 Name E</label>
              <input type="text" name="panch2_name_e" id="panch2_name_e" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch2_name_e }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch2 Name L</label>
              <input type="text" name="panch2_name_l" id="panch2_name_l" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch2_name_l }}"> 
          </div>
          <div class="col-lg-4">
              <label>Panch2 Age</label>
              <input type="text" name="panch2_age" id="panch2_age" class="form-control" maxlength="50" value="{{ $GramSachivDetail->panch2_age }}"> 
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

