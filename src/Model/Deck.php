<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Model;

use Apetitpa\CardFactory\Enum\CardSuit;
use Apetitpa\CardFactory\Enum\CardValue;

class Deck
{
    /** @var Card[] */
    private array $cards;

    /** @param Card[] $cards */
    private function __construct(array $cards)
    {
        $this->cards = $cards;
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
        }

        return $deck;
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
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
