CREATE TABLE IF NOT EXISTS ft_table(
	id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
	login CHAR(8) NOT NULL DEFAULT 'toto', 
	groupe ENUM('staff','student','other') NOT NULL,
	date_de_creation DATE NOT NULL);
