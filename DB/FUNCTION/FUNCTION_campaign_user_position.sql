CREATE DEFINER=`root`@`localhost` FUNCTION `campaign_user_position`(cmp_id INT(11), usr_id VARCHAR(254)) RETURNS int(11)
BEGIN
	DECLARE fetch_done INT DEFAULT FALSE;
	DECLARE count_position INT DEFAULT 1; -- count of position --
    DECLARE usr_position INT DEFAULT 0; -- position in top10 of user / if is 0  ao the user doesn't exists in this campaign--
    DECLARE usr_email VARCHAR(254);
    
    DECLARE usr_cursor CURSOR FOR SELECT 
										tsk_p.user AS email
									FROM
										task_performed tsk_p
											JOIN
										task tsk ON tsk.id = tsk_p.task
											JOIN
										campaign cmp ON cmp.id = tsk.campaign
									WHERE
										cmp.id = cmp_id
									GROUP BY email
									ORDER BY SUM(tsk_p.score) DESC, count(tsk_p.user);
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fetch_done = TRUE;
    
	OPEN usr_cursor;
    LOOPTASK: LOOP
    
		FETCH usr_cursor INTO usr_email;
		IF fetch_done = TRUE THEN
			LEAVE LOOPTASK;
		END IF;
        
		IF usr_id IS NOT NULL AND usr_id = usr_email THEN
			SET usr_position = count_position;
		END IF;
        SET count_position = count_position + 1;
        
    END LOOP LOOPTASK;
    CLOSE usr_cursor;
    
	RETURN usr_position;
END