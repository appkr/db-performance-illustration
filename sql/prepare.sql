-- teams 테이블을 만듭니다.
CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `since` int(4) unsigned NOT NULL,
  `subscription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- teams 테이블에 데이터를 시딩합니다.
INSERT INTO `teams` -- (`name`, `since`, `subscription`)
VALUES (NULL, '청팀', 1970, 'monthly'),
  (NULL, '홍팀', 1980, 'yearly'),
  (NULL, '백팀', 1990, 'monthly'),
  (NULL, '흑팀', 2000, 'forever');

-- users 테이블을 만듭니다.
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `team_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_team_id_foreign` (`team_id`),
  CONSTRAINT `users_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- users 테이블에 데이터를 시딩합니다.
DELIMITER $$
CREATE PROCEDURE seed_users()
  BEGIN
    DECLARE i INT DEFAULT 1;

    WHILE i <= 100000 DO
      INSERT INTO users (name, email, team_id)
        SELECT
          CONCAT(SUBSTRING(MD5(RAND()) FROM 1 FOR 10), "_", i),
          CONCAT(SUBSTRING(MD5(RAND()) FROM 1 FOR 5), "@", SUBSTRING(MD5(RAND()) FROM 1 FOR 3), ".com"),
          `id`
        FROM `teams`
        ORDER BY RAND()
        LIMIT 1;
      SET i = i + 1;
    END WHILE;
  END$$
DELIMITER ;

CALL seed_users();
DROP PROCEDURE seed_users;
