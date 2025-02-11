<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{

    protected $fillable = [
        'date',
        'issue',
        'evidence',
        'general_problem',
        'category',
        'classification',
        'job',
        'line',
        'persons_attended',
        'persons_involved',
        'total_invested_time',
        'actions',
        'will_happen_again',
        'comments',
    ];

    protected $dates = ['date'];

    protected $casts = [
        'evidence' => 'array',
    ];

    public function getEvidenceUrlAttribute()
    {
        if ($this->evidence) {
            return array_map(function ($image) {
                return asset('storage/' . $image);
            }, $this->evidence);
        }
        return null;
    }
    
}
