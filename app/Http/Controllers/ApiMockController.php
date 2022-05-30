<?php

namespace App\Http\Controllers;

use App\Models\ApiMockRequest;
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

        $response = response( $template->body )->header( 'content-type', 'application/json' );

        ApiMockRequest::create
        (
            [
                'template_id' => $template->id,
                'mock_id'     => $template->mock_id,
                'params'      => json_encode( $request->all() ),
                'headers'     => json_encode( $request->headers ),
                'response'    => $response->getContent(),
                'method'      => $request_method
            ]
        );

        return $response;

    }
}
