<?php

namespace csi;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['page_id', 'headline', 'description', 'image', 'title'];

    public function getId($url)
    {
		$parsed = parse_url($url);
		$path = $parsed['path'];
		$path_parts = explode('/', $path);
		return $path_parts[4];
    }
}
