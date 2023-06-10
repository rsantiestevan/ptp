<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Paycomet\Backoffice\Courses\Application\CourseSearch;
use Paycomet\Backoffice\Courses\Application\CourseSearchAll;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\EloquentCourseRepository;

final class CourseListGetController extends Controller
{
    public function __invoke(Request $request)
    {
        $courseSearch = new CourseSearchAll(new EloquentCourseRepository());
        $listCourse = $courseSearch();
        return view('course.list', [
            'courses' => $listCourse
            ]);
    }
}
