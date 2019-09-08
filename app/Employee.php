<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Employee extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $indexConfigurator = EmployeeIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
            'emp_no' => [
                'type' => 'keyword',
            ],
        ],
    ];


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
            'salaries' => $this->salaries->toArray(),
            'titles' => $this->titles->toArray(),
            'departments' => $this->departments->toArray(),
        ];
    }
}
