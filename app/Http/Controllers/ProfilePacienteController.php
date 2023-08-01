<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\patient;
use App\Models\Medico;

class ProfilePacienteController extends Controller
{
    /**
    * Display the user's profile form.
    */
   public function edit(Request $request): View
   {
       return view('profile.edit', [
           'user' => $request->user(),
       ]);
   }

   
   /**
    * Update the user's profile information.
    */
   public function update()
   {
       $oldPaciente = patient::where('user_id', Auth::user()->id)->first();
        
       


   }

   /**
    * Delete the user's account.
    */
   public function destroy(Request $request): RedirectResponse
   {
       $request->validateWithBag('userDeletion', [
           'password' => ['required', 'current_password'],
       ]);

       $user = $request->user();

       Auth::logout();

       $user->delete();

       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return Redirect::to('/');
   }
}
