CREATE DEFINER=`root`@`localhost` FUNCTION `rating`(user_in VARCHAR(245)) RETURNS float
BEGIN
	DECLARE nRating int;
    DECLARE totAnswered int;
    SET nRating = (SELECT SUM(score) FROM task_performed WHERE user = user_in);
    SET totAnswered = (SELECT COUNT(*) FROM task_performed WHERE user = user_in AND answer IS NOT NULL);
RETURN nRating / totAnswered;
END