<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'nip',
      'telepon',
    ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function pengajar() {
    return $this->belongsTo(Pengajar::class);
  }
}
