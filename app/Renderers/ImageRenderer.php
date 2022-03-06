<?php 

namespace App\Renderers;
use Closure;

class ImageRenderer
{
	public $images = 
	[
		'https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_100kB.jpg',
		'https://file-examples-com.github.io/uploads/2017/10/file_example_PNG_500kB.png'
	];
	public function handle($request, Closure $next)
    {
    	$request->body = preg_replace_callback( '/{{img}}/',function ( $body ) 
    	{
    		return $this->images[ array_rand( $this->images ) ];
    	} , $request->body ) ;
        return $next( $request );
	}
}