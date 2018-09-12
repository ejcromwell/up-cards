# up-casino

## Card Shuffle example test.

Build steps:

1) Setup new local Laravel project.
2) Clone repo.
3) Set local .env file config.
4) run `npm run production` to build styles and scripts
6) Run on local web server.

The first section shows an ordered deck of cards from a an Deck object.

The second section shows a shuffled deck of cards, taking the first deck object and using php native `shuffle` to reoder the cards. Clicking the shuffle button will run the shuffle method again.

The last section takes the initial shuffled deck on runtime and filters the object back to match that of the original order. The reorder does not run on the shuffle button reorder, only at runtime.


