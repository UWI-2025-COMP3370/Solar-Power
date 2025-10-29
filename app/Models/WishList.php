<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WishList extends Model
{
    //
    protected $fillable = [
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function item(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity');
    }
}
