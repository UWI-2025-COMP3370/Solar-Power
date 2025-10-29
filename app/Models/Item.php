<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    // Use HasFactory;
    protected $fillable = ['name', 'description', 'price'];
    public function wishList(): BelongsToMany
    {
        return $this->belongsToMany(WishList::class);
    }
}
