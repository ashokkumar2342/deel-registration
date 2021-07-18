<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.resolution.detail.store',$ResolutionDetail->id) }}" method="post" class="add_form" button-click="btn_close" select-triger="village_select_box">
        {{ csrf_field() }}
        <div class="box-body"> 
        <div class="row"> 
            <input type="hidden" name="states" value="{{ $ResolutionDetail->states_id }}"> 
            <input type="hidden" name="district" value="{{ $ResolutionDetail->districts_id }}"> 
            <input type="hidden" name="block" value="{{ $ResolutionDetail->blocks_id }}"> 
            <input type="hidden" name="village" value="{{ $ResolutionDetail->village_id }}"> 
          <div class="col-lg-6">
            <label>Resolution No.</label>
            <input type="text" name="resolution_no" id="resolution_no" class="form-control" maxlength="50" value="{{$ResolutionDetail->resolution_no}}"> 
        </div>
        <div class="col-lg-6">
            <label>Resolution Date</label>
            <input type="date" name="resolution_date" id="resolution_date" class="form-control" value="{{$ResolutionDetail->reg_date}}"> 
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

