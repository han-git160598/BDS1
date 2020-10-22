<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bdModel extends Model
{
    protected $table = 'tbl_baidang';
    protected $fillable = ['idbd',
    'tenbd',
    'diachibd',
    'trangthaibd',
    'giabd',
    'motabd',
    'loaibd',
    'sdtbd',
    'toado',
    'thoigian',
    'dientich',
    'phongngu',
    'nhatam',
    'lat',
    'lng',
    'sotang',
    'mattien',
    'oto',
    'chieungang',
    'diachiall',
    'idsell',
    'iddanhmuc'
];
    public $timestamps = false;
    protected $primaryKey = 'idbd';
}
