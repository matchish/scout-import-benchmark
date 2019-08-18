<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'employees';
    }

    public function titles()
    {
        return $this->hasMany(Title::class, 'emp_no');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'emp_no');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'dept_emp', 'emp_no', 'dept_no');
    }

    public function getKeyName()
    {
        return 'emp_no';
    }

    public function toSearchableArray()
    {
        return [
            'salaries' => $this->salaries,
            'titles' => $this->titles,
            'departments' => $this->departments,
        ];
    }
}
