<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'nic',
        'email',
        'telephone',
        'undergraduate_degree',
        'university',
        'year',
        'field',
        'gpa_class',
    ];

    /**
     * Relationship with user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with applications
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
