<?php
namespace App\Helpers\Utility;

use Illuminate\Support\Facades\Response;

/**
 * Class DateHelper.
 */
class ExportHelper
{ 
    
    function convertTOCSV($data, $options)
    {

    if (is_array($options) && isset($options['headers']) && is_array($options['headers'])) {
        $headers = $options['headers'];
    } else {
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
        );
    }
    $output = '';
    // setting the first row of the csv if provided in options array
    if (isset($options['firstRow']) && is_array($options['firstRow'])) {
        $output .= implode(',', $options['firstRow']);
        $output .= "\n"; // new line after the first line
    }
    // setting the columns for the csv. if columns provided, then fetching the or else object keys
    if (isset($options['columns']) && is_array($options['columns'])) {
        $columns = $options['columns'];
    } else {
        $objectKeys = get_object_vars($data[0]);
        $columns = array_keys($objectKeys);
    }
    // populating the main output string
    foreach ($data as $row) {
        foreach ($columns as $column) {
            $output .= str_replace(',', ';', $row->$column);
            $output .= ',';
        }
        $output .= "\n";
    } // calling the Response class make function inside my class to send the response.
    // if our class is not a controller, this is required.

    $file = fopen('php://output', 'w');

    fputcsv($file, $columns);
            foreach ($data as $review) {
                fputcsv($file, array($review->first_name, $review->last_name));
            }
            fclose($file);
    return Response::download($file,$headers);
    // return Response::make($output, 200, $headers);
}
}
