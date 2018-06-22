<?php

namespace tests\services;

use src\services\ValidateService;

/**
 * Class ValidateServiceTest
 * @package tests\services
 */
class ValidateServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ValidateService
     */
    protected $service;

    /**
     *
     */
    public function setUp()
    {
        $this->service = new ValidateService();

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function getRequestDtoMock()
    {
        return $this->getMockBuilder('src\dto\RequestDto')
            ->getMock();
    }

    /**
     *
     */
    public function testValidateEquation()
    {
        $dtoMock = $this->getRequestDtoMock();

        $dtoMock->equation = '((()))';

        $result = $this->service->validateEquation($dtoMock);

        $this->assertNull($result);
    }

    public function testExceptionAbsentBracket()
    {
        $dtoMock = $this->getRequestDtoMock();

        $dtoMock->equation = '((())';

        $this->setExpectedException(\InvalidArgumentException::class);

        $this->service->validateEquation($dtoMock);
    }
}