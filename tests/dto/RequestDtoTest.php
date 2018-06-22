<?php

namespace tests\dto;

use src\dto\RequestDto;

/**
 * Class RequestDtoTest
 * @package tests\dto
 */
class RequestDtoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test equlas two params
     */
    public function testCreateByParamsTrue()
    {
        $request = ['equation' => '(('];

        $requestDto = $this->getRequestDto();

        $requestDto->loadParamsByRequest($request);

        $this->assertSame($request['equation'], $requestDto->equation);
    }

    public function testExceptionIfNotExistsRequireParams()
    {
        $request = [];

        $requestDto = $this->getRequestDto();

        $this->setExpectedException(\InvalidArgumentException::class);

        $requestDto->loadParamsByRequest($request);
    }

    public function testNotWaitParams()
    {
        $request = ['equation' => 'qweqweqwe'];

        $requestDto = $this->getRequestDto();

        $this->setExpectedException(\InvalidArgumentException::class);

        $requestDto->loadParamsByRequest($request);
    }

    public function getRequestDto()
    {
        return new RequestDto();
    }
}