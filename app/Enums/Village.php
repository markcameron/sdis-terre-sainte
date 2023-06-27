<?php

namespace App\Enums;

enum Village: string {
    case BogisBossey = 'Bogis-Bossey';
    case Celigny = 'Céligny';
    case ChavannesDeBogis = 'Chavannes-de-Bogis';
    case ChavannesDesBois = 'Chavannes-des-Bois';
    case Commugny = 'Commugny';
    case Coppet = 'Coppet';
    case Founex = 'Founex';
    case Mies = 'Mies';
    case Tannay = 'Tannay';

    public static function fromIntervention(?string $village): ?self
    {
        return match ($village) {
            'BOGIS-BOSSEY' => Village::BogisBossey,
            'CELIGNY' => Village::Celigny,
            'CHAVANNES-DE-BOGIS' => Village::ChavannesDeBogis,
            'CHAVANNES-DES-BOIS' => Village::ChavannesDesBois,
            'COMMUGNY' => Village::Commugny,
            'COPPET' => Village::Coppet,
            'FOUNEX' => Village::Founex,
            'MIES' => Village::Mies,
            'TANNAY' => Village::Tannay,
            default => null,
        };
    }
}
