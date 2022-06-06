<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function divisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }

    public function divisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editDivision($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('division'));
    }

    public function divisionUpdate(Request $request,$id){
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage-division')->with($notification);
    }

    public function divisionDelete($id){
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage-division')->with($notification);
    }
}
