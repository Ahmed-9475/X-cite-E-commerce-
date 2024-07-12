<?php
namespace App\Repository\Products;

use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;
use App\Interface\Products\ProductsRepositoryInterface;
use App\Models\Tag;

class  ProductsRepository implements ProductsRepositoryInterface
{

    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products =  Product::with(['category','store'])->paginate(6); 
        return view("Dashboard.Products.index",compact('Products'));
    }
    
    /**
     * 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories =  Category::select('id','name')->where('status','=','active')->get();
        $stores =  Store::select('id','name')->where('status','=','active')->get();

        return view("Dashboard.Products.create",compact('Categories','stores'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        try{
            DB::beginTransaction();
            
            $Product = new Product();

            
            $Product->name =$request->name;
            $Product->category_id  =$request->categroyParent;
            $Product->store_id  =$request->store;
            $Product->description =$request->description;
            $Product->price =$request->price;
            $Product->compare_price =$request->compare_price;
            $Product->status =$request->status;
            $Product->save();

            // store pivot table
            $tagNames = explode(',',$request->post('tags'));
            $tagIds=[];
            foreach ($tagNames as $tagName) {
                $slug = Str::slug($tagName);
                $tag = Tag::firstOrCreate([
                    'name'=>$tagName,
                    'slug'=>$slug,
                ]);

                $tagIds[]=$tag->id;
            }

            $Product->tags()->sync($tagIds);
            $Product->save();
            
            
            if ($request->hasFile('image')) {
                if ($Product->image) {
                    Storage::delete($Product->image);
                }
                
            }
            // upload Image
            $pathImage = $this->storeImage($request,'image','products');
            $Product->image =$pathImage;
            // $Product->save();



            DB::commit();
            session()->flash('add');
            return redirect()->route('dashboard.admin.Products.index');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Products = Product::findOrFail($id);
        $tag = implode(',',$Products->tags()->pluck('name')->toArray());
        $Categories =  Category::select('id','name')->where('status','=','active')->get();
        $stores =  Store::select('id','name')->where('status','=','active')->get();
        return view("Dashboard.Products.edit",compact('Products','Categories','stores','tag'));       
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update($request, $id)
    {

        try{
            DB::beginTransaction();

            $Product = Product::findOrFail($id);

            $Product->name =$request->name;
            $Product->category_id  =$request->categroyParent;
            $Product->store_id  =$request->store;
            $Product->description =$request->description;
            $Product->price =$request->price;
            $Product->compare_price =$request->compare_price;
            $Product->status =$request->status;
            $Product->save();

            // // store pivot table
            $tagNames = explode(',',$request->post('tags'));
            $tagIds=[];
            foreach ($tagNames as $tagName) {
                $slug = Str::slug($tagName);
                $tag = Tag::firstOrCreate([
                    'name'=>$tagName,
                    'slug'=>$slug,
                ]);

                $tagIds[]=$tag->id;
            }
            $Product->tags()->sync($tagIds);
            $Product->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->route('dashboard.admin.Products.index');
        }catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('delete');
        return redirect()->route('dashboard.admin.Products.index');

    }


}