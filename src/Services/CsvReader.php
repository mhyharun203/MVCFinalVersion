<?php
declare(strict_types=1);

namespace App\Services;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class CsvReader

{

    public function getSnippetsFromCSV(string $fileName): TabularDataReader
    {
        $csv = Reader::createFromPath($fileName);
        $csv->setDelimiter(',');
        $records = (new Statement())->process($csv);

        return $records;
    }
}
