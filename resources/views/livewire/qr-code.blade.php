<div>
    <center>
        <h2>{{$card->person_name}}</h2>
        <div>
            <span>Here is your Qr-code with the link to your virtual card, save in your phone!</span>
        </div>
        <img src="{{ route('gen-code', ['cardUuid' => $card->uuid]) }}" width="20%" height="40%">
    </center>
    <center>
        <button wire:click="exports">Download Qr-code</button>
        <button onclick="window.print()">Download Page</button>
    </center>
</div>