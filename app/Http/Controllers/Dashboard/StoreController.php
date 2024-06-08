<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Stores\StoresRepositoryInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    private $Store;
    public function __construct(StoresRepositoryInterface $Stores)
    {
        $this->Store = $Stores;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Store->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Store->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
