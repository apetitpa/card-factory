# CardFactory

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![CI](https://github.com/apetitpa/card-factory/actions/workflows/ci.yaml/badge.svg?branch=main)

CardFactory is a PHP library designed to simplify the creation and management of card decks for card games. It provides an organized and extensible structure with classes and enumerations for cards, suits, values, and decks, making it easy to build and manipulate card decks in a variety of game scenarios.

## Requirements

- PHP >= 8.1

## Installation

To install CardFactory, use [Composer](https://getcomposer.org/):

```bash
composer require apetitpa/card-factory
```

## Usage

Here's a basic example of how to use CardFactory to create and manipulate a deck of cards:

```php
use Apetitpa\CardFactory\Model\Deck;

// Create a standard deck of 52 playing cards (shuffled by default)
$deck = Deck::createStandardDeck();

// To create an ordered (not shuffled) deck, use:
$deck = Deck::createStandardDeck(false);

// Shuffle the deck
$deck->shuffle();

// Draw the top card from the deck
$card = $deck->drawCard();

// Check the card's suit and value
$suit = $card->getSuit();
$value = $card->getValue();
```

## Running the project locally

You can install CardFactory via [Composer](https://getcomposer.org/):

```bash
make install
```

## Code analysis

CardFactory uses [PHPStan](https://phpstan.org/) and [Psalm](https://psalm.dev/) for static code analysis. To run PHPStan and Psalm, follow these steps:

### PHPStan

```bash
make phpstan
```

### Psalm

```bash
make psalm
```

## Testing

To run the tests, execute the following command at the root of the project:

```bash
make test
```

## License

CardFactory is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
