<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidationRequest;
use App\Interface\Categories\categoriesRepositoryInterface;

class CategoryController extends Controller
{
    private $Categories;
    public function __construct(categoriesRepositoryInterface $Category)
    {
        $this->Categories = $Category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Categories->index();
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Categories->create();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryValidationRequest $request )
    {
        return $this->Categories->store($request);
        //
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->Categories->show($id);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->Categories->edit($id);
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Categories->update($request,$id);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->Categories->destroy($id);
    }
}
