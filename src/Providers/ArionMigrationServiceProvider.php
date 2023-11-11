<?php

namespace ArionMigrations\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ArionMigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // You can register any services here if needed.
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Blueprint::macro('before', function ($existingColumn, $newColumnName, $type, $length = '255', $default = 'nullable') {

            $columns = Schema::getColumnListing($this->getTable());

            $existingColumnIndex = array_search($existingColumn, $columns);

            if ($existingColumnIndex !== false && $existingColumnIndex > 0) {
                $columnBefore = $columns[$existingColumnIndex - 1];
                $this->addColumn($type, $newColumnName)->length($length)->after($columnBefore)->default();
            } else {
                throw new \Exception('No column found before the specified existing column.');
            }

            return $this;
        });
    }
}
