<?php

namespace App\Http\Controllers;

use App\Models\Mock;
use App\Services\TemplateEngineService;
use Illuminate\Http\Request;

class ApiMockController extends Controller
{
    public function handle( Request $request, $id )
    {
        $mock = Mock::findOrFail( $id );
        $request_method = $request->getMethod();
        if ( $mock->methodLabel !== $request_method )
        {
            abort( 405 );
        }
        $template = $mock->templates()->latest()->first();
        $rendered = TemplateEngineService::render( $template );
        return response( $template->body )->header( 'content-type', 'application/json' );
    }
}
