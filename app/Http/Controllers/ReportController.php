<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reportNumber = request('reportNumber');
        if ($reportNumber == '1') {
            $res  = $this->reportOne();
            return view('reports.index', compact('res'));
        } else {
            return view('reports.index');
        }
    }

    public function reportOne()
    {
        return "This is Report One";
    }

    public function sample2()
    {
        // This is Other Way for the Report File 
        // Same Form Apply to the Same Controller Function Again !
        return view('reports.sample');
    }
}