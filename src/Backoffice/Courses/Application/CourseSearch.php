<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Application;

use Paycomet\Backoffice\Courses\Domain\CourseRepository;
use Paycomet\Backoffice\Courses\Domain\CourseId;

final class CourseSearch
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id)
    {
        $courseId = new CourseId($id);
        return $this->repository->search($courseId);
    }
}

