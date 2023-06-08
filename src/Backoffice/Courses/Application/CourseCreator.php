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
        $id     = new CourseId($id);
        $name   = new CourseName($name);
        $detail = new CourseDetail($detail);
        $image  = new CourseImage($image);
        $price   = new CoursePrice($price);

        $course = Course::create($id, $name, $detail, $image, $price);
        $this->repository->save($course);

    }

}
