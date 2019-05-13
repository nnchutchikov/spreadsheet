<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet;

class Exception extends \Exception
{
    const EXCP_FILE_NOT_FOUND = 1;
    const EXCP_WRONG_SPREADSHEET_FILE_TYPE = 2;
    const EXCP_BROKEN_SPREADSHEET_FILE = 3;

    public static function wrongSpreadsheetFileType()
    {
        return new self('Wrong type of spreadsheet file', self::EXCP_WRONG_SPREADSHEET_FILE_TYPE);
    }

    public static function fileNotFound()
    {
        return new self('Wrong type of spreadsheet file', self::EXCP_FILE_NOT_FOUND);
    }

    public static function brokenSpreadsheetFile()
    {
        return new self('Broken spreadsheet file', self::EXCP_BROKEN_SPREADSHEET_FILE);
    }
}
