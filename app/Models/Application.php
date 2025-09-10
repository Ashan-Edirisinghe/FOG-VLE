<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id',
        'intended_degree',
        'discipline_area',
        'status',
    ];

    /**
     * Relationship with candidate
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
