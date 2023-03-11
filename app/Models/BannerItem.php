<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerItem extends Model
{
    use HasFactory;

    protected $table = "banner_items";

    protected $fillable = [

        'image',
        'btn_link',
        'heading',
        'sub_heading',
        'short_description',
        'banner_id'

    ];

    public function banner()
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }
}
