<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Loader;
use NNChutchikov\Spreadsheet\Tests\SquareTableValidator;

/**
 * @covers NNChutchikov\Spreadsheet\Validator
 * @covers NNChutchikov\Spreadsheet\Validators\TableValidator
 * @covers NNChutchikov\Spreadsheet\Validators\RowValidator
 * @covers NNChutchikov\Spreadsheet\Validators\CellValidator
 * @covers NNChutchikov\Spreadsheet\ValidatorResult
 */
class SpreadsheetValidatorTest extends \PHPUnit\Framework\TestCase
{
    private $validator = null;

    public function setUp(): void
    {
        $loader = new Loader('tests/files/test.csv');
        $this->validator = new SquareTableValidator($loader->table());
    }

    public function testValidCsv()
    {
        $result = $this->validator->result();
        $this->assertEquals(0, count($result->errors()));
    }

    public function testInvalidCsv()
    {
        $loader = new Loader('tests/files/testWrong.csv');
        $this->validator = new SquareTableValidator($loader->table());

        $result = $this->validator->result();
        $this->assertEquals(1, count($result->errors()));

        $this->assertEquals('Row 4 => 4 * 4 != 17', $result->errors()[0]);
    }
}
