# 배열을 이용한 DB 쿼리 에뮬레이션

PHP 언어의 배열을 이용해 데이터베이스의 기본 키 쿼리, 풀 스캔 쿼리, 조인 쿼리 등을 흉내내보고, 각 쿼리 간의 성능 차이를 관찰하기 위한 실험 프로젝트입니다.

자세한 내용은 이 [블로그 포스트](http://blog.appkr.kr/work-n-play/db-query-performance-illustration-using-array)를 참고하세요. 

## 1. 설치법

프로젝트를 복제합니다.

```bash
~ $ git clone git@github.com:appkr/db-performance-illustration.git
# 또는 
~ $ git clone https://github.com/appkr/db-performance-illustration.git
```

PHP 콤포넌트를 설치합니다.

```bash
~ $ cd db-performance-illustration
~/db-performance-illustration $ composer install
```

## 2. 실험 방법

### 2.1. PHP 배열 성능 실험

웹 브라우저를 이용해서 확인합니다. 매번 실험할 때마다 십만개의 요소를 가진 랜덤 배열을 생성하고, 생성된 배열에서 쿼리를 수행합니다.

URL|설명
---|---
`GET /primary`|기본 키(Primary Key) 쿼리를 흉내냅니다.
`GET /fullscan`|문자열 필드에 대해 풀 스캔을 흉내냅니다.
`GET /binary`|기본 키에 대해 바이너리 스캔을 흉내냅니다.
`GET /indexed`|미리 네 개로 쪼개진 배열 중 하나에 대해 풀 스캔을 흉내냅니다.
`GET /join`|조인 쿼리를 흉내냅니다.

### 2.1. MySQL 성능 실험

MySQL로 실제 테스트를 하기 위한 시딩 스크립트와 쿼리 스크립트를 포함했습니다.

-   시딩: sql/prepare.sql
-   쿼리: sql/query.sql
