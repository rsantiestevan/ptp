<?php

namespace Tests\Unit;

use Paycomet\Backoffice\Courses\Application\CourseCreator;
use Paycomet\Backoffice\Courses\Application\CourseSearch;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\EloquentCourseRepository;
use PHPUnit\Framework\TestCase;

class CourseCreatorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_is_course_found(): void
    {
        $courseToFindId = '4cdc0491-7761-331c-88c7-787b17b932ac';
        $courseSearch = new CourseSearch(new EloquentCourseRepository());
        $course = $courseSearch($courseToFindId);
        dd($course);
        $this->assertTrue(true);
    }

    private function data()
    {
        return [
            'id' => "Firstname Lastname",
            'name' => "Firstname Lastname",
            'detail' => "firstname.lastname@email.com",
            'image' => "password_example",
            'price' => "99",
        ];
    }
}
