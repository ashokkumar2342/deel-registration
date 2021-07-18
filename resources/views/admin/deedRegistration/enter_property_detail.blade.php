@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Entry Property Details</h3>
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
                        <form action="{{ route('admin.deed.registration.show_PropertyDetail') }}" method="post" class="add_form" success-content-id="property_data_result" no-reset="true"  data-table-without-pagination="_imported_datatable"> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Enter Property Detail</label>
                                    <input type="text" name="property_id" class="form-control"> 
                                </div>
                                <div class="col-lg-6"> 
                                    <input type="submit" style="margin-top: 30px" value="Show" id="property_show" class="form-control btn btn-success"> 
                                </div> 
                            </div>
                        </form> 
                        <form action="{{ route('admin.deed.propertydetail.store') }}" method="post" class="add_form" button-click="property_show">
                            {{csrf_field()}}  
                        <div id="property_data_result">
                        
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

