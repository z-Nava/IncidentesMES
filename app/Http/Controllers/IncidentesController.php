<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use Illuminate\Http\Request;
use App\Imports\IncidentesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class IncidentesController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Incidente::distinct()->pluck('job');
        $lines = Incidente::distinct()->pluck('line');
        $incidentes = Incidente::all();
        $incidentes = Incidente::query();

        if ($request->date) {
            $incidentes->whereDate('date', $request->date);
        }
        if ($request->job) {
            $incidentes->where('job', $request->job);
        }
        if ($request->line) {
            $incidentes->where('line', $request->line);
        }

        $incidentes = $incidentes->get();

        return view('index', compact('incidentes', 'jobs', 'lines'));
    }

    public function import (Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Incidente::truncate();

        Excel::import(new IncidentesImport, $request->file('file'));

        return redirect()->route('index')->with('success', 'Datos importados con exito');
    }

}
