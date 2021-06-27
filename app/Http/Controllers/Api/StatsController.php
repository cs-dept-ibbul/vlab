<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Experiment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;


class StatsController extends Controller
{
    public function courseCount()
    {
        $courseCount = Course::count();
        return $courseCount;
    }

    public function experimentCount()
    {
        $experimentCount = Experiment::count();
        return $experimentCount;
    }

    public function numberOfVisitors()
    {
        if (!Util::hasInternetConnection()) {
            return 'No Internet Connection';
        }

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        return $analyticsData;
    }

    public function numberOfLeaners()
    {
        $studentRole = Util::$roleId['student'];
        $leaners = User::where('role_id', $studentRole)->count();

        return $leaners;
    }
}
