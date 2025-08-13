<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userType = Auth::user()->usertype;

        switch ($userType) {
            case 'student':
                return redirect()->route('student.dashboard');

            case 'admin':
                return view('admin.adminhome');

            default:
                return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }
}
