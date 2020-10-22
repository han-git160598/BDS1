<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blModel extends Model
{
    protected $table = 'tbl_binhluan';
    protected $fillable = ['idbinhluan','email','noidung','idbd','idsell'];
    public $timestamps = false;
    protected $primaryKey = 'idbinhluan';
}
