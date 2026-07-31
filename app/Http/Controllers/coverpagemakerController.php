<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoverPageMakerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('form');
    }

    public function generatePDF(Request $request)
    {
        $data = $request->all();

        if ($request->submission_date) {
            $data['submission_date'] = Carbon::parse($request->submission_date)
                ->format('d-M-Y');
        }

        if ($request->assigned_date) {
            $data['assigned_date'] = Carbon::parse($request->assigned_date)
                ->format('d-M-Y');
        }

        $pdf = Pdf::loadView('pdf_template', $data);

        return $pdf->stream('Assignment_Cover_Page.pdf');
    }
}
