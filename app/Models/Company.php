<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model {
    
    use HasFactory;

    protected $fillable = array('companyname', 'bs', 'user_id');
    protected $guarded = array('id');
    protected $table = 'company';

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
