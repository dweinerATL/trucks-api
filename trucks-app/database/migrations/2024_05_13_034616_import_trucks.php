<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Truck;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Read in the first line of the csv file to get the field/column names
        $handle = fopen('database/Mobile_Food_Facility_Permit.csv', 'r');
        $fields = fgetcsv($handle);

        // Create the table
        Schema::create('trucks', function (Blueprint $table) use ($fields) {
            // Incremental row ID
            $table->id();
            foreach($fields as $index => $field) {
                // Slugify the column name
                $fields[$index] = $column = Str::slug($field);
                // There are a couple of fields we want to set a specific type for.
                // All other fields are strings
                switch($field) {
                    case 'locationid':
                    case 'cnn':
                        $table->integer($column)->nullable();
                        break;
                    case 'PriorPermit':
                        $table->boolean($column)->nullable();
                        break;
                    case 'Approved': // Column 19
                    case 'Received': // Column 20
                    case 'ExpirationDate': // Column 22
                        $table->timestamp($column)->nullable();
                        break;
                    default:
                        $table->string($column, 255)->nullable();
                }
            }
            // Add the created_at and updated_at fields that Laravel adds to
            // Every db write.
            $table->timestamps();
        });

        // Import the rest of the rows and add them to the db
        while (($row = fgetcsv($handle)) !== FALSE) {
            // Iterate over the row and build an array using the field names
            // from above to be passed in to the models create static method
            $insert_row = [];

            foreach($row as $index => $value) {
                // Handle timestamp fields
                switch ($index) {
                    case 19:
                    case 20:
                    case 22:
                        $value = date('Y-m-d H:i:s', strtotime($value));
                }

                $insert_row[Str::slug($fields[$index])] = $value;
            }

            // Insert the row
            try {
                Truck::create($insert_row);
            } catch (QueryException $e) {
                report($e);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
