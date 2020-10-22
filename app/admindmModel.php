<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admindmModel extends Model
{
    protected $table = 'tbl_danhmuc';
    protected $fillable = ['iddanhmuc','tendanhmuc'];
    public $timestamps = false;
    protected $primaryKey = 'iddanhmuc';
}
