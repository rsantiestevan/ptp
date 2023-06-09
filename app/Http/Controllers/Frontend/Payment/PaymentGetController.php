<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Payment;

use Illuminate\Http\Request;
use Paycomet\Backoffice\Courses\Application\CourseSearch;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\EloquentCourseRepository;

final class PaymentGetController extends \App\Http\Controllers\Controller
{
    public function __invoke(Request $request)
    {
        $payJetID       = env('PAY_JETID');
        $payMerchantCode= env('PAY_MERCHANTCODE');
        $payTerminal    = env('PAY_TERMINAL');
        $payPassword    = env('PAY_PASSWORD');
        $courseSearch = new CourseSearch(new EloquentCourseRepository());
        $course = $courseSearch($request->course_id);
        return view('payment.new', [
            'courseId' => $course->id()->value(),
            'courseName' => $course->name()->value(),
            'courseDetail' => $course->detail()->value(),
            'courseImage' => $course->image()->value(),
            'coursePrice' => $course->price()->value(),
            'payJetID' => $payJetID,
            'payMerchantCode' => $payMerchantCode,
            'payTerminal' => $payTerminal,
            'payPassword' => $payPassword,
        ]);
    }
}
