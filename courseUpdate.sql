INSERT INTO Course VALUES(1,'Introduction to Computer Science',
01,198,111,4,500); 

INSERT INTO Prerequisite VALUES(1,35);

INSERT INTO Course VALUES(2,'Data Structures',
01,198,112,4,200); 

INSERT INTO Prerequisite VALUES(2,1);
/* prereq courseid 1 */

INSERT INTO Course VALUES(3,'Computer Applications for Business',
01,198,170,3,100);

/* prereq NONE */

INSERT INTO Course VALUES(4,'Honors Seminar in Computer Science',
01,198,195,1,100); 

/* prereq NONE */

INSERT INTO Course VALUES(5,'Introduction to Discrete Structures I',
01,198,205,4,100); 

INSERT INTO Prerequisite VALUES(5,36);
INSERT INTO Prerequisite VALUES(5,1);
/* prereq courseid 36,1 */

INSERT INTO Course VALUES(6,'Introduction to Discrete Structures II',
01,198,206,4,100); 

INSERT INTO Prerequisite VALUES(6,5);
/* prereq courseid 5 */

INSERT INTO Course VALUES(7,'Computer Architecture',
01,198,211,4,100); 

INSERT INTO Prerequisite VALUES(7,2);
/* prereq courseid 2 */

INSERT INTO Course VALUES(8,'Software Methodology',
01,198,213,1,100); 

INSERT INTO Prerequisite VALUES(8,2);
/* prereq courseid 2 */

INSERT INTO Course VALUES(9,'Systems Programming',
01,198,214,4,100); 

INSERT INTO Prerequisite VALUES(9,2);
/* prereq courseid 2  */

INSERT INTO Course VALUES(10,'Principles of Programming Languages',
01,198,314,4,100);

INSERT INTO Prerequisite VALUES(10,5);
INSERT INTO Prerequisite VALUES(10,7);
/* prereq courseid 5,7 */

INSERT INTO Course VALUES(11,'Numerical Analysis and Computing',
01,198,323,4,100); 

INSERT INTO Prerequisite VALUES(11,36);
INSERT INTO Prerequisite VALUES(11,37);
/* prereq courseid 36, 37 */

INSERT INTO Course VALUES(12,'Numerical Methods',
01,198,324,4,100); 

INSERT INTO Prerequisite VALUES(12,11);
/* prereq courseid 11 */

INSERT INTO Course VALUES(13,'Introduction to Imaging and Multimedia',
01,198,334,4,100); 

INSERT INTO Prerequisite VALUES(13,2);
INSERT INTO Prerequisite VALUES(13,6);
/* prereq courseid 2, 6 */

INSERT INTO Course VALUES(14,'Principles of Information and Data Management',
01,198,336,4,100); 

INSERT INTO Prerequisite VALUES(14,2);
INSERT INTO Prerequisite VALUES(14,5);

/* prereq courseid 2, 5 */

INSERT INTO Course VALUES(15,'Design and Analysis of Computer Algorithms',
01,198,344,4,100);

INSERT INTO Prerequisite VALUES(15,2);
INSERT INTO Prerequisite VALUES(15,6);
/* prereq 2, 6 */

INSERT INTO Course VALUES(16,'Internet Technology',
01,198,352,4,100);

INSERT INTO Prerequisite VALUES(16,6);
INSERT INTO Prerequisite VALUES(16,7);
/* prereq courseid 6, 7 */

INSERT INTO Course VALUES(17,'Internship in Computer Science',
01,198,395,3,100); 

/* prereq NONE */

INSERT INTO Course VALUES(18,'Seminar in Computers and Society',
01,198,405,3,100); 

/* prereq NONE */

INSERT INTO Course VALUES(19,'Computer Architecture II',
01,198,411,4,100);

INSERT INTO Prerequisite VALUES(19,7);
/* prereq courseid 7 */

INSERT INTO Course VALUES(20,'Compilers',
01,198,415,4,100); 

INSERT INTO Prerequisite VALUES(20,7);
INSERT INTO Prerequisite VALUES(20,10);
/* prereq courseid 7,10 */

INSERT INTO Course VALUES(21,'Operating Systems Design',
01,198,416,4,100); 

INSERT INTO Prerequisite VALUES(21,9);
/* prereq courseid 9 */

INSERT INTO Course VALUES(22,'Distributed Systems: Concepts and Design',
01,198,417,4,100); 

INSERT INTO Prerequisite VALUES(22,21);
/* prereq courseid 21 */

INSERT INTO Course VALUES(23,'Computer Security',
01,198,419,4,100); 

INSERT INTO Prerequisite VALUES(23,5);
INSERT INTO Prerequisite VALUES(23,21);
/* prereq  5, 21 */

INSERT INTO Course VALUES(24,'Modeling and Simulation of Continuous Systems',
01,198,424,4,100); 

INSERT INTO Prerequisite VALUES(24,11);
/* prereq 11 */

INSERT INTO Course VALUES(25,'Computer Methods in Statistics',
01,198,425,4,100); 

INSERT INTO Prerequisite VALUES(25,6);
INSERT INTO Prerequisite VALUES(25,36);
/* prereq courseid 6, 36 */

INSERT INTO Course VALUES(26,'Introduction to Computer Graphics',
01,198,428,4,100);

INSERT INTO Prerequisite VALUES(26,2);
INSERT INTO Prerequisite VALUES(26,36);
INSERT INTO Prerequisite VALUES(26,37);
/* prereq courseid 2, 36, 37 */

INSERT INTO Course VALUES(27,'Software Engineering',
01,198,431,4,100); 

INSERT INTO Prerequisite VALUES(27,8);
/* prereq 8 */

INSERT INTO Course VALUES(28,'Database Systems Implementation',
01,198,437,4,100); 

INSERT INTO Prerequisite VALUES(28,9);
INSERT INTO Prerequisite VALUES(28,14);
/* prereq 9, 14 */

INSERT INTO Course VALUES(29,'Introduction to Artificial Intelligence',
01,198,440,4,100); 

INSERT INTO Prerequisite VALUES(29,10);
/* prereq courseid 10 */

INSERT INTO Course VALUES(30,'Topics in Computer Science',
01,198,442,4,100); 

/* prereq NONE */

INSERT INTO Course VALUES(31,'Topics in Computer Science',
01,198,443,4,100); 

/* prereq NONE */

INSERT INTO Course VALUES(32,'Topics in Computer Science',
01,198,444,4,100);

/* prereq NONE */

INSERT INTO Course VALUES(33,'Formal Languages and Automata',
01,198,452,3,100); 

INSERT INTO Prerequisite VALUES(33,15);
/* prereq courseid 15 */

INSERT INTO Course VALUES(34,'Independent Study in Computer Science',
01,198,493,4,100);

INSERT INTO Course VALUES(35,'Precalculus', 
01,640,115,4,100);

INSERT INTO Course VALUES(36,'Calculus 2', 
01,640,152,4,100);

INSERT INTO Course VALUES(37,'Linear Algebra', 
01,640,250,4,100);

/* prereq NONE */
