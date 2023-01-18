<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model {
    
    use HasFactory;

    protected $fillable = array('street', 'suite', 'city', 'zipcode', 'user_id');
    protected $guarded = array('id');
    protected $table = 'address';

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
