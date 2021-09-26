<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $guarded =[];
    /**
     * Get the user that owns the Contest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
    public function winner_activity()
    {
        return $this->belongsTo(SubActicity::class, 'winner_id_activity');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get all of the comments for the Contest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentns()
    {
        return $this->hasMany(Contestant::class, 'contest_id');
    }
    public function userCactitcity()
    {
        return $this->hasMany(SubActicity::class, 'contest_id');
    }
    
    public function actitvity(){
        return $this->hasOne(Activity::class, 'constant_id');
    }
    protected $dates = [ 'date_to_drow','date_to_show' ];

}
