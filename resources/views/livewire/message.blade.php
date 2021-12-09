<div>
   <div class="row justify-content-center" style="padding: 2%; min-height: 600px;max-height: 600px">
        <div class="col-md-3">
            <div class="shadow" style="background-color: #00A1F1; padding :2% 5% 2% 5%; border-radius: 20px; max-height: 10%;width: max-content;">
                <h2 class="text-center" style="color:white;">Conversations</h2>
            </div>

            {{-- START CHAT CLIENT --}}
            <div class="chat-client-list" style="max-height: 90%">
                @foreach($conversations as $conversation)

                <a class="shadow chat-client @if($conversation_activate == $conversation->id) active-chat @endif" wire:click="select_conversation({{ $conversation->id }})" >
                    <div class="row">
                        <div class="col-md-1 text-center" style="padding-right: 0px !important">
                            {{-- <img width="50" height="50" class="round" avatar="{{ $conversation->annonceur->name }}"> --}}
                        </div>
                        <div class="col-md-8" style="padding-left: 0px !important">
                            <span style="font-family: segouil;font-weight: bold"> {{ $conversation->annonce->titre }}</span> <br>
                            <span style="font-family: segouil;">Annonceur : {{ strtoupper($conversation->annonce->user->name) }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            {{-- END CHAT CLIENT --}}
        </div>
        <div class="col-md-6  form-search">
            @if(count($conversations) >0)
                <div class="card shadow" style="border-radius: 20px; height:  100%">
                    <div class="card-header" style="border-radius: 20px 20px 0px 0px">
                        <h5 class="card-title" style="font-family: segouil;font-weight: 100">
                            @if($conversation_selected)
                            <span style="font-weight: bold;font-size: 2em">{{ $conversation_selected->annonce->titre }} <br></span>
                            Annonceurs : {{ strtoupper($conversation_selected->annonce->user->name) }}
                            @else
                            Aucun Message
                            @endif
                        </h5>
                    </div>
                    <style>
                        .vertical-scrollable{
                            max-height: 300px;
                            overflow-y: scroll;
                        }
                    </style>
                    <div class="card-body" style="height:100%">
                        <div id="chatcard" class="vertical-scrollable"  style="height:100%" wire:poll.500ms="mountData">
                            @php
                                Carbon\Carbon::setLocale('fr');
                            @endphp

                            @foreach ($messages as $message )

                                @if($message->user_id == Auth::user()->id)
                                    <div style="background-color: #00A1F1; border:2px solide #000;color:white; width: max-content; padding: 1%; border-radius: 20px; margin-left: auto;margin-top: 2px">
                                        {{ $message->message }} <br>
                                        <span style="font-weight: 100;font-size: 0.8em">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</span>
                                    </div>
                                @else
                                    <div style="background-color: #00BB26; border:2px solide #000;color:white; width: max-content; padding: 1%; border-radius: 20px; margin-right: auto;">
                                        {{ $message->message }} <br>
                                        <span style="font-weight: 100;font-size: 0.8em">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</span>
                                    </div>
                                @endif
                            @endforeach


                            <script>

                                var objDiv = document.getElementById("chatcard");
                                console.log("ok");
                                objDiv.scrollTop = objDiv.scrollHeight;
                            </script>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="text" name="message" id="message" wire:model="message" wire:keydown.enter="send_message" required>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success" style="height: 40px;font-weight: 100;font-family: segouil;line-height: 0;border-radius: 20px;width: 100%" wire:click="send_message" >Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

