<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\SessionUserController;

class UserController extends SessionUserController
{
    public function store(Request $request)
    {
        if ($request->input('fname') == null || $request->input('lname') == null) {
            $request->session()->flash('error', 'Eesnimi ja perenimi peavad olema täidetud!');
            return back();
        } elseif (trim($request->input('fname')) == '' || trim($request->input('lname')) == '') {
            $request->session()->flash('error', 'Eesnimi ja perenimi peavad olema täidetud!');
            return back();
        }
        $fname = trim($request->input('fname'));
        $lname = trim($request->input('lname'));

        $user = User::whereRaw('UPPER(first_name) = ?', [strtoupper($fname)])
            ->whereRaw('UPPER(last_name) = ?', [strtoupper($lname)])
            ->first();

        if ($user == null) {
            $user = User::create([
                'first_name' => $fname,
                'last_name' => $lname
            ]);
            $user->save();
        }

        session(['userId' => $user->id]);
        return redirect('/andmed');
    }

    public function index(Request $request)
    {
        return view('user/details')->with('user', parent::getSessionUserOrRedirect());
    }

    public function logout(Request $request)
    {
        session()->forget('userId');
        return redirect('/');
    }

    public function update(Request $request)
    {
        if ($request->input('fname') == null || $request->input('lname') == null) {
            $request->session()->flash('error', 'Kohustuslikud väljad peavad olema täidetud!');
            return back()->withInput();
        } elseif (trim($request->input('fname')) == '' || trim($request->input('lname')) == '') {
            $request->session()->flash('error', 'Kohustuslikud väljad peavad olema täidetud!');
            return back()->withInput();
        }

        $fname = trim($request->input('fname'));
        $lname = trim($request->input('lname'));

        $user = User::where('id', session('userId'))->first();
        $user->first_name = $fname;
        $user->last_name = $lname;
        $user->age = $request->age;
        $user->sex = $request->sex;
        $user->personal_code = $request->personal_code;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->language_skills = $request->language_skills;
        $user->data_processing_allowed = $request->has('data_processing_allowed');
        $user->update();

        $request->session()->flash('success', 'Andmete salvestamine õnnestus!');
        return redirect('/andmed');
    }
}
