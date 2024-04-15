<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\MultiplicationTable;
use App\MultiplicationTableRepositoryInterface;

class MultiplicationTableRepository implements MultiplicationTableRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findOrCreateTable(int $size): array|null
    {
        $table = MultiplicationTable::where('dimension', $size)->first();

        if (!$table) {
            return null;
        }

        return json_decode($table->data, true);
    }

    /**
     * {@inheritDoc}
     */
    public function saveTableData(int $size, array $data): void
    {
        MultiplicationTable::updateOrCreate(
            ['dimension' => $size],
            ['data' => json_encode($data)]
        );
    }
}
