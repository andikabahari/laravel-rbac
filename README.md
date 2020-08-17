# Laravel RBAC

A simple Laravel application with Role-Based Access Control.

This application is built with Laravel 7.x version.

## Installation

Clone this repository.

```
git clone https://github.com/andikabahari/laravel-rbac.git
```

Install all the dependencies.

```
composer install
```

Set the database connection in the `.env` file. (Note: this is my configuration.)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-rbac
DB_USERNAME=root
DB_PASSWORD=
```

Run the migration and seeder.

```
php artisan migrate
php artisan db:seed
```

## Usage

Run the application!

```
php artisan serve
```

## User List

You can use these user credentials to login.

### Administrator

Email: administrator@example.com

Password: password

### Administrator (demo)

Email: administratordemo@example.com

Password: password

### User

Email: johndoe@example.com

Password: password

### User (demo)

Email: johndoedemo@example.com

Password: password

## Authorization

This application uses `Gates` for authorization.

This code below is an example how to use `Gates`, you can use `Gates` in the controller to authorize user's request.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItem;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view-item', Auth::user());

        $items = Item::all();

        return view('items', compact('items'));
    }

    ...
}
```

You can also use `Blade directives` (`@can`, `@cannot`, etc.) when writing blade templates.

```
@can('create-item', Auth::user())
    <a class="btn btn-success mb-3" href="{{ route('create-item') }}">
        {{ __('Add Item') }}
    </a>
@endcan
```

## Screenshots
