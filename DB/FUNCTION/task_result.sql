CREATE DEFINER=`root`@`localhost` FUNCTION `task_result`(task_id VARCHAR(254)) RETURNS varchar(254) CHARSET utf8
BEGIN
	DECLARE result_answer VARCHAR(254);
    SET result_answer = (SELECT tsk_a.answer

    FROM task_analytics AS tsk_a
    WHERE tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority) / 100 AND tsk_a.state >= 1 AND tsk_a.id = task_id
    ORDER BY tsk_a.nof_answer DESC
    LIMIT 0, 1);
RETURN result_answer;
END