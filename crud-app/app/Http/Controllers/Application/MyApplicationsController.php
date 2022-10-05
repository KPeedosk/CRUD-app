<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionUserController;
use App\Models\UserApplication;

class MyApplicationsController extends SessionUserController
{

    public function index(Request $request)
    {
        $myApplications = UserApplication::where('user_id', session('userId'))->get();
        return view('application/my-applications')
            ->with('user', parent::getSessionUserOrRedirect())
            ->with('myApplications', $myApplications);
    }

    public function destroy($id)
    {
        UserApplication::where('id', $id)->where('user_id', session('userId'))->delete();
        return redirect('/minu_kandideerimised');
    }

    public function show($id)
    {
        $application = UserApplication::where('id', $id)->where('user_id', session('userId'))->first();
        if ($application == null) {
            return redirect('/minu_kandideerimised');
        }
        return view('application/application')
            ->with('user', parent::getSessionUserOrRedirect())
            ->with('application', $application)
            ->with('isEdit', false);
    }

    public function edit($id)
    {
        $application = UserApplication::where('id', $id)->where('user_id', session('userId'))->first();
        if ($application == null) {
            return redirect('/minu_kandideerimised');
        }
        return view('application/application')
            ->with('user', parent::getSessionUserOrRedirect())
            ->with('application', $application)
            ->with('isEdit', true);
    }

    public function update(Request $request)
    {
        if (!$request->filled('position_name')) {
            $request->session()->flash('error', 'Kohustuslikud väljad peavad olema täidetud!');
            return back()->withInput();
        }
        $application = UserApplication::where('id', $request->id)->where('user_id', session('userId'))->first();
        if ($application == null) {
            return redirect('/minu_kandideerimised');
        }

        $blob = null;
        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->getRealPath();
            $blob = file_get_contents($path);
        }
        $application->cv_file = $blob;
        $application->position_name = $request->position_name;
        $application->motivational_letter = $request->motivational_letter;
        $application->references = $request->references;
        $application->additional_info = $request->additional_info;
        $application->questions = $request->questions;
        $application->update();

        $request->session()->flash('success', 'Andmete salvestamine õnnestus!');
        return redirect('/minu_kandideerimised');
    }
}
