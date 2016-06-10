<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\Locatable;

class Buoy extends Model
{
    use Locatable;

    public $guarded = ['id'];
    protected $table = 'buoys';
    protected $geofields = ['location'];
}
