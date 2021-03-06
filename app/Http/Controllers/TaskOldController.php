<?php

namespace App\Http\Controllers;

use App\Task_old;
use Faker\Generator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Task_old::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        $task = new Task_old();
        $task->title = $faker->sentence(1);
        $task->priority = $faker->boolean ? 'low' : 'high';
        $task->save();
        return response($task->jsonSerialize(),  Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task_old();
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->save();
        return response($task->jsonSerialize(),  Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task_old::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
