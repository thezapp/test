<?php

namespace src\dto;

/**
 * Class RequestDto
 * @package src\dto
 */
class RequestDto
{
    const REQUIRE_PARAMS = [
        "\n",
        "\t",
        "\r",
        "(",
        ")",
        " "
    ];

    /**
     * @var
     */
    public $equation;

    /**
     * @param $request
     */
    public function loadParamsByRequest($request)
    {
        if (empty($request['equation'])){
            throw new \InvalidArgumentException('Не задан обязательный параметр: equation');
        }

        $closedParams = str_replace(self::REQUIRE_PARAMS, '', $request['equation']);

        if ($closedParams !== ''){
            throw new \InvalidArgumentException('Присутсвуют запрещенные параметры ' . $closedParams);
        }

        $this->equation = $request['equation'];
    }
}