<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet;

class ValidatorResult
{
    private $results = [];

    public function __construct()
    {
        $count = func_num_args();
        $args = func_get_args();

        if ($count == 0) {
            // empty results
        } elseif ($count == 1 && is_bool($args[0])) {
            $this->addParts($args[0]);
        } elseif ($count == 2 && is_bool($args[0]) && is_string($args[1])) {
            $this->addParts($args[0], $args[1]);
        }
    }

    public function results(): array
    {
        return $this->results;
    }

    public function add(self $_result): void
    {
        $results = $_result->results();
        $count = count($results);
        for ($i = 0; $i < $count; $i++) {
            $this->results[] = $results[$i];
        }

    }

    private function addParts(bool $_result, string $_errorDesription = ''): void
    {
        $this->results[] = [
            'result' => $_result,
            'error' => $_errorDesription,
        ];
    }

    public function errors(): array
    {
        $errors = [];

        for ($i = 0; $i < count($this->results); $i++) {
            if (!$this->results[$i]['result']) {
                $errors[] = $this->results[$i]['error'];
            }
        }

        return $errors;
    }
}
