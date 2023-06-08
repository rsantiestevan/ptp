<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Paycomet\Backoffice\Courses\Application\CourseSearch;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\EloquentCourseRepository;

final class CourseListGetController extends Controller
{
    public function __invoke(Request $request)
    {
        $courseSearch = new CourseSearch(new EloquentCourseRepository());
        $course = $courseSearch($request->course_id);
        return view('course.detail', [
            'courseId' => $course->id()->value(),
            'courseName' => $course->name()->value(),
            'courseDetail' => $course->detail()->value(),
            'courseImage' => $course->image()->value(),
            'coursePrice' => $course->price()->value(),
            ]);
    }
}
