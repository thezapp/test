<?php

namespace src\services;

use src\dto\RequestDto;

/**
 * Сервис валидации строки
 *
 * Class ValidateService
 * @package src\services
 */
class ValidateService
{
    /**
     * Проверяет наличие лишней открытой/закрытой скобки
     *
     * @param RequestDto $dto
     */
    public function validateEquation(RequestDto $dto)
    {
        $string = $dto->equation;

        $cursor = 0;
        $length = strlen($string);
        $bracket = 0;
        while ($length > $cursor){
            $currentValue = $string[$cursor];

            $currentValue == '(' ? $bracket++ : $bracket--;

            if ($bracket < 0){
                throw new \InvalidArgumentException('Отсутсвует скобка на строке ' . $cursor);
            }

            $cursor++;
        }

        if ($bracket !== 0){
            throw new \InvalidArgumentException('Отсутсвует скобка на строке ' . $cursor);
        }
    }
}