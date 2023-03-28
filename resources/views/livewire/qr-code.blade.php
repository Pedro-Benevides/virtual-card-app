<div>
    <center>
        <h2>{{$card->person_name}}</h2>
        <center>
            <span>Here is your Qr-Code with the link to your virtual card, save in your phone!</span>
        </center>
        <img src="{{ route('gen-code', ['cardUuid' => $card->uuid]) }}" width="20%" height="40%">
    </center>
    <center>
        <button wire:click="exports">Baixar</button>
    </center>
</div>