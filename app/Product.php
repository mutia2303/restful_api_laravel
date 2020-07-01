<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'quantity', 'active', 'description'];

    public function getCreatedAtAttribute()
	{
	    return \Carbon\Carbon::parse($this->attributes['created_at'])
	       ->format('Y-m-d h:i:s');
	}

	public function getUpdatedAtAttribute()
	{
	    return \Carbon\Carbon::parse($this->attributes['updated_at'])
	       ->format('Y-m-d h:i:s');
	}
	
    protected $hidden = ['created_at', 'updated_at'];
}
