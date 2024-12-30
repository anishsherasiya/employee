<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'email', 'reporting_to'];

    public function children()
    {
        return $this->hasMany(Employee::class, 'reporting_to');
    }

    public function reportingTo()
    {
        return $this->belongsTo(Employee::class, 'reporting_to');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reporting_to');
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
