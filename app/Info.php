<?php

namespace csi;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'fax', 'image', 'longitude', 'latitude'];
}
