<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'budget' => 'required|numeric|min:0',
            'vendor_name' => 'required|string|max:255',
            'volunteer_id' => 'required|exists:users,id',
        ]);

        

        
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
        

        $request->validate([
            'event_id' => 'sometimes|exists:events,id',
            'budget' => 'sometimes|numeric|min:0',
            'vendor_name' => 'sometimes|string|max:255',
            'volunteer_id' => 'sometimes|exists:users,id',
        ]);

        

       
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(string $id)
    {
        //
    }
