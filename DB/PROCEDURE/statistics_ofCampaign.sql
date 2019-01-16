CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_ofCampaign`(IN my_user VARCHAR(254), IN my_camp INT(11), OUT tot_task INT,OUT tot_task_sub INT,OUT tot_task_answered INT,OUT tot_task_valid INT)
BEGIN
/*1 variabile*/  
SELECT COUNT(*) INTO tot_task FROM task WHERE campaign = my_camp;
/*2 variabile*/    
SELECT 
    COUNT(*) INTO tot_task_sub
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp AND tp.user = my_user;
/*3 variabile*/  
SELECT 
    COUNT(*) INTO tot_task_answered
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp
		AND tp.user = my_user
        AND tp.answer IS NOT NULL;
/*4 variabile*/  
SELECT 
    COUNT(*) INTO tot_task_valid
FROM
    task_performed AS tp
        JOIN
    task AS t ON tp.task = t.id
WHERE
    t.campaign = my_camp
		AND tp.user = my_user
        AND tp.answer IS NOT NULL
        AND tp.score = 1;
END