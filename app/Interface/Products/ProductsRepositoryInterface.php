<?php
namespace App\Interface\Products;


interface ProductsRepositoryInterface 
{
    // index  Products view
    public function index();

    // store  Products view
    public function store( $request);

    // store  Products view
    public function create();
    
    public function edit($id);

    // update  Products view
    public function update($request,$id);
    
    // destroy  Products view
    public function destroy($id);
}