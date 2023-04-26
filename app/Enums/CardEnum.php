<?php

namespace App\Enums;

use Illuminate\Support\Facades\Vite;

enum CardEnum: string
{
    case CHASE = 'Chase';
    case RUBEN = 'Ruben';
    case MARCUS = 'Marcus';
    case ROCKY = 'Rocky';
    case STELLA = 'Stella';
    case ZUMA = 'Zuma';
    case EVEREST = 'Everest';
    case RYDER = 'Ryder';
    case TURBOT = 'Capitaine Turbot';
    case GOODWAY = 'Mme la Maire Goodway';
    case GALLINETTA = 'Gallinetta';
    case JAKE = 'Jake';
    case HOLLINGER = 'M. le Maire Hollinger';
    case YUMI = 'La fermière Yumi';
    case MAURICE = 'Maurice';

    public function image(): string
    {
        return match ($this) {
            default => Vite::asset('resources/images/'.strtolower($this->name).'.png'),
        };
    }

    public static function default_image(?string $path = 'resources/images/default.png'): string
    {
        return Vite::asset($path);
    }
}
