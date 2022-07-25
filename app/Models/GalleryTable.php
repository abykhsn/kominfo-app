<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTable extends Model
{
    use HasFactory;
    protected $table = 'menara_galeri';
    protected $guarded = [];

    public function product()
    {
      return $this->belongsTo(Table::class, 'menara_id');
    }
}
