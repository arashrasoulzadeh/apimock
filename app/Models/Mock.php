<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function requests()
    {
        return $this->hasMany( ApiMockRequest::class );
    }

    public function getlastCallAttribute()
    {
        return $this->requests()->latest()?->first()?->created_at ?? __( 'NO_REQUEST' );
    }

    public function getTemplateAttribute()
    {
        return $this?->templates()?->latest()?->first()?->body;
    }
}
