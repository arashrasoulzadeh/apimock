<?php

namespace App\Services;

use App\Models\MockTemplate;
use App\Renderers\ImageRenderer;
use App\Renderers\IntRange;
use App\Renderers\LoremWord;
use Illuminate\Pipeline\Pipeline;

class TemplateEngineService
{
	public static function render( MockTemplate $template )
	{
		return app( Pipeline::class )
		->send( $template )
		->through
		(
			[
				ImageRenderer::class,
				LoremWord::class,
				IntRange::class
			]
		)
		->then( function ( $content ) {
            return $content;
        });
		return $template->body;
	}
}