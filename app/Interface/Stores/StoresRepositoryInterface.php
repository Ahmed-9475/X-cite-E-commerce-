<?php
namespace App\Interface\Stores;


interface StoresRepositoryInterface 
{
    // index  Stores view
    public function index();

    // store  Stores view
    public function store( $request);

    // store  Stores view
    public function create();
    
    public function edit($id);

    // update  Stores view
    public function update($request,$id);
    
    // destroy  Stores view
    public function destroy($id);
}