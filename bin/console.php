<?php

namespace bin;

use src\services\ValidateService;
use src\dto\RequestDto;

require '../vendor/autoload.php';

$shortParams = '';
$longParams = [
    'equation::'
];

$request = getopt($shortParams, $longParams);

try {
    $dto = new RequestDto();
    $dto->loadParamsByRequest($request);

    (new ValidateService())->validateEquation($dto);
} catch (\Exception $e) {
    echo 'Произошла ошибка: ' . mb_convert_encoding($e->getMessage(), "UTF-8");
    exit();
}