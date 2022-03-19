<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductHistory extends Model
{
    use SoftDeletes;

    protected $table = 'product_histories';
    public $timestamps = true;

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function user_request() {
        return $this->hasOne('App\Models\UserRequest', 'id', 'user_request_id');
    }
}
