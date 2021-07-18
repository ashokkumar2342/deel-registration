<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\ReportType;
use App\Model\TmpUploadProperty;
use App\Model\RegPhotoDetail;
use App\Model\PropertyDetail;
use App\Model\RegPartyDetail;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Excel;

class DeedRegistrationController extends Controller
{
  public function propertyDetailShow($value='')
  {
    $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
    return view('admin.deedRegistration.show_property_detail' ,compact('States'));
  }

  public function propertyDetailShowPost(Request $request)
  {
    $datas=PropertyDetail::where('village_id',$request->village)->get();
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.deedRegistration.show_property_detail_result',compact('datas'))->render();
    return response()->json($response);
  }
  
  public function propertyDetailDelete($id)
  {
    $id=Crypt::decrypt($id);
    $datas=PropertyDetail::find($id);
    $datas->delete();
    $response=['status'=>1,'msg'=>'Record Deleted Successfully'];
    return response()->json($response);  
  }
  
  public function propertyDetail_entry()
  {
    return view('admin.deedRegistration.enter_property_detail');
  }

  public function show_propertyDetail(Request $request)
  {
     
    $admin=Auth::guard('admin')->user(); 
    $datas = DB::select(DB::raw("call `up_fetch_property_detail`('$admin->id', '$request->property_id');"));
    $total_record = count($datas);
    
    $idProperty = '';
    $PropertyID = '';
    $name = '';
    $aadhar = '';
    $mobile = '';
    $total_area = '';
    $built_area = '';
    $open_area = '';
    $north_side = '';
    $south_side = '';
    $east_side = '';
    $west_side = '';
    $status = 2;
    $village_name = '';

    if($total_record>0){
      $idProperty = $datas[0]->id;
      $PropertyID = $datas[0]->property_id;
      $name = $datas[0]->oname_e;
      $aadhar = $datas[0]->oaadhar;
      $mobile = $datas[0]->omobile;
      $total_area = $datas[0]->total_area;
      $built_area = $datas[0]->built_area;
      $open_area = $datas[0]->open_area;
      $north_side = $datas[0]->north_side;
      $south_side = $datas[0]->south_side;
      $east_side = $datas[0]->east_side;
      $west_side = $datas[0]->west_side;
      $status = $datas[0]->status;
      $village_name = $datas[0]->name_e;
    }

    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.deedRegistration.enter_property_detail_form',compact('total_record', 'idProperty', 'PropertyID', 'name', 'aadhar', 'mobile', 'total_area', 'built_area', 'open_area', 'north_side', 'south_side', 'east_side', 'west_side', 'village_name', 'status'))->render();
    return response()->json($response); 
     
  }
  public function deedPropertyDetailStore(Request $request)
  {
    $admin=Auth::guard('admin')->user(); 
    
    if($request->proses_by == 1){
      DB::select(DB::raw("call `up_store_deed_property_detail`('$admin->id', '$request->property_id', '$request->north_side', '$request->south_side', '$request->east_side', '$request->west_side');"));   
      $response=['status'=>1,'msg'=>'Property Detail Submit Successfully'];
    }elseif($request->proses_by == 2){
      DB::select(DB::raw("call `up_reset_deed_property_detail`('$admin->id', '$request->property_id');"));
      $response=['status'=>1,'msg'=>'Property Detail Reset Successfully'];
    }
    return response()->json($response);
  }


  public function enterPartyDetail($value='')
  {
    $admin=Auth::guard('admin')->user(); 
    $Property_ids = DB::select(DB::raw("call `up_fetch_property_ID_selectbox`('$admin->id', 1);"));
    return view('admin.deedRegistration.enter_party_detail' ,compact('Property_ids'));
  }
  

  public function enterPartyDetailShow(Request $request)
  {
     
    $admin=Auth::guard('admin')->user();
    $deed_detail_id = $request->property_id;
    $data = DB::select(DB::raw("select `status` From `deed_detail` where `id` = $request->property_id;"));
    $first_party = DB::select(DB::raw("select * from `reg_party_detail` `rpd` inner join `relation` `rl` on `rl`.`id` = `rpd`.`relation_id` where `rpd`.`deed_detail_id` = $deed_detail_id and `rpd`.`party_type` = 1 order by `rpd`.`srno`;"));
    $second_party = DB::select(DB::raw("select * from `reg_party_detail` where `deed_detail_id` = $request->property_id and `party_type` =  2;"));
    $witness_party = DB::select(DB::raw("select * from `reg_party_detail` `rpd` inner join `relation` `rl` on `rl`.`id` = `rpd`.`relation_id` where `rpd`.`deed_detail_id` = $deed_detail_id and `rpd`.`party_type` = 3 order by `rpd`.`srno`;"));
    $relations = DB::select(DB::raw("select * from `relation` order by `id`;"));
    $deed_status = $data[0]->status;
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.deedRegistration.enter_party_detail_show',compact('first_party', 'second_party', 'witness_party', 'relations', 'deed_detail_id', 'deed_status'))->render();
    return response()->json($response); 
     
  }
  
