<?php

namespace App\Http\Controllers;

use Carbon\Carbon; // ফাইলের একদম উপরে এটি যুক্ত করুন

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // PDF তৈরি করার লাইব্রেরি

class coverpagemakerController extends Controller
{
    // ১. ফর্মের পেজটি ইউজারকে দেখানোর জন্য
    public function index()
    {
        return view('form');
    }

    // ২. ফর্মের ডেটা নিয়ে PDF জেনারেট করার জন্য
    public function generatePDF(Request $request)
    {
        // ফর্ম থেকে আসা সব ডেটা ভেরিয়েবলে রাখা হলো
        $data = $request->all();

        // তারিখটিকে dd-M-Y ফরম্যাটে রূপান্তর করা হচ্ছে
    if ($request->submission_date) {
        $data['submission_date'] = Carbon::parse($request->submission_date)->format('d-M-Y');
    }

    // ল্যাব রিপোর্টের ক্ষেত্রে Assigned Date থাকলে সেটিও ফরম্যাট করতে পারেন
    if ($request->assigned_date) {
        $data['assigned_date'] = Carbon::parse($request->assigned_date)->format('d-M-Y');
    }

        // pdf_template নামক ফাইলে ডেটাগুলো পাঠানো হলো
        $pdf = Pdf::loadView('pdf_template', $data);

        // ব্রাউজারে PDF প্রিভিউ দেখানোর জন্য (ডাউনলোড অপশনও থাকবে)
        return $pdf->stream('Assignment_Cover_Page.pdf');
    }
}
