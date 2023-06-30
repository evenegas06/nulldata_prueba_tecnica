<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class Employee extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'position',
        'birthdate',
        'address'
    ];

    /**
     * Many to many relationship
     */
    public function skills() {
        return $this->belongsToMany(Skill::class)->withPivot('score');
    }
}
