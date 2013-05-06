

/* Preloaded table, netid will be NULL in beginning */
CREATE TABLE SpecialPermissionNumber(
	SPNum INTEGER(10),
	courseID INTEGER(3),
	sectionNumber INTEGER(3),
	netid CHAR(8),
	PRIMARY KEY(SPNum),
	FOREIGN KEY(courseID) REFERENCES Course(courseID)
	ON UPDATE CASCADE ON DELETE SET NULL,
	FOREIGN KEY(sectionNumber) REFERENCES SectionsTaught(sectionNumber)
	ON UPDATE CASCADE ON DELETE SET NULL,
	FOREIGN KEY(netid) REFERENCES Student(netid)
	ON UPDATE CASCADE ON DELETE SET NULL);

/* Student to fill this in. */
CREATE TABLE hasTaken(
	netid CHAR(8),
	courseID INTEGER(3),
	gradeEarned	CHAR(2),
	PRIMARY KEY(netid, courseID),
	FOREIGN KEY(netid) REFERENCES Student(netid)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(courseID) REFERENCES Course(courseID)
	ON UPDATE CASCADE ON DELETE CASCADE);

/* Will be filled in as professor enters information for SectionsTaught */
CREATE TABLE managesSPNumsFor(
	netid CHAR(8),
	courseID INTEGER(3),
	sectionNumber INTEGER(3),
	PRIMARY KEY(netid, courseID, sectionNumber),
	FOREIGN KEY(netid) REFERENCES Professor(netid),
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(sectionNumber) REFERENCES SectionsTaught(sectionNumber)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(courseID) REFERENCES Course(courseID)
	ON UPDATE CASCADE ON DELETE CASCADE);
	
/* Student will fill this in when requesting SpecialPermission */
CREATE TABLE requestsSPNum(
	netid CHAR(8),
	courseID INTEGER(3),
	sectionNumber INTEGER(3),
	dateReq CHAR(10),
	timeReq CHAR(10),
	comments CHAR(100),
	PRIMARY KEY(netid, courseID, sectionNumber),
	FOREIGN KEY(netid) REFERENCES Student(netid)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(courseID) REFERENCES Course(courseID)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(sectionNumber) REFERENCES SectionsTaught(sectionNumber)
	ON UPDATE CASCADE ON DELETE CASCADE);
	 
/* These are classes student is registered for next semester (to see if he fulfills coreqs) */
CREATE TABLE hasBeenRegisteredFor(
	netid CHAR(8),
	courseID INTEGER(3),
	sectionNumber INTEGER(3),
	PRIMARY KEY(netid, courseID, sectionNumber),
	FOREIGN KEY(netid) REFERENCES Student(netid)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(courseID) REFERENCES Course(courseID)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(sectionNumber) REFERENCES SectionsTaught(sectionNumber)
	ON UPDATE CASCADE ON DELETE SET NULL);

//After Professor gives a student SpecialPermission, this table populated. 
CREATE TABLE hasReceivedSPNum(
	netid CHAR(8),
	SPNum INTEGER(10),
	PRIMARY KEY(netid, SPNum),
	FOREIGN KEY(netid) REFERENCES Student(netid)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(SPNum) REFERENCES SpecialPermissionNumber(SPNum)
	ON UPDATE CASCADE ON DELETE CASCADE);	
/* Need to ensure that we update the SpecialPermission# table to fill in netid.






THESE TABLES ONLY IF WE HAVE TIME
CREATE TABLE sendEmailTo(
	netid		CHAR(8),
	sectionNumber	CHAR(2),
	courseNumber	CHAR(3),
	emailContent	CHAR(100),
	PRIMARY KEY(netid, sectionNumber, courseNumber),
	FOREIGN KEY(netid) REFERENCES Student,
	FOREIGN KEY(sectionNumber, courseNumber) REFERENCES SectionsTaught))

//not completely sure how to implement these tables
CREATE TABLE hasPrerequisite(
	courseNumber	CHAR(3) REFERENCES Course,
	courseNumber	CHAR(3) REFERENCES Prerequisite,
	PRIMARY KEY(courseNumber, courseNumber))

CREATE TABLE hasCorerequisite(
	courseNumber	CHAR(3) REFERENCES Course,
	courseNumber	CHAR(3) REFERENCES Corequisite,
	PRIMARY KEY(courseNumber, courseNumber)) */
