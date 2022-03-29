<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sold extends Model
{
    protected $table = 'sold';
    protected $fillable = [
        'user_id',
        'stock_id',
        'clean',
        'price_at',
        'piece'
    ];

    public function cashier(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
    }

    public function stocks_one(){
        return $this->hasOne('App\Models\buy' , 'id' , 'stock_id');
    }
    use HasFactory;
}
