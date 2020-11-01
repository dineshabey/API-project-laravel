<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

/**
 * Class ShakeHandController.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 */


class ShakeHandController extends Controller
{
    /**
     * Responds with a status for heath check.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'meta' => [
                'status' => 'true',
                'status_message' => 'welcome',
                'timestamp' => Carbon::now(),
            ],
        ], 200);
    }
}
