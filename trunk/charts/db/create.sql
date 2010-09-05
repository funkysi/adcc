create database graphs;
use graphs;

CREATE TABLE DisplayToID(
	GUID text NOT NULL,
	RunID int NULL,
	DisplayString varchar(1024) NOT NULL,
	LogStartTime char(24) NULL,
	LogStopTime char(24) NULL,
	NumberOfRecords int NULL,
	MinutesToUTC int NULL,
	TimeZoneName char(32) NULL
	);
	
	CREATE TABLE CounterDetails(
	CounterID int NOT NULL,
	MachineName varchar(1024) NOT NULL,
	ObjectName varchar(1024) NOT NULL,
	CounterName varchar(1024) NOT NULL,
	CounterType int NOT NULL,
	DefaultScale int NOT NULL,
	InstanceName varchar(1024) NULL,
	InstanceIndex int NULL,
	ParentName varchar(1024) NULL,
	ParentObjectID int NULL,
	TimeBaseA int NULL,
	TimeBaseB int NULL
	);
	CREATE TABLE CounterData(
	GUID text NOT NULL,
	CounterID int NOT NULL,
	RecordIndex int NOT NULL,
	CounterDateTime char(24) NOT NULL,
	CounterValue float NOT NULL,
	FirstValueA int NULL,
	FirstValueB int NULL,
	SecondValueA int NULL,
	SecondValueB int NULL,
	MultiCount int NULL
	);
	
	
use graphs;
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,1,'2008-07-20 13:17:15.450',0,1076396,0,-1923505646,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,2,'2008-07-20 13:17:29.594',8.20091890091506,1076512,0,-1872873854,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,3,'2008-07-20 13:17:44.594',9.73257202982455,1076658,0,-1819176479,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,4,'2008-07-20 13:17:59.594',1.19990223017624,1076676,0,-1765478929,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,5,'2008-07-20 13:18:14.594',0,1076676,0,-1711781700,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,6,'2008-07-20 13:18:29.594',0.533288698248708,1076684,0,-1658084031,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,7,'2008-07-20 13:18:44.594',0.0666617700662861,1076685,0,-1604386912,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,8,'2008-07-20 13:18:59.594',9.86588097077457,1076833,0,-1550689461,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,9,'2008-07-20 13:19:14.594',0.199984457332977,1076836,0,-1496992113,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,10,'2008-07-20 13:19:29.594',35.5972102029628,1077370,0,-1443294730,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,11,'2008-07-20 13:19:44.594',296.843408213086,1081823,0,-1389597348,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,12,'2008-07-20 13:19:59.594',1.53321274524326,1081846,0,-1335899950,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,13,'2008-07-20 13:20:14.594',0.0666614336376498,1081847,0,-1282202560,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,14,'2008-07-20 13:20:29.594',0.599951953048072,1081856,0,-1228505085,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,15,'2008-07-20 13:20:44.594',0.0666614472933586,1081857,0,-1174807706,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,16,'2008-07-20 13:20:59.594',0.666614336376498,1081867,0,-1121110316,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,17,'2008-07-20 13:21:14.594',17.46531903139,1082129,0,-1067412998,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,18,'2008-07-20 13:21:29.594',0.533290644794402,1082137,0,-1013715525,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,19,'2008-07-20 13:21:44.594',0.999922882551523,1082152,0,-960018209,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,20,'2008-07-20 13:21:59.594',40.9967465671918,1082767,0,-906320773,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,21,'2008-07-20 13:22:14.594',0.733276138718395,1082778,0,-852623410,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,22,'2008-07-20 13:22:29.594',195.517686288844,1085711,0,-798925938,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,23,'2008-07-20 13:22:44.594',168.58705765022,1088240,0,-745228641,7,1);
INSERT INTO CounterData (GUID,CounterID,RecordIndex,CounterDateTime,CounterValue,FirstValueA,FirstValueB,SecondValueA,SecondValueB,MultiCount) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',1,24,'2008-07-20 13:22:59.594',6.19950998017242,1088333,0,-691531222,7,1);

use graphs;
INSERT INTO CounterDetails (CounterID,MachineName,ObjectName,CounterName,CounterType,DefaultScale,InstanceName,InstanceIndex,ParentName,ParentObjectID,TimeBaseA,TimeBaseB) VALUES (1,'\\SIMON-PC','Memory','Pages/sec',272696320,0,NULL,NULL,NULL,NULL,3579545,0);
INSERT INTO CounterDetails (CounterID,MachineName,ObjectName,CounterName,CounterType,DefaultScale,InstanceName,InstanceIndex,ParentName,ParentObjectID,TimeBaseA,TimeBaseB) VALUES (2,'\\SIMON-PC','PhysicalDisk','Avg. Disk Read Queue Length',5571840,2,'_Total',NULL,NULL,NULL,10000000,0);
INSERT INTO CounterDetails (CounterID,MachineName,ObjectName,CounterName,CounterType,DefaultScale,InstanceName,InstanceIndex,ParentName,ParentObjectID,TimeBaseA,TimeBaseB) VALUES (3,'\\SIMON-PC','Processor','% Processor Time',558957824,0,'_Total',NULL,NULL,NULL,10000000,0);

use graphs;
INSERT INTO DisplayToID (GUID,RunID,DisplayString,LogStartTime,LogStopTime,NumberOfRecords,MinutesToUTC,TimeZoneName) VALUES ('1980bd0d-9902-4246-a9dd-dbd173bf4dc3',0,'DataCollector01','2008-07-20 13:17:15.450 ','2008-07-20 15:46:29.594 ',598,-60,'GMT Daylight Time               ');
