<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TirageWinMac extends Model
{
    use HasFactory;

    protected $table = 'tirage_win_macs';
    protected $fillable = ['tirage_win','tirage_mac','mode'];
    protected $casts = [
      'tirage_win'  => 'array',
      'tirage_mac'  => 'array',
      'mode'        => 'string'
    ];
}
