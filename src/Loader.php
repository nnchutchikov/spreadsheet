<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet;

use Lalilalai\Spreadsheet\Exception;
use Lalilalai\Spreadsheet\Spreadsheet\Table;

class Loader
{
    protected $spreadsheetFilePath;
    protected $spreadsheet;

    public function __construct(string $_spreadsheetFilePath)
    {
        if (!\file_exists($_spreadsheetFilePath)) {
            throw Exception::fileNotFound();
        }

        $this->spreadsheetFilePath = $_spreadsheetFilePath;

        $fileParts = \explode('.', $this->spreadsheetFilePath);
        $extension = strtolower($fileParts[count($fileParts) - 1]);

        $reader = null;
        if ($extension == 'xlsx') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } elseif ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            throw Exception::wrongSpreadsheetFileType();
        }

        $reader->setReadDataOnly(true);

        try {
            $this->spreadsheet = $reader->load($_spreadsheetFilePath);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            throw Exception::brokenSpreadsheetFile();
        }
    }

    public function table(): Table
    {
        $data = $this->spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $count = count($data);
        for ($i = 1; $i <= $count; $i++) {
            $data[$i - 1] = $data[$i];
        }
        unset($data[$count]);

        return new Table($data);
    }

    public function filePath(): string
    {
        return $this->spreadsheetFilePath;
    }
}
