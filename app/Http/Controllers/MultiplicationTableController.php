<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\MultiplicationTableInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiplicationTableController extends Controller
{
    /**
     *   Create a new controller instance.
     *
     * @param MultiplicationTableInterface $multiplicationTable
     *   The service to create multiplication tables.
     */
    public function __construct(private readonly MultiplicationTableInterface $multiplicationTable)
    {
    }

    /**
     * Generates and returns a multiplication table of the specified size.
     *
     * @param Request $request
     *   The incoming HTTP request.
     *
     * @return Response
     *   A JSON response containing the multiplication table.
     */
    public function generateTable(Request $request): Response
    {
        $size = $request->query('size', 10);

        if (!is_numeric($size) || $size < 1 || $size > 100) {
            return response()->json(['error' => 'Size must be between 1 and 100.'], 400);
        }

        $jsonTable = $this->multiplicationTable->generateTable((int)$size);

        return response($jsonTable, 200, ['Content-Type' => 'application/json']);
    }
}
