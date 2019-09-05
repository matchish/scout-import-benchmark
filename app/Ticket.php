<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'tst';
    }
}
