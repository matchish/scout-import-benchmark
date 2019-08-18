<?php

namespace App;


use Matchish\ScoutElasticSearch\Searchable\DefaultImportSource;
use Matchish\ScoutElasticSearch\Searchable\ImportSource;
use Matchish\ScoutElasticSearch\Searchable\ImportSourceFactory;

class DefaultImportSourceFactory implements ImportSourceFactory
{

    public static function from(string $className): ImportSource
    {
        return new DefaultImportSource($className, [function($query) {
            if (method_exists(get_class(), 'titles')) {
                return $query->with(['titles', 'salaries', 'departments']);
            }
        }]);
    }
}
