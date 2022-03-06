<?php 

namespace App\Renderers;
use Closure;
use Faker\Factory;

class IntRange
{
	private $usedWords = [];

	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{word}}/',function ( $body ) 
    	{
    		return 1;
    	} , $request->body ) ;
        return $next( $request );
	}
}