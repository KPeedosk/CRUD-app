<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionUserController;
use App\Models\UserApplication;

class CreateApplicationController extends SessionUserController
{

    public function index(Request $request)
    {
        return view('application/create-application')->with('user', parent::getSessionUserOrRedirect());
    }

    public function store(Request $request)
    {
        if (!$request->filled('position_name')) {
            $request->session()->flash('error', 'Kohustuslikud väljad peavad olema täidetud!');
            return back()->withInput();
        }

        $blob = null;
        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->getRealPath();
            $blob = file_get_contents($path);
        }

        $application = UserApplication::create([
            'user_id' => session('userId'),
            'cv_file' => $blob,
            'position_name' => $request->input('position_name'),
            'motivational_letter' => $request->input('motivational_letter'),
            'references' => $request->input('references'),
            'additional_info' => $request->input('additional_info'),
            'questions' => $request->input('questions')
        ]);
        $application->save();
        $request->session()->flash('success', 'Andmete salvestamine õnnestus!');
        return redirect('/minu_kandideerimised');
    }
}
