<?php

use Whoops\Handler\JsonResponseHandler;
use Whoops\Run;

// 오토로드
require(__DIR__ . '/vendor/autoload.php');

// 허용 메모리 키우고, 테스트 데이터 생성
ini_set('memory_limit', '512M');
$teams = require(__DIR__ . '/data/teams.php');
$users = require(__DIR__ . '/data/users.php');
$userIndex = require(__DIR__ . '/data/index.php');

// 타이머 시작
define('START', microtime(true));

// 예외 핸들러 등록
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
    'join',
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
$found = require(__DIR__ . "/scenario/{$scenario}.php");

// 결과 계산
$result = [
    '처리시간(ms)' => (microtime(true) - START) * 1000,
    '메모리(MB)' =>  memory_get_usage() / 1000000,
    'CPU(%)' => sys_getloadavg()[0],
    'found' => $found,
];

// 결과 출력
header('Content-Type: application/json;charset=utf-8');
echo json_encode($result, JSON_PRETTY_PRINT);
