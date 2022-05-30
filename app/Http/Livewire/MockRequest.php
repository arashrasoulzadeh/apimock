<?php

namespace App\Http\Livewire;

use App\Models\ApiMockRequest;
use App\Models\Mock;
use Illuminate\Http\Request;
use Livewire\Component;

class MockRequest extends Component
{
    private $mock_id = 0;
    public  $method = '0';
    public  $requests;

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

        $this->requests = ApiMockRequest::whereMockId( $this->mock_id )->orderBy( 'id', 'desc' )->take(10)->get()->toArray();
        return view('livewire.mock-request' , [ 'mock' => $mock, 'requests' => $this->requests ]);
    }
}
