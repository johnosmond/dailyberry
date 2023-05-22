<?php

namespace Database\Seeders;

use App\Models\Flavor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // declaring and defining table name and path to csv
        $file = public_path('/seeders/flavors.csv');

        //import CSV function
        function import_CSV($filename, $delimiter = ',')
        {
            if (!file_exists($filename) || !is_readable($filename))
                return false;
            $header = null;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    if (!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }

        // store returned data into array of records
        $records = import_CSV($file);

        // add each record to the posts table in DB       
        foreach ($records as $key => $record) {
            Flavor::create([
                'flavor' => $record['flavor'],
                'description' => $record['description'],
                'times_used' => $record['times_used']
            ]);
        }
    }
}
