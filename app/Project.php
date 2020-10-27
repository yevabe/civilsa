<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

}
