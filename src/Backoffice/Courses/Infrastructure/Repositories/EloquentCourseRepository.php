<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Courses\Infrastructure\Repositories;

use Paycomet\Backoffice\Courses\Domain\CourseRepository;
use Paycomet\Backoffice\Courses\Domain\Course;
use Paycomet\Backoffice\Courses\Domain\CourseId;
use Paycomet\Backoffice\Courses\Domain\CourseName;
use Paycomet\Backoffice\Courses\Domain\CourseDetail;
use Paycomet\Backoffice\Courses\Domain\CourseImage;
use Paycomet\Backoffice\Courses\Domain\CoursePrice;

use Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models\Course as EloquentCourseModel;

final class EloquentCourseRepository implements CourseRepository
{
    private $eloquentCourseModel;

    public function __construct()
    {
        $this->eloquentCourseModel = new EloquentCourseModel;
    }
    public function save(Course $course): void
    {
        $newCourse = $this->eloquentCourseModel;
        $data = [
            'id'        => $course->id()->value(),
            'name'      => $course->name()->value(),
            'detail'    => $course->detail()->value(),
            'image'     => $course->image()->value(),
            'price'     => $course->price()->value(),
        ];

        $newCourse->create($data);
    }

    public function search(CourseId $id): ?Course
    {
        $course = $this->eloquentCourseModel->findOrFail($id->value());
        // Return Domain User model
        return new Course(
            new CourseId($course->id),
            new CourseName($course->name),
            new CourseDetail($course->detail),
            new CourseImage($course->image),
            new CoursePrice($course->price),
        );
    }
}
