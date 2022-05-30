<?php 

namespace App\Renderers;
use Closure;
use Faker\Factory;

class Integer
{
	private $usedWords = [];

	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{integer}}/',function ( $body ) 
    	{
    		return rand( 100,999 );
    	} , $request->body ) ;
        return $next( $request );
	}
}