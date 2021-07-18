@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Deed Finalize</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                        <form action="{{ route('admin.deed.registration.deed.finalize.store') }}" method="post" class="add_form" no-reset="true"> 
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label>Property ID</label>
                                    <select name="property_id" class="form-control" onchange="callAjax(this,'{{ route('admin.deed.registration.deed.finalize.show') }}','show_table')">
                                        <option selected disabled>Select Property ID</option>
                                        @foreach ($Property_ids as $propertyid)
                                             <option value="{{$propertyid->id}}">{{$propertyid->property_id}}</option>
                                         @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group" id="show_table">
                                    
                                </div>
                                <div class="col-lg-12 form-group"> 
                                    <input type="submit" style="margin-top: 30px" value="Deed Finalize" id="btn_show" class="form-control btn btn-primary"> 
                                </div> 
                            </div>
                        </form> 
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

