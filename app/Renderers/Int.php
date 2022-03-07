<?php 

namespace App\Renderers;
use Closure;
use Faker\Factory;

class Int
{
	private $usedWords = [];

	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{int}}/',function ( $body ) 
    	{
    		return rand( 100,999 );
    	} , $request->body ) ;
        return $next( $request );
	}
}