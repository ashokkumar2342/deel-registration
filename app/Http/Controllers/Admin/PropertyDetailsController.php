<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\ReportType;
use App\Model\TmpUploadProperty;
use App\Model\RegPhotoDetail;
use App\Model\RegPartyDetail;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Excel;
use Response;
use Storage;

class PropertyDetailsController extends Controller
{
  public function photoCapture($value='')
  {
    $admin=Auth::guard('admin')->user(); 
    $Property_ids = DB::select(DB::raw("call `up_fetch_property_ID_selectbox`('$admin->id', 2);"));
    return view('admin.propertyDetails.photo_capture.index',compact('Property_ids'));
  }
  public function photoCaptureView(Request $request)
  {  
    $RegPhotoDetails=RegPhotoDetail::where('deed_detail_id',$request->id)->get();
    $RegPartyDetails=RegPartyDetail::where('party_type',2)->where('deed_detail_id',$request->id)->get();
    return view('admin.propertyDetails.photo_capture.image_view',compact('RegPhotoDetails','RegPartyDetails'));
  }
  
  public function photoCaptureDisplay(Request $request,$path)
  {  
    $path=Crypt::decrypt($path);
    $storagePath = storage_path('app/'.$path);              
    $mimeType = mime_content_type($storagePath); 
    if( ! \File::exists($storagePath)){
      return view('error.home');
    }
    $headers = array(
      'Content-Type' => $mimeType,
      'Content-Disposition' => 'inline; '
    );            
    return Response::make(file_get_contents($storagePath), 200, $headers);     
  }

  public function photoCaptureStore(Request $request)
  {
    $rules=[ 
        'property_id' => 'required', 
        'party_type' => 'required', 
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
    if($request->proses_by == 0){
      $dirpath = Storage_path() . '/app/camera_image';
      $vpath = '/camera_image/'.date('dmY').'/'.$admin->id;
      @mkdir($dirpath, 0755, true);
      $file =$request->image;
      $imagedata = file_get_contents($file);
      $encode = base64_encode($imagedata);
      $image=base64_decode($encode); 
      $name =$request->property_id.'_'.$request->party_type;
      $savepath=$vpath.'/'.$name.'.jpg';
      $image= \Storage::disk('local')->put($savepath,$image);
      DB::select(DB::raw("call `up_store_deed_photo_detail`('$admin->id','$request->property_id','$request->party_type','$savepath');"));
      $response = array();
      $response['status'] = 1;
      $response['msg'] = "Submit Successfully";
      return $response;  
    }

    $new_status = 2;
    if($request->proses_by == 1){
      $new_status = 3;
    }
    $result = DB::select(DB::raw("call `up_set_reset_deed_photo_detail`($admin->id, $request->property_id, $new_status);"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response);  
    
  }

  
    //-Last Line -----------------------------

    public function index()
    {
        $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
        return view('admin.propertyDetails.index',compact('States'));
    }

    public function store(Request $request)
    {
     	// return $request;
     	$admin=Auth::guard('admin')->user(); 
     	//Delete Previous Upload Status
     	DB::select(DB::raw("delete from `tmp_upload_property` where `user_id` = $admin->id;"));

     	//read file
     	if($request->hasFile('excel_file')){  
        	$path = $request->file('excel_file')->getRealPath();
        	$results = Excel::load($path, function($reader) {})->get(); 
        	foreach ($results as $values) {
        		// dd($values);
        		foreach ($values as $key => $value) {
        			
        			$SaveDatas= DB::select(DB::raw("call up_upload_property_excel ('$admin->id','$request->states','$request->district','$request->block','$request->village','$value->sno','$value->propertyid','$value->ownername','$value->ownernamehindi','$value->fathername','$value->owneraadhaar','$value->ownermobile','$value->totalarea','$value->builtuparea','$value->openarea','$value->pppfamilyid','$value->pppmemberid','$value->propertytype')"));   
        		}
        	}
        	$tmp_upload_propertys=TmpUploadProperty::all();
        	$response = array();
        	$response['status'] = 1;
        	$response['msg'] = 'Uploaded';
        	$response['data'] =view('admin.propertyDetails.result_data',compact('tmp_upload_propertys'))->render();
        	return response()->json($response);  
      	}
        	$response=['status'=>0,'msg'=>'File Not Select'];
            return response()->json($response); 
    }

    
     
   
    
}
