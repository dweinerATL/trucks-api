<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use http\Env\Response;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
    public function find(Request $request, string $type) {
        // First, get the search term
        $search_term = $request->query('search');
        if (!empty($search_term)) {
            $search_term = '%' . $search_term . '%';
        } else {
            return response()->json([
                'status' => '501',
                'error' => 'Empty searches are not supported'
            ]);
        }

        // Now get the optional food truck status
        $status = $request->query('status', 'approved');

        // Array to hold the response
        $return = [];

        // Verify that the status is set to a valid value
        if (in_array($status, ['approved', 'expired', 'requested', 'suspend'])) {
            // Valid status, build the query and execute it.  Each search type
            // will be executed against a different field.  If other search
            // types are added, just add to the switch statement.

            switch($type) {
                case 'location':
                    $query = DB::table('trucks')->where(function (Builder $query) use ($search_term) {
                        $query->where('locationdescription', 'like', $search_term)
                            ->orWhere('address', 'like', $search_term);
                    });
                    break;
                case 'cuisine':
                    $query = Truck::where('fooditems', 'like', $search_term);
                    break;
                case 'name':
                    $query = Truck::where('applicant', 'like', $search_term);
                    break;
                default:
                    // Unsupported option
                    return response()->json([
                        'status' => '501',
                        'error' => 'Unsupported search type'
                    ]);
            }

            // Add the status to the query and execute it
            $trucks = $query->where('status', $status)->get();

            // Are there rows returned?
            if (count($trucks)) {
                $return = [
                    'status' => '200',
                    'num_rows' => count($trucks),
                    'data' => $trucks,
                ];
            } else {
                $return = [
                    'status' => '204',
                    'num_rows' => '0',
                    'data' => ['No records found'],
                ];
            }
        } else {
            // Return an error
            $return = [
                'status' => '400',
                'error' => 'Invalid license status',
            ];
        }

        return response()->json($return);
    }
}
