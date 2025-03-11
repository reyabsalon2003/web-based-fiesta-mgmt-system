<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Analytic;

class AnalyticController extends Controller
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
            'attendance' => 'required|integer|min:0',
            'feedback' => 'nullable|string',
            'rating' => 'required|numeric|min:0|max:5',
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
            'attendance' => 'sometimes|integer|min:0',
            'feedback' => 'nullable|string',
            'rating' => 'sometimes|numeric|min:0|max:5',
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

