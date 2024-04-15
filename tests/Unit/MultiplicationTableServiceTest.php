<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MultiplicationTableService;
use App\MultiplicationTableRepositoryInterface;

class MultiplicationTableServiceTest extends TestCase
{
    public function testGenerateTableReturnsJsonString()
    {
        $size = 3;
        $expectedArray = [
            [1, 2, 3],
            [2, 4, 6],
            [3, 6, 9]
        ];

        $repositoryMock = $this->createMock(MultiplicationTableRepositoryInterface::class);
        $repositoryMock->method('findOrCreateTable')
            ->willReturn(null);

        $repositoryMock->expects($this->once())
            ->method('saveTableData')
            ->with(
                $this->equalTo($size),
                $this->equalTo($expectedArray)
            );

        $service = new MultiplicationTableService($repositoryMock);
        $result = $service->generateTable($size);

        $this->assertJson($result);
        $this->assertEquals(json_encode($expectedArray), $result);
    }

    public function testGenerateTableUsesExistingTableIfAvailable()
    {
        $size = 3;
        $existingArray = [
            [1, 2, 3],
            [2, 4, 6],
            [3, 6, 9]
        ];

        $repositoryMock = $this->createMock(MultiplicationTableRepositoryInterface::class);
        $repositoryMock->method('findOrCreateTable')
            ->willReturn($existingArray);

        $service = new MultiplicationTableService($repositoryMock);
        $result = $service->generateTable($size);

        $this->assertJson($result);
        $this->assertEquals(json_encode($existingArray), $result);
    }

    public function testGenerateTableData()
    {
        $service = new MultiplicationTableService($this->createMock(MultiplicationTableRepositoryInterface::class));
        $size = 3;
        $expectedArray = [
            [1, 2, 3],
            [2, 4, 6],
            [3, 6, 9]
        ];

        $reflection = new \ReflectionClass($service);
        $method = $reflection->getMethod('generateTableData');
        $actualArray = $method->invokeArgs($service, [$size]);

        $this->assertEquals($expectedArray, $actualArray);
    }
}
