<?php

declare(strict_types=1);

namespace App\Services;

use App\MultiplicationTableInterface;
use App\MultiplicationTableRepositoryInterface;

class MultiplicationTableService implements MultiplicationTableInterface
{
    /**
     *   Create a new service instance.
     *
     * @param MultiplicationTableRepositoryInterface $repository
     *   The repository.
     */
    public function __construct(protected MultiplicationTableRepositoryInterface $repository) {}

    /**
     * {@inheritDoc}
     */
    public function generateTable(int $size): string
    {
        $data = $this->repository->findOrCreateTable($size);

        if (empty($data)) {
            $data = $this->generateTableData($size);
            $this->repository->saveTableData($size, $data);
        }

        return json_encode($data);
    }

    /**
     *  Generates a multiplication table as a two-dimensional array.
     *
     * @param int $size
     *   The dimension of the multiplication table to generate.
     *
     * @return array
     *   An array of arrays, each containing 'size' integers.
     */
    private function generateTableData(int $size): array
    {
        $table = [];
        for ($i = 1; $i <= $size; $i++) {
            $table[$i - 1] = [];
            for ($j = 1; $j <= $size; $j++) {
                $table[$i - 1][$j - 1] = $i * $j;
            }
        }
        return $table;
    }
}
