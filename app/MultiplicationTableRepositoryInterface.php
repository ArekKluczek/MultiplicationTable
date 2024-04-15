<?php

namespace App;

interface MultiplicationTableRepositoryInterface
{
    /**
     *   Finds an existing multiplication table based on dimension or creates a new entry if it does not exist.
     *
     * @param int $size
     *   The dimension of the multiplication table to find or create.
     *
     * @return array
     *   The multiplication table data as an array.
     */
    public function findOrCreateTable(int $size): array|null;

    /**
     *   Saves the provided multiplication table data in the database.
     *
     * @param int $size
     *   The dimension of the multiplication table.
     * @param array $data
     *   The multiplication table data to save.
     *
     * @return void
     */
    public function saveTableData(int $size, array $data): void;
}
