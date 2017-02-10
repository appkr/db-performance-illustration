<?php

use Whoops\Handler\JsonResponseHandler;
use Whoops\Run;

// 오토로드
require(__DIR__ . '/vendor/autoload.php');

// 프로세스당 메모리 제한 완화 및 테스트 데이터 생성
ini_set('memory_limit', '512M');
$data = require(__DIR__ . '/data.php');
$index = require(__DIR__ . '/indexed-data.php');

// 타이머 시작
define('START', microtime(true));

// 예외 렌더러 등록
$whoops = new Run;
$whoops->pushHandler(new JsonResponseHandler());
$whoops->register();

// 변수 초기화
$uri = $_SERVER['REQUEST_URI'] ?? null;
$scenario = trim(parse_url($uri)['path'], '/');
$allowed = [
    'primary',
    'fullscan',
    'binary',
    'indexed',
];

// 유효성 검사
if (in_array($scenario, $allowed, true) === false) {
    throw new Exception(
        sprintf(
            '정의된 시나리오는 "%s"입니다. "%s"를 제출하셨습니다.',
            implode(',"', $allowed),
            $scenario
        )
    );
}

// 테스트 수행
$found = require(__DIR__ . "/{$scenario}.php");
$result = [
    'elapsed(milli second)' => (microtime(true) - START) * 1000,
    'found' => $found,
];

// 결과 출력
header('Content-Type: application/json;charset=utf-8');
echo json_encode($result, JSON_PRETTY_PRINT);
