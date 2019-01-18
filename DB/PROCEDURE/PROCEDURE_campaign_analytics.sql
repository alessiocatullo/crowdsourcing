CREATE DEFINER=`root`@`localhost` PROCEDURE `campaign_analytics`(IN my_campaign_id INT(11))
BEGIN
	DECLARE fetch_done INT DEFAULT FALSE;
    DECLARE procedure_done INT DEFAULT FALSE;
	DECLARE my_task_id INT(11);
	DECLARE task_id_cursor CURSOR FOR SELECT tsk.id FROM task tsk WHERE tsk.campaign = my_campaign_id AND tsk.state >= 2;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetch_done = TRUE, procedure_done = TRUE;
    
    DROP TEMPORARY TABLE IF EXISTS my_tmp_task;
    CREATE TEMPORARY TABLE IF NOT EXISTS my_tmp_task 
		(my_tsk_id INT(11) , my_tsk_title VARCHAR(150), my_tsk_description LONGTEXT, my_res_ans_id INT(11), my_res_ans VARCHAR(150));
    
    OPEN task_id_cursor;
    LOOPTASK: LOOP
    
		FETCH task_id_cursor INTO my_task_id;
		IF fetch_done = TRUE THEN
			LEAVE LOOPTASK;
		END IF;
        
		CALL task_results(my_task_id, @result_answer_id, @result_answer);
            
		IF (procedure_done = TRUE) THEN 
		   SET fetch_done = FALSE;
		END IF;
		
		-- SELECT tsk.id, tsk.title, tsk.description, @result_answer_id, @result_answer FROM task tsk WHERE tsk.id = my_task_id;
		INSERT INTO my_tmp_task(my_tsk_id, my_tsk_title, my_tsk_description, my_res_ans_id, my_res_ans) 
			SELECT tsk.id, tsk.title, tsk.description, @result_answer_id, @result_answer FROM task tsk WHERE tsk.id = my_task_id;   
    END LOOP LOOPTASK;
    
    CLOSE task_id_cursor;
    SELECT * FROM my_tmp_task;
END