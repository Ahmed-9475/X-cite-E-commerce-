<?php
namespace App\Repository\Stores;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Interface\Stores\StoresRepositoryInterface;

class  StoresRepository implements StoresRepositoryInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores =  Store::select('id','name','description','status','logo_image','cover_image','created_at')->get(); 
        return view("Dashboard.Stores.index",compact('stores'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.Stores.create");

    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {



        // DB::beginTransaction();
        // try{
        //     $category = new Categories();
        //     $category->name =$request->name;
        //     $category->parent_id =$request->categroyParent;
        //     $category->description =$request->description;
        //     $category->status =$request->status;
        //     $category->save();

        //     // upload Image
        //     $pathImage = $this->storeImage($request,'image','Categories');
        //     $category->image =$pathImage;
        //     $category->save();

        //     DB::commit();
        //     session()->flash('add');
        //     return redirect()->route('Categories.index');
        // }catch(\Exception $e){

        //     DB::rollBack();
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }



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
    public function edit($id)
    {

        
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update($request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

    }


}