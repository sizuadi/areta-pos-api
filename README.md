# Mini-POS

## Installation:
1. Clone this repository
    ```bash
    git clone https://github.com/akunbeben/mini-pos.git

    cd mini-pos
    ```

2. Run composer install to install the dependencies
   ```bash
   composer install
   ```

3. Setup Environtment variable file, and setup the database in <code>.env</code> file
   ```bash
   cp .env.example .env
   ```

4. Run the migration with seeder
   ```bash
   php artisan migrate --seed
   ```

5. Generate the application key
   ```bash
   php artisan key:generate
   ```

6. Make symlink folder.
   ```bash
   php artisan storage:link
   ```

7. Aplication ready to run, you can run it from artisan serve
   ```bash
   php artisan serve
   ```

## Credentials
- Username / Email : admin@admin.com
- Password : 12345678

## Dependencies
- **Laravel - 8.x**
- **laravel/fortify - 1.8.x**
- **akunbeben/laravository - 1.0.3**
- **intervention/image - 2.7**
- **laravel-lang/lang - 8.0**
- **orangehill/iseed - 3.0**
- **yoeunes/toastr - 1.2**
- **Bootstrap - 4.6**
- **Sweetalert2 - 11.x**
- **jQuery - 3.6.x**
- **Select2 - 4.0.x**

## DML - Data Manipulation Language
- **SELECT**
- **INSERT**
- **UPDATE**
- **DELETE**

## Route list

| Method    | URI                             | Name                     | Action                                                                  
|-----------|---------------------------------|--------------------------|-------------------------------------------------------------------------|
| GET       | api/products                    | api.products.index       | App\Http\Controllers\API\ProductController@index                        |
| PUT       | api/products/{product}          | api.products.update      | App\Http\Controllers\API\ProductController@update                       |
| GET       | /                               | home                     | App\Http\Controllers\HomeController@index                               |
| GET       | categories                      | admin.categories.index   | App\Http\Controllers\Admin\CategoryController@index                     |
| POST      | categories                      | admin.categories.store   | App\Http\Controllers\Admin\CategoryController@store                     |
| GET       | categories/create               | admin.categories.create  | App\Http\Controllers\Admin\CategoryController@create                    |
| PUT       | categories/{category}           | admin.categories.update  | App\Http\Controllers\Admin\CategoryController@update                    |
| DELETE    | categories/{category}           | admin.categories.destroy | App\Http\Controllers\Admin\CategoryController@destroy                   |
| GET       | categories/{category}/edit      | admin.categories.edit    | App\Http\Controllers\Admin\CategoryController@edit                      |
| GET       | products                        | admin.products.index     | App\Http\Controllers\Admin\ProductController@index                      |
| POST      | products                        | admin.products.store     | App\Http\Controllers\Admin\ProductController@store                      |
| GET       | products/create                 | admin.products.create    | App\Http\Controllers\Admin\ProductController@create                     |
| GET       | products/{product}              | admin.products.show      | App\Http\Controllers\Admin\ProductController@show                       |
| PUT       | products/{product}              | admin.products.update    | App\Http\Controllers\Admin\ProductController@update                     |
| DELETE    | products/{product}              | admin.products.destroy   | App\Http\Controllers\Admin\ProductController@destroy                    |
| GET       | products/{product}/edit         | admin.products.edit      | App\Http\Controllers\Admin\ProductController@edit                       |
| GET       | products/{product}/image-upload | admin.products.image     | App\Http\Controllers\Admin\ProductController@image                      |
| GET       | login                           | login                    | Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@create  |
| POST      | login                           |                          | Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@store   |
| POST      | logout                          | logout                   | Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy |

