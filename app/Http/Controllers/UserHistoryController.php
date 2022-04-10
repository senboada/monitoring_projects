<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use App\Models\Project;
use App\Http\Requests\StoreUserHistoryRequest;
use App\Http\Requests\UpdateUserHistoryRequest;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class UserHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userhistories = UserHistory::with('project')->get();
        return Inertia::render('UserHistory/index',['userhistories' => $userhistories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return Inertia::render('UserHistory/create',['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHistoryRequest $request)
    {
        UserHistory::create($request->all());
        return Redirect::route('userhistories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function show($userHistory)
    {
        $result = UserHistory::findOrFail($userHistory);
        $result->project;
        return Inertia::render('UserHistory/detail',['userhistory' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($userHistory)
    {
        $projects = Project::all();
        $result = UserHistory::findOrFail($userHistory);
        return Inertia::render('UserHistory/edit',['userhistory' => $result,'projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserHistoryRequest  $request
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserHistoryRequest $request,$userHistory)
    {
        $result = UserHistory::findOrFail($userHistory);
        $result->update($request->all());
        return Redirect::route('userhistories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy($userHistory)
    {
        $result = UserHistory::findOrFail($userHistory);
        $result->delete();
        return Redirect::route('userhistories.index');
    }
}
