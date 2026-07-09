<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumini;
class AluminiController extends Controller
{
    public function showAlumini($id)
    {
        $alumini = Alumini::find($id); // Fetch user by ID

        if (!$alumini) {
            return abort(404, 'User not found'); // Show 404 if not found
        }

        return view('alumini.alumini1', ['aluminiName' => $alumini->name]);
    }
    public function aluminiDashboard(){
        return view ('alumini.dashboard_alumini');
    }
}
