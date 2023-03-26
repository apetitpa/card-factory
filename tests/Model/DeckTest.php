<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Tests\Model;

use Apetitpa\CardFactory\Enum\CardSuit;
use Apetitpa\CardFactory\Enum\CardValue;
use Apetitpa\CardFactory\Model\Deck;
use Apetitpa\CardFactory\Model\Card;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testCreateStandardDeckShuffled(): void
    {
        $deck = Deck::createStandardDeck();
        $this->assertCount(52, $deck->getCards());

        $uniqueCards = [];
        foreach ($deck->getCards() as $card) {
            $uniqueCards[$card->getSuit()->value . '_' . $card->getValue()->value] = true;
        }
        $this->assertCount(52, $uniqueCards, 'All cards in the deck should be unique.');
    }

    public function testCreateStandardDeckNotShuffled(): void
    {
        $deck = Deck::createStandardDeck(false);

        $expectedCards = [];
        foreach (CardSuit::cases() as $suit) {
            foreach (CardValue::cases() as $value) {
                $expectedCards[] = new Card($value, $suit);
            }
        }

        $this->assertEquals($expectedCards, $deck->getCards(), 'Deck should be in the expected order when shuffle is set to false.');
    }

    public function testShuffleDeck(): void
    {
        $deck = Deck::createStandardDeck(false);
        $originalOrder = $deck->getCards();

        $deck->shuffle();
        $shuffledOrder = $deck->getCards();

        $this->assertNotEquals($originalOrder, $shuffledOrder, 'The order of cards in the deck should change after shuffling.');
    }

    public function testDrawCard(): void
    {
        $deck = Deck::createStandardDeck();
        $deckSizeBefore = count($deck->getCards());

        $card = $deck->drawCard();
        $this->assertInstanceOf(Card::class, $card);

        $deckSizeAfter = count($deck->getCards());
        $this->assertEquals($deckSizeBefore - 1, $deckSizeAfter, 'The size of the deck should decrease by 1 after drawing a card.');
    }

    public function testDrawCardWhenDeckIsEmpty(): void
    {
        $deck = Deck::createStandardDeck(false);

        for ($i = 0; $i < 52; $i++) {
            $deck->drawCard();
        }

        $this->assertEmpty($deck->getCards(), 'The deck should be empty after drawing all cards.');

        $card = $deck->drawCard();
        $this->assertNull($card, 'drawCard() should return null when the deck is empty.');
    }

    public function testShuffleEmptyDeck(): void
    {
        $deck = Deck::createStandardDeck(false);

        for ($i = 0; $i < 52; $i++) {
            $deck->drawCard();
        }

        $this->assertEmpty($deck->getCards(), 'The deck should be empty.');

        $deck->shuffle();
        $this->assertEmpty($deck->getCards(), 'Shuffling an empty deck should not change its state.');
    }
}
