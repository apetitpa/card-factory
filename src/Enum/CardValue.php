<?php

declare(strict_types=1);

namespace Apetitpa\CardFactory\Enum;

enum CardValue: string {
    case Ace = 'A';
    case King = 'K';
    case Queen = 'Q';
    case Jack = 'J';
    case Ten = 'T';
    case Nine = '9';
    case Eight = '8';
    case Seven = '7';
    case Six = '6';
    case Five = '5';
    case Four = '4';
    case Three = '3';
    case Two = '2';
}
