@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Photo Capture</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-body"> 
                <form action="{{ route('admin.property.photo.capture.store') }}" method="post" class="add_form" no-reset="true" select-triger="property_select_box">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>Property ID</label>
                            <select name="property_id" class="form-control" id="property_select_box" onchange="callAjax(this,'{{ route('admin.property.photo.capture.view') }}','image_view_div')">
                                <option selected disabled>Select Property ID</option>
                                @foreach ($Property_ids as $propertyid)
                                    <option value="{{$propertyid->id}}">{{$propertyid->property_id}}</option>
                                 @endforeach 
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Party Type</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="party_type" class="form-control">
                                <option value="1">First Party</option>
                                <option value="2">Second Party</option>
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

                        <input type="hidden" name="proses_by" id="proses_by" value="0">

                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-primary" onclick="$('#proses_by').val(0)">Save</button>
                        </div>
                        <div class="col-lg-6 form-group text-center" style="margin-top: 30px">
                            <input type="submit" class="btn btn-success form-control" value="Submit" onclick="$('#proses_by').val(1)"> 
                        </div> 
                        <div class="col-lg-6 form-group text-center" style="margin-top: 30px"> 
                            <input type="submit" class="btn btn-danger form-control" value="Reset" onclick="$('#proses_by').val(2)">
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