<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NgetehSetting;
use \Auth, \Redirect, \Validator, \Input, \Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NgetehSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ngeteh_settings = NgetehSetting::find(1)->first();
        return view('ngeteh-setting.index')->with('ngeteh_settings', $ngeteh_settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $ngeteh_settings = NgetehSetting::find($id);
        $ngeteh_settings->languange = Input::get('language');
        $ngeteh_settings->save();

        Session::flash('message', 'You have successfully saved settings');
        return Redirect::to('ngeteh-settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
