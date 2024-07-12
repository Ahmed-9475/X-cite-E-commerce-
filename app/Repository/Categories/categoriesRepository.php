<?php
namespace App\Repository\Categories;

use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryValidationRequest;
use App\Interface\Categories\categoriesRepositoryInterface;

class  categoriesRepository implements categoriesRepositoryInterface
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request= request();

        $categories =Category::Filter($request->query())->paginate(8); 
        return view("Dashboard.Categories.index",compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::select('id','name','parent_id' )->get(); 
        return view("Dashboard.Categories.create",compact('categories'));
        
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store( $request)
    {



        DB::beginTransaction();
        try{
            $category = new Category();
            $category->name =$request->name;
            $category->parent_id =$request->categroyParent;
            $category->description =$request->description;
            $category->status =$request->status;
            $category->save();

            // upload Image
            $pathImage = $this->storeImage($request,'image','Categories');
            $category->image =$pathImage;
            $category->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('admin.Categories.index');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return "testing";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $categories= Category::findOrFail($id);
        // select all id + name where id <>$id and don't show children of parent
        $parents = Category::where('id' ,'<>',$id)->get();
        return view("Dashboard.Categories.edit",compact('parents','categories'));
        
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update($request, $id)
    {
        DB::beginTransaction();
        try{
            $category= Category::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($category->image) {
                    Storage::delete($category->image);
                }
                
                // upload Image
                $pathImage = $this->storeImage($request,'image','Categories');
                $category->image =$pathImage;
            }


            $category->name =$request->name;
            $category->parent_id =$request->categroyParent;
            $category->description =$request->description;
            $category->status =$request->status;
            $category->save();
            
            DB::commit();
            session()->flash('edit');
            return redirect()->route('admin.Categories.index');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Category::destroy($id);
        session()->flash('delete');
        return redirect()->route('admin.Categories.index');

    }


}