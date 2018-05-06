/*Doeun Kim
doeun.kim@stonybrook.edu*/

DROP DATABASE IF EXISTS titama;

CREATE DATABASE titama;

GRANT ALL PRIVILEGES ON titama.* to root@localhost IDENTIFIED BY 'root';

USE titama;

CREATE TABLE Courses (
    id VARCHAR(126) NOT NULL,
	prof VARCHAR(256) NOT NULL,
    lec_days VARCHAR(126) NOT NULL,
    rec_days VARCHAR(126),
    lec_start_h INTEGER NOT NULL,
    lec_start_m INTEGER NOT NULL,
    lec_end_h INTEGER NOT NULL,
    lec_end_m  INTEGER NOT NULL,
    rec_start_h INTEGER ,
    rec_start_m INTEGER ,
    rec_end_h INTEGER ,
    rec_end_m  INTEGER,
    credit INTEGER NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE Users (
    username VARCHAR(256) NOT NULL,
	pwd VARCHAR(256) NOT NULL,
    min_credit INTEGER NOT NULL,
    math_level INTEGER NOT NULL
    PRIMARY KEY(username)
);
CREATE TABLE Took (
    username VARCHAR(256) NOT NULL,
	courseid VARCHAR(126) NOT NULL
    PRIMARY KEY(username, courseid),
    FOREIGN KEY(username) REFERENCES Users(username),
    FOREIGN KEY(courseid) REFERENCES Courses(id)
);

INSERT INTO Courses(id, prof, lec_days, rec_days, lec_start_h, lec_start_m, lec_end_h, lec_end_m,rec_start_h, rec_start_m, rec_end_h, rec_end_m, credit) VALUES 
("CSE114","Antonino Mione","MW","TUTH",14,0,15,20,14,0,15,20,4),
("CSE214", "YoungMin Kwon", "TUTH", "W",14,0,15,20,14,0,14,53,3),
("CSE215","Simon Woo", "TUTH","TH",15,30,16,50,12,30,13,23,3),
("CSE219","Stuart Eisenstadt", "TUTH","M", 17,0,18,20,17,0,17,53,4),
("CSE220","Antonino Mione","TUTH", "W",10,30,11,50,15,30,16,23,3),
("CSE373", "Jihoon Ryoo", "MW",NULL,14,0,15,20,NULL,NULL,NULL,NULL,3),
("CSE307","Arthur Lee","TUTH",NULL,14,0,15,20,NULL,NULL,NULL,NULL,3),
("CSE310","BongJun Choi","MW",NULL,9,0,10,20,NULL,NULL,NULL,NULL,3),
("CSE352","Stuart Eisenstadt","TUTH",NULL,12,30,13,50,NULL,NULL,NULL,NULL,3),
("CSE378","Vladimir Skvortsov","MW",NULL,15,30,16,50,NULL,NULL,NULL,NULL,3),
("AMS151","Suil O", "MW", NULL, 3,30,4,50,NULL,NULL,NULL,NULL, 3),
("AMS161","Kazem Mahdavi", "MW", NULL, 3,30,4,50,NULL,NULL,NULL,NULL, 3),
("AMS210","Tan Cao", "MW", NULL, 17,0,18,20,NULL,NULL,NULL,NULL, 3),
("AMS310","Myoungshic Jhun", "MW", NULL, 10,30,11,50,NULL,NULL,NULL,NULL, 3),
("AMS301","Suil O", "MW", NULL, 17,0,18,20,NULL,NULL,NULL,NULL, 3),
("MAT123","Alexander Krejci", "MW","F",15,30,16,50,12,30,13,23,3),
("PHY131.1","Alexander Krejci","TUTH","W",10,30,11,50,10,30,11,23,3),
("PHY131.2","Alexander Krejci","TUTH","TH",10,30,11,50,9,0,9,53,3),
("PHY132","Alexander Krejci","MW","M",9,0,10,20,10,30,11,23,3),
("PHY133.1", "Aaron Park","F",NULL,10,0,11,50,NULL,NULL,NULL,NULL,1),
("PHY133.2", "Aaron Park","F", NULL, 12,30,14,20,NULL,NULL,NULL,NULL,1),
("PHY134.1", "Aaron Park","F",NULL, 8,0,9,50,NULL,NULL,NULL,NULL,1),
("PHY134.2", "Aaron Park","F",NULL,15,30,17,20,NULL,NULL,NULL,NULL,1),
("BIO201","John Eimes","M",NULL,17,0,19,50,NULL,NULL,NULL,NULL,3);

INSERT INTO Users(username, pwd, min_credit,math_level) VALUES
("jd","dj", 12, 6),
("dek", "ked", 15, 8);

INSERT INTO Took(username, courseid) VALUES
("jd","AMS151"), 
("jd","CSE114"), 
("dek","AMS161"), 
("dek","CSE114"),
("dek","PHY131"), 
("dek","CSE214");


SELECT * FROM Courses;
SELECT * FROM Users;
SELECT * FROM Takes;

