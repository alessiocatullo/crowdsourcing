CREATE DEFINER=`root`@`localhost` PROCEDURE `top10_user`(IN cmp_id INT(11))
BEGIN
	
    DROP TEMPORARY TABLE IF EXISTS my_tmp_top10;
	CREATE TEMPORARY TABLE IF NOT EXISTS my_tmp_top10 
		(my_user VARCHAR(254) , my_tot_score INT, my_task_answers INT);
        
	INSERT INTO my_tmp_top10
	SELECT 
		tsk_p.user AS email, SUM(tsk_p.score) AS tot_score, count(tsk_p.user) as task_answers
	FROM
		task_performed tsk_p
			JOIN
		task tsk ON tsk.id = tsk_p.task
			JOIN
		campaign cmp ON cmp.id = tsk.campaign
	WHERE
		cmp.id = cmp_id
        AND tsk_p.answer IS NOT NULL
	GROUP BY email
	ORDER BY tot_score DESC, task_answers
	LIMIT 10;
END