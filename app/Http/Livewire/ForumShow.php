<?php

namespace App\Http\Livewire;

use App\Models\forum;
use Livewire\Component;
use Livewire\WithPagination;

class ForumShow extends Component
{
    use WithPagination;

    public $search = "";

    protected $queryString = [
        'search'=> ['except' => '']
    ];

    public function paginationView(){

        return 'livewire.pagination';

    }

    public function render()
    {
        return view('livewire.forum-show',[
            'forums'=> forum::where('titre','LIKE',"%{$this->search}%")->paginate(6)
        ]);
    }
}
