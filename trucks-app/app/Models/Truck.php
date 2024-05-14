<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $locationid
 * @property string|null $applicant
 * @property string|null $facilitytype
 * @property int|null $cnn
 * @property string|null $locationdescription
 * @property string|null $address
 * @property string|null $blocklot
 * @property string|null $block
 * @property string|null $lot
 * @property string|null $permit
 * @property string|null $status
 * @property string|null $fooditems
 * @property string|null $x
 * @property string|null $y
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $schedule
 * @property string|null $dayshours
 * @property string|null $noisent
 * @property string|null $approved
 * @property string|null $received
 * @property int|null $priorpermit
 * @property string|null $expirationdate
 * @property string|null $location
 * @property string|null $fire-prevention-districts
 * @property string|null $police-districts
 * @property string|null $supervisor-districts
 * @property string|null $zip-codes
 * @property string|null $neighborhoods-old
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Truck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Truck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Truck query()
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereApplicant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereBlocklot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereCnn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereDayshours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereExpirationdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereFacilitytype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereFirePreventionDistricts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereFooditems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLocationdescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLocationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereNeighborhoodsOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereNoisent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck wherePermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck wherePoliceDistricts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck wherePriorpermit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereSupervisorDistricts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Truck whereZipCodes($value)
 * @mixin \Eloquent
 */
class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        "locationid",
        "applicant",
        "facilitytype",
        "cnn",
        "locationdescription",
        "address",
        "blocklot",
        "block",
        "lot",
        "permit",
        "status",
        "fooditems",
        "x",
        "y",
        "latitude",
        "longitude",
        "schedule",
        "dayshours",
        "noisent",
        "approved",
        "received",
        "priorpermit",
        "expirationdate",
        "location",
        "fire-prevention-districts",
        "police-districts",
        "supervisor-districts",
        "zip-codes",
        "neighborhoods-old",
    ];

    protected $guarded = [];
}
