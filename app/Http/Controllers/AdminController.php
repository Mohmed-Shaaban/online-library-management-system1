<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class AdminController extends Controller
{
    public function allUsers()
    {
        $students = User::query()
            ->where('usertype', 'student')
            ->get();

        $totalStudents = User::where('usertype', 'student')
            ->count();

        return view('admin.all_users', [
            'users'      => $students,
            'countUsers' => $totalStudents,
        ]);
    }

    public function searchStudent(Request $request)
    {
        $this->validate($request, [
            'student_id' => ['required', 'integer'],
        ]);

        $student = User::find($request->input('student_id'));

        if (empty($student)) {
            return back()->with('error', 'No student found with the given ID.');
        }

        return view('admin.user_detail')->with('student', $student);
    }
}
