-- primary
SELECT *
	FROM `users`
	WHERE `id` = 99999;

-- fullscan
SELECT *
	FROM `users`
	WHERE `name` LIKE '%_99999';

-- index
SELECT *
	FROM `users`
	WHERE `team_id` = 4;

SELECT *
	FROM (SELECT * FROM `users` WHERE `team_id` = 4) as filtered
	WHERE `name` LIKE '%_99999';

SELECT *
	FROM `users`
	WHERE `team_id` = 4
		AND `name` LIKE '%_99999';

-- join
SELECT *
	FROM `users` as u, `teams` as t
	WHERE u.`team_id` = t.`id`
		AND t.`name` = '홍팀';

SELECT *
	FROM `users` as u, `teams` as t
	WHERE u.`team_id` = t.`id`
		AND t.`name` = '홍팀'
		AND u.`name` LIKE '%_99997';
