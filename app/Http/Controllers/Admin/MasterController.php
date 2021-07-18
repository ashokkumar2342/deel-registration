<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\State;

use App\Model\BlockMc;
use App\Model\BlocksMc;
use App\Model\District;
use App\Model\Gender;
use App\Model\Village;
use App\Model\Tehsil;
use App\Model\ResolutionDetail;
use App\Model\GramSachivDetail;
use App\Model\VillPartyDetail;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PDF;

class MasterController extends Controller
{ 
   
  public function showStates()
  { 
    try 
    {
      $States= State::orderBy('name_e','ASC')->get();   
      return view('admin.master.states.index',compact('States'));
    } catch (Exception $e) {}
  }

  public function editState($id)
  { 
    try {  
      $States= State::find($id);   
      return view('admin.master.states.edit',compact('States'));
    } catch (Exception $e) {}
  }


  public function storeState(Request $request,$id=null)
  {  
    $rules=[
      'code' => 'required|unique:states,code,'.$id, 
      'name_english' => 'required', 
      'name_local_language' => 'required', 
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $response=array();
      $response["status"]=0;
      $response["msg"]=$errors[0];
      return response()->json($response);// response as json
    }
    else {
      $States= State::firstOrNew(['id'=>$id]);
      $States->code=$request->code;
      $States->name_e=$request->name_english;
      $States->name_l=$request->name_local_language; 
      $States->save();
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
    }
  }
    
  public function deleteState($id)
  {
    $States= State::find(Crypt::decrypt($id));  
    $States->delete();
    return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
  }


  public function districts(Request $request)
  {
    try {
      $States= State::orderBy('name_e','ASC')->get();   
      return view('admin.master.districts.index',compact('States'));
    } catch (Exception $e) {}
  }
  
  public function DistrictsTable(Request $request)
  {
    $Districts= District::where('state_id',$request->id)->orderBy('name_e','ASC')->get();
    return view('admin.master.districts.district_table',compact('Districts'));
  }
  
  public function districtsEdit($id)
  {
    try {
      $Districts= District::find($id); 
      return view('admin.master.districts.edit',compact('Districts'));
    } catch (Exception $e) {}
  }
      
  public function districtsStore(Request $request,$id=null)
  {  
    $rules=[         
      'code' => 'required|unique:districts,code,'.$id, 
      'name_english' => 'required', 
      'name_local_language' => 'required',       
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $response=array();
      $response["status"]=0;
      $response["msg"]=$errors[0];
      return response()->json($response);// response as json
    }
    
    $district=District::firstOrNew(['id'=>$id]); 
    if (empty($id)) {
      $district->state_id=$request->states;
    }
    $district->code=$request->code;
    $district->name_e=$request->name_english;
    $district->name_l=$request->name_local_language;
    $district->save(); 
    $response=['status'=>1,'msg'=>'Submit Successfully'];
    return response()->json($response);
  }
  
  public function districtsDelete($id)
  {
    $District= District::find(Crypt::decrypt($id));  
    $District->delete();
    return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
  }  
  

  public function BlockMCS(Request $request)
  {
    try {
      $States= State::orderBy('name_e','ASC')->get();      
      return view('admin.master.block.index',compact('States'));
    } catch (Exception $e) {}
  } 
  
  public function BlockMCSTable(Request $request)
  { 
    $BlocksMcs =DB::select(DB::raw("select `bl`.`id`, `st`.`name_e` as `state_name`, `dis`.`name_e` as `disrict_name`, `bl`.`code`, `bl`.`name_e`, `bl`.`name_l` from `blocks_mcs` `bl` inner join `districts` `dis` on `dis`.`id` =`bl`.`districts_id` inner join `states` `st` on `st`.`id` = `bl`.`states_id` where `bl`.`districts_id` = $request->district_id order by `bl`.`name_e`")); 
    return view('admin.master.block.block_table',compact('BlocksMcs'));
  } 

  public function BlockMCSStore(Request $request,$id=null)
  {   
    $rules=[         
      'district' => 'required', 
      'code' => 'required|unique:blocks_mcs,code,'.$id, 
      'name_english' => 'required', 
      'name_local_language' => 'required',        
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $response=array();
      $response["status"]=0;
      $response["msg"]=$errors[0];
      return response()->json($response);// response as json
    }

    $BlocksMc= BlocksMc::firstOrNew(['id'=>$id]); 
    if (empty($id)) {
      $BlocksMc->states_id=$request->states;
      $BlocksMc->districts_id=$request->district; 
    }
    $BlocksMc->code=$request->code;
    $BlocksMc->name_e=$request->name_english;
    $BlocksMc->name_l=$request->name_local_language; 
    $BlocksMc->save(); 
    $response=['status'=>1,'msg'=>'Submit Successfully'];
    return response()->json($response);
  }
  
  public function BlockMCSEdit($id)
  {
    try { 
      $Districts= District::orderBy('name_e','ASC')->get(); 
      $BlocksMcs= BlocksMc::find($id);  
      return view('admin.master.block.edit',compact('BlocksMcs'));
    } catch (Exception $e) {}
  }
  
  public function BlockMCSDelete($id)
  {
    $BlocksMc= BlocksMc::find(Crypt::decrypt($id));  
    $BlocksMc->delete();
    return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
  }
        
  public function tahsil($value='')
  {
    try {      
      $States= State::orderBy('name_e','ASC')->get();      
      return view('admin.master.tahsil.index',compact('States'));
    } catch (Exception $e) {}
  }

  public function tahsilTable(Request $request)
  {  
    $Tahsils =DB::select(DB::raw("select `bl`.`id`, `st`.`name_e` as `state_name`, `dis`.`name_e` as `disrict_name`, `bl`.`code`, `bl`.`name_e`, `bl`.`name_l` from `tehsils` `bl` inner join `districts` `dis` on `dis`.`id` =`bl`.`districts_id` inner join `states` `st` on `st`.`id` = `bl`.`states_id` where `bl`.`districts_id` = $request->district_id order by `bl`.`name_e`")); 
    return view('admin.master.tahsil.table',compact('Tahsils'));
  }
    
  public function tahsilStore(Request $request,$id=null)
  {   
    $rules=[         
      'district' => 'required', 
      'code' => 'required|unique:tehsils,code,'.$id, 
      'name_english' => 'required', 
      'name_local_language' => 'required',        
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $response=array();
      $response["status"]=0;
      $response["msg"]=$errors[0];
      return response()->json($response);// response as json
    }

    $Tehsil= Tehsil::firstOrNew(['id'=>$id]); 
    if (empty($id)) {
      $Tehsil->states_id=$request->states;
      $Tehsil->districts_id=$request->district; 
    }
    $Tehsil->code=$request->code;
    $Tehsil->name_e=$request->name_english;
    $Tehsil->name_l=$request->name_local_language; 
    $Tehsil->save(); 
    $response=['status'=>1,'msg'=>'Submit Successfully'];
    return response()->json($response);
  }
  
  public function TehsilEdit($id)
  {
    try { 
      $Districts= District::orderBy('name_e','ASC')->get(); 
      $Tehsils= Tehsil::find($id);  
      return view('admin.master.tahsil.edit',compact('Tehsils'));
    } catch (Exception $e) {}
  }
  
  public function TehsilDelete($id)
  {
    $Tehsils= Tehsil::find(Crypt::decrypt($id));  
    $Tehsils->delete();
    return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
  }



  public function village(Request $request)
  {
    try {
      $States= State::orderBy('name_e','ASC')->get();
      return view('admin.master.village.index',compact('States'));
    } catch (Exception $e) {}
  }

  public function DistrictWiseTehsil(Request $request)
  {
    try{
      $Tehsils=DB::select(DB::raw("select * from `tehsils` where `districts_id` = $request->id"));  
      return view('admin.master.districts.tehsil_select_box',compact('Tehsils'));
    } catch (Exception $e) {}
  }     

  public function villageTable(Request $request)
  {
    $Villages=DB::select(DB::raw("select `vl`.`id`, `st`.`name_e` as `state_name`, `dis`.`name_e` as `disrict_name`, `bl`.`name_e` as `block_name`, `th`.`name_e` as `tehsil_name`, `vl`.`code`, `vl`.`name_e`, `vl`.`name_l`, `vl`.`panchayat_e`, `vl`.`panchayat_l` from `villages` `vl` inner join `states` `st` on `st`.`id` = `vl`.`states_id` inner join `districts` `dis` on `dis`.`id` =`vl`.`districts_id` inner join `blocks_mcs` `bl` on `bl`.`id` = `vl`.`blocks_id` inner join `tehsils` `th` on `th`.`id` = `vl`.`tehsil_id` where `vl`.`blocks_id` = $request->id order by `vl`.`name_e`;"));
    return view('admin.master.village.village_table',compact('Villages')); 
  }
  

  public function villageStore(Request $request,$id=null)
  {  
    $rules=[
      // 'states' => 'required', 
      // 'district' => 'required', 
      // 'block_mcs' => 'required', 
      'code' => 'required|unique:villages,code,'.$id, 
      'name_english' => 'required', 
      'name_local_language' => 'required', 
      'panchayat_e' => 'required', 
      'panchayat_l' => 'required', 
      //'tehsil' => 'required',
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      $response=array();
      $response["status"]=0;
      $response["msg"]=$errors[0];
      return response()->json($response);// response as json
    }
    
    $user=Auth::guard('admin')->user();
    $Villages = Village::firstOrNew(['id'=>$id]); 
    if (empty($id)) {
      $Villages->states_id=$request->states;
      $Villages->districts_id=$request->district; 
      $Villages->blocks_id=$request->block_mcs;
      $Villages->tehsil_id=$request->tehsil;
    }
    $Villages->code=$request->code;
    $Villages->name_e=$request->name_english;
    $Villages->name_l=$request->name_local_language; 
    $Villages->panchayat_e=$request->panchayat_e; 
    $Villages->panchayat_l=$request->panchayat_l; 
    $Villages->save(); 
    
    $response=['status'=>1,'msg'=>'Submit Successfully'];
    return response()->json($response);
  }
  

