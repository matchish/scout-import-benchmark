<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Department extends Model
{
    public function getKeyName()
    {
        return 'dept_no';
    }
}
