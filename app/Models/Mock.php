<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mock extends Model
{
    use HasFactory, SoftDeletes;
    const METHOD_GET = 0;

    public function getMethodLabelAttribute()
    {
        switch ( $this->method )
        {
            case 0:
            return __( 'GET' );
            default: return __( 'UNKNOWN' );
        }
    }

    public function templates()
    {
        return $this->hasMany( MockTemplate::class );
    }
}
