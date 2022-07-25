<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'menara';
    protected $guarded = [];

    public function galleries()
    {
     return $this->hasMany(GalleryTable::class, 'menara_id');
    }
}
