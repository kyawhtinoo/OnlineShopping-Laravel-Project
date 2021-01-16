<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable=['orderdate','user_id','total','status','orderno','note'];

    public function items($value='')
    {
       return $this->belongsToMany('App\Item','orderdetails')->withPivot('qty')->withTimestamps();
    }

    public function user($value='')
    {
    	return $this->belongsTo('App\user');
    }
}
