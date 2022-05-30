<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMockRequest extends Model
{
    use HasFactory;

    protected $fillable = [ 'template_id', 'mock_id', 'params', 'headers', 'response', 'method' ];
}
