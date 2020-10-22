<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersellModel extends Model
{
    protected $table = 'tbl_usersell';
    protected $fillable = ['idsell','tensell','emailsell','passwordsell','sdtsell','ngaysinhsell','capdosell'];
    public $timestamps = false;
    protected $primaryKey = 'idsell';
}
