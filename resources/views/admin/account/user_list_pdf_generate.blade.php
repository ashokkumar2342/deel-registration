<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style>
        @page { margin:0px; }

        .pagenum:before {
            content: counter(page);
        }

    </style>
    @include('admin.include.boostrap')
</head> 
<body>
    <div class="row">
        <div class="col-lg-10" style="margin-left: 60px">
            <table id="dataTable" class="table table-striped table-hover table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Sr.No.</th> 
                        <th>Name</th>
                        <th>User Id</th>
                        <th>Mobile No.</th> 
                        <th class="text-nowrap">Status</th>
                        <th>Role</th> 
                    </tr>
                </thead>
                <tbody>
                    @php
                    $arrayId=1; 
                    @endphp
                    @foreach($accounts as $account)

                    <tr>
                        <td>{{ $arrayId ++ }}</td> 
                        <td>{{ $account->first_name }} {{ $account->last_name}}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->mobile }}</td> 
                        <td>{{ $account->status }}</td>
                        <td>{{ $account->name }}</td> 
                    </tr> 
                    @endforeach
                </table>

            </div> 
        </div>
        <div class="col-lg-4">
          <h5>
            Total Record :
            <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span> 
          </h5>
        </div> 
        <div class="col-lg-4">
          <h5>
            Total Pages :
            <b><span class="pagenum" style="margin-top: 20px"></span></b> 
          </h5>
        </div>
        <div class="col-lg-4">
          <h5>
            End of Reports/Pages :
             
          </h5>
        </div>
       
             
    </body>

    </html>