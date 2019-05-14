<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Process;

class ProcessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::get();
        return $processes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'department' => 'required',
            'municipality' => 'required'
        ]);

        //Process::create($request->all());

        $processes = new Process;
        $processes->processes_id = uniqid();
        $processes->description = $request->input('description');
        $processes->department = $request->input('department');
        $processes->municipality = $request->input('municipality');
        $processes->state_id = 1;
        $processes->save();

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processes = Process::findOrFail($id);
        return view('processes.view',compact('processes')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveDates(Request $request){
        $processes = Process::findOrFail($request->input('id'));
        $processes->start_date = $request->input('start_date');
        $processes->end_date = $request->input('end_date');
        $processes->save();
    }
}
