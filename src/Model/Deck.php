<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Model;

use Apetitpa\CardFactory\Enum\CardSuit;
use Apetitpa\CardFactory\Enum\CardValue;

class Deck
{
    /** @param Card[] $cards */
    private function __construct(private array $cards)
    {
    }

    public static function createStandardDeck(bool $shuffle = true): self
    {
        $cards = [];
        foreach (CardSuit::cases() as $suit) {
            foreach (CardValue::cases() as $value) {
                $cards[] = new Card($value, $suit);
            }
        }

        $deck = new self($cards);

        if ($shuffle) {
            $deck->shuffle();
        } else {
            $deck->sort();
        }

        return $deck;
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function sort(): void {
        usort($this->cards, function (Card $a, Card $b) {
            if ($a->getSuit() === $b->getSuit()) {
                return $a->getValue()->value <=> $b->getValue()->value;
            }

            return $a->getSuit()->value <=> $b->getSuit()->value;
        });
    }

    public function drawCard(): ?Card
    {
        return array_shift($this->cards) ?: null;
    }

    /** @return Card[] */
    public function getCards(): array
    {
        return $this->cards;
    }
}
