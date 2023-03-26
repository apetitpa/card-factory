<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Tests\Model;

use Apetitpa\CardFactory\Enum\CardSuit;
use Apetitpa\CardFactory\Enum\CardValue;
use Apetitpa\CardFactory\Model\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testCreateCard(): void
    {
        $card = new Card(CardValue::Ace, CardSuit::Spades);

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals(CardSuit::Spades, $card->getSuit());
        $this->assertEquals(CardValue::Ace, $card->getValue());
    }
}
