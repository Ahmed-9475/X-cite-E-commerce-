<?php
namespace App\Interface\Categories;

use App\Http\Requests\CategoryValidationRequest;


interface categoriesRepositoryInterface 
{
    // index  category view
    public function index();

    // store  category view
    public function store( $request);

    // store  category view
    public function create();
    
    public function edit($id);

    public function show($id);

    // update  category view
    public function update($request,$id);
    
    // destroy  category view
    public function destroy($id);
}