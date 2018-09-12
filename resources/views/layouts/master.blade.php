@include('layouts.head')

@include('layouts.nav')

<main class="container pt-3">
    <section class="card-section pt-5">

        <h2 class="card-section-title">Starting Deck Of Cards</h2>

        <div class="card-wrap">

            @foreach ($deck_of_cards as $card)

                @include('partials.card')

            @endforeach

        </div>

    </section>

    <section class="card-section pt-5">

        <h2 class="card-section-title">Shuffled Deck Of Cards</h2>

        <a class="btn btn-secondary card-section-btn" id="shuffle-btn" href="">Shuffle Cards</a>

        <div class="card-wrap" id="shuffle-card-wrap">

            @foreach ($shuffled_cards as $card)

                @include('partials.card')

            @endforeach

        </div>

    </section>

    <section class="card-section pt-5">

        <h2 class="card-section-title">Reordered Deck Of Cards</h2>

        <div class="card-wrap">

            @foreach ($reordered_cards as $card)

                @include('partials.card')

            @endforeach

        </div>

    </section>

</main>


@include('layouts.footer');

