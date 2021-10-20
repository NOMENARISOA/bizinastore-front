<?php

namespace App\Http\Livewire;

use App\Models\annonce;
use App\Models\conversation;
use App\Models\message as ModelsMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $conversation_activate ="";
    public $conversation_selected ="";
    public $message ="";
    private $conversations = [] ;
    public function mount(){
        $this->getConversation();


        if(count($this->conversations) >0){

            $this->conversation_activate = $this->conversations[0]->id;
            $this->conversation_selected = $this->conversations[0];
        }

    }

    public function getConversation(){
        $messages = ModelsMessage::where("user_id",'=',Auth::user()->id)->groupBy("conversation_id")->get();

        foreach($messages as $message){
            $this->conversations += array(conversation::findOrfail($message->conversation_id));
        }

        $annonces = annonce::where("user_id",'=',Auth::user()->id)->get();
        foreach($annonces as $annonce){

            if($annonce->conversation->count() > 0){
               foreach($annonce->conversation as $conversation){
                $this->conversations += array(conversation::findOrfail($conversation->id));
               }

            }
        }
        ///dd($this->conversations);
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
        $this->getConversation();

        return view('livewire.message',[
            'conversations'=> $this->conversations,
            'messages'=>ModelsMessage::where('conversation_id','=',$this->conversation_activate)->orderBy('created_at','ASC')->get()
        ]);
    }
}
