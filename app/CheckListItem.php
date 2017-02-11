<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckListItem extends Model
{
    protected $fillable = ['title', 'task', 'finished'];
    
    protected $casts = ['finished' => 'boolean'];
}