<?php

namespace App\Http\Livewire;

use App\Models\conversation;
use App\Models\message as ModelsMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $conversation_activate ="";
    public $conversation_selected ="";
    public $message ="";

    public function mount(){
        if(Auth::user()->conversation->count() >0){
            $this->conversation_activate = Auth::user()->conversation->first()->id;
            $this->conversation_selected = conversation::findOrfail($this->conversation_activate);
        }

    }

    public function select_conversation($id){

        $this->conversation_activate = $id;
        $this->conversation_selected = conversation::findOrfail($id);

    }

    public function mountData(){

        $this->render();
    }

    public function send_message(){
        $message = new ModelsMessage();
        $message->conversation_id = $this->conversation_activate;
        $message->user_id = Auth::user()->id;
        $message->message = $this->message;
        $message->save();
        $this->message= "";
    }

    public function render()
    {
        return view('livewire.message',[
            'conversations'=> Auth::user()->conversation,
            'messages'=>ModelsMessage::where('conversation_id','=',$this->conversation_activate)->orderBy('created_at','ASC')->get()
        ]);
    }
}
