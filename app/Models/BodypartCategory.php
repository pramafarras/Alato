<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodypartCategory extends Model
{
    use HasFactory;

    protected $table = 'bodypart_category';
    public function bodyparts()
{
    return $this->hasMany(Bodyparts::class, 'category_id');
}
}
