<?php 

namespace App\Renderers;
use Closure;
use Faker\Factory;

class IntRange
{
	private $usedWords = [];

	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{int:\d+-\d+}}/',function ( $body ) 
    	{
    		$data = explode( '-', explode( '}}', explode( ':', $body[ 0 ] )[ 1 ] )[ 0 ] );
    		$from = $data[ 0 ];
    		$to   = $data[ 1 ]; 
    		return rand( $from, $to );
    	} , $request->body ) ;
        return $next( $request );
	}
}