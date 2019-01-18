CREATE DEFINER=`root`@`localhost` TRIGGER `crowd_sourcing`.`task_performed_check_answer` BEFORE UPDATE ON `task_performed` FOR EACH ROW
BEGIN
	DECLARE nWorker INT;
    DECLARE nRisposteDate INT;
    
    SET nWorker = (SELECT worker_max FROM task WHERE id = NEW.task);
	SET nRisposteDate = (SELECT COUNT(*) FROM task_performed WHERE task = NEW.task AND answer IS NOT NULL);
	IF NEW.answer <> OLD.answer   AND nRisposteDate = nWorker THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Il numero di worker che hanno risposto è già stato raggiunto! Il task verrà eliminato.';
	END IF;
END