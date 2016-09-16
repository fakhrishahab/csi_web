<?php

namespace csi;

use Illuminate\Database\Eloquent\Model;

class ContentHome extends Model
{
    protected $fillable = ['page_id', 'headline', 'description', 'image'];
}
