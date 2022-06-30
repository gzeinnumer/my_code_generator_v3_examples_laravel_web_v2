# my_code_generator_v3_examples_laravel_web_v2
 
---
#### Laravel Start


```
composer install --ignore-platform-reqs
```

Or

```
composer update --ignore-platform-reqs
```

---

If Datatables. follow this step :

#### Datatables

[Source](https://adinata-id.medium.com/server-side-datatables-menggunakan-yajra-1-pada-laravel-adminlte-c101f1276085)


```
composer require yajra/laravel-datatables-oracle:"~9.0"
```

- config/app.php

```php
'providers' => [ ..., Yajra\DataTables\DataTablesServiceProvider::class, ]
'aliases' => [ ..., 'DataTables' => Yajra\DataTables\Facades\DataTables::class, ]
```

```
php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
```