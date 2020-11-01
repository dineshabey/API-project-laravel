<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\UploadTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ConfigController.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 */
class ConfigController extends Controller
{
    /**
     * Get rider plans for specific product and customer type
     *
     * @param   $request
     * @return  mixed
     */

    public function GetHospitalList(Request $request)
    {
        $hospitals = Hospital::select('name as label', 'code as code')->where('active', true)->orderBy('name')->get();

        return response()->json([
            'meta' => [
                'status' => 'true',
                'status_message' => 'Data found',
                'timestamp' => Carbon::now(),
            ],
            'data' => $hospitals,
        ]);
    }

    /**
     * Get server date and time.
     *
     * @param   $request
     * @return  mixed
     */

    public function getCurrentDateTime()
    {
        return response()->json([
            'meta' => [
                'status' => 'true',
                'status_message' => 'Data found',
                'timestamp' => Carbon::now(),
            ],
            'data' => Carbon::now()->setTimezone('Asia/Colombo')->toDateTimeString(),
        ]);
    }

    /**
     * Get rider plans for specific product and customer type
     *
     * @param   $request
     * @return  mixed
     */

    public function GetUploadTypeList(Request $request)
    {
        $ut = UploadTypes::select('id', 'type', 'title')->where('active', true)->orderBy('id')->get();

        return response()->json([
            'meta' => [
                'status' => 'true',
                'status_message' => 'Data found',
                'timestamp' => Carbon::now(),
            ],
            'data' => $ut,
        ]);
    }
}
