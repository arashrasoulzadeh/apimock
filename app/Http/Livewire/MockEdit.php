<?php

namespace App\Http\Livewire;

use App\Models\Mock;
use Illuminate\Http\Request;
use Livewire\Component;

class MockEdit extends Component
{
    private $mock_id = 0;
    public  $method = '0' ;

    protected $rules = 
    [
        'method'=>'string'
    ];

    public function mount( $id )
    {

        $this->mock_id = $id ;
    }

    public function render()
    {
        if ( $this->mock_id === 0  )
        {
            $this->mock_id = last(explode('/',$_SERVER['HTTP_REFERER']));
        }
        $mock = Mock::whereId( $this->mock_id )->whereUserId( auth()->user()->getAuthIdentifier() )->first();
        if ( !isset( $mock ) )
        {
            abort( 404 );
        }
        return view('livewire.mock-edit' , [ 'mock' => $mock ]);
    }

    public function updateMethod( $id )
    {

    }
}
