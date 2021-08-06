@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Village Party Photo</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-body"> 
                <form action="{{ route('admin.Master.village.party.photo.store') }}" method="post" class="add_form" no-reset="true" reset-input-text="" select-triger="village_select_box">
                        {{ csrf_field() }}
                    <div class="row"> 
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">State</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="states" id="state_id" class="form-control select2" onchange="callAjax(this,'{{ route('admin.Master.stateWiseDistrict') }}','district_select_box')">
                            <option selected disabled>Select State</option>
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
                            <label for="exampleInputEmail1">Block</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'{{ route('admin.Master.BlockWiseVillage') }}'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                <option selected disabled>Select Block</option> 
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Village</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="village" class="form-control select2" id="village_select_box" select2="true" select-triger="party_select_box" onchange="callAjax(this,'{{ route('admin.property.village.party.photo.view') }}','image_view_div')">
                                    <option selected disabled>Select Village</option>
                                    
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="exampleInputEmail1">Party Type</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="party_type" class="form-control" id="party_select_box">
                                    <option selected disabled>Select Village</option>
                                    <option value="1">First Party</option> 
                                    <option value="3">Witness</option> 
                                </select>
                            </div>
                            <div id="image_view_div">
                            
                            </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br/>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-md-6" style="margin-top: 10px">
                            <div id="results">Your captured image will appear here...</div>
                        </div>
                        <div class="col-lg-12 form-group text-center" style="margin-top: 30px">
                            <input type="submit" class="btn btn-success form-control" value="Save"> 
                        </div> 
                        

                    </div> 
                </form>
            </div>
        </div>
    </div> 
    </section>
    @endsection
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
     
        Webcam.attach( '#my_camera' );
     
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
    @endpush