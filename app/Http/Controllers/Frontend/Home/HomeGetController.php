<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class HomeGetController extends Controller
{

    public function __invoke()
    {
        return view('payment');
    }
}
