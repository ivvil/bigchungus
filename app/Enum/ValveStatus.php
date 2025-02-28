<?app

namespace App\Enum;

enum ValveStatus: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case UNREACHABLE = 'unreachable';
    case ERROR = 'error';
}
