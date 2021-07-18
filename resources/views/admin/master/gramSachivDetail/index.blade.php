@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Gram Sachiv Detail</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.Master.gram.sachiv.detail.store') }}" method="post" class="add_form" no-reset="true" reset-input-text="sachiv_name_e,sachiv_name_l,sachiv_age,sarpanch_name_e,sarpanch_name_l,sarpanch_age,panch1_name_e,panch1_name_l,panch1_age,panch2_name_e,panch2_name_l,panch2_age" select-triger="village_select_box"> 
                            <div class="row"> 
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">States</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="states" id="state_id" class="form-control select2" onchange="callAjax(this,'{{ route('admin.Master.stateWiseDistrict') }}','district_select_box')">
                            <option selected disabled>Select States</option>
                            @foreach ($States as $State)
                            <option value="{{ $State->id }}">{{ $State->code }}--{{ $State->name_e }}</option>  
                            @endforeach
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">District</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')">
                            <option selected disabled>Select District</option>
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">Block MCS</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'{{ route('admin.Master.BlockWiseVillage') }}'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                <option selected disabled>Select Block MCS</option> 
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Village</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="village" class="form-control select2" id="village_select_box" select2="true" onchange="callAjax(this,'{{ route('admin.Master.gram.sachiv.detail.table.show') }}','table_show_div')">
                                    <option selected disabled>Select Village</option>
                                    
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Sachiv Name(English)</label>
                                <input type="text" name="sachiv_name_e" id="sachiv_name_e" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Sachiv Name(Local Lang.)</label>
                                <input type="text" name="sachiv_name_l" id="sachiv_name_l" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Sachiv Age</label>
                                <input type="text" name="sachiv_age" id="sachiv_age" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Sarpanch Name(English)</label>
                                <input type="text" name="sarpanch_name_e" id="sarpanch_name_e" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Sarpanch Name(Local Lang.)</label>
                                <input type="text" name="sarpanch_name_l" id="sarpanch_name_l" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Sarpanch Age</label>
                                <input type="text" name="sarpanch_age" id="sarpanch_age" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch1 Name(English)</label>
                                <input type="text" name="panch1_name_e" id="panch1_name_e" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch1 Name(Local Lang.)</label>
                                <input type="text" name="panch1_name_l" id="panch1_name_l" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch1 Age</label>
                                <input type="text" name="panch1_age" id="panch1_age" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch2 Name(English)</label>
                                <input type="text" name="panch2_name_e" id="panch2_name_e" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch2 Name(Local Lang.)</label>
                                <input type="text" name="panch2_name_l" id="panch2_name_l" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-4">
                                <label>Panch2 Age</label>
                                <input type="text" name="panch2_age" id="panch2_age" class="form-control" maxlength="50"> 
                            </div>
                            
                            <div class="col-lg-12 form-group">
                             <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 30px">
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px"> 
                            
                             </div>
                            </div>
                        </form>  
                    <div id="table_show_div">
                        
                    </div> 
                    </div>
                </div>
            </div> 
        </div> 
    </section>
    @endsection
    @push('scripts')
    <script type="text/javascript"> 
        $('#district_datatable').DataTable();
    </script>
    @endpush 

