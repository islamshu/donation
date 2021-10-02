<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrizeRequest extends Model
{
    protected $guarded=[];
    /**
     * Get the user that owns the PrizeRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class, 'contest_id');
    }
}
