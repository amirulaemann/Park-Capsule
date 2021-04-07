CREATE DATABASE parking;


CREATE TABLE `parking`.`level1` ( 
	`plate_no` VARCHAR(30) NOT NULL , 
	`vehicle_type` VARCHAR(30) NOT NULL , 
	`start_time` INT(4) NOT NULL , 
	`end_time` INT(4) NOT NULL , 
	`fees` FLOAT(4) NOT NULL ) 
	ENGINE = InnoDB;

CREATE TABLE `parking`.`level2` ( 
	`plate_no` VARCHAR(30) NOT NULL , 
	`vehicle_type` VARCHAR(30) NOT NULL , 
	`start_time` INT(4) NOT NULL , 
	`end_time` INT(4) NOT NULL , 
	`fees` FLOAT(4) NOT NULL ) 
	ENGINE = InnoDB;