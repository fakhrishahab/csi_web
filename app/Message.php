<?php

namespace csi;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['name', 'email', 'message'];
    // protected $table = 'messages';
}
