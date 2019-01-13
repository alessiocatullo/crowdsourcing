CREATE DEFINER=`root`@`localhost` FUNCTION `task_assignment`(my_user VARCHAR(254), my_campaign_id INT(11)) RETURNS int(11)
BEGIN

	/*DICHIARAZIONI DI VARIABILI*/
	DECLARE done_block1, done_block2, done_block3 INT DEFAULT FALSE;
    DECLARE debug INT;
    DECLARE approximaty DOUBLE;
	DECLARE approximaty_temp DOUBLE;
    DECLARE task_id_analized LONG;
    DECLARE task_skill_analized INT;
    DECLARE skill_worker_analized INT;
    DECLARE skill_worker_ifcategory INT;
    DECLARE task_skill_analized_category INT;
    DECLARE n_sub_category INT;
	DECLARE task_id LONG;
    DECLARE task_iterator CURSOR FOR
    
    SELECT tsk.id
        FROM (SELECT id, state, campaign FROM task WHERE campaign = 1 AND state < 2) as tsk 
			LEFT JOIN (SELECT task ,user FROM task_performed WHERE user = my_user) as tp ON tsk.id = tp.task
		WHERE tp.user IS NULL OR tp.user != my_user;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block1 = TRUE;
	
    /*SET DELLE VARIABILI*/
	SET approximaty = 0;
	SET approximaty_temp = 0;
    SET debug = 0;
	SET task_id = null;

	/*-------------------------START BLOCK1 */
    OPEN task_iterator;
		/*-------------------------LOOP DEI TASK DELLA CAMPAGNA DEFINITA*/
		LOOPTASK: LOOP
		FETCH task_iterator INTO task_id_analized;
        
        SET done_block2 = false;
        SET done_block3 = false;
		        
		IF done_block1 THEN
			LEAVE LOOPTASK;
		END IF;
        
		/*-------------------------START BLOCK2*/
		CHECKSKILL: BEGIN
			DECLARE task_skill_iteretor CURSOR FOR SELECT tsksk.skill FROM task_skill tsksk WHERE tsksk.task = task_id_analized;
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block2 = TRUE;
			            
			OPEN task_skill_iteretor;
				/*-------------------------LOOP DELLE SKILL DEL CURRENT TASK*/
				LOOPSKILL: LOOP
				FETCH task_skill_iteretor INTO task_skill_analized;
				                
                IF done_block2 THEN
					SET done_block1 = false;
					LEAVE LOOPSKILL;
				END IF;
                
                /*-------------------------START BLOCK3 */
					CHECKSKILLWORKER: BEGIN
						DECLARE worker_skill_iterator CURSOR FOR SELECT wsk.skill FROM user_skills wsk WHERE wsk.user = my_user;
						DECLARE CONTINUE HANDLER FOR NOT FOUND SET done_block3 = TRUE;
                        
                        SET done_block3 = false;
                        /*-------------------------START CHECK SKILL*/
						OPEN worker_skill_iterator;
							LOOPWORKERSKILL: LOOP
							FETCH worker_skill_iterator INTO skill_worker_analized;
                            
                            IF done_block3 THEN
								SET done_block2 = false;
                                SET done_block1 = false;
								LEAVE LOOPWORKERSKILL;
							END IF;
                            
                            SET skill_worker_ifcategory = (SELECT main_skill FROM skill WHERE id = skill_worker_analized);
                            
                            IF skill_worker_ifcategory != 0 THEN
								IF task_skill_analized = skill_worker_analized THEN
									SET approximaty_temp = approximaty_temp + 1;
									ITERATE LOOPWORKERSKILL;
								END IF;
							END IF;
                            
							IF skill_worker_ifcategory = 0 THEN
								SET task_skill_analized_category = (SELECT main_skill FROM skill WHERE id = task_skill_analized);                               
								IF task_skill_analized_category = skill_worker_analized THEN
									SET n_sub_category = (SELECT COUNT(*) FROM skill WHERE main_skill = skill_worker_analized);
									SET approximaty_temp = approximaty_temp + 1/n_sub_category;
									ITERATE LOOPWORKERSKILL;
								END IF;
                                IF task_skill_analized = skill_worker_analized THEN
									SET approximaty_temp = approximaty_temp + 1;
									ITERATE LOOPWORKERSKILL;
                                END IF;
                                
							END IF;
                            
                            END LOOP LOOPWORKERSKILL;
						CLOSE worker_skill_iterator;
						/*-------------------------END CHECK SKILL*/
                    END CHECKSKILLWORKER;
                    /*-------------------------END BLOCK3 */
			    END LOOP LOOPSKILL;
                /*-------------------------END LOOP DELLE SKILL DEL CURRENT TASK*/
            CLOSE task_skill_iteretor;
		END CHECKSKILL;
        /*-------------------------END BLOCK2*/
        
		IF approximaty >= approximaty_temp THEN
			SET approximaty_temp = 0;
			ITERATE LOOPTASK;
		END IF;
		
		SET approximaty = approximaty_temp;
		SET approximaty_temp = 0;
		SET task_id = task_id_analized;
		
		END LOOP LOOPTASK;
		/*-------------------------END LOOP DEI TASK*/
    CLOSE task_iterator;
    /*-------------------------END BLOCK1*/

RETURN task_id;
END