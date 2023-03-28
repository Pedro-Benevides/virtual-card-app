<div>
    <h3>Hello my name is {{ $card->person_name }}</h3>

    <div>
        <h2>My history</h2>
        <span>Lorem ipsum dolor sit amet. Eum nemo commodi ut autem laborum id cumque ratione nam ducimus asperiores</span>
    </div>

    <br />

    <div>
        <a href="{{$card->linkedin_url}}">
            <button>LinkedIn</button>
        </a>

        <a href="{{$card->github_url}}">
            <button>GitHub</button>
        </a>
    </div>
</div>