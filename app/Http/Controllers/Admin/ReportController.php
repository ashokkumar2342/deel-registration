<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
  public function status()
  {
    $States = DB::select(DB::raw("select * from `states` order by `name_e`;"));
    return view('admin.report.status',compact('States')); 
  }
  public function statusShow(Request $request)
  {
    $admin=Auth::guard('admin')->user(); 
    $statusShows = DB::select(DB::raw("call `up_fetch_property_ID_village_setrest`($admin->id,'$request->village');")); 
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.report.status_show',compact('statusShows'))->render();
    return response()->json($response);
  }
  public function statusDelete($deed_id,$status)
  {
    $admin=Auth::guard('admin')->user();
    $result = DB::select(DB::raw("call `up_set_reset_property_ID_status`($admin->id, $deed_id, $status);"));
    $response=['status'=>$result[0]->result,'msg'=>$result[0]->message];
    return response()->json($response);
  } 
    
}
