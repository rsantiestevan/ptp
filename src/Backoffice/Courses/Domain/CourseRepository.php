<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Domain;

use Paycomet\Backoffice\Courses\Domain\Course;
use Paycomet\Backoffice\Courses\Domain\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
