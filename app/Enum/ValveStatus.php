<?php
namespace App\Enum;

enum ValveStatus: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case UNREACHABLE = 'unreachable';
    case ERROR = 'error';

    public function label(): string
    {
        return match($this) {
            self::OPEN => 'Open',
            self::CLOSED => 'Closed',
            self::UNREACHABLE => 'Unreachable',
            self::ERROR => 'Error',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
