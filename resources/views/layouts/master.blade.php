@include('layouts.head')

@include('layouts.nav')

<main class="container pt-3">
    <section class="card-section pt-5">

        <h2>Starting Deck Of Cards</h2>

        @foreach ($deck_of_cards as $card)

            @include('partials.card')

        @endforeach

    </section>

    <section class="motorbike-owners pt-5">

        <h2>Shuffled Deck Of Cards</h2>

        @foreach ($shuffled_cards as $card)

        {{ $card->suit }}
        {{ $card->value }}

        @endforeach

    </section>

    <section class="motorbike-owners pt-5">

        <h2>Reordered Deck Of Cards</h2>
        @foreach ($reordered_cards as $card)

        {{ $card->suit }}
        {{ $card->value }}

        @endforeach

    </section>

</main>


@include('layouts.footer');

