<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
      'praktik_id',
      'hari',
      'jam_mulai',
      'jam_selesai',
    ];

  public function praktik() {
    return $this->belongsTo(Praktik::class);
  }
}
