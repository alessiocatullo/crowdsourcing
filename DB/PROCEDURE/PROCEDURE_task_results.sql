DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `task_results`(IN task_id INT(11))
BEGIN
 DECLARE result_answer VARCHAR(150);
    SET result_answer = NULL;

    SELECT (tsk_a.answer) INTO result_answer
    FROM task_analytics AS tsk_a
    WHERE tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority_required) / 100 AND tsk_a.task_state >= 1 AND tsk_a.task_id = task_id
    ORDER BY tsk_a.nof_answer DESC
    LIMIT 0, 1;
    
    select result_answer;
END$$
DELIMITER ;
