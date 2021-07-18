<div class="row">
    <div class="col-lg-12 form-group">
        <label for="exampleInputEmail1">Party Type</label>
        <span class="fa fa-asterisk"></span>
        <select name="party_type" class="form-control select2" id="party_select_box" select2="true" >
            <option selected disabled>Select Village</option>
            <option value="1">First Party</option> 
            <option value="3">Witness</option> 
        </select>
    </div>
                            
<div class="col-lg-4 form-group">
    <label>Name(English)</label>
    <input type="text" name="name_e" id="name_e" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-4 form-group">
    <label>Name(Local Lang.)</label>
    <input type="text" name="name_l" id="name_l" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-4 form-group">
    <label>Age</label>
    <input type="text" name="age" id="age" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-4 form-group">
    <label>Father Name(English)</label>
    <input type="text" name="fname_e" id="fname_e" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-4 form-group">
    <label>Father Name(Local Lang.)</label>
    <input type="text" name="fname_l" id="fname_e" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-4 form-group">
    <label>Relation</label>
    <select name="relation" class="form-control">
        <option selected disabled>Select Relation</option>
    @foreach ($relations as $relation)
        <option value="{{$relation->id}}">{{$relation->relation_e}}</option>
    @endforeach
    </select>
</div>
<div class="col-lg-6 form-group">
    <label>Designation(Eng.)</label>
    <input type="text" name="designation_e" id="designation_e" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-6 form-group">
    <label>Designation(Local.)</label>
    <input type="text" name="designation_l" id="designation_l" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-12 form-group">
 <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 30px">
</div>
</div>