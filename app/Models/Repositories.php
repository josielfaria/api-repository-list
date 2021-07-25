<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repositories extends Model
{
  use HasFactory;

  protected $table = 'repositories';

  protected $fillable = [
    'id', 'name', 'link'
  ];

  static function rules()
  {
    return [
      'name' => 'required|string|max:100',
      'link' => 'required|string|max:100',
    ];
  }

  public function orders()
  {
    return $this->hasMany(Order::class, 'id', 'name');
  }
}
