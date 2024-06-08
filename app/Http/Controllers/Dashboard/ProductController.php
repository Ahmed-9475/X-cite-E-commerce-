<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidationRequest;
use App\Interface\Products\ProductsRepositoryInterface;

class ProductController extends Controller
{
    private $Products;
    public function __construct(ProductsRepositoryInterface $Product)
    {
        $this->Products = $Product;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Products->index();
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Products->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Products->store($request);
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
        return $this->Products->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Products->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
