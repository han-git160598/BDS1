<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admintiModel extends Model
{
    protected $table = 'tbl_tienich';
    protected $fillable = ['idtienich','tentienich'];
    public $timestamps = false;
    protected $primaryKey = 'idtienich';
}
