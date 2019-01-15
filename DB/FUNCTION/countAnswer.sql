CREATE DEFINER=`root`@`localhost` FUNCTION `COUNTANSWER`(task_in INT, answer_in INT) RETURNS int(11)
BEGIN
	DECLARE nof_answer INT;
    
    SET nof_answer = (SELECT COUNT(*) FROM task_performed WHERE task = task_in AND answer = answer_in); 
    
RETURN nof_answer;
END
