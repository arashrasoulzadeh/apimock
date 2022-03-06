<?php 

namespace App\Renderers;
use Closure;
use Faker\Factory;

class LoremWord
{
	private $usedWords = [];

	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{word}}/',function ( $body ) 
    	{
    		$faker = Factory::create();
    		$word  = $faker->word();
    		while ( isset( $this->usedWords[ $word ] ) )
    		{
    			$word  = $faker->word();
    		}
    		$this->usedWords[] = $word;
    		return $word;
    	} , $request->body ) ;
        return $next( $request );
	}
}