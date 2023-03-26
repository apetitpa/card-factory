<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Model;


use Apetitpa\CardFactory\Enum\CardSuit;
use Apetitpa\CardFactory\Enum\CardValue;

class Card {
    public function __construct(
        private readonly CardValue $value,
        private readonly CardSuit $suit
    ) {}

    public function getValue(): CardValue {
        return $this->value;
    }

    public function getSuit(): CardSuit {
        return $this->suit;
    }

    public function __toString(): string {
        return $this->value->value . $this->suit->value;
    }
}
