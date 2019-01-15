CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `task_analytics` AS
    SELECT 
        `t`.`campaign` AS `campaign`,
        `t`.`id` AS `id`,
        `t`.`title` AS `title`,
        `t`.`description` AS `description`,
        `t`.`worker_max` AS `worker_max`,
        `t`.`majority` AS `majority`,
        `t`.`state` AS `state`,
        `ao`.`answer` AS `answer`,
        `ao`.`id` AS `answer_id`,
        COUNTANSWER(`t`.`id`, `ao`.`id`) AS `nof_answer`,
        PROPORTION_RESULT(`t`.`worker_max`,
                COUNTANSWER(`t`.`id`, `ao`.`id`)) AS `percentage`
    FROM
        (`task` `t`
        JOIN `answer_options` `ao` ON ((`t`.`id` = `ao`.`task`)))