CREATE DEFINER=`root`@`localhost` FUNCTION `rating`(user_in VARCHAR(245)) RETURNS int(11)
BEGIN
	DECLARE nRating int;
    SET nRating = (SELECT SUM(score) FROM task_performed WHERE user = user_in);
RETURN nRating;
END