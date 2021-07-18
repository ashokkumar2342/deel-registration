<div class="card card-primary table-responsive"> 
                             <table id="district_table" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr> 
                                         <th class="text-nowrap">Vill. Code</th>
                                         <th class="text-nowrap"> Vill. Name (Eng.)</th>
                                         <th class="text-nowrap">Vill. Name (Local Lang.)</th>
                                         <th class="text-nowrap">Panchayat. Name (Eng)</th>
                                         <th class="text-nowrap">Panchayat. Name (Local Lang.)</th>
                                         <th class="text-nowrap">Tehsil</th>
                                         <th class="text-nowrap">Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($Villages as $Village)
                                    <tr> 
                                         <td>{{ $Village->code }}</td>
                                         <td>{{ $Village->name_e }}</td>
                                         <td>{{ $Village->name_l }}</td>
                                         <td>{{ $Village->panchayat_e }}</td>
                                         <td>{{ $Village->panchayat_l }}</td>
                                         <td>{{ $Village->tehsil_name }}</td>
                                         <td class="text-nowrap">
                                            <a onclick="callPopupLarge(this,'{{ route('admin.Master.village.edit',$Village->id) }}')" title="Edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="#" success-popup="true" select-triger="block_select_box" onclick="callAjax(this,'{{ route('admin.Master.village.delete',$Village->id) }}')" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                         </td>
                                     </tr> 
                                    @endforeach
                                 </tbody>
                             </table>
                        </div> 