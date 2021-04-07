DROP TABLE companyinfo;

CREATE TABLE `companyinfo` (
  `CompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `LoginId` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `ContactPersonName` varchar(20) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `CompanyEmail` varchar(100) NOT NULL,
  `Wesite` varchar(100) NOT NULL,
  `CompanyLogo` varchar(60) NOT NULL,
  `AboutCompany` varchar(600) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CompanyId`),
  UNIQUE KEY `Mobile` (`Mobile`),
  UNIQUE KEY `CompanyEmail` (`CompanyEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO companyinfo VALUES("1","1","Sai InfoTech","Adajan Surat 0st floor","3","3","Saii Devaa","987456312","www.saaii@gmail.com","wwww.aca.org",".se.","Good opp","2019-12-21 19:20:48","2020-03-27 18:07:37");
INSERT INTO companyinfo VALUES("3","66","New InfoTech","1, Maruti Park","2","2","Ms. Vina","987456311","Info@gmail.com","https://www.google.com","Front.PNG","Good ","2020-03-09 20:50:57","2020-03-09 20:52:30");
INSERT INTO companyinfo VALUES("4","68","Maruti Organization","minibajar","12","12","Dilipbhai Vaghela","9427121763","Maruti1@gmail.com","www.maruti.com","one1.jpg","Good company","2020-04-18 10:35:07","2020-04-18 10:35:07");



DROP TABLE hrinfo;

CREATE TABLE `hrinfo` (
  `HRId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `HRFullName` varchar(60) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`HRId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO hrinfo VALUES("1","1","60","1","Nikita Bhikadiya","33,BHAGUNAGAR,MATAWADI,L.H ","9016165121","4","4","f","2020-02-07");
INSERT INTO hrinfo VALUES("2","68","91","21","Hardik Vaghela","minibajar","9537895163","12","12","m","1997-03-29");
INSERT INTO hrinfo VALUES("3","68","94","23","Hardik Patel","kaliyabid","987654322","12","12","m","1996-03-29");



DROP TABLE jobseekerinfor;

CREATE TABLE `jobseekerinfor` (
  `JobSeekerId` int(11) NOT NULL AUTO_INCREMENT,
  `LoginId` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Resume` int(100) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`JobSeekerId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO jobseekerinfor VALUES("3","61","kunjesh Patel","33,BHAGUNAGAR","49","12","M","0","9016165122","2020-02-06");
INSERT INTO jobseekerinfor VALUES("4","67","Anjali Hardik Parmar","B-46 Santlal Society","49","12","F","0","9426173585","2020-04-23");
INSERT INTO jobseekerinfor VALUES("5","76","Heer Goti","20-sai darshan society katargam","495","12","F","0","9173882080","2010-06-23");
INSERT INTO jobseekerinfor VALUES("6","77","Dhruvi Babubhai Vaghela","B-46 Santlal Society","495","12","F","0","9537895163","2000-05-22");



DROP TABLE resume;

CREATE TABLE `resume` (
  `ResumeId` int(11) NOT NULL AUTO_INCREMENT,
  `LoginId` int(11) NOT NULL,
  `Objective` varchar(512) NOT NULL,
  `Services` varchar(512) NOT NULL,
  `AboutServices` varchar(512) DEFAULT NULL,
  `maxedu` varchar(512) NOT NULL,
  `Project` varchar(512) NOT NULL,
  `ProjectDescription` varchar(512) NOT NULL,
  `ProjectImage` varchar(512) NOT NULL,
  `Certification` varchar(512) NOT NULL,
  `ExtraSkills` varchar(200) NOT NULL,
  PRIMARY KEY (`ResumeId`),
  UNIQUE KEY `LoginId` (`LoginId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO resume VALUES("18","77","NONW NONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONW","BB","CC","12 Pass,77","NONW1,NONW","NONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONW,NONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONWNONW","77.jpg,77.jpg","AA","AA");
INSERT INTO resume VALUES("22","61","Devloper","aaa,bbb","aa,bb","0,98","job portal,technical fest","create website\" \" ,tech fest\"\"","61,61","bsc,msc","dance,reading,sports");
INSERT INTO resume VALUES("23","76","coder","aa,bb","cc,dd","Graduate,80","deck1,deck2","technical,non tech","76.jpg,76.jpg","bsc,msc","sports,drama");



DROP TABLE tblappplication;

CREATE TABLE `tblappplication` (
  `ApplicationId` int(11) NOT NULL AUTO_INCREMENT,
  `JobId` int(11) NOT NULL,
  `ApplicantId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `HRId` int(11) NOT NULL,
  `ResumeId` int(11) NOT NULL,
  `Status` char(2) DEFAULT 'PE',
  `Remark` varchar(100) DEFAULT NULL,
  `AppliedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Action On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ApplicationId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

INSERT INTO tblappplication VALUES("37","5","61","1","60","1","AP","No Good SO MUCH","2020-03-08 17:58:56","2020-03-26 13:33:35");
INSERT INTO tblappplication VALUES("38","6","61","1","60","1","RJ","nonee","2020-03-08 18:04:23","2020-04-18 10:50:40");
INSERT INTO tblappplication VALUES("39","7","61","1","60","1","AP","Have good","2020-03-08 20:06:20","2020-03-26 13:33:57");
INSERT INTO tblappplication VALUES("40","9","61","1","60","1","RJ","Incompelete Resume","2020-04-17 18:54:31","2020-04-18 10:51:38");
INSERT INTO tblappplication VALUES("41","6","76","1","60","1","PE","","2020-04-18 10:48:14","2020-04-18 10:48:14");
INSERT INTO tblappplication VALUES("42","6","77","1","60","1","AP","good","2020-04-18 10:58:01","2020-04-18 16:07:05");
INSERT INTO tblappplication VALUES("43","7","77","1","60","1","PE","","2020-04-18 10:58:25","2020-04-18 10:58:25");
INSERT INTO tblappplication VALUES("44","10","77","4","91","1","AP","Good ","2020-04-18 16:33:57","2020-04-18 16:37:47");
INSERT INTO tblappplication VALUES("45","10","76","4","91","1","PE","","2020-04-18 16:36:36","2020-04-18 16:36:36");



DROP TABLE tblcity;

CREATE TABLE `tblcity` (
  `CitytId` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `StateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblcity VALUES("1","Adilabad","32");
INSERT INTO tblcity VALUES("2","Agra","34");
INSERT INTO tblcity VALUES("3","Ahmed Nagar","21");
INSERT INTO tblcity VALUES("4","Ahmedabad City","12");
INSERT INTO tblcity VALUES("5","Aizawl","24");
INSERT INTO tblcity VALUES("6","Ajmer","29");
INSERT INTO tblcity VALUES("7","Akola","21");
INSERT INTO tblcity VALUES("8","Aligarh","34");
INSERT INTO tblcity VALUES("9","Allahabad","34");
INSERT INTO tblcity VALUES("10","Alleppey","18");
INSERT INTO tblcity VALUES("11","Almora","35");
INSERT INTO tblcity VALUES("12","Alwar","29");
INSERT INTO tblcity VALUES("13","Alwaye","18");
INSERT INTO tblcity VALUES("14","Amalapuram","2");
INSERT INTO tblcity VALUES("15","Ambala","13");
INSERT INTO tblcity VALUES("16","Ambedkar Nagar","34");
INSERT INTO tblcity VALUES("17","Amravati","21");
INSERT INTO tblcity VALUES("18","Amreli","12");
INSERT INTO tblcity VALUES("19","Amritsar","28");
INSERT INTO tblcity VALUES("20","Anakapalle","2");
INSERT INTO tblcity VALUES("21","Anand","12");
INSERT INTO tblcity VALUES("22","Anantapur","2");
INSERT INTO tblcity VALUES("23","Ananthnag","15");
INSERT INTO tblcity VALUES("24","Anna Road H.O","31");
INSERT INTO tblcity VALUES("25","Arakkonam","31");
INSERT INTO tblcity VALUES("26","Asansol","36");
INSERT INTO tblcity VALUES("27","Aska","26");
INSERT INTO tblcity VALUES("28","Auraiya","34");
INSERT INTO tblcity VALUES("29","Aurangabad","21");
INSERT INTO tblcity VALUES("30","Aurangabad(Bihar)","5");
INSERT INTO tblcity VALUES("31","Azamgarh","34");
INSERT INTO tblcity VALUES("32","Bagalkot","17");
INSERT INTO tblcity VALUES("33","Bageshwar","35");
INSERT INTO tblcity VALUES("34","Bagpat","34");
INSERT INTO tblcity VALUES("35","Bahraich","34");
INSERT INTO tblcity VALUES("36","Balaghat","20");
INSERT INTO tblcity VALUES("37","Balangir","26");
INSERT INTO tblcity VALUES("38","Balasore","26");
INSERT INTO tblcity VALUES("39","Ballia","34");
INSERT INTO tblcity VALUES("40","Balrampur","34");
INSERT INTO tblcity VALUES("41","Banasanktha","12");
INSERT INTO tblcity VALUES("42","Banda","34");
INSERT INTO tblcity VALUES("43","Bandipur","15");
INSERT INTO tblcity VALUES("44","Bankura","36");
INSERT INTO tblcity VALUES("45","Banswara","29");
INSERT INTO tblcity VALUES("46","Barabanki","34");
INSERT INTO tblcity VALUES("47","Baramulla","15");
INSERT INTO tblcity VALUES("48","Baran","29");
INSERT INTO tblcity VALUES("49","Bardoli","12");
INSERT INTO tblcity VALUES("50","Bareilly","34");
INSERT INTO tblcity VALUES("51","Barmer","29");
INSERT INTO tblcity VALUES("52","Barnala","28");
INSERT INTO tblcity VALUES("53","Barpeta","4");
INSERT INTO tblcity VALUES("54","Bastar","7");
INSERT INTO tblcity VALUES("55","Basti","34");
INSERT INTO tblcity VALUES("56","Bathinda","28");
INSERT INTO tblcity VALUES("57","Beed","21");
INSERT INTO tblcity VALUES("58","Begusarai","5");
INSERT INTO tblcity VALUES("59","Belgaum","17");
INSERT INTO tblcity VALUES("60","Bellary","17");
INSERT INTO tblcity VALUES("61","Bengaluru East","17");
INSERT INTO tblcity VALUES("62","Bengaluru South","17");
INSERT INTO tblcity VALUES("63","Bengaluru West","17");
INSERT INTO tblcity VALUES("64","Berhampur","26");
INSERT INTO tblcity VALUES("65","Bhadrak","26");
INSERT INTO tblcity VALUES("66","Bhagalpur","5");
INSERT INTO tblcity VALUES("67","Bhandara","21");
INSERT INTO tblcity VALUES("68","Bharatpur","29");
INSERT INTO tblcity VALUES("69","Bharuch","12");
INSERT INTO tblcity VALUES("70","Bhavnagar","12");
INSERT INTO tblcity VALUES("71","Bhilwara","29");
INSERT INTO tblcity VALUES("72","Bhimavaram","2");
INSERT INTO tblcity VALUES("73","Bhiwani","13");
INSERT INTO tblcity VALUES("74","Bhojpur","5");
INSERT INTO tblcity VALUES("75","Bhopal","20");
INSERT INTO tblcity VALUES("76","Bhubaneswar","26");
INSERT INTO tblcity VALUES("77","Bidar","17");
INSERT INTO tblcity VALUES("78","Bijapur","17");
INSERT INTO tblcity VALUES("79","Bijnor","34");
INSERT INTO tblcity VALUES("80","Bikaner","29");
INSERT INTO tblcity VALUES("81","Bilaspur","7");
INSERT INTO tblcity VALUES("82","Birbhum","36");
INSERT INTO tblcity VALUES("83","Bishnupur","22");
INSERT INTO tblcity VALUES("84","Bongaigaon","4");
INSERT INTO tblcity VALUES("85","Budaun","34");
INSERT INTO tblcity VALUES("86","Budgam","15");
INSERT INTO tblcity VALUES("87","Bulandshahr","34");
INSERT INTO tblcity VALUES("88","Buldhana","21");
INSERT INTO tblcity VALUES("89","Bundi","29");
INSERT INTO tblcity VALUES("90","Burdwan","36");
INSERT INTO tblcity VALUES("91","Cachar","4");
INSERT INTO tblcity VALUES("92","Calicut","18");
INSERT INTO tblcity VALUES("93","Carnicobar","1");
INSERT INTO tblcity VALUES("94","Chamba","14");
INSERT INTO tblcity VALUES("95","Chamoli","35");
INSERT INTO tblcity VALUES("96","Champawat","35");
INSERT INTO tblcity VALUES("97","Champhai","24");
INSERT INTO tblcity VALUES("98","Chandauli","34");
INSERT INTO tblcity VALUES("99","Chandel","22");
INSERT INTO tblcity VALUES("100","Chandigarh","6");
INSERT INTO tblcity VALUES("101","Chandrapur","21");
INSERT INTO tblcity VALUES("102","Changanacherry","18");
INSERT INTO tblcity VALUES("103","Changlang","3");
INSERT INTO tblcity VALUES("104","Channapatna","17");
INSERT INTO tblcity VALUES("105","Chengalpattu","31");
INSERT INTO tblcity VALUES("106","Chennai City Central","31");
INSERT INTO tblcity VALUES("107","Chennai City North","31");
INSERT INTO tblcity VALUES("108","Chennai City South","31");
INSERT INTO tblcity VALUES("109","Chhatarpur","20");
INSERT INTO tblcity VALUES("110","Chhindwara","20");
INSERT INTO tblcity VALUES("111","Chikmagalur","17");
INSERT INTO tblcity VALUES("112","Chikodi","17");
INSERT INTO tblcity VALUES("113","Chitradurga","17");
INSERT INTO tblcity VALUES("114","Chitrakoot","34");
INSERT INTO tblcity VALUES("115","Chittoor","2");
INSERT INTO tblcity VALUES("116","Chittorgarh","29");
INSERT INTO tblcity VALUES("117","Churachandpur","22");
INSERT INTO tblcity VALUES("118","Churu","29");
INSERT INTO tblcity VALUES("119","Coimbatore","31");
INSERT INTO tblcity VALUES("120","Contai","36");
INSERT INTO tblcity VALUES("121","Cooch Behar","36");
INSERT INTO tblcity VALUES("122","Cuddalore","31");
INSERT INTO tblcity VALUES("123","Cuddapah","2");
INSERT INTO tblcity VALUES("124","Cuttack City","26");
INSERT INTO tblcity VALUES("125","Cuttack North","26");
INSERT INTO tblcity VALUES("126","Cuttack South","26");
INSERT INTO tblcity VALUES("127","Dadra & Nagar Haveli","8");
INSERT INTO tblcity VALUES("128","Daman","9");
INSERT INTO tblcity VALUES("129","Darbhanga","5");
INSERT INTO tblcity VALUES("130","Darjiling","36");
INSERT INTO tblcity VALUES("131","Darrang","4");
INSERT INTO tblcity VALUES("132","Dausa","29");
INSERT INTO tblcity VALUES("133","Dehra Gopipur","14");
INSERT INTO tblcity VALUES("134","Dehradun","35");
INSERT INTO tblcity VALUES("135","Delhi","10");
INSERT INTO tblcity VALUES("136","Deoria","34");
INSERT INTO tblcity VALUES("137","Dhalai","33");
INSERT INTO tblcity VALUES("138","Dhanbad","16");
INSERT INTO tblcity VALUES("139","Dharamsala","14");
INSERT INTO tblcity VALUES("140","Dharmapuri","31");
INSERT INTO tblcity VALUES("141","Dharwad","17");
INSERT INTO tblcity VALUES("142","Dhemaji","4");
INSERT INTO tblcity VALUES("143","Dhenkanal","26");
INSERT INTO tblcity VALUES("144","Dholpur","29");
INSERT INTO tblcity VALUES("145","Dhubri","4");
INSERT INTO tblcity VALUES("146","Dhule","21");
INSERT INTO tblcity VALUES("147","Dibang Valley","3");
INSERT INTO tblcity VALUES("148","Dibrugarh","4");
INSERT INTO tblcity VALUES("149","Diglipur","1");
INSERT INTO tblcity VALUES("150","Dimapur","25");
INSERT INTO tblcity VALUES("151","Dindigul","31");
INSERT INTO tblcity VALUES("152","Diu","9");
INSERT INTO tblcity VALUES("153","Doda","15");
INSERT INTO tblcity VALUES("154","Dungarpur","29");
INSERT INTO tblcity VALUES("155","Durg","7");
INSERT INTO tblcity VALUES("156","East Champaran","5");
INSERT INTO tblcity VALUES("157","East Garo Hills","23");
INSERT INTO tblcity VALUES("158","East Kameng","3");
INSERT INTO tblcity VALUES("159","East Khasi Hills","23");
INSERT INTO tblcity VALUES("160","East Siang","3");
INSERT INTO tblcity VALUES("161","East Sikkim","30");
INSERT INTO tblcity VALUES("162","Eluru","2");
INSERT INTO tblcity VALUES("163","Ernakulam","18");
INSERT INTO tblcity VALUES("164","Erode","31");
INSERT INTO tblcity VALUES("165","Etah","34");
INSERT INTO tblcity VALUES("166","Etawah","34");
INSERT INTO tblcity VALUES("167","Faizabad","34");
INSERT INTO tblcity VALUES("168","Faridabad","13");
INSERT INTO tblcity VALUES("169","Faridkot","28");
INSERT INTO tblcity VALUES("170","Farrukhabad","34");
INSERT INTO tblcity VALUES("171","Fatehgarh Sahib","28");
INSERT INTO tblcity VALUES("172","Fatehpur","34");
INSERT INTO tblcity VALUES("173","Fazilka","28");
INSERT INTO tblcity VALUES("174","Ferrargunj","1");
INSERT INTO tblcity VALUES("175","Firozabad","34");
INSERT INTO tblcity VALUES("176","Firozpur","28");
INSERT INTO tblcity VALUES("177","Gadag","17");
INSERT INTO tblcity VALUES("178","Gadchiroli","21");
INSERT INTO tblcity VALUES("179","Gandhinagar","12");
INSERT INTO tblcity VALUES("180","Ganganagar","29");
INSERT INTO tblcity VALUES("181","Gautam Buddha Nagar","34");
INSERT INTO tblcity VALUES("182","Gaya","5");
INSERT INTO tblcity VALUES("183","Ghaziabad","34");
INSERT INTO tblcity VALUES("184","Ghazipur","34");
INSERT INTO tblcity VALUES("185","Giridih","16");
INSERT INTO tblcity VALUES("186","Goa","11");
INSERT INTO tblcity VALUES("187","Goalpara","4");
INSERT INTO tblcity VALUES("188","Gokak","17");
INSERT INTO tblcity VALUES("189","Golaghat","4");
INSERT INTO tblcity VALUES("190","Gonda","34");
INSERT INTO tblcity VALUES("191","Gondal","12");
INSERT INTO tblcity VALUES("192","Gondia","21");
INSERT INTO tblcity VALUES("193","Gorakhpur","34");
INSERT INTO tblcity VALUES("194","Gudivada","2");
INSERT INTO tblcity VALUES("195","Gudur","2");
INSERT INTO tblcity VALUES("196","Gulbarga","17");
INSERT INTO tblcity VALUES("197","Guna","20");
INSERT INTO tblcity VALUES("198","Guntur","2");
INSERT INTO tblcity VALUES("199","Gurdaspur","28");
INSERT INTO tblcity VALUES("200","Gurugram","13");
INSERT INTO tblcity VALUES("201","Gwalior","20");
INSERT INTO tblcity VALUES("202","Hailakandi","4");
INSERT INTO tblcity VALUES("203","Hamirpur (HP)","14");
INSERT INTO tblcity VALUES("204","Hamirpur (UP)","34");
INSERT INTO tblcity VALUES("205","Hanamkonda","32");
INSERT INTO tblcity VALUES("206","Hanumangarh","29");
INSERT INTO tblcity VALUES("207","Hardoi","34");
INSERT INTO tblcity VALUES("208","Haridwar","35");
INSERT INTO tblcity VALUES("209","Hassan","17");
INSERT INTO tblcity VALUES("210","Hathras","34");
INSERT INTO tblcity VALUES("211","Haveri","17");
INSERT INTO tblcity VALUES("212","Hazaribagh","16");
INSERT INTO tblcity VALUES("213","Hindupur","2");
INSERT INTO tblcity VALUES("214","Hingoli","21");
INSERT INTO tblcity VALUES("215","Hissar","13");
INSERT INTO tblcity VALUES("216","Hooghly","36");
INSERT INTO tblcity VALUES("217","Hoshangabad","20");
INSERT INTO tblcity VALUES("218","Hoshiarpur","28");
INSERT INTO tblcity VALUES("219","Howrah","36");
INSERT INTO tblcity VALUES("220","Hut Bay","1");
INSERT INTO tblcity VALUES("221","Hyderabad City","32");
INSERT INTO tblcity VALUES("222","Hyderabad South East","32");
INSERT INTO tblcity VALUES("223","Idukki","18");
INSERT INTO tblcity VALUES("224","Imphal East","22");
INSERT INTO tblcity VALUES("225","Imphal West","22");
INSERT INTO tblcity VALUES("226","Indore City","20");
INSERT INTO tblcity VALUES("227","Indore Moffusil","20");
INSERT INTO tblcity VALUES("228","Irinjalakuda","18");
INSERT INTO tblcity VALUES("229","Jabalpur","20");
INSERT INTO tblcity VALUES("230","Jaintia Hills","23");
INSERT INTO tblcity VALUES("231","Jaipur","29");
INSERT INTO tblcity VALUES("232","Jaisalmer","29");
INSERT INTO tblcity VALUES("233","Jalandhar","28");
INSERT INTO tblcity VALUES("234","Jalaun","34");
INSERT INTO tblcity VALUES("235","Jalgaon","21");
INSERT INTO tblcity VALUES("236","Jalna","21");
INSERT INTO tblcity VALUES("237","Jalor","29");
INSERT INTO tblcity VALUES("238","Jalpaiguri","36");
INSERT INTO tblcity VALUES("239","Jammu","15");
INSERT INTO tblcity VALUES("240","Jamnagar","12");
INSERT INTO tblcity VALUES("241","Jaunpur","34");
INSERT INTO tblcity VALUES("242","Jhalawar","29");
INSERT INTO tblcity VALUES("243","Jhansi","34");
INSERT INTO tblcity VALUES("244","Jhujhunu","29");
INSERT INTO tblcity VALUES("245","Jodhpur","29");
INSERT INTO tblcity VALUES("246","Jorhat","4");
INSERT INTO tblcity VALUES("247","Junagadh","12");
INSERT INTO tblcity VALUES("248","Jyotiba Phule Nagar","34");
INSERT INTO tblcity VALUES("249","Kakinada","2");
INSERT INTO tblcity VALUES("250","Kalahandi","26");
INSERT INTO tblcity VALUES("251","Kamrup","4");
INSERT INTO tblcity VALUES("252","Kanchipuram","31");
INSERT INTO tblcity VALUES("253","Kannauj","34");
INSERT INTO tblcity VALUES("254","Kanniyakumari","31");
INSERT INTO tblcity VALUES("255","Kannur","18");
INSERT INTO tblcity VALUES("256","Kanpur Dehat","34");
INSERT INTO tblcity VALUES("257","Kanpur Nagar","34");
INSERT INTO tblcity VALUES("258","Kapurthala","28");
INSERT INTO tblcity VALUES("259","Karaikal","27");
INSERT INTO tblcity VALUES("260","Karaikudi","31");
INSERT INTO tblcity VALUES("261","Karauli","29");
INSERT INTO tblcity VALUES("262","Karbi Anglong","4");
INSERT INTO tblcity VALUES("263","Kargil","15");
INSERT INTO tblcity VALUES("264","Karimganj","4");
INSERT INTO tblcity VALUES("265","Karimnagar","32");
INSERT INTO tblcity VALUES("266","Karnal","13");
INSERT INTO tblcity VALUES("267","Karur","31");
INSERT INTO tblcity VALUES("268","Karwar","17");
INSERT INTO tblcity VALUES("269","Kasaragod","18");
INSERT INTO tblcity VALUES("270","Kathua","15");
INSERT INTO tblcity VALUES("271","Kaushambi","34");
INSERT INTO tblcity VALUES("272","Keonjhar","26");
INSERT INTO tblcity VALUES("273","Khammam (AP)","2");
INSERT INTO tblcity VALUES("274","Khammam (TL)","32");
INSERT INTO tblcity VALUES("275","Khandwa","20");
INSERT INTO tblcity VALUES("276","Kheda","12");
INSERT INTO tblcity VALUES("277","Kheri","34");
INSERT INTO tblcity VALUES("278","Kiphire","25");
INSERT INTO tblcity VALUES("279","Kodagu","17");
INSERT INTO tblcity VALUES("280","Kohima","25");
INSERT INTO tblcity VALUES("281","Kokrajhar","4");
INSERT INTO tblcity VALUES("282","Kolar","17");
INSERT INTO tblcity VALUES("283","Kolasib","24");
INSERT INTO tblcity VALUES("284","Kolhapur","21");
INSERT INTO tblcity VALUES("285","Kolkata","36");
INSERT INTO tblcity VALUES("286","Koraput","26");
INSERT INTO tblcity VALUES("287","Kota","29");
INSERT INTO tblcity VALUES("288","Kottayam","18");
INSERT INTO tblcity VALUES("289","Kovilpatti","31");
INSERT INTO tblcity VALUES("290","Krishnagiri","31");
INSERT INTO tblcity VALUES("291","Kulgam","15");
INSERT INTO tblcity VALUES("292","Kumbakonam","31");
INSERT INTO tblcity VALUES("293","Kupwara","15");
INSERT INTO tblcity VALUES("294","Kurnool","2");
INSERT INTO tblcity VALUES("295","Kurukshetra","13");
INSERT INTO tblcity VALUES("296","Kurung Kumey","3");
INSERT INTO tblcity VALUES("297","Kushinagar","34");
INSERT INTO tblcity VALUES("298","Kutch","12");
INSERT INTO tblcity VALUES("299","Lakhimpur","4");
INSERT INTO tblcity VALUES("300","Lakshadweep","19");
INSERT INTO tblcity VALUES("301","Lalitpur","34");
INSERT INTO tblcity VALUES("302","Latur","21");
INSERT INTO tblcity VALUES("303","Lawngtlai","24");
INSERT INTO tblcity VALUES("304","Leh","15");
INSERT INTO tblcity VALUES("305","Lohit","3");
INSERT INTO tblcity VALUES("306","Longleng","25");
INSERT INTO tblcity VALUES("307","Lower Subansiri","3");
INSERT INTO tblcity VALUES("308","Lucknow","34");
INSERT INTO tblcity VALUES("309","Ludhiana","28");
INSERT INTO tblcity VALUES("310","Lunglei","24");
INSERT INTO tblcity VALUES("311","Machilipatnam","2");
INSERT INTO tblcity VALUES("312","Madhubani","5");
INSERT INTO tblcity VALUES("313","Madurai","31");
INSERT INTO tblcity VALUES("314","Mahabubnagar","32");
INSERT INTO tblcity VALUES("315","Maharajganj","34");
INSERT INTO tblcity VALUES("316","Mahesana","12");
INSERT INTO tblcity VALUES("317","Mahoba","34");
INSERT INTO tblcity VALUES("318","Mainpuri","34");
INSERT INTO tblcity VALUES("319","Malda","36");
INSERT INTO tblcity VALUES("320","Mammit","24");
INSERT INTO tblcity VALUES("321","Mandi","14");
INSERT INTO tblcity VALUES("322","Mandsaur","20");
INSERT INTO tblcity VALUES("323","Mandya","17");
INSERT INTO tblcity VALUES("324","Mangalore","17");
INSERT INTO tblcity VALUES("325","Manjeri","18");
INSERT INTO tblcity VALUES("326","Mansa","28");
INSERT INTO tblcity VALUES("327","Marigaon","4");
INSERT INTO tblcity VALUES("328","Mathura","34");
INSERT INTO tblcity VALUES("329","Mau","34");
INSERT INTO tblcity VALUES("330","Mavelikara","18");
INSERT INTO tblcity VALUES("331","Mayabander","1");
INSERT INTO tblcity VALUES("332","Mayiladuthurai","31");
INSERT INTO tblcity VALUES("333","Mayurbhanj","26");
INSERT INTO tblcity VALUES("334","Medak","32");
INSERT INTO tblcity VALUES("335","Meerut","34");
INSERT INTO tblcity VALUES("336","Meghalaya","23");
INSERT INTO tblcity VALUES("337","Midnapore","36");
INSERT INTO tblcity VALUES("338","Mirzapur","34");
INSERT INTO tblcity VALUES("339","Moga","28");
INSERT INTO tblcity VALUES("340","Mohali","28");
INSERT INTO tblcity VALUES("341","Mokokchung","25");
INSERT INTO tblcity VALUES("342","Mon","25");
INSERT INTO tblcity VALUES("343","Monghyr","5");
INSERT INTO tblcity VALUES("344","Moradabad","34");
INSERT INTO tblcity VALUES("345","Morena","20");
INSERT INTO tblcity VALUES("346","Muktsar","28");
INSERT INTO tblcity VALUES("347","Mumbai","21");
INSERT INTO tblcity VALUES("348","Murshidabad","36");
INSERT INTO tblcity VALUES("349","Muzaffarnagar","34");
INSERT INTO tblcity VALUES("350","Muzaffarpur","5");
INSERT INTO tblcity VALUES("351","Mysore","17");
INSERT INTO tblcity VALUES("352","Nadia","36");
INSERT INTO tblcity VALUES("353","Nagaon","4");
INSERT INTO tblcity VALUES("354","Nagapattinam","31");
INSERT INTO tblcity VALUES("355","Nagaur","29");
INSERT INTO tblcity VALUES("356","Nagpur","21");
INSERT INTO tblcity VALUES("357","Nainital","35");
INSERT INTO tblcity VALUES("358","Nalanda","5");
INSERT INTO tblcity VALUES("359","Nalbari","4");
INSERT INTO tblcity VALUES("360","Nalgonda","32");
INSERT INTO tblcity VALUES("361","Namakkal","31");
INSERT INTO tblcity VALUES("362","Nancorie","1");
INSERT INTO tblcity VALUES("363","Nancowrie","1");
INSERT INTO tblcity VALUES("364","Nanded","21");
INSERT INTO tblcity VALUES("365","Nandurbar","21");
INSERT INTO tblcity VALUES("366","Nandyal","2");
INSERT INTO tblcity VALUES("367","Nanjangud","17");
INSERT INTO tblcity VALUES("368","Narasaraopet","2");
INSERT INTO tblcity VALUES("369","Nashik","21");
INSERT INTO tblcity VALUES("370","Navsari","12");
INSERT INTO tblcity VALUES("371","Nawadha","5");
INSERT INTO tblcity VALUES("372","Nawanshahr","28");
INSERT INTO tblcity VALUES("373","Nellore","2");
INSERT INTO tblcity VALUES("374","Nilgiris","31");
INSERT INTO tblcity VALUES("375","Nizamabad","32");
INSERT INTO tblcity VALUES("376","North 24 Parganas","36");
INSERT INTO tblcity VALUES("377","North Cachar Hills","4");
INSERT INTO tblcity VALUES("378","North Dinajpur","36");
INSERT INTO tblcity VALUES("379","North Sikkim","30");
INSERT INTO tblcity VALUES("380","North Tripura","33");
INSERT INTO tblcity VALUES("381","Osmanabad","21");
INSERT INTO tblcity VALUES("382","Ottapalam","18");
INSERT INTO tblcity VALUES("383","Palamau","16");
INSERT INTO tblcity VALUES("384","Palghat","18");
INSERT INTO tblcity VALUES("385","Pali","29");
INSERT INTO tblcity VALUES("386","Panchmahals","12");
INSERT INTO tblcity VALUES("387","Papum Pare","3");
INSERT INTO tblcity VALUES("388","Parbhani","21");
INSERT INTO tblcity VALUES("389","Parvathipuram","2");
INSERT INTO tblcity VALUES("390","Patan","12");
INSERT INTO tblcity VALUES("391","Pathanamthitta","18");
INSERT INTO tblcity VALUES("392","Patiala","28");
INSERT INTO tblcity VALUES("393","Patna","5");
INSERT INTO tblcity VALUES("394","Pattukottai","31");
INSERT INTO tblcity VALUES("395","Pauri Garhwal","35");
INSERT INTO tblcity VALUES("396","Peddapalli","32");
INSERT INTO tblcity VALUES("397","Peren","25");
INSERT INTO tblcity VALUES("398","Phek","25");
INSERT INTO tblcity VALUES("399","Phulbani","26");
INSERT INTO tblcity VALUES("400","Pilibhit","34");
INSERT INTO tblcity VALUES("401","Pithoragarh","35");
INSERT INTO tblcity VALUES("402","Poducherry (PD)","27");
INSERT INTO tblcity VALUES("403","Poducherry (TN)","31");
INSERT INTO tblcity VALUES("404","Pollachi","31");
INSERT INTO tblcity VALUES("405","Poonch","15");
INSERT INTO tblcity VALUES("406","Porbandar","12");
INSERT INTO tblcity VALUES("407","Port Blair","1");
INSERT INTO tblcity VALUES("408","Prakasam","2");
INSERT INTO tblcity VALUES("409","Pratapgarh","34");
INSERT INTO tblcity VALUES("410","Proddatur","2");
INSERT INTO tblcity VALUES("411","Pudukkottai","31");
INSERT INTO tblcity VALUES("412","Pulwama","15");
INSERT INTO tblcity VALUES("413","Pune","21");
INSERT INTO tblcity VALUES("414","Puri","26");
INSERT INTO tblcity VALUES("415","Purnea","5");
INSERT INTO tblcity VALUES("416","Purulia","36");
INSERT INTO tblcity VALUES("417","Puttur","17");
INSERT INTO tblcity VALUES("418","Quilon","18");
INSERT INTO tblcity VALUES("419","Raebareli","34");
INSERT INTO tblcity VALUES("420","Raichur","17");
INSERT INTO tblcity VALUES("421","Raigarh (CT)","7");
INSERT INTO tblcity VALUES("422","Raigarh (MH)","21");
INSERT INTO tblcity VALUES("423","Raipur","7");
INSERT INTO tblcity VALUES("424","Rajahmundry","2");
INSERT INTO tblcity VALUES("425","Rajauri","15");
INSERT INTO tblcity VALUES("426","Rajkot","12");
INSERT INTO tblcity VALUES("427","Rajsamand","29");
INSERT INTO tblcity VALUES("428","Ramanathapuram","31");
INSERT INTO tblcity VALUES("429","Rampur","34");
INSERT INTO tblcity VALUES("430","Rampur Bushahr","14");
INSERT INTO tblcity VALUES("431","Ranchi","16");
INSERT INTO tblcity VALUES("432","Rangat","1");
INSERT INTO tblcity VALUES("433","Ratlam","20");
INSERT INTO tblcity VALUES("434","Ratnagiri","21");
INSERT INTO tblcity VALUES("435","Reasi","15");
INSERT INTO tblcity VALUES("436","Rewa","20");
INSERT INTO tblcity VALUES("437","Ri Bhoi","23");
INSERT INTO tblcity VALUES("438","Rohtak","13");
INSERT INTO tblcity VALUES("439","Rohtas","5");
INSERT INTO tblcity VALUES("440","Ropar","28");
INSERT INTO tblcity VALUES("441","Rudraprayag","35");
INSERT INTO tblcity VALUES("442","Rupnagar","28");
INSERT INTO tblcity VALUES("443","Sabarkantha","12");
INSERT INTO tblcity VALUES("444","Sagar","20");
INSERT INTO tblcity VALUES("445","Saharanpur","34");
INSERT INTO tblcity VALUES("446","Saharsa","5");
INSERT INTO tblcity VALUES("447","Salem East","31");
INSERT INTO tblcity VALUES("448","Salem West","31");
INSERT INTO tblcity VALUES("449","Samastipur","5");
INSERT INTO tblcity VALUES("450","Sambalpur","26");
INSERT INTO tblcity VALUES("451","Sangareddy","32");
INSERT INTO tblcity VALUES("452","Sangli","21");
INSERT INTO tblcity VALUES("453","Sangrur","28");
INSERT INTO tblcity VALUES("454","Sant Kabir Nagar","34");
INSERT INTO tblcity VALUES("455","Sant Ravidas Nagar","34");
INSERT INTO tblcity VALUES("456","Santhal Parganas","16");
INSERT INTO tblcity VALUES("457","Saran","5");
INSERT INTO tblcity VALUES("458","Satara","21");
INSERT INTO tblcity VALUES("459","Sawai Madhopur","29");
INSERT INTO tblcity VALUES("460","Secunderabad","32");
INSERT INTO tblcity VALUES("461","Sehore","20");
INSERT INTO tblcity VALUES("462","Senapati","22");
INSERT INTO tblcity VALUES("463","Serchhip","24");
INSERT INTO tblcity VALUES("464","Shahdol","20");
INSERT INTO tblcity VALUES("465","Shahjahanpur","34");
INSERT INTO tblcity VALUES("466","Shimla","14");
INSERT INTO tblcity VALUES("467","Shimoga","17");
INSERT INTO tblcity VALUES("468","Shrawasti","34");
INSERT INTO tblcity VALUES("469","Sibsagar","4");
INSERT INTO tblcity VALUES("470","Siddharthnagar","34");
INSERT INTO tblcity VALUES("471","Sikar","29");
INSERT INTO tblcity VALUES("472","Sindhudurg","21");
INSERT INTO tblcity VALUES("473","Singhbhum","16");
INSERT INTO tblcity VALUES("474","Sirohi","29");
INSERT INTO tblcity VALUES("475","Sirsi","17");
INSERT INTO tblcity VALUES("476","Sitamarhi","5");
INSERT INTO tblcity VALUES("477","Sitapur","34");
INSERT INTO tblcity VALUES("478","Sivaganga","31");
INSERT INTO tblcity VALUES("479","Siwan","5");
INSERT INTO tblcity VALUES("480","Solan","14");
INSERT INTO tblcity VALUES("481","Solapur","21");
INSERT INTO tblcity VALUES("482","Sonbhadra","34");
INSERT INTO tblcity VALUES("483","Sonepat","13");
INSERT INTO tblcity VALUES("484","Sonitpur","4");
INSERT INTO tblcity VALUES("485","South 24 Parganas","36");
INSERT INTO tblcity VALUES("486","South Dinajpur","36");
INSERT INTO tblcity VALUES("487","South Garo Hills","23");
INSERT INTO tblcity VALUES("488","South Sikkim","30");
INSERT INTO tblcity VALUES("489","South Tripura","33");
INSERT INTO tblcity VALUES("490","Srikakulam","2");
INSERT INTO tblcity VALUES("491","Srinagar","15");
INSERT INTO tblcity VALUES("492","Srirangam","31");
INSERT INTO tblcity VALUES("493","Sultanpur","34");
INSERT INTO tblcity VALUES("494","Sundargarh","26");
INSERT INTO tblcity VALUES("495","Surat","12");
INSERT INTO tblcity VALUES("496","Surendranagar","12");
INSERT INTO tblcity VALUES("497","Suryapet","32");
INSERT INTO tblcity VALUES("498","Tadepalligudem","2");
INSERT INTO tblcity VALUES("499","Tambaram","31");
INSERT INTO tblcity VALUES("500","Tamenglong","22");
INSERT INTO tblcity VALUES("501","Tamluk","36");
INSERT INTO tblcity VALUES("502","Tarn Taran","28");
INSERT INTO tblcity VALUES("503","Tawang","3");
INSERT INTO tblcity VALUES("504","Tehri Garhwal","35");
INSERT INTO tblcity VALUES("505","Tenali","2");
INSERT INTO tblcity VALUES("506","Thalassery","18");
INSERT INTO tblcity VALUES("507","Thane","21");
INSERT INTO tblcity VALUES("508","Thanjavur","31");
INSERT INTO tblcity VALUES("509","Theni","31");
INSERT INTO tblcity VALUES("510","Thoubal","22");
INSERT INTO tblcity VALUES("511","Tinsukia","4");
INSERT INTO tblcity VALUES("512","Tirap","3");
INSERT INTO tblcity VALUES("513","Tiruchirapalli","31");
INSERT INTO tblcity VALUES("514","Tirunelveli","31");
INSERT INTO tblcity VALUES("515","Tirupati","2");
INSERT INTO tblcity VALUES("516","Tirupattur","31");
INSERT INTO tblcity VALUES("517","Tirupur","31");
INSERT INTO tblcity VALUES("518","Tirur","18");
INSERT INTO tblcity VALUES("519","Tiruvalla","18");
INSERT INTO tblcity VALUES("520","Tiruvannamalai","31");
INSERT INTO tblcity VALUES("521","Tonk","29");
INSERT INTO tblcity VALUES("522","Trichur","18");
INSERT INTO tblcity VALUES("523","Trivandrum North","18");
INSERT INTO tblcity VALUES("524","Trivandrum South","18");
INSERT INTO tblcity VALUES("525","Tuensang","25");
INSERT INTO tblcity VALUES("526","Tumkur","17");
INSERT INTO tblcity VALUES("527","Tuticorin","31");
INSERT INTO tblcity VALUES("528","Udaipur","29");
INSERT INTO tblcity VALUES("529","Udham Singh Nagar","35");
INSERT INTO tblcity VALUES("530","Udhampur","15");
INSERT INTO tblcity VALUES("531","Udupi","17");
INSERT INTO tblcity VALUES("532","Ujjain","20");
INSERT INTO tblcity VALUES("533","Ukhrul","22");
INSERT INTO tblcity VALUES("534","Una","14");
INSERT INTO tblcity VALUES("535","Unnao","34");
INSERT INTO tblcity VALUES("536","Upper Siang","3");
INSERT INTO tblcity VALUES("537","Upper Subansiri","3");
INSERT INTO tblcity VALUES("538","Uttarkashi","35");
INSERT INTO tblcity VALUES("539","Vadakara","18");
INSERT INTO tblcity VALUES("540","Vadodara East","12");
INSERT INTO tblcity VALUES("541","Vadodara West","12");
INSERT INTO tblcity VALUES("542","Vaishali","5");
INSERT INTO tblcity VALUES("543","Valsad","12");
INSERT INTO tblcity VALUES("544","Varanasi","34");
INSERT INTO tblcity VALUES("545","Vellore","31");
INSERT INTO tblcity VALUES("546","Vidisha","20");
INSERT INTO tblcity VALUES("547","Vijayawada","2");
INSERT INTO tblcity VALUES("548","Virudhunagar","31");
INSERT INTO tblcity VALUES("549","Visakhapatnam","2");
INSERT INTO tblcity VALUES("550","Vizianagaram","2");
INSERT INTO tblcity VALUES("551","Vriddhachalam","31");
INSERT INTO tblcity VALUES("552","Wanaparthy","32");
INSERT INTO tblcity VALUES("553","Warangal","32");
INSERT INTO tblcity VALUES("554","Wardha","21");
INSERT INTO tblcity VALUES("555","Washim","21");
INSERT INTO tblcity VALUES("556","West Champaran","5");
INSERT INTO tblcity VALUES("557","West Garo Hills","23");
INSERT INTO tblcity VALUES("558","West Kameng","3");
INSERT INTO tblcity VALUES("559","West Khasi Hills","23");
INSERT INTO tblcity VALUES("560","West Siang","3");
INSERT INTO tblcity VALUES("561","West Sikkim","30");
INSERT INTO tblcity VALUES("562","West Tripura","33");
INSERT INTO tblcity VALUES("563","Wokha","25");
INSERT INTO tblcity VALUES("564","Yavatmal","21");
INSERT INTO tblcity VALUES("565","Zunhebotto","25");



DROP TABLE tbldepartment;

CREATE TABLE `tbldepartment` (
  `DepartmentId` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(50) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  PRIMARY KEY (`DepartmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO tbldepartment VALUES("1","IT","1");
INSERT INTO tbldepartment VALUES("2","Sales","1");
INSERT INTO tbldepartment VALUES("5","Account","1");
INSERT INTO tbldepartment VALUES("18","Management","1");
INSERT INTO tbldepartment VALUES("19","Sales","2");
INSERT INTO tbldepartment VALUES("20","Account","2");
INSERT INTO tbldepartment VALUES("21","Footwear design","68");
INSERT INTO tbldepartment VALUES("22","Sales","68");
INSERT INTO tbldepartment VALUES("23","Account","68");



DROP TABLE tblfeedback;

CREATE TABLE `tblfeedback` (
  `FeedBackId` int(11) NOT NULL AUTO_INCREMENT,
  `LoginId` int(11) NOT NULL,
  `Ratings` float NOT NULL,
  `FeedType` char(2) DEFAULT '''''',
  PRIMARY KEY (`FeedBackId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tblfeedback VALUES("5","61","5","JS");
INSERT INTO tblfeedback VALUES("6","1","3","co");
INSERT INTO tblfeedback VALUES("7","1","3","co");
INSERT INTO tblfeedback VALUES("8","1","3","co");
INSERT INTO tblfeedback VALUES("9","76","3","JS");
INSERT INTO tblfeedback VALUES("10","77","4","JS");
INSERT INTO tblfeedback VALUES("11","68","2","co");
INSERT INTO tblfeedback VALUES("12","77","5","JS");



DROP TABLE tblinterview;

CREATE TABLE `tblinterview` (
  `InterViewId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) NOT NULL,
  `ApplicationId` int(11) NOT NULL,
  `HRId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `ApplicantId` int(11) NOT NULL,
  `ResumeId` int(11) NOT NULL,
  `Date` varchar(120) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Status` varchar(2) DEFAULT 'PE',
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`InterViewId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tblinterview VALUES("4","1","37","60","19","9","61","0","2020-03-14","2:2:PM","L.H Road Surat","AP","GOOD");
INSERT INTO tblinterview VALUES("7","1","39","60","19","7","61","0","2020-03-05","2:8:PM","SL.F Red","PE","");
INSERT INTO tblinterview VALUES("8","1","42","60","1","6","77","0","2020-04-24","4:15:PM","L.H Road Surat","PE","");
INSERT INTO tblinterview VALUES("9","4","44","91","21","10","77","0","2020-04-22","3:15:PM","Varracha road surat","AP","Good To have As a Shoe Designer in our company");



DROP TABLE tbljob;

CREATE TABLE `tbljob` (
  `JobId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) NOT NULL,
  `HRLoginId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `JobTypeId` char(1) NOT NULL,
  `Qualification` varchar(200) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `ExpectedSalary` varchar(12) NOT NULL,
  `Experiance` varchar(12) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Vacancy` int(11) NOT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT '1',
  `Created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`JobId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tbljob VALUES("5","1","60","5","F","Master","Developer","Vadodra","12000-150000","2","No des needed","0","0","2020-01-15 09:31:26");
INSERT INTO tbljob VALUES("6","1","60","1","F","Graduate","Full Stack Develper","Masuri","120000-14000","2","Skill in C++","8","1","2020-01-15 11:37:17");
INSERT INTO tbljob VALUES("7","1","60","1","F","COmpuetr i n IT","Angulaer developer","Surat","150000-20000","2","Needed ot","2","1","2020-01-18 20:26:58");
INSERT INTO tbljob VALUES("8","1","60","1","F","Masters in Technology","Asp.net sr Developer","Vadodra","1500000-2000","2","Des","0","0","2020-01-26 09:48:39");
INSERT INTO tbljob VALUES("9","1","60","1","P","Msc(IT)","New Angular","Surat","12000-15000","2","No e","7","1","2020-03-08 10:45:08");
INSERT INTO tbljob VALUES("10","4","91","21","P","12th pass","Shoe Design","Pune","12000-150000","1","No Des","2","1","2020-04-18 16:32:49");
INSERT INTO tbljob VALUES("11","4","91","21","P","MBA","manager","Surat","12000-150000","1","product marketing","10","1","2020-05-25 13:19:01");



DROP TABLE tbllogin;

CREATE TABLE `tbllogin` (
  `LoginId` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(12) DEFAULT NULL,
  `UserType` char(2) NOT NULL,
  PRIMARY KEY (`LoginId`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

INSERT INTO tbllogin VALUES("1","co@gmail.com","123","co");
INSERT INTO tbllogin VALUES("60","hr@gmail.com","123","CH");
INSERT INTO tbllogin VALUES("61","f201506100110090@gmail.com","123456","JS");
INSERT INTO tbllogin VALUES("65","adm@gmail.com","123","M");
INSERT INTO tbllogin VALUES("66","Info@gmail.com","123","co");
INSERT INTO tbllogin VALUES("67","Anjali@gmail.com","1234","JS");
INSERT INTO tbllogin VALUES("68","bbvmaruti@gmail.com","123456","co");
INSERT INTO tbllogin VALUES("76","parthgoti2080@gmail.com","123456","JS");
INSERT INTO tbllogin VALUES("77","17bmiit122@gmail.com","123456","JS");
INSERT INTO tbllogin VALUES("91","dhruvivaghela22@gmail.com","123456","CH");
INSERT INTO tbllogin VALUES("94","hardikvaghela959@gmail.com","1234","CH");



DROP TABLE tblotp;

CREATE TABLE `tblotp` (
  `OTP` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblotp VALUES("41497","f201506@gmail.com","2020-02-02 16:51:36");
INSERT INTO tblotp VALUES("49494","azz@gmail.com","2020-02-02 17:00:41");
INSERT INTO tblotp VALUES("98106","az@gmail.com","2020-02-02 17:08:17");



DROP TABLE tblpayment;

CREATE TABLE `tblpayment` (
  `PaymentId` int(11) NOT NULL,
  `PlanId` int(11) NOT NULL,
  `ComapnyId` int(11) NOT NULL,
  `StartedOn` date NOT NULL,
  `ExpiredOn` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `TransacionId` int(11) NOT NULL,
  `TransactionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TransactionBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tblplan;

CREATE TABLE `tblplan` (
  `PlanId` int(11) NOT NULL AUTO_INCREMENT,
  `PlanName` varchar(20) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Duration` varchar(30) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PlanId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tblplan VALUES("1","Golden","200","1","0");
INSERT INTO tblplan VALUES("12","Silver","1200","6","0");
INSERT INTO tblplan VALUES("13","Platinum","2400","12","1");
INSERT INTO tblplan VALUES("14","Platinum","2400","12","0");



DROP TABLE tblstate;

CREATE TABLE `tblstate` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblstate VALUES("1","Andaman & Nicobar Islands");
INSERT INTO tblstate VALUES("2","Andhra Pradesh");
INSERT INTO tblstate VALUES("3","Arunachal Pradesh");
INSERT INTO tblstate VALUES("4","Assam");
INSERT INTO tblstate VALUES("5","Bihar");
INSERT INTO tblstate VALUES("6","Chandigarh");
INSERT INTO tblstate VALUES("7","Chattisgarh");
INSERT INTO tblstate VALUES("8","Dadra & Nagar Haveli");
INSERT INTO tblstate VALUES("9","Daman & Diu");
INSERT INTO tblstate VALUES("10","Delhi");
INSERT INTO tblstate VALUES("11","Goa");
INSERT INTO tblstate VALUES("12","Gujarat");
INSERT INTO tblstate VALUES("13","Haryana");
INSERT INTO tblstate VALUES("14","Himachal Pradesh");
INSERT INTO tblstate VALUES("15","Jammu & Kashmir");
INSERT INTO tblstate VALUES("16","Jharkhand");
INSERT INTO tblstate VALUES("17","Karnataka");
INSERT INTO tblstate VALUES("18","Kerala");
INSERT INTO tblstate VALUES("19","Lakshadweep");
INSERT INTO tblstate VALUES("20","Madhya Pradesh");
INSERT INTO tblstate VALUES("21","Maharashtra");
INSERT INTO tblstate VALUES("22","Manipur");
INSERT INTO tblstate VALUES("23","Meghalaya");
INSERT INTO tblstate VALUES("24","Mizoram");
INSERT INTO tblstate VALUES("25","Nagaland");
INSERT INTO tblstate VALUES("26","Odisha");
INSERT INTO tblstate VALUES("27","Poducherry");
INSERT INTO tblstate VALUES("28","Punjab");
INSERT INTO tblstate VALUES("29","Rajasthan");
INSERT INTO tblstate VALUES("30","Sikkim");
INSERT INTO tblstate VALUES("31","Tamil Nadu");
INSERT INTO tblstate VALUES("32","Telangana");
INSERT INTO tblstate VALUES("33","Tripura");
INSERT INTO tblstate VALUES("34","Uttar Pradesh");
INSERT INTO tblstate VALUES("35","Uttarakhand");
INSERT INTO tblstate VALUES("36","West Bengal");



