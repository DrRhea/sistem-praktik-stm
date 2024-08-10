<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktik extends Model
{
    use HasFactory;

  protected $fillable = [
    'pengajar_id',
    'judul',
    'deskripsi',
  ];

  public function pengajar() {
    return $this->belongsTo(Pengajar::class);
  }
}
