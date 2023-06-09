<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Application;

use mysql_xdevapi\Collection;
use Paycomet\Backoffice\Courses\Domain\CourseRepository;

final class CourseSearchAll
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke():array
    {
        return $this->repository->searchAll();
    }

}
