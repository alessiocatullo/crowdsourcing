CREATE DEFINER=`root`@`localhost` PROCEDURE `calculating_score`(IN task_id INT(11))
BEGIN
DECLARE someone_answered INT(11); 
DECLARE result_answer INT(11);
DECLARE answer_number INT(5);
DECLARE max_worker INT(5);
    SET result_answer = NULL;
    SET answer_number = 0;
    SET max_worker = 0;

SELECT 
    (tsk_a.answer_id)
INTO result_answer FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.nof_answer >= (tsk_a.worker_max * tsk_a.majority) / 100
        AND tsk_a.state >= 1
        AND tsk_a.id = task_id
ORDER BY tsk_a.nof_answer DESC
LIMIT 0 , 1;

SELECT 
    COUNT(tsk_a.answer), tsk_a.worker_max
INTO answer_number , max_worker FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.state >= 1
        AND tsk_a.id = task_id;

SELECT 
    COUNT(tsk_a.answer)
INTO someone_answered FROM
    task_analytics AS tsk_a
WHERE
    tsk_a.answer IS NOT NULL
        AND tsk_a.id = task_id;

IF someone_answered > 0 THEN
	UPDATE task SET state = 1
	WHERE id = task_id;
END IF;

IF result_answer IS NOT NULL OR answer_number = max_worker
THEN 
	UPDATE task SET state = 2
	WHERE id = task_id;
    
    UPDATE task_performed SET score = 1
	WHERE task = task_id AND answer = result_answer;
    
    UPDATE task_performed SET score = 0
	WHERE task = task_id AND answer != result_answer;
    
END IF;
END