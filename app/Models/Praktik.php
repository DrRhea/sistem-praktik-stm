<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktik extends Model
{
    use HasFactory;

  protected $fillable = [
    'kelas_id',
    'pengajar_id',
    'judul',
    'deskripsi',
  ];

  public function kelas() {
    return $this->belongsTo(Kelas::class);
  }

  public function pengajar() {
    return $this->belongsTo(Pengajar::class);
  }
}