  public function villageEdit($id)
  {
    try {       
      $village=Village::find($id); 
      return view('admin.master.village.edit',compact('village'));
    } catch (Exception $e) {}
  }
  

  public function villageDelete($id)
  {
    $Village= Village::find($id); 
    $Village->Delete();
    $response=['status'=>1,'msg'=>'Delete Successfully'];
    return response()->json($response);
  }

  public function resolutionDetail()
  {
    $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
    return view('admin.master.resolutionDetail.index' ,compact('States'));
  }
  public function resolutionDetailStore(Request $request,$id=null)
  {  
    $rules=[ 
          'states' => 'required', 
          'district' => 'required', 
          'block' => 'required', 
          'village' => 'required', 
          'resolution_no' => 'required', 
           
    ];

    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }
    else {
      $user=Auth::guard('admin')->user();
      $ResolutionDetail=ResolutionDetail::firstOrNew(['id'=>$id]); 
      $ResolutionDetail->user_id=$user->id; 
      $ResolutionDetail->states_id=$request->states; 
      $ResolutionDetail->districts_id=$request->district; 
      $ResolutionDetail->blocks_id=$request->block; 
      $ResolutionDetail->village_id=$request->village; 
      $ResolutionDetail->resolution_no=$request->resolution_no; 
      $ResolutionDetail->reg_date=$request->resolution_date; 
      $ResolutionDetail->save(); 
     $response=['status'=>1,'msg'=>'Submit Successfully'];
     return response()->json($response);
    }
  }
  public function resolutionDetailTableShow(Request $request)
  {
    $ResolutionDetails=ResolutionDetail::where('village_id',$request->id)->get(); 
    return view('admin.master.resolutionDetail.table_show' ,compact('ResolutionDetails'));      
  }
  public function resolutionDetailEdit($id)
  {
    $ResolutionDetail=ResolutionDetail::find($id); 
    return view('admin.master.resolutionDetail.edit' ,compact('ResolutionDetail'));      
  }
  public function resolutionDetailDelete($id)
  {
    $ResolutionDetail= ResolutionDetail::find(Crypt::decrypt($id));  
    $ResolutionDetail->delete();
    $response=['status'=>1,'msg'=>'Delete Successfully'];
     return response()->json($response); 
  }
  public function gramSachivDetail()
  {
    $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
    return view('admin.master.gramSachivDetail.index' ,compact('States'));
  }
  public function gramSachivDetailStore(Request $request,$id=null)
  {  
    $rules=[ 
          'states' => 'required', 
          'district' => 'required', 
          'block' => 'required', 
          'village' => 'required', 
          
    ]; 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }
    else {
      $user=Auth::guard('admin')->user();
      $GramSachivDetail=GramSachivDetail::firstOrNew(['id'=>$id]); 
      $GramSachivDetail->user_id=$user->id; 
      $GramSachivDetail->states_id=$request->states; 
      $GramSachivDetail->districts_id=$request->district; 
      $GramSachivDetail->blocks_id=$request->block; 
      $GramSachivDetail->village_id=$request->village; 
      $GramSachivDetail->sachiv_name_e=$request->sachiv_name_e; 
      $GramSachivDetail->sachiv_name_l=$request->sachiv_name_l; 
      $GramSachivDetail->sachiv_age=$request->sachiv_age; 
      $GramSachivDetail->sarpanch_name_e=$request->sarpanch_name_e; 
      $GramSachivDetail->sarpanch_name_l=$request->sarpanch_name_l; 
      $GramSachivDetail->sarpanch_age=$request->sarpanch_age; 
      $GramSachivDetail->panch1_name_e=$request->panch1_name_e; 
      $GramSachivDetail->panch1_name_l=$request->panch1_name_l; 
      $GramSachivDetail->panch1_age=$request->panch1_age; 
      $GramSachivDetail->panch2_name_e=$request->panch2_name_e; 
      $GramSachivDetail->panch2_name_l=$request->panch2_name_l; 
      $GramSachivDetail->panch2_age=$request->panch2_age;  
      $GramSachivDetail->save(); 
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
    }
  }
  public function gramSachivDetailTableShow(Request $request)
  {
    $GramSachivDetails=GramSachivDetail::where('village_id',$request->id)->get(); 
    return view('admin.master.gramSachivDetail.table_show' ,compact('GramSachivDetails'));
  }
  public function gramSachivDetailEdit($id)
  {
    $GramSachivDetail=GramSachivDetail::find($id); 
    return view('admin.master.gramSachivDetail.edit' ,compact('GramSachivDetail'));      
  }
  public function gramSachivDetailDelete($id)
  {
    $GramSachivDetail= GramSachivDetail::find(Crypt::decrypt($id));  
    $GramSachivDetail->delete();
    $response=['status'=>1,'msg'=>'Delete Successfully'];
     return response()->json($response); 
  }
  


  public function villagePartyDetail()
  {
    $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
    return view('admin.master.villagePartyDetail.index' ,compact('States'));
  }
  public function villagePartyWiseForm(Request $request)
  {
    $relations = DB::select(DB::raw("select * from `relation` order by `id`;")); 
    return view('admin.master.villagePartyDetail.form' ,compact('relations'));
  }
  public function villagePartyWiseTable(Request $request)
  {
    $VillPartyDetails=VillPartyDetail::where('village_id',$request->village)->get(); 
    return view('admin.master.villagePartyDetail.table_show' ,compact('VillPartyDetails'));
  }
  public function villagePartyDetailStore(Request $request,$id=null)
  {  
    $rules=[ 
          'states' => 'required', 
          'district' => 'required', 
          'block' => 'required', 
          'village' => 'required', 
          
    ]; 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }
    else {
      $user=Auth::guard('admin')->user();
      $VillPartyDetail=VillPartyDetail::firstOrNew(['id'=>$id,'village_id'=>$request->village,'party_type'=>$request->party_type]); 
      $VillPartyDetail->user_id=$user->id; 
      $VillPartyDetail->states_id=$request->states; 
      $VillPartyDetail->districts_id=$request->district; 
      $VillPartyDetail->blocks_id=$request->block; 
      $VillPartyDetail->village_id=$request->village; 
      $VillPartyDetail->party_type=$request->party_type; 
      $VillPartyDetail->name_e=$request->name_e; 
      $VillPartyDetail->name_l=$request->name_l; 
      $VillPartyDetail->age=$request->age; 
      $VillPartyDetail->fname_e=$request->fname_e; 
      $VillPartyDetail->fname_l=$request->fname_l; 
      $VillPartyDetail->relation_id=$request->relation; 
      $VillPartyDetail->designation_e=$request->designation_e; 
      $VillPartyDetail->designation_l=$request->designation_l; 
      $VillPartyDetail->save(); 
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
    }
  }
  public function villagePartyDetailEdit($id)
  {
    $VillPartyDetail=VillPartyDetail::find($id); 
    $relations = DB::select(DB::raw("select * from `relation` order by `id`;")); 
    return view('admin.master.villagePartyDetail.edit' ,compact('VillPartyDetail','relations'));      
  } 
  public function villagePartyDetailDelete($id)
  {
    $VillPartyDetail= VillPartyDetail::find(Crypt::decrypt($id));  
    $VillPartyDetail->delete();
    $response=['status'=>1,'msg'=>'Delete Successfully'];
     return response()->json($response); 
  }     
  //--------Last Line ----------------------
     

     

    
    public function villageUpdate(Request $request,$id=null)
   {  
       $rules=[
             
            'code' => 'required|unique:villages,code,'.$id, 
            'name_english' => 'required', 
            'name_local_language' => 'required', 
            // 'syllabus' => 'required', 
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else {
        $village=Village::find($id); 
        $village->code=$request->code; 
        $village->name_e=$request->name_english; 
        $village->name_l=$request->name_local_language; 
        $village->save(); 
       $response=['status'=>1,'msg'=>'Update Successfully'];
       return response()->json($response);
      }
    }
    

     
     
    
   
     
    public function gender()
    {  
      $genders=Gender::all();   
      return view('admin.master.gender.index',compact('genders'));
    }
    public function genderEdit($id)
    {
       $gender=Gender::find($id);
       return view('admin.master.gender.edit',compact('gender'));     
    }
    public function genderUpdate(Request $request,$id)
   { 
     
       $rules=[
            'gender_english' => 'required', 
            'gender_local_language' => 'required', 
            'code_english' => 'required', 
            'code_local_language' => 'required',  
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else { 
       $gender=Gender::firstOrNew(['id'=>$id]);          
       $gender->genders=$request->gender_english;          
       $gender->genders_l=$request->gender_local_language;          
       $gender->code=$request->code_english;          
       $gender->code_l=$request->code_local_language;          
       $gender->save();          
       $response=['status'=>1,'msg'=>'Update Successfully'];
       return response()->json($response);
      }
     

    }
    
}
