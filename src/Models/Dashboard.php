<?php

namespace Acme\MyStats\Models;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Dashboard extends Model
{
    use Uuid;

    protected $table = 'my_stats_dashboards';

    protected $keyType = 'string';

    protected $guarded = ['id'];
}
