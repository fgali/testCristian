<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $dates    = ['deleted_at'];
    //protected $guarded  = ['id'];

    protected $fillable = [
        'name', 'category_name',
    ];

}
