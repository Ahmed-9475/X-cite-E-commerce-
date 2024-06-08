<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('Dashboard.Hospital.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $hospital= new Hospital();
            $hospital->name = $request->hospitalName;
            $hospital->address = $request->hospitaladdress;
            $hospital->save();
            Db::commit();
            return redirect()->route('hospital.index');
        }catch(\Exception  $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hospital = Hospital::findOrFail($id)->select('name','id','address');

        return view('Dashboard.Hospital.edit',compact('hospital'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
            $hospital= Hospital::findOrFail($id);
            $hospital->name = $request->hospitalName;
            $hospital->address = $request->hospitaladdress;
            $hospital->save();
            Db::commit();
            return redirect()->route('hospital.index');
        }catch(\Exception  $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        };

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hospital::findOrFail($id)->delete();
        return redirect()->route('hospital.index');

    }
}
