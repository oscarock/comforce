<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Process;
use App\FileUpload;
use Illuminate\Support\Facades\DB;

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

    public function saveDates(Request $request){
        $processes = Process::findOrFail($request->input('id'));
        $processes->start_date = $request->input('start_date');
        $processes->end_date = $request->input('end_date');
        $processes->save();
    }

    public function saveStates(Request $request){
        $processes = Process::findOrFail($request->input('id'));
        $processes->state_id = $request->input('state_id');
        $processes->observation = $request->input('observation');
        $processes->save();
    }

    public function finalizeState(Request $request){
        $processes = Process::findOrFail($request->input('id'));
        $processes->state_id = 4;
        $processes->save();
    }

    public function selectPie(){
        $processes1 = DB::table('processes')
        ->where('state_id', '=', 1)
        ->count();

        $processes2 = DB::table('processes')
        ->where('state_id', '=', 2)
        ->count();

        $processes3 = DB::table('processes')
        ->where('state_id', '=', 3)
        ->count();

        $processes4 = DB::table('processes')
        ->where('state_id', '=', 4)
        ->count();

        echo json_encode([$processes1,$processes2,$processes3,$processes4]);
    }
}
