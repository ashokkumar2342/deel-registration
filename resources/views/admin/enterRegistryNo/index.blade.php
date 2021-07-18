@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Entry Registry No.</h3>
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
                        <form action="{{ route('admin.deed.enter.enter.registry.no.save') }}" method="post" class="add_form"> 
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Property ID</label>
                                    <select name="property_id" class="form-control" onchange="callAjax(this,'{{ route('admin.deed.registration.deed.finalize.show') }}','show_table')">
                                        <option selected disabled>Select Property ID</option>
                                        @foreach ($Property_ids as $propertyid)
                                             <option value="{{$propertyid->id}}">{{$propertyid->property_id}}</option>
                                         @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Enter Registry No.</label>
                                    <input type="text" name="registry_no" class="form-control" maxlength="10">
                                </div>
                                <div class="col-lg-12 form-group" id="show_table">
                                    
                                </div>
                                <div class="col-lg-12 form-group"> 
                                    <input type="submit" style="margin-top: 30px" value="Save" id="btn_show" class="form-control btn btn-success"> 
                                </div> 
                            </div>
                        </form> 
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

