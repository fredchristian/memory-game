<?php

namespace App\Enums;

enum DifficultyEnum: string
{
    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';

    public static function default(): self
    {
        return self::EASY;
    }

    public static function select($difficulty): self
    {
        return static::tryFrom($difficulty) ?? static::default();
    }

    public function name(): string
    {
        return match ($this) {
            self::EASY => __('Facile'),
            self::MEDIUM => __('Moyen'),
            self::HARD => __('Difficile'),
        };
    }

    public function tiles()
    {
        return match ($this) {
            self::EASY => 4,
            self::MEDIUM => 6,
            self::HARD => 8,
        };
    }
}
