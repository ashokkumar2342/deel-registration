@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Deed Download</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                        <form action="{{ route('admin.deed.registration.deed.download.show') }}" method="post" class="add_form" no-reset="true" success-content-id="show_table"> 
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group"> 
                                    <input type="submit" style="margin-top: 30px" value="Show" id="btn_show" class="form-control btn btn-primary"> 
                                </div> 
                            </div>
                        </form> 
                        <div class="col-lg-12 form-group" id="show_table">
                            
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

