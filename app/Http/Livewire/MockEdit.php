<?php

namespace App\Http\Livewire;

use App\Models\Mock;
use Illuminate\Http\Request;
use Livewire\Component;

class MockEdit extends Component
{
    private $mock_id = 0;
    public $method = ' not set ' ;

    public function mount( Request $request )
    {
        $this->mock_id = $request->id;
    }

    public function updateMethod( )
    {
        
    }

    public function render()
    {
        $mock = Mock::whereId( $this->mock_id )->whereUserId( auth()->user()->getAuthIdentifier() )->first();

        if ( !isset( $mock ) )
        {
            abort( 404 );
        }
        return view('livewire.mock-edit' , [ 'mock' => $mock ]);
    }
}
