<?php

namespace csi;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'name', 'uri', 'content'];
}