  public function enterPartyDetailSave(Request $request,$id)
  {
    $rules=[ 
          'relation' => 'required', 
    ]; 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }
    $datas=RegPartyDetail::find($id);
    $datas->fname_l=$request->fname_l;
    $datas->relation_id=$request->relation;
    $datas->save();
    $response=['status'=>1,'msg'=>'Save Successfully'];
    return response()->json($response); 
  }
  
  public function enterPartyDetailStore(Request $request)
  {
    
    $new_status = 1;
    if($request->proses_by == 1){
      $new_status = 2;
    }
    $admin=Auth::guard('admin')->user();
    $result = DB::select(DB::raw("call `up_store_deed_party_detail`($admin->id, $request->deed_detail_id, $new_status);"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response);  
  }

  public function deedFinalize()
  {
    $admin=Auth::guard('admin')->user(); 
    $Property_ids = DB::select(DB::raw("call `up_fetch_property_ID_selectbox`('$admin->id',3);"));
    return view('admin.deedFinalize.index' ,compact('Property_ids'));
  }
  
  public function deedFinalizeShow(Request $request)
  {
    $admin=Auth::guard('admin')->user(); 
    $RegPartyDetails=RegPartyDetail::where('party_type',2)->where('deed_detail_id',$request->id)->get();
    return view('admin.deedFinalize.show' ,compact('RegPartyDetails'));
  }


  public function deedFinalizeStore(Request $request)
  {
    $rules=[ 
          'property_id' => 'required', 
    ]; 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }

    $admin=Auth::guard('admin')->user();

    $deed_id = $request->property_id;
    $deed_detail = DB::select(DB::raw("select * from `deed_detail` where `id` = $deed_id;"));
    $village_id = $deed_detail[0]->village_id;
    $village = DB::select(DB::raw("select * from `villages` where `id` = $village_id;"));

    $tehsil_id = $deed_detail[0]->tehsil_id;
    $tehsil = DB::select(DB::raw("select * from `tehsils` where `id` = $tehsil_id;"));

    $block_id = $deed_detail[0]->blocks_id;
    $block = DB::select(DB::raw("select * from `blocks_mcs` where `id` = $block_id;"));

    $distric_id = $deed_detail[0]->districts_id;
    $district = DB::select(DB::raw("select * from `districts` where `id` = $distric_id;"));

    $resolution = DB::select(DB::raw("select * from `resolution_detail` where `village_id` = $village_id;"));
    $fisrtparty = DB::select(DB::raw("select * from `reg_party_detail` `rpd` inner join `relation` `rl` on `rl`.`id` = `rpd`.`relation_id` where `rpd`.`deed_detail_id` = $deed_id and `rpd`.`party_type` = 1 order by `rpd`.`srno`;"));
    $secondparty = DB::select(DB::raw("select * from `reg_party_detail` `rpd` inner join `relation` `rl` on `rl`.`id` = `rpd`.`relation_id` where `deed_detail_id` = $deed_id and `party_type` = 2 order by `srno`;"));
    $witness = DB::select(DB::raw("select * from `reg_party_detail` `rpd` inner join `relation` `rl` on `rl`.`id` = `rpd`.`relation_id` where `rpd`.`deed_detail_id` = $deed_id and `rpd`.`party_type` = 3 order by `rpd`.`srno`;"));
    // dd($witness);
    $c_property_id = $deed_detail[0]->property_id;
    $propertyDetail=DB::select(DB::raw("select * from `property_detail` where `property_id` = '$c_property_id' limit 1;"));

    $RegPhotoDetails=DB::select(DB::raw("select * from `reg_photo_detail` where `deed_detail_id` = $deed_id order by `party_type`;"));
    

    $path=Storage_path('fonts/');
    $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir']; 
    $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata']; 
    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
             __DIR__ . $path,
        ]),
        'fontdata' => $fontData + [
             'frutiger' => [
                 'R' => 'FreeSans.ttf',
                 'I' => 'FreeSansOblique.ttf',
             ]
        ],
        'default_font' => 'freesans',
        'pagenumPrefix' => '',
        'pagenumSuffix' => '',
        'nbpgPrefix' => ' कुल ',
        'nbpgSuffix' => ' पृष्ठों का पृष्ठ'
    ]);


    $html = view('admin.deedFinalize.pdf_page',compact('c_property_id', 'RegPhotoDetails', 'village', 'tehsil', 'district', 'resolution', 'fisrtparty', 'secondparty', 'witness', 'propertyDetail', 'block')); 
    $mpdf->WriteHTML($html);


    $documentUrl = Storage_path() . '/app/deedFinalize/'.date('dmY').'/'.$admin->id;   
    @mkdir($documentUrl, 0755, true);  
    $mpdf->Output($documentUrl.'/'.$c_property_id.'.pdf', 'F');

    $file_path = '/deedFinalize/'.date('dmY').'/'.$admin->id.'/'.$c_property_id.'.pdf';
    $reg_date = date('Y-m-d');
    $result = DB::select(DB::raw("call `up_deed_finalize`($admin->id, $deed_id, '$file_path', '$reg_date');"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response); 
  }

  public function deedDownload()
  {
    return view('admin.deedDownload.index');
  }

  public function deedDownloadShow(Request $request)
  {
    $admin=Auth::guard('admin')->user();
    $deed_list = DB::select(DB::raw("call `up_fetch_deed_sale_datewise`($admin->id, '$request->date');"));
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.deedDownload.table_show',compact('deed_list'))->render();
    return response()->json($response);
  }

  public function deedDownloadPdf(Request $request,$path)
  {
    $deed_list = DB::select(DB::raw("select `deed_path` from `deed_detail` where `id` = $path;"));
    $documentUrl = Storage_path() . '/app'. $deed_list[0]->deed_path; 
    // dd($documentUrl);
    return response()->file($documentUrl);
  }


  public function enterRegistryNo()
  {
    $admin=Auth::guard('admin')->user(); 
    $Property_ids = DB::select(DB::raw("call `up_fetch_property_ID_selectbox`('$admin->id', 4);"));
    return view('admin.enterRegistryNo.index' ,compact('Property_ids'));
  }


  public function enterRegistryNoSave(Request $request)
  {
    $rules=[ 
          'property_id' => 'required', 
          'registry_no' => 'required', 
    ]; 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    } 
    $admin=Auth::guard('admin')->user();
    $result = DB::select(DB::raw("call `up_deed_update_regno`($admin->id, $request->property_id, '$request->registry_no');"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response);
  }

  public function uploadScanDeed($value='')
  {
    $admin=Auth::guard('admin')->user(); 
    $Property_ids = DB::select(DB::raw("call `up_fetch_property_ID_selectbox`('$admin->id', 5);"));
    return view('admin.uploadScanDeed.index' ,compact('Property_ids'));
  }

  public function uploadScanDeedStore(Request $request)
  {
    $admin=Auth::guard('admin')->user();
    $dirpath = Storage_path() . '/app/uploadScanDeed';
    $vpath = '/uploadScanDeed/'.date('dmY');
    @mkdir($dirpath, 0755, true);
    $file =$request->deed_file;
    $imagedata = file_get_contents($file);
    $encode = base64_encode($imagedata);
    $image=base64_decode($encode); 
    
    $deed_id = $request->property_id;
    $deed_detail = DB::select(DB::raw("select * from `deed_detail` where `id` = $deed_id;"));
    $c_property_id = $deed_detail[0]->property_id;

    $district = DB::select(DB::raw("select * from `districts` where `id` = $deed_detail[0]->districts_id;"));
    $block = DB::select(DB::raw("select * from `blocks_mcs` where `id` = $deed_detail[0]->blocks_id;"));
    $village = DB::select(DB::raw("select * from `villages` where `id` = $deed_detail[0]->village_id;"));
    
    $savepath=$vpath.'/'.$district[0]->name_e.'/'.$block->name_e.'/'.$village->name_e.'/'.$c_property_id.'.pdf';
    $image= \Storage::disk('local')->put($savepath,$image);

    $scan_date = date('Y-m-d');
    $result = DB::select(DB::raw("call `up_deed_upload_scandeed`($admin->id, $deed_id, '$savepath', '$scan_date');"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response); 
  }
  //--Last Line -------------------
      
}
