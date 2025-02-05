<?php

namespace App\Imports;

use App\Models\Incidente;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;

class IncidentesImport implements ToModel, WithHeadingRow
{
    public function map($row): array
    {
        return [
            'date' => $row['Date'],
            'issue' => $row['issue'],
            'evidence' => $row['Evidence'],
            'general_problem' => $row['General Problem'],  
            'category' => $row['Category'],
            'clasification' => $row['Clasification'],
            'job' => $row['Job'],
            'line' => $row['Line'],
            'persons_attended' => $row['Person who Attended'],
            'persons_involved' => $row['No. Persons Involved'],
            'total_invested_time' => $row['Total Invested Time'],
            'actions' => $row['Actions'],
            'will_happen_again' => $row['It will be happen again?'],
            'comments' => $row['Comments'],
        ];
    }

    public function model(array $row)
    {
        
       
    if (is_numeric($row['date'])) {
        try {
            $excelDate = Date::excelToDateTimeObject($row['date']);
            $date = Carbon::instance($excelDate)->format('Y-m-d');
        } catch (\Exception $e) {
            
            $date = '1900-01-01'; 
        }
    } else {
        try {
            $date = Carbon::createFromFormat('d/m/Y', $row['date'])->format('Y-m-d');
        } catch (\Exception $e) {
           
            $date = '1900-01-01'; 
        }
    }

        return new Incidente([
            'date' => $date,
            'issue' => $row['issue'],
            'evidence' => $row['evidence'],
            'general_problem' => $row['general_problem'],
            'category' => $row['category'],
            'classification' => $row['clasification'],
            'job' => $row['job'],
            'line' => $row['line'],
            'persons_attended' => $row['person_who_attended'],
            'persons_involved' => $row['no_persons_involved'],
            'total_invested_time' => $row['total_invested_time'],
            'actions' => $row['actions'],
            'will_happen_again' => $row['it_will_be_happen_again'],
            'comments' => $row['comments'],
        ]);
    }
}
