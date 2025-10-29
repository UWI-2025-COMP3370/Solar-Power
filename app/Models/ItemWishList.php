<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWishList extends Model
{
    //
protected $fillable = [
'wish_list_id',
'item_id',
'quantity',
'price'];


}
