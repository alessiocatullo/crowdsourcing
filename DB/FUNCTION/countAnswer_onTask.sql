CREATE DEFINER=`root`@`localhost` FUNCTION `countAnswer_onTask`(task_id INT) RETURNS int(11)
BEGIN
	DECLARE nof_answer INT;
    
    SET nof_answer = (SELECT COUNT(*) FROM task_performed WHERE task = task_id AND answer IS NOT NULL); 
RETURN nof_answer;
END