CREATE DEFINER=`root`@`localhost` FUNCTION `check_assignment_task`(id_task INT) RETURNS int(11)
BEGIN
	DECLARE done BOOLEAN;
    DECLARE user_analized VARCHAR(245);
    DECLARE user_iterator CURSOR FOR SELECT us.user FROM user_skills as us JOIN (SELECT cp.campaign, nts.id, nts.skill, cp.user FROM campaign_performed as cp JOIN (SELECT t.id, t.campaign, ts.skill FROM task as t JOIN task_skill as ts ON t.id = ts.task WHERE t.id = id_task) as nts ON cp.campaign = nts.campaign WHERE notification = 1) as mad ON us.user = mad.user WHERE us.skill = mad.skill group by us.user;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	
    OPEN user_iterator;
		LOOPUSER: LOOP
		FETCH user_iterator INTO user_analized;
        
        IF done THEN
			LEAVE LOOPUSER;
		END IF;
        
        INSERT INTO task_performed(task, user) VALUES (id_task, user_analized);
        
        UPDATE campaign_performed SET notification_value = notification_value + 1 WHERE user = user_analized;
        
        END LOOP LOOPUSER;
	CLOSE user_iterator;
RETURN 1;
END