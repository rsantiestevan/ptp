<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Application;

final class CourseCreator
{
    private $repository;
    private $bus;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
        #$this->bus = $bus;
    }

    public function __invoke(
        string $id,
        string $name,
        string $detail,
        string $image,
        string $price,
    )
    {
        $course = Course::create(
            CourseId::random(),
            new CourseName($name),
            new CourseDetail($detail),
            new CourseImage($image),
            new CoursePrice($price)
        );
        $this->repository->save($course);

    }

}
