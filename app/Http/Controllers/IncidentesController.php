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

        public function newIncident(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'job' => 'required|string',
            'line' => 'required|string',
            'issue' => 'required|string',
            'evidence' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'persons_attended' => 'required|string',
            'total_invested_time' => 'required|integer',
        ]);

        $incidente = new Incidente();
        $incidente->date = $request->date;
        $incidente->job = $request->job;
        $incidente->line = $request->line;
        $incidente->issue = $request->issue;
        $incidente->persons_attended = $request->persons_attended;
        $incidente->total_invested_time = $request->total_invested_time;

        if ($request->hasFile('evidence')) {
            $imageName = time().'.'.$request->evidence->extension();
            $request->evidence->move(public_path('images'), $imageName);
            $incidente->evidence = $imageName;
        }

        $incidente->save();

        return redirect()->route('index')->with('success', 'Incidente creado con éxito');
    }

}
