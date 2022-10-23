<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'sala_id'
    ];

    public function sala()
    {
        return $this->hasOne(Sala::class);
    }

    public function id_youtube()
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $this->url, $matches);
        return array_key_exists(1, $matches) ? $matches[1] : null;
    }
}
