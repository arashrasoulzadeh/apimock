<?php

namespace App\Http\Livewire;

use App\Models\Mock;
use Livewire\Component;

class MockIndex extends Component
{
    public $user,$team;

    public function render()
    {
        $this->user = auth()->user();
        $this->team = auth()->user()->currentTeam;
        $mocks = Mock::whereUserId( $this->user->getAuthIdentifier() )->whereTeamId( $this->team->id )->paginate();
        return view( 'livewire.mock-index', 
            [
                'mocks' =>  $mocks
            ]
         );
    }
}
