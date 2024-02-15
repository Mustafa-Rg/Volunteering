<?php
// this does nothing so you can delete it

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userType = auth()->user()->user_type;

        if ($userType === 'volunteer') {
            return view('dashboard');
        } elseif ($userType === 'organization') {
            return view('ordashboard');
        } else {
            // Handle other user types or show an error view
            return abort(403, 'Unauthorized');
        }
    }
    // public function post()
    // {
    //     return ("hello world");
    // }
}
