<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'user_id'];


    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? null) {
            $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('users.name', 'like', '%' .  request('search') . '%')
            ->join('users' , 'users.id', '=', 'tasks.user_id');
        }
    }



    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
