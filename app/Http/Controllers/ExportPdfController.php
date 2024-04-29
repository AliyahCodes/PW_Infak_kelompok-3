<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;

class ExportPdfController extends Controller
{
    public function export()
    {
        $users = User::all();

        $pdf = PDF::loadView('pdf.users', compact('users'));

        return $pdf->download('users.pdf');
    }
}
