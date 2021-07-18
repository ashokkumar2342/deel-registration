<div class="card-header bg-gray" style="margin-top: 30px">
 <table class="table table-bordered">
   <thead>
     <th>Property Id</th>
     <th>Village</th>
     <th>Name</th>
     <th>Aadhar</th>
     <th>Mobile</th> 
     <th>Total Area</th> 
     <th>Built Area</th> 
     <th>Open Area</th> 
   </thead>
   <tbody>
     <td>{{$PropertyID}}</td>
     <td>{{$village_name}}</td>
     <td>{{$name}}</td>
     <td>{{$aadhar}}</td>
     <td>{{$mobile}}</td> 
     <td>{{$total_area}}</td> 
     <td>{{$built_area}}</td> 
     <td>{{$open_area}}</td> 
   </tbody>
 </table>
</div>

<div class="row" style="margin-top: 30px">
  <div class="col-lg-3 form-group">
    <label>North Side</label>
    <input type="text" name="north_side" class="form-control" value="{{$north_side}}"> 
  </div>
  <div class="col-lg-3 form-group">
    <label>South Side</label>
    <input type="text" name="south_side" class="form-control" value="{{$south_side}}"> 
  </div>
  <div class="col-lg-3 form-group">
    <label>East Side</label>
    <input type="text" name="east_side" class="form-control" value="{{$east_side}}">
  </div>
  <div class="col-lg-3 form-group">
    <label>West Side</label>
    <input type="text" name="west_side" class="form-control" value="{{$west_side}}">
  </div>
  <input type="hidden" name="property_id" id="property_id" value="{{$PropertyID}}">
  <input type="hidden" name="proses_by" id="proses_by" value="0">
  @if ($status<=1) 
      <div class="col-lg-6 form-group text-center">
         <input type="submit" class="btn btn-success form-control" value="Submit" onclick="$('#proses_by').val(1)"> 
     </div>
  @endif
  @if ($status==1) 
     <div class="col-lg-6 form-group text-center"> 
         <input type="submit" class="btn btn-danger form-control" value="Reset" onclick="$('#proses_by').val(2)">
     </div> 
  @endif
</div>
