<h1>ArionMigrations</h1>

<h2>About the package</h2>

ArionsMigrations is a simple Laravel package that allows the users to create migrations using the
method ```before();``` . Until now Laravel allows users to update a table and use only ```after();```

This can be a bit time wasting for a user that needs to see the table to find which column comes so they can
use ```after();``` when they know the other column.

<h2>Install on Laravel</h2>

```composer require arionmigrations/arion-migrations```

<h2>Add the provider in the app.php</h2>

```ArionMigrations\Providers\ArionMigrationServiceProvider::class```

<h2>Example</h2>

With ```after();``` its like this:

```
 Schema::create('users', function (Blueprint $table) {
            $table->string('email')->before('name');
        });
```

With ```before();``` its like this:

```
 Schema::create('users', function (Blueprint $table) {
            $table->before('before_column_name','new_column_name','type', 'length', 'default'); 
        });
```
The default length for string is ```255```, but you can add your own length and the default is nullable but it can be changed.

After you have writen the migration just execute the migration 

```php artisan migrate```

