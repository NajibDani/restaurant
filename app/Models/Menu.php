<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'tbl_menus';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'name_menu',
        'category_menu',
        'rate_menu',
        'desc_menu',
        'price_menu',

    ];
}
