<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Loader;
use NNChutchikov\Spreadsheet\Spreadsheet\Table;

/**
 * @covers NNChutchikov\Spreadsheet\Loader
 * @covers NNChutchikov\Spreadsheet\Exception
 */
class LoaderTest extends \PHPUnit\Framework\TestCase
{
    const PATH = 'tests' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;
    const PATH_CSV = self::PATH . 'test.csv';
    const PATH_XLS = self::PATH . 'test.xls';
    const PATH_XLSX = self::PATH . 'test.xlsx';
    const PATH_TXT = self::PATH . 'test.txt';
    const PATH_WRONG = self::PATH . 'wrong.xls';

    protected function setUp(): void
    {
        $this->tearDown();

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load(self::PATH_CSV);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save(self::PATH_XLSX);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xls");
        $writer->save(self::PATH_XLS);
    }

    public function tearDown(): void
    {
        if (file_exists(self::PATH_XLSX)) {
            unlink(self::PATH_XLSX);
        }

        if (file_exists(self::PATH_XLS)) {
            unlink(self::PATH_XLS);
        }
    }

    public function testXlsLoader()
    {
        $loader = new Loader(self::PATH_XLS);
        $this->assertEquals(self::PATH_XLS, $loader->filePath());

        $this->assertFilesData($loader->table());
    }

    public function testXlsxLoader()
    {
        $loader = new Loader(self::PATH_XLSX);
        $this->assertEquals(self::PATH_XLSX, $loader->filePath());

    }

    public function testCsvLoader()
    {
        $loader = new Loader(self::PATH_CSV);
        $this->assertEquals(self::PATH_CSV, $loader->filePath());
    }

    public function testAbsentFileLoader()
    {
        $this->expectException(\NNChutchikov\Spreadsheet\Exception::class);
        $this->expectExceptionCode(\NNChutchikov\Spreadsheet\Exception::EXCP_FILE_NOT_FOUND);

        $loader = new Loader('absent_file');
    }

    public function testUnknownFileTypeLoader()
    {
        $this->expectException(\NNChutchikov\Spreadsheet\Exception::class);
        $this->expectExceptionCode(\NNChutchikov\Spreadsheet\Exception::EXCP_WRONG_SPREADSHEET_FILE_TYPE);

        $loader = new Loader(self::PATH_TXT);
    }

    public function testWrongFileTypeLoader()
    {
        $this->expectException(\NNChutchikov\Spreadsheet\Exception::class);
        $this->expectExceptionCode(\NNChutchikov\Spreadsheet\Exception::EXCP_BROKEN_SPREADSHEET_FILE);

        $loader = new Loader(self::PATH_WRONG);
    }

    private function assertFilesData(Table $_table)
    {
        $this->assertEquals(['x*x', 1, 4, 9], [
            $_table->row(0)->cell('B')->value(),
            intval($_table->row(1)->cell('B')->value()),
            intval($_table->row(2)->cell('B')->value()),
            intval($_table->row(3)->cell('B')->value()),
        ]);

    }
}
