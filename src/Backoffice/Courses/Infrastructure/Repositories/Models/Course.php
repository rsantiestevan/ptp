<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
final class Course extends Model
{
    use HasFactory;
    public $incrementing = false;

    public $keyType = 'string';
    protected static function newFactory()
    {
        return app(CourseFactory::class);
    }

}
