<div>
    <center>
        <h3>Hello my name is {{ $card->person_name }}</h3>
        <h2>My history</h2>
        <span>Lorem ipsum dolor sit amet. Eum nemo commodi ut autem laborum id cumque ratione nam ducimus asperiores</span>
    </center>

    <br />

    <center>
        <a href="{{$card->github_url}}">
            <button>GitHub</button>
        </a>

        <a href="{{$card->linkedin_url}}">
            <button>LinkedIn</button>
        </a>
    </center>
</div>