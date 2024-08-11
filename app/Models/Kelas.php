<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

  protected $fillable = [
    'kelas',
    'jurusan',
  ];

  public function praktik()
  {
    return $this->hasMany(Praktik::class);
  }
}
