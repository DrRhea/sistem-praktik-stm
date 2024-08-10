<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

  protected $fillable = [
    'siswa_id',
    'praktik_id',
    'nilai',
  ];

  public function siswa() {
    return $this->belongsTo(Siswa::class);
  }

  public function praktik() {
    return $this->belongsTo(Praktik::class);
  }
}
