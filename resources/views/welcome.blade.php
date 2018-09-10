<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Pulling in Bootstrap core CSS for brevity. Would use concatenated version in production -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upshoot Playing Cards</title>

    <body>
        <header>

            <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
              <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Upshoot Casino</a>
            </nav>

        </header>
        <main class="container pt-5">
            <section class="colour-count pt-3">
                <h2>Order Deck of Cards</h2>
                @foreach ($deck_of_cards as $card)

                {{ $card->suit }}
                {{ $card->value }}

                @endforeach
            </section>

            <section class="motorbike-owners pt-3">
                <h2>Shuffled Deck Of Cards</h2>
            </section>
        </main>
    </body>
</html>


