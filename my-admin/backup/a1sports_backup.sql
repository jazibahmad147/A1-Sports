

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin_user VALUES("0","Jazib Ahmad","jazib.ahmad147@gmail.com","32250170a0dca92d53ec9624f336ca24","ACTIVE");
INSERT INTO admin_user VALUES("0","Sohail Mumtaz","sohailmumtaz59@gmail.com","827ccb0eea8a706c4c34a16891f84e7b","ACTIVE");



CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO categories VALUES("3","117235681","Trouzars");
INSERT INTO categories VALUES("4","117235684","Bats");
INSERT INTO categories VALUES("5","117235685","Balls");
INSERT INTO categories VALUES("6","117235686","Jym");
INSERT INTO categories VALUES("7","117235687","Underwears");
INSERT INTO categories VALUES("8","117235688","Shuttals");
INSERT INTO categories VALUES("9","117235689","Baigs");
INSERT INTO categories VALUES("10","1172356810","Games");
INSERT INTO categories VALUES("11","1172356811","Housry");
INSERT INTO categories VALUES("12","1172356812","Shirts");
INSERT INTO categories VALUES("13","1172356813","Belts");
INSERT INTO categories VALUES("14","1172356814","Shoes");
INSERT INTO categories VALUES("15","1172356815","Caps");
INSERT INTO categories VALUES("16","1172356816","Sox");
INSERT INTO categories VALUES("17","1172356817","Reparing");
INSERT INTO categories VALUES("18","1172356818","Bands");
INSERT INTO categories VALUES("19","1172356819","Elbows");
INSERT INTO categories VALUES("20","1172356820","Hockey");
INSERT INTO categories VALUES("21","1172356821","Swimming");
INSERT INTO categories VALUES("22","1172356822","Handles");
INSERT INTO categories VALUES("23","1172356823","Covers");
INSERT INTO categories VALUES("24","1172356824","Wickets");
INSERT INTO categories VALUES("25","1172356825","Pumps");
INSERT INTO categories VALUES("26","1172356826","Exercise");
INSERT INTO categories VALUES("27","1172356827","Rackets");
INSERT INTO categories VALUES("28","1172356828","Headbands");
INSERT INTO categories VALUES("29","1172356829","Grips");
INSERT INTO categories VALUES("30","1172356830","Kits");
INSERT INTO categories VALUES("31","1172356831","Nickers");
INSERT INTO categories VALUES("32","1172356832","Baslyers/Tights");
INSERT INTO categories VALUES("33","1172356833","Dorry");
INSERT INTO categories VALUES("34","1172356834","Neatting");
INSERT INTO categories VALUES("35","1172356835","Wire");
INSERT INTO categories VALUES("36","1172356836","Gotties");
INSERT INTO categories VALUES("37","1172356837","Gloves");
INSERT INTO categories VALUES("38","1172356838","Net");
INSERT INTO categories VALUES("39","1172356839","Guards");
INSERT INTO categories VALUES("40","1172356840","Sporters ");
INSERT INTO categories VALUES("41","1172356841","Baskitball");
INSERT INTO categories VALUES("42","1172356842","Cards");
INSERT INTO categories VALUES("43","1172356843","Miscellaneous");
INSERT INTO categories VALUES("44","1172356844","Tracksoat");
INSERT INTO categories VALUES("45","1172356845","Uppers");
INSERT INTO categories VALUES("46","1172356846","Carrom Board");
INSERT INTO categories VALUES("47","1172356847","Table Tennis ");
INSERT INTO categories VALUES("48","1172356848","Football");
INSERT INTO categories VALUES("49","1172356849","Snooker");



CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

INSERT INTO companies VALUES("3","15561581","LOCAL");
INSERT INTO companies VALUES("4","15561584","IMPORTED");
INSERT INTO companies VALUES("5","15561585","CHINA");
INSERT INTO companies VALUES("6","15561586","NIKE");
INSERT INTO companies VALUES("7","15561587","ADIDAS");
INSERT INTO companies VALUES("8","15561588","TRANDA");
INSERT INTO companies VALUES("9","15561589","MASH");
INSERT INTO companies VALUES("10","155615810","WEMLY");
INSERT INTO companies VALUES("11","155615811","TERRY");
INSERT INTO companies VALUES("12","155615812","JARSY");
INSERT INTO companies VALUES("13","155615813","COTTON");
INSERT INTO companies VALUES("14","155615814","JARSY COTTON");
INSERT INTO companies VALUES("15","155615815","PK");
INSERT INTO companies VALUES("16","155615816","PAKISTAN");
INSERT INTO companies VALUES("17","155615817","IMRAN FSD");
INSERT INTO companies VALUES("18","155615818","UNDERARMAR");
INSERT INTO companies VALUES("19","155615819","PUMA");
INSERT INTO companies VALUES("20","155615820","SPORTS");
INSERT INTO companies VALUES("21","155615821","ALI FSD");
INSERT INTO companies VALUES("22","155615822","AHMAD FSD");
INSERT INTO companies VALUES("23","155615823","WORLD FSD");
INSERT INTO companies VALUES("24","155615824","RAMISH FSD");
INSERT INTO companies VALUES("25","155615825","AWAMI FSD");
INSERT INTO companies VALUES("26","155615826","AC");
INSERT INTO companies VALUES("27","155615827","CA");
INSERT INTO companies VALUES("28","155615828","JAZBA");
INSERT INTO companies VALUES("29","155615829","JAGHA ORG");
INSERT INTO companies VALUES("30","155615830","JAGHA COPY");
INSERT INTO companies VALUES("31","155615831","FG");
INSERT INTO companies VALUES("32","155615832","GS Yellow");
INSERT INTO companies VALUES("33","155615833","GS White");
INSERT INTO companies VALUES("34","155615834","FG Yellow");
INSERT INTO companies VALUES("35","155615835","FG White");
INSERT INTO companies VALUES("36","155615836","GS Yellow");
INSERT INTO companies VALUES("37","155615837","GS White");
INSERT INTO companies VALUES("38","155615838","Wooden Anmole");
INSERT INTO companies VALUES("39","155615839","Magnatic");
INSERT INTO companies VALUES("40","155615840","BO");
INSERT INTO companies VALUES("41","155615841","Wilson");
INSERT INTO companies VALUES("42","155615842","Yonex");
INSERT INTO companies VALUES("43","155615843","Club China");
INSERT INTO companies VALUES("44","155615844","Hiqua");
INSERT INTO companies VALUES("45","155615845","Eminent");
INSERT INTO companies VALUES("46","155615846","Butterfly");
INSERT INTO companies VALUES("47","155615847","Ashway");
INSERT INTO companies VALUES("48","155615848","Calrlton");
INSERT INTO companies VALUES("49","155615849","HS");
INSERT INTO companies VALUES("50","155615850","Ehsan");
INSERT INTO companies VALUES("52","155615851","Wooden");
INSERT INTO companies VALUES("53","155615853","King");
INSERT INTO companies VALUES("54","155615854","Moltan");
INSERT INTO companies VALUES("55","155615855","VS");
INSERT INTO companies VALUES("56","155615856","Royale");
INSERT INTO companies VALUES("57","155615857","Kotynic");
INSERT INTO companies VALUES("58","155615858","Polo ");
INSERT INTO companies VALUES("59","155615859","Sublimation");
INSERT INTO companies VALUES("60","155615860","Interlock");
INSERT INTO companies VALUES("61","155615861","Champion");
INSERT INTO companies VALUES("62","155615862","Helios");
INSERT INTO companies VALUES("63","155615863","Shine");
INSERT INTO companies VALUES("64","155615864","Victor");
INSERT INTO companies VALUES("65","155615865","Dunlop");
INSERT INTO companies VALUES("66","155615866","T20");



CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO customers VALUES("3","176755261","Tasawar Shahzad","","");
INSERT INTO customers VALUES("4","176755264","Sohail Mumtaz","03336780755","Rabwaah");



CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `budget` double NOT NULL,
  `income` double NOT NULL,
  `wholeTotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paymentId` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `invoiceId` varchar(255) NOT NULL,
  `payment` double NOT NULL,
  `extraNote` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO payments VALUES("1","61852571","2021-01-30","46864893","250","Cash");



CREATE TABLE `repairing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `saleId` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO repairing VALUES("1","2021-01-30","46864893","Rackets","Wire change");



CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saleId` varchar(255) NOT NULL,
  `pId` varchar(255) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO sale_items VALUES("4","46864894","67514257","2","350","700");
INSERT INTO sale_items VALUES("5","46864896","67514257","2","350","700");
INSERT INTO sale_items VALUES("6","46864897","67514260","2","100","200");
INSERT INTO sale_items VALUES("7","46864898","67514345","6","180","1080");
INSERT INTO sale_items VALUES("8","46864899","67514189","2","100","200");



CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `saleId` varchar(255) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `subTotal` double NOT NULL,
  `etc` double NOT NULL,
  `discount` double NOT NULL,
  `grandTotal` double NOT NULL,
  `paid` double NOT NULL,
  `balance` double NOT NULL,
  `expDate` date NOT NULL,
  `wholeTotal` double NOT NULL,
  `expenses` double NOT NULL,
  `cat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO sales VALUES("3","2021-01-29","46864893","176755262","0","0","0","500","250","0","2021-02-01","150","0","repairing","");
INSERT INTO sales VALUES("5","2021-04-04","46864894","176755264","700","0","100","600","0","600","0000-00-00","300","0","sale","");
INSERT INTO sales VALUES("6","2021-04-04","46864896","176755264","700","0","100","600","0","600","0000-00-00","300","0","sale","");
INSERT INTO sales VALUES("7","2021-04-04","46864897","176755264","200","0","0","200","0","200","0000-00-00","120","0","sale","");
INSERT INTO sales VALUES("8","2021-04-04","46864898","176755264","1080","0","0","1080","0","1080","0000-00-00","990","0","sale","");
INSERT INTO sales VALUES("9","2021-04-04","46864899","176755264","200","0","0","200","0","200","0000-00-00","130","0","sale","");



CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemId` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` double NOT NULL,
  `wholeSalePrice` double NOT NULL,
  `retailPrice` double NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=429 DEFAULT CHARSET=utf8mb4;

INSERT INTO stock VALUES("10","6751410","2021-02-24","1172356814","FB Shoes Stad  China","15561585","Imported China","1","1300","1800","");
INSERT INTO stock VALUES("12","6751412","2021-02-24","1172356814","FB Shoes Stad ","15561581","Local Gul","1","400","700","");
INSERT INTO stock VALUES("18","6751418","2021-02-24","1172356814","FB Grippers China Imported","15561585","Imported China","5","1300","1800","");
INSERT INTO stock VALUES("19","6751419","2021-02-24","1172356814","FB Stud Blue Occian Imported","155615840","Imported China","5","2100","2500","");
INSERT INTO stock VALUES("20","6751420","2021-02-24","1172356816","FB Long Sox Local","15561581","Local","1","100","170","");
INSERT INTO stock VALUES("22","6751422","2021-02-24","1172356816","FB Long Sox Org CLub","15561584","Imported China","1","150","220","");
INSERT INTO stock VALUES("23","6751423","2021-02-24","1172356837","FB Gloves Imported","15561585","Imported China","0","350","750","");
INSERT INTO stock VALUES("24","6751424","2021-02-24","1172356830","FB Club Kit Full Sleeve ","155615843","Full Sleeve","1","650","850","");
INSERT INTO stock VALUES("25","6751425","2021-02-24","1172356830","FB Club Kit Half Sleeve","155615843","Half Sleeve","1","650","850","");
INSERT INTO stock VALUES("26","6751426","2021-02-24","1172356830","FB Club Kit Kids Size","155615843","Kids","1","550","750","");
INSERT INTO stock VALUES("27","6751427","2021-02-24","1172356831","FB Club Nickers","155615843","Club Nickers","1","180","350","");
INSERT INTO stock VALUES("28","6751428","2021-02-24","1172356831","FB Club Nickers Local","15561581","Football Nickers Local","1","140","300","");
INSERT INTO stock VALUES("29","6751429","2021-02-24","1172356831","FB Shen Guards Club Imported","155615843","Football CLub China","0","250","550","");
INSERT INTO stock VALUES("30","6751430","2021-02-24","1172356831","FB Shen Guards Local","15561581","Football Local","0","100","250","");
INSERT INTO stock VALUES("31","6751431","2021-02-24","1172356814","CT Gripper Shoes CA 15K","155615827","CA 15K","0","3000","3400","");
INSERT INTO stock VALUES("32","6751432","2021-02-24","1172356814","CT Gripper Shoes CA BIg Bang KP","155615827","CA BIgBang KP","0","3000","3400","");
INSERT INTO stock VALUES("33","6751433","2021-02-24","1172356814","CT Gripper Shoes CA 6116","155615827","CA 6116","0","2500","3000","");
INSERT INTO stock VALUES("34","6751434","2021-02-24","1172356814","CT Gripper Shoes Jazba Black OneDrive","155615828","One Drive 111","0","3350","3800","");
INSERT INTO stock VALUES("35","6751435","2021-02-24","1172356814","CT Gripper Shoes AC Local","155615826","AC Local","0","1650","2000","");
INSERT INTO stock VALUES("36","6751436","2021-02-24","117235685","FB Football Kut Piece Local Shahid","15561581","Kut Piece Shahid Lalian","0","300","750","");
INSERT INTO stock VALUES("37","6751437","2021-02-24","117235685","FB Football A Quality Local Shahid","15561581","A Quality Shahid Lalian","0","350","900","");
INSERT INTO stock VALUES("38","6751438","2021-02-24","117235685","FB Football Blederless Stars","15561584","Blederless World Cup","0","850","2000","");
INSERT INTO stock VALUES("39","6751439","2021-02-24","117235685","FB Football Club Imported","155615843","Imported Club","0","450","1200","");
INSERT INTO stock VALUES("40","6751440","2021-02-24","117235685","FB Footsall N0 05","15561581","Footsall No 05 ","0","350","1200","");
INSERT INTO stock VALUES("41","6751441","2021-02-24","1172356838","FB Football Goal Nett A Quality","15561581","Local Net","0","2000","2700","");
INSERT INTO stock VALUES("42","6751442","2021-02-24","1172356838","FB Football Goal Nett B Quality","15561581","Local Net","0","1400","1800","");
INSERT INTO stock VALUES("44","6751444","2021-03-30","1172356824","CT Tennis Wicket Wooden","155615851","Wooden","24","60","75","");
INSERT INTO stock VALUES("45","6751445","2021-02-24","1172356824","CT Tennis Wicket Plastic Set","15561581","Plastic Set","2","120","250","");
INSERT INTO stock VALUES("46","6751446","2021-02-24","1172356824","CT Hardball Wooden","155615851","Single","0","80","100","");
INSERT INTO stock VALUES("47","6751447","2021-02-24","1172356824","CT Hardball Wooden Stand Set","155615851","Stand","0","800","1200","");
INSERT INTO stock VALUES("48","6751448","2021-02-24","1172356813","Shutting Bata Ball 175 GM","155615853","175 Gram ","5","180","220","");
INSERT INTO stock VALUES("49","6751449","2021-02-24","117235685","VB Smash Orignal Jagha ","155615829","Orignal ","2","750","1200","");
INSERT INTO stock VALUES("50","6751450","2021-02-24","117235685","VB Smash Jagha  Copy","155615830","Copy","4","350","750","");
INSERT INTO stock VALUES("51","6751451","2021-02-24","117235685","Baskitball Moltan Orignal GR7","155615854","Orignal GR7","2","1800","2200","");
INSERT INTO stock VALUES("52","6751452","2021-02-24","117235685","Baskitball Moltan Copy Sima","155615854","Copy Cima","2","500","800","");
INSERT INTO stock VALUES("53","6751453","2021-02-24","117235685","Baskitball Moltan Kids Size","15561585","Kids Size","1","300","600","");
INSERT INTO stock VALUES("54","6751454","2021-02-24","1172356838","VB Net Orignal Bhalwalpori Orignal","155615816","Orignal Bhawalpori","1","1300","2000","");
INSERT INTO stock VALUES("55","6751455","2021-02-24","1172356838","VB Net Orignal Bhalwalpori Copy","155615816","Copy Bhawalpori","1","800","1600","");
INSERT INTO stock VALUES("56","6751456","2021-02-24","1172356825","FB Pump China Small","15561585","Small Size","0","150","250","");
INSERT INTO stock VALUES("57","6751457","2021-02-24","1172356825","FB Pump China Medium Size","15561585","Medium Size","2","150","250","");
INSERT INTO stock VALUES("58","6751458","2021-02-24","1172356825","FB Pump China Medium Size","15561585","Medium Size","0","250","300","");
INSERT INTO stock VALUES("59","6751459","2021-02-24","1172356825","FB Pump China Full Size","15561585","Full Size","2","280","400","");
INSERT INTO stock VALUES("60","6751460","2021-02-24","1172356829","CT Bat Grips China Imported","15561585","China","0","85","150","");
INSERT INTO stock VALUES("61","6751461","2021-02-24","1172356829","CT Bat Grips Local A","15561581","Local","0","70","120","");
INSERT INTO stock VALUES("62","6751462","2021-02-24","1172356829","CT Bat Grips Local B","15561581","Local","0","50","100","");
INSERT INTO stock VALUES("63","6751463","2021-02-24","1172356829","BM Shoes Yonex Orgnal","155615842","Orignal Yonex","2","2650","3200","");
INSERT INTO stock VALUES("64","6751464","2021-02-24","1172356829","BM Rackets Grips VS Duble Colour","155615855","VS Orignal","14","145","200","");
INSERT INTO stock VALUES("65","6751465","2021-02-24","1172356829","BM Rackets Grips VS Doot/Silai","155615855","VS Orignal Doot","13","145","180","");
INSERT INTO stock VALUES("66","6751466","2021-04-05","1172356829","BM Rackets Grips Round Yonex Simple","155615842","Yonex","31","45","80","");
INSERT INTO stock VALUES("67","6751467","2021-02-24","1172356829","BM Rackets Grips Leather","15561581","Leather Aahmad Sports","12","30","50","");
INSERT INTO stock VALUES("68","6751468","2021-02-24","1172356829","BM Rackets Grips Towel","15561581","Towel","36","20","30","");
INSERT INTO stock VALUES("69","6751469","2021-02-24","1172356818","FB Head Bands Importe","155615843","Towel China","5","70","120","");
INSERT INTO stock VALUES("71","6751471","2021-02-24","1172356818","FB RistBands Imp","155615843","Towel China","12","35","60","");
INSERT INTO stock VALUES("72","6751472","2021-02-24","117235688","BM Shuttles Plastic FG Yellow","155615834","Plastic Yellow","0","124","140","");
INSERT INTO stock VALUES("73","6751473","2021-02-24","117235688","BM Shuttles Plastic GS Yellow","155615832","Plastic Yellow","0","124","140","");
INSERT INTO stock VALUES("74","6751474","2021-02-24","117235688","BM Shuttles Plastic GS White","155615837","Plastic White","0","124","140","");
INSERT INTO stock VALUES("75","6751475","2021-02-24","117235688","BM Shuttles Plastic GS White","155615837","Plastic White","0","124","140","");
INSERT INTO stock VALUES("76","6751476","2021-02-24","117235688","BM Shuttles Plastic Local","15561581","Plastic White","0","50","70","");
INSERT INTO stock VALUES("77","6751477","2021-02-24","117235688","BM Shuttles Father ","15561581","fahter","0","50","70","");
INSERT INTO stock VALUES("78","6751478","2021-02-24","117235688","BM Shuttles Father Ijaz","15561581","fahter","0","50","70","");
INSERT INTO stock VALUES("79","6751479","2021-02-24","117235688","BM Shuttles Father Local","15561581","fahter","0","35","50","");
INSERT INTO stock VALUES("80","6751480","2021-02-24","1172356839","CT Hardball Guards Local","15561581","Local","6","30","50","");
INSERT INTO stock VALUES("81","6751481","2021-02-24","1172356839","CT Hardball Guards/ Sporte set Black","15561585","Balck Set","12","130","250","");
INSERT INTO stock VALUES("82","6751482","2021-02-24","1172356840","CT Hardball Sporter Nicker Whhite","15561585","White Nickers","6","50","200","");
INSERT INTO stock VALUES("83","6751483","2021-02-24","1172356839","CT Hardball Guards Local","15561581","Local","6","30","70","");
INSERT INTO stock VALUES("84","6751484","2021-02-24","1172356840","CT Hardball Sporters NickerWhite","15561581","Local","6","50","200","");
INSERT INTO stock VALUES("85","6751485","2021-02-24","1172356840","CT Hardball Sporters NickerWhite","15561581","Local","6","50","200","");
INSERT INTO stock VALUES("86","6751486","2021-02-24","1172356810","Philispies Disk Plastkc","15561585","Plastic ","10","70","120","");
INSERT INTO stock VALUES("87","6751487","2021-02-24","1172356810","Philispies Disk Plastkc","15561585","Plastic ","10","70","120","");
INSERT INTO stock VALUES("89","6751489","2021-02-24","1172356810","Magnatic Dartboard  15" Game ","15561585","Medium Size","1","600","1200","");
INSERT INTO stock VALUES("90","6751490","2021-02-24","1172356821","SW Noze Pin Packets","15561585","Packets","0","20","30","");
INSERT INTO stock VALUES("91","6751491","2021-02-24","1172356821","SW Noze Pin Packets","15561585","Packets","0","20","30","");
INSERT INTO stock VALUES("92","6751492","2021-02-24","1172356821","SW Noze Pin Boxe Imp","15561585","Pox","0","120","150","");
INSERT INTO stock VALUES("93","6751493","2021-02-24","1172356821","SW Noze Pin Boxe Imp","15561585","Pox","0","120","150","");
INSERT INTO stock VALUES("94","6751494","2021-02-24","1172356821","SW Glasess Full Box Imp","15561585","Pox Imp","0","350","550","");
INSERT INTO stock VALUES("95","6751495","2021-02-24","1172356821","SW Glasess Medium Packet  Imp","15561585","Packet","0","100","200","");
INSERT INTO stock VALUES("96","6751496","2021-02-24","1172356821","SW Glasess Medium Packet  Imp","15561585","Packet","0","100","200","");
INSERT INTO stock VALUES("97","6751497","2021-02-24","1172356827","BM Rackets Eminent Half 6070 Loc","155615845","Loca","9","425","600","");
INSERT INTO stock VALUES("98","6751498","2021-02-24","1172356827","BM Rackets Eminent Full Sing 6070","155615845","Full Cover Sing","0","475","700","");
INSERT INTO stock VALUES("99","6751499","2021-02-24","1172356827","BM Rackets Eminent Pair","155615845","Pairs","0","600","1000","");
INSERT INTO stock VALUES("100","67514100","2021-02-24","1172356827","BM Rackets Pairs Sing Fram ","15561581","Pairs","0","300","700","");
INSERT INTO stock VALUES("101","67514101","2021-02-24","1172356827","BM Rackets Pairs Sing Fram ","15561581","Pairs","0","300","700","");
INSERT INTO stock VALUES("102","67514102","2021-02-24","1172356827","BM Rackets Pairs Sing Fram ","15561581","Pairs","0","350","800","");
INSERT INTO stock VALUES("103","67514103","2021-02-24","1172356827","BM Rackets Pairs Sing Fram ","15561581","Pairs","0","400","800","");
INSERT INTO stock VALUES("104","67514104","2021-02-24","1172356827","BM Rackets Pairs Sing Fram ","15561581","Pairs","0","400","850","");
INSERT INTO stock VALUES("105","67514105","2021-02-24","1172356827","BM Rackets Orignal 300 With Netting","155615844","Hiqua 300 Fram","2","2300","4000","");
INSERT INTO stock VALUES("106","67514106","2021-02-24","1172356827","BM Rackets Orignal 300","155615844","Hiqua 300 Fram","0","2200","4000","");
INSERT INTO stock VALUES("107","67514107","2021-02-24","1172356810","Luddo Game Folding Gatta Full","15561581","Local Folding gatta Full Size","0","120","200","");
INSERT INTO stock VALUES("108","67514108","2021-02-24","1172356810","Luddo Anmol Folding Wood Small Size","155615838","Wooden Anmol","1","400","650","");
INSERT INTO stock VALUES("109","67514109","2021-02-24","1172356810","Ludo Game magnatics Small Size","15561585","China Magnatick Small","3","500","850","");
INSERT INTO stock VALUES("110","67514110","2021-02-24","1172356810","Chess Magnatic Folding Full","15561585","China Magnatic","1","900","1300","");
INSERT INTO stock VALUES("111","67514111","2021-02-24","1172356810","Chess Magnatic Folding Medium","15561585","China Magnatic","1","600","1000","");
INSERT INTO stock VALUES("113","67514113","2021-02-24","1172356810","Monopoly Black Box ","15561585","China","0","0","0","");
INSERT INTO stock VALUES("114","67514114","2021-02-24","1172356810","Monopoly Red Box Imp","15561585","China Red Box","1","300","500","");
INSERT INTO stock VALUES("117","67514117","2021-02-24","1172356810","Game Monopoly White Green Box Imp","15561585","China Red Box","1","550","700","");
INSERT INTO stock VALUES("118","67514118","2021-02-24","1172356832","FB Base Layers/ Long Tightes China","15561585","Base Layer and Long Tightes","5","500","800","");
INSERT INTO stock VALUES("119","67514119","2021-02-24","1172356810","Cycling Knee Sports Pair With Arm","15561585","China","1","350","600","");
INSERT INTO stock VALUES("120","67514120","2021-02-24","117235686","JYM Yoga Mate 4MM","15561585","China","0","0","0","");
INSERT INTO stock VALUES("121","67514121","2021-02-24","117235686","JYM Yoga Mate 5MM","15561585","China","0","0","0","");
INSERT INTO stock VALUES("122","67514122","2021-02-24","117235686","JYM Yoga Mate 6MM","15561585","China","0","0","0","");
INSERT INTO stock VALUES("123","67514123","2021-02-24","117235686","JYM Lather Belt M Size","15561585","China","0","0","0","");
INSERT INTO stock VALUES("124","67514124","2021-02-24","117235686","JYM AB Wheel Box","15561585","China","1","750","1500","");
INSERT INTO stock VALUES("125","67514125","2021-02-24","1172356810","Chess Wooden Full Size","15561585","China","0","0","0","");
INSERT INTO stock VALUES("126","67514126","2021-02-24","1172356810","Chess Wooden Medium Size","15561585","China","0","0","0","");
INSERT INTO stock VALUES("127","67514127","2021-02-24","1172356810","Chess Wooden Folding Medium Size","15561585","China","1","400","750","");
INSERT INTO stock VALUES("128","67514128","2021-02-24","1172356810","Chess Wooden Folding  Small Size","15561585","China","2","380","659","");
INSERT INTO stock VALUES("129","67514129","2021-02-24","1172356838","TT Net Yellow Box 137C","15561585","Without Clamp","3","150","350","");
INSERT INTO stock VALUES("130","67514130","2021-02-24","1172356838","TT Net Post Suit Green Box With Clips","15561585","With iron Clips Iron","1","700","1100","");
INSERT INTO stock VALUES("131","67514131","2021-02-24","1172356838","TT Net Adjustable Plastic Clips Ping Pong","15561585","With Clips ","0","0","0","");
INSERT INTO stock VALUES("132","67514132","2021-02-24","1172356827","TT Rackets Butterfly Yelloe Box 102","15561585","Single Yellow Box","2","375","750","");
INSERT INTO stock VALUES("133","67514133","2021-02-24","1172356827","TT Rackets Butterfly Black Box 401","15561585","Single Always Butterfly ","1","700","1300","");
INSERT INTO stock VALUES("136","67514136","2021-02-24","1172356827","TT Rackets Gold Cup","15561585","Single China","2","250","400","");
INSERT INTO stock VALUES("137","67514137","2021-02-24","1172356838","BB Net Local Single","15561581","Local Normal","8","120","170","");
INSERT INTO stock VALUES("138","67514138","2021-02-24","117235687","Underwear Nicker Local","15561581","Local FSD","0","0","0","");
INSERT INTO stock VALUES("139","67514139","2021-02-24","117235687","Underwear Nicker Local","15561581","Local FSD","0","0","0","");
INSERT INTO stock VALUES("140","67514140","2021-02-24","117235687","Underwear Nicker China","15561585","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("141","67514141","2021-02-24","117235687","Underwear China","15561585","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("142","67514142","2021-02-24","117235687","Underwear Local","15561585","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("143","67514143","2021-02-24","1172356816","Ankale Sox China Packet","15561585","Husnain Houzri","0","60","120","");
INSERT INTO stock VALUES("144","67514144","2021-02-24","1172356816","Towel Sox ","15561581","Husnain Houzri","0","30","70","");
INSERT INTO stock VALUES("145","67514145","2021-02-24","1172356816","Sox Full Box Imp","15561584","Husnain Houzri","0","80","150","");
INSERT INTO stock VALUES("146","67514146","2021-02-24","1172356811","Vest  Sleeveless ","15561581","Husnain Houzri Bunyaan","0","0","0","");
INSERT INTO stock VALUES("147","67514147","2021-02-24","1172356811","Vest Half Sleeve","15561581","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("148","67514148","2021-02-24","1172356811","Vest Mans Wear ","15561581","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("149","67514149","2021-02-24","1172356811","Vest Mans Wear ","15561581","Husnain Houzri","0","0","0","");
INSERT INTO stock VALUES("150","67514150","2021-02-24","1172356841","BB Iron Ring ","15561581","Iron Ring","6","260","450","");
INSERT INTO stock VALUES("152","67514152","2021-02-24","1172356829","BM Racket Grip Doot VS","155615855","China Doot","0","140","180","");
INSERT INTO stock VALUES("154","67514154","2021-02-24","117235685","LT Ball Dunlop  Fort","15561585","China ","0","0","0","");
INSERT INTO stock VALUES("155","67514155","2021-02-24","117235685","Saquash Ball Dunlop","15561585","China ","0","0","0","");
INSERT INTO stock VALUES("156","67514156","2021-02-24","1172356827","Racket Saquash Hiqua","155615844","China ","1","1200","1800","");
INSERT INTO stock VALUES("157","67514157","2021-02-24","1172356842","FB Refry Cards Fifa Set","155615843","China ","1","175","300","");
INSERT INTO stock VALUES("158","67514158","2021-02-24","1172356842","FB Refry Cards Fifa Set","15561585","Chiana","0","175","300","");
INSERT INTO stock VALUES("159","67514159","2021-02-24","1172356843","FB Stop Watch Red Box","15561585","Red Plastic Box","1","300","450","");
INSERT INTO stock VALUES("160","67514160","2021-02-24","1172356812","FB Sleeveless China Imp","15561585","Chiana","0","0","0","");
INSERT INTO stock VALUES("161","67514161","2021-02-24","1172356840","Sports Shoulders Pad Sing","15561585","Chiana","0","0","0","");
INSERT INTO stock VALUES("162","67514162","2021-02-24","1172356843","Sports Shoulders Pad Double 786","15561585","Chiana","1","650","350","");
INSERT INTO stock VALUES("163","67514163","2021-02-24","1172356813","Waist Sport Belts 801","15561585","Chiana 801 multi Colours","1","300","650","");
INSERT INTO stock VALUES("164","67514164","2021-02-24","1172356813","Waist Sport Belts 0766","15561585","Chiana","0","0","0","");
INSERT INTO stock VALUES("165","67514165","2021-02-24","1172356813","Waist Sport Belts 8628 Yellow Box","15561585","Chiana","1","400","700","");
INSERT INTO stock VALUES("166","67514166","2021-02-24","1172356813","Waist Sport Belts 0772","15561585","Chiana","0","0","0","");
INSERT INTO stock VALUES("167","67514167","2021-02-24","1172356813","Waist Sk Belt Heat","15561585","Chiana","1","1200","1600","");
INSERT INTO stock VALUES("168","67514168","2021-02-24","1172356843","Knee Cap Sports Brown","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("169","67514169","2021-02-24","1172356843","Knee Cap Sports Black Full","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("170","67514170","2021-02-24","1172356843","Knee Cap Sports Black Medium","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("172","67514172","2021-02-24","1172356843","FB Englet Brown ","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("173","67514173","2021-02-24","1172356843","FB Englet Black","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("174","67514174","2021-02-24","1172356843","FB Captain Patti","15561585","China","1","175","300","");
INSERT INTO stock VALUES("175","67514175","2021-02-24","1172356843","Knee Cap Perfect Chiana Yellow ","15561585","China","1","175","350","");
INSERT INTO stock VALUES("177","67514177","2021-02-24","1172356843","FB Whistle High Grad Plast China","15561585","China","0","60","100","");
INSERT INTO stock VALUES("178","67514178","2021-02-24","1172356843","FB Whistle Local","15561581","Local","0","5","10","");
INSERT INTO stock VALUES("179","67514179","2021-02-24","1172356843","Knee Sports YC 7338 Long Blue Box ","15561585","China","1","350","750","");
INSERT INTO stock VALUES("180","67514180","2021-02-24","117235686","JYM Chest Expender Imported","15561585","Imported China","1","0","0","");
INSERT INTO stock VALUES("181","67514181","2021-02-24","117235686","JYM Chest Expender Imported","15561585","Imported China","1","0","0","");
INSERT INTO stock VALUES("182","67514182","2021-02-24","117235686","Palm Support 613 China Blue","15561585","Imported China","1","150","300","");
INSERT INTO stock VALUES("183","67514183","2021-02-24","1172356821","SW Intex Arm","15561585","Imported China","0","0","0","");
INSERT INTO stock VALUES("184","67514184","2021-02-24","117235686","Jump  Rope Simple Wood","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("185","67514185","2021-02-24","117235686","Jump  Rope Metter Plast","15561585","China Metter","5","120","250","");
INSERT INTO stock VALUES("186","67514186","2021-02-24","117235686","Jump  Rope Baring ","15561585","Imported China baring ","8","150","400","");
INSERT INTO stock VALUES("187","67514187","2021-02-24","117235686","Jump  Rope Sunline 1211","15561585","Imported China baring ","1","300","700","");
INSERT INTO stock VALUES("188","67514188","2021-02-24","117235686","Exerciser Grip Ball Sunline","15561585","Imported China","1","250","0","");
INSERT INTO stock VALUES("189","67514189","2021-02-24","1172356810","Playing Cards Royle Black","155615856","Local Black","7","65","100","");
INSERT INTO stock VALUES("190","67514190","2021-02-24","1172356810","Playing Cards Rocket Taiwan Green","15561584","Taiwan Green","11","130","200","");
INSERT INTO stock VALUES("191","67514191","2021-02-24","1172356829","CT Bat Grips Indian/Imported","15561584","Indian Imported","0","0","0","");
INSERT INTO stock VALUES("192","67514192","2021-02-24","1172356829","CT Bat Grips Local","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("193","67514193","2021-02-24","1172356810","Ono Game Cards Multi Box","15561584","China ","1","350","750","");
INSERT INTO stock VALUES("194","67514194","2021-02-24","1172356810","Ono Game Card Red box Med","15561584","China ","1","150","350","");
INSERT INTO stock VALUES("195","67514195","2021-02-24","1172356810","Ono Game Card Red box  Small","15561584","China ","0","0","0","");
INSERT INTO stock VALUES("196","67514196","2021-02-24","117235686","JYM Pull Hammer Imp","15561584","China ","1","200","0","");
INSERT INTO stock VALUES("197","67514197","2021-02-24","117235686","JYM Power Wrist 202","15561584","China ","1","350","0","");
INSERT INTO stock VALUES("198","67514198","2021-02-24","117235686","JYM Fitness Stretch Bands Single","15561584","China ","0","200","0","");
INSERT INTO stock VALUES("199","67514199","2021-02-24","1172356815","P Caps Fix Imported","15561584","Imported","0","200","0","");
INSERT INTO stock VALUES("200","67514200","2021-02-24","1172356815","P Caps Corian ","15561584","Imported","0","0","0","");
INSERT INTO stock VALUES("201","67514201","2021-02-24","1172356815","P Caps Jeans ","15561581","Local Jeans","0","0","0","");
INSERT INTO stock VALUES("202","67514202","2021-02-24","1172356815","P Caps Jeans ","15561581","Local Jeans","0","0","0","");
INSERT INTO stock VALUES("203","67514203","2021-02-24","1172356815","P Caps Parashoot","15561581","Local Jeans","0","0","0","");
INSERT INTO stock VALUES("204","67514204","2021-02-24","1172356815","P Caps Local","15561581","Local Jeans","0","0","0","");
INSERT INTO stock VALUES("205","67514205","2021-02-24","1172356815","P Caps Soft Imported","15561581","Soft ","0","0","0","");
INSERT INTO stock VALUES("206","67514206","2021-02-24","1172356830","FB Club Kits Full Sleeves Chaina","155615843","Chaina ","0","0","0","");
INSERT INTO stock VALUES("207","67514207","2021-02-24","1172356830","FB Club Kits HalfSleeves Chaina","155615843","Chaina ","0","0","0","");
INSERT INTO stock VALUES("208","67514208","2021-02-24","1172356830","FB Club Kits Half Sleeves  Thai ","155615843","Thai Stuff","0","0","0","");
INSERT INTO stock VALUES("209","67514209","2021-02-24","1172356830","FB Club Kits Full Sleeves  Thai ","155615843","Thai Stuff","0","0","0","");
INSERT INTO stock VALUES("210","67514210","2021-02-24","1172356830","FB Club  Kits Kids","155615843","Kids","0","0","0","");
INSERT INTO stock VALUES("211","67514211","2021-02-24","1172356844","Tracksoats China Imported","15561585","China Tracksoat","0","0","0","");
INSERT INTO stock VALUES("212","67514212","2021-02-24","1172356844","Tracksoats Club China Imported","15561585","China Club Tracksoat","0","0","0","");
INSERT INTO stock VALUES("213","67514213","2021-02-24","1172356845","Club Uppers Imported","15561585","China Club ","0","0","0","");
INSERT INTO stock VALUES("214","67514214","2021-02-24","1172356838","FB Goal Keeper Net Simple","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("215","67514215","2021-02-24","1172356812","Shirt Full Sleeve Kotynic ","155615857","Local","0","0","0","");
INSERT INTO stock VALUES("216","67514216","2021-02-24","1172356812","Shirt Half Sleeve Kotynic ","155615857","Local","0","0","0","");
INSERT INTO stock VALUES("217","67514217","2021-02-24","1172356812","Shirt Rehman PK","155615815","Local","0","0","0","");
INSERT INTO stock VALUES("218","67514218","2021-02-24","1172356812","Shirt Simple Round Neck Half Sleeve","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("219","67514219","2021-02-24","1172356812","Shirt Simple Round Neck Full Sleeve","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("220","67514220","2021-02-24","1172356812","Shirt Polo Colar Full Sleeves","155615858","Polo Full Sleeves","0","0","0","");
INSERT INTO stock VALUES("221","67514221","2021-02-24","1172356812","Shirt Polo Colar Half Sleeves","155615858","Polo Full Sleeves","0","0","0","");
INSERT INTO stock VALUES("222","67514222","2021-02-24","1172356810","Hula Hoops Parts Box Set","15561581","Game","0","0","0","");
INSERT INTO stock VALUES("223","67514223","2021-02-24","1172356810","Hula Hoops Parts Box Set Simple","15561581","Game","0","0","0","");
INSERT INTO stock VALUES("224","67514224","2021-02-24","1172356812","BM Shirts Yonex","155615842","Imported China","0","0","0","");
INSERT INTO stock VALUES("225","67514225","2021-02-24","1172356812","BM Shirts Yonex","155615842","Imported China","0","0","0","");
INSERT INTO stock VALUES("226","67514226","2021-02-24","1172356831","BM Nickers Yonex","155615842","Imported China","0","0","0","");
INSERT INTO stock VALUES("227","67514227","2021-02-24","1172356812","Shirts Sublimation Full Sleeves","155615859","Local","0","0","0","");
INSERT INTO stock VALUES("228","67514228","2021-02-24","1172356812","Shirts Sublimation Half Sleeves","155615859","Local","0","0","0","");
INSERT INTO stock VALUES("229","67514229","2021-02-24","1172356812","Shirts Sublimation Half Sleeves","155615859","Local","0","0","0","");
INSERT INTO stock VALUES("230","67514230","2021-02-24","1172356816","FB Club Sox Long Imported","155615843","China Imported","0","0","0","");
INSERT INTO stock VALUES("231","67514231","2021-02-24","1172356816","FB Club Sox Long Local","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("232","67514232","2021-02-24","1172356831","FB Nickers IMp/Loc","15561584","Local","0","0","0","");
INSERT INTO stock VALUES("233","67514233","2021-02-24","1172356831","FB Nickers Local","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("234","67514234","2021-02-24","1172356812","Shirts Adidas Colar Half Imported","15561584","Colar Imported","0","0","0","");
INSERT INTO stock VALUES("235","67514235","2021-02-24","117235681","TZ Wemly Orignal ","155615810","Local","0","0","0","");
INSERT INTO stock VALUES("236","67514236","2021-02-24","117235681","TZ Narrow Kotynic  Local","155615857","Local","0","0","0","");
INSERT INTO stock VALUES("237","67514237","2021-02-24","117235681","TZ Narrow Jarsy Cottan  Local","155615814","Local","0","0","0","");
INSERT INTO stock VALUES("238","67514238","2021-02-24","117235681","TZ Narrow Lacra Soft China ","15561585","China Imp Lacra","0","0","0","");
INSERT INTO stock VALUES("239","67514239","2021-02-24","117235681","TZ Narrow Club Interlock","155615843","China Club ","0","0","0","");
INSERT INTO stock VALUES("240","67514240","2021-02-24","117235681","TZ Narrow China Club Fine Org","155615843","China Club ","0","0","0","");
INSERT INTO stock VALUES("241","67514241","2021-02-24","117235681","TZ Mash Local ","15561589","Mash Local","0","0","0","");
INSERT INTO stock VALUES("242","67514242","2021-02-24","117235681","TZ Mash Local 2xl","15561589","Mash Local","0","0","0","");
INSERT INTO stock VALUES("243","67514243","2021-02-24","117235681","TZ Tranda/Nike/Adidas/CA","15561588","Tranda Org","0","0","0","");
INSERT INTO stock VALUES("244","67514244","2021-02-24","117235681","TZ Tranda Nike/Adidas/SA 2xl","15561588","Tranda Org 2xl","0","0","0","");
INSERT INTO stock VALUES("245","67514245","2021-02-24","1172356812","Sweat Shirts Full Sleeve ","15561581","Sweat Shirts Full","0","310","0","");
INSERT INTO stock VALUES("246","67514246","2021-02-24","1172356845","Flees Upper Local","15561581","Local","0","310","0","");
INSERT INTO stock VALUES("247","67514247","2021-02-24","117235681","TZ Narrow Flees Rib Local","15561581","Local","500","0","0","");
INSERT INTO stock VALUES("248","67514248","2021-02-24","1172356830","Hardball White Kit Full Sleeves","15561581","Local","500","0","0","");
INSERT INTO stock VALUES("249","67514249","2021-02-24","1172356830","Hardball White Kit","155615827","CA","0","0","0","");
INSERT INTO stock VALUES("250","67514250","2021-02-24","1172356830","Hardball White Kit","155615849","HS","0","0","0","");
INSERT INTO stock VALUES("251","67514251","2021-02-24","117235681","TZ Narrow Kids","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("252","67514252","2021-02-24","117235681","TZ Narrow 38 No Kids","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("253","67514253","2021-02-24","117235686","Hand Grips Simple Pair","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("254","67514254","2021-02-24","117235686","Hand Grips Simple Pair Blue Box","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("255","67514255","2021-02-24","117235686","Hand Grips Adjustable China Single","15561585","China","0","0","0","");
INSERT INTO stock VALUES("256","67514256","2021-02-24","1172356836","CB Gotti Simple Blue Box","15561581","Local","8","100","250","");
INSERT INTO stock VALUES("257","67514257","2021-02-24","1172356836","CB Gotti Star No 1 Orange Box","15561581","Local","-2","150","350","");
INSERT INTO stock VALUES("258","67514258","2021-02-24","1172356836","CB Gotti Star No 2 Green Box","15561581","Local","1","170","400","");
INSERT INTO stock VALUES("259","67514259","2021-02-24","1172356836","CB Strickers 3''","15561581","Local","10","40","80","");
INSERT INTO stock VALUES("260","67514260","2021-02-24","1172356836","CB Strickers 3.5"","15561581","Local","13","60","100","");
INSERT INTO stock VALUES("261","67514261","2021-02-24","1172356810","Carrom Board  Dubble Plai","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("262","67514262","2021-02-24","117235686","JYM Nun Chaku Steel Imp China ","15561585","Steel China ","2","300","500","");
INSERT INTO stock VALUES("263","67514263","2021-02-24","117235686","JYM Nun Chaku Cristal China ","15561585","Steel China ","1","450","850","");
INSERT INTO stock VALUES("264","67514264","2021-02-24","117235686","JYM Patti Wrist ","15561585","Steel China ","40","30","60","");
INSERT INTO stock VALUES("265","67514265","2021-02-24","117235686","JYM Boxing Patti Long","15561585","China ","12","60","60","");
INSERT INTO stock VALUES("266","67514266","2021-02-24","117235689","CT Bat Bags Local","15561581","Local","2","120","250","");
INSERT INTO stock VALUES("267","67514267","2021-02-24","117235689","CT Hardball Kit Bags ","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("268","67514268","2021-02-24","1172356837","JYM Gloves Gold,s Red","15561585","Local","2","130","250","");
INSERT INTO stock VALUES("269","67514269","2021-02-24","1172356837","JYM Gloves White WTF ","15561585","China","5","250","550","");
INSERT INTO stock VALUES("271","67514271","2021-02-24","1172356846","CB Dental Large Box","15561581","Local","9","20","40","");
INSERT INTO stock VALUES("272","67514272","2021-02-24","1172356843","CB Powder Borak Box","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("273","67514273","2021-02-24","1172356837","Inner Gloves Local","15561581","Local","0","0","0","");
INSERT INTO stock VALUES("274","67514274","2021-02-24","117235686","JYM Iron Imported China","15561585","China ","2","2000","2500","");
INSERT INTO stock VALUES("275","67514275","2021-02-24","1172356846","CB Striker Cristal SMall Size","15561581","CB Striker ","10","40","80","");
INSERT INTO stock VALUES("276","67514276","2021-02-24","1172356846","CB Striker Cristal Medium ze","15561581","CB Striker ","15","50","100","");
INSERT INTO stock VALUES("277","67514277","2021-02-24","1172356846","CB Striker Cristal Large ze","15561581","CB Striker ","12","70","150","");
INSERT INTO stock VALUES("278","67514278","2021-02-24","1172356846","CB Striker Cristal X.Large ze","15561581","CB Striker ","8","80","200","");
INSERT INTO stock VALUES("280","67514280","2021-02-24","1172356810","Frisbee Flying Disk Sports","15561581","Flying Disk","9","65","100","");
INSERT INTO stock VALUES("281","67514281","2021-02-24","117235686","JYM Tummy Trimmer Single ","15561581","exerciser ","1","400","650","");
INSERT INTO stock VALUES("284","67514284","2021-02-24","117235686","JYM Tummy Trimmer Double ","15561581","exerciser  Double","1","500","1200","");
INSERT INTO stock VALUES("287","67514287","2021-02-24","1172356810","Ludo Game Megnatics Medium size","15561585","China Imported","1","650","1000","");
INSERT INTO stock VALUES("288","67514288","2021-02-24","1172356810","Ludo Game Megnatics Large size","15561585","China Imported","1","750","1200","");
INSERT INTO stock VALUES("289","67514289","2021-02-24","1172356814","Dry Skates Shoes Small Green Box","15561585","China Imported","1","1000","1600","");
INSERT INTO stock VALUES("290","67514290","2021-02-24","1172356814","Role Skates Shoes Liner baig","15561585","China Imported","1","1900","2500","");
INSERT INTO stock VALUES("291","67514291","2021-02-24","1172356810","Luddo Anmol Folding Wood Large Size","15561585","China Imported","1","450","750","");
INSERT INTO stock VALUES("292","67514292","2021-02-24","1172356810","Scrabble Game Green Box 6670E","15561585","China Imported","1","400","700","");
INSERT INTO stock VALUES("293","67514293","2021-02-24","1172356810","Scrabble Game Blue Box ","15561585","China Angry Birds","2","300","650","");
INSERT INTO stock VALUES("294","67514294","2021-02-24","1172356846","CB Strickers 4"","15561581","Carrom Board Striker","11","80","150","");
INSERT INTO stock VALUES("295","67514295","2021-02-24","1172356846","CB Strickers 4.5"","15561581","Carrom Board Striker","12","100","200","");
INSERT INTO stock VALUES("296","67514296","2021-02-24","1172356826","Cycling Helmet Foam Kids","15561585","China ","1","350","500","");
INSERT INTO stock VALUES("297","67514297","2021-02-24","1172356827","TT Rackets Champion","155615861","Single Champion","1","250","400","");
INSERT INTO stock VALUES("298","67514298","2021-02-24","1172356827","TT Net With Clump  Set PMBO","15561585","Single Champion","1","200","400","");
INSERT INTO stock VALUES("299","67514299","2021-02-24","1172356838","BM Net Yonex Green Blue Box","15561585","China Imported","1","700","1200","");
INSERT INTO stock VALUES("300","67514300","2021-02-24","1172356838","BM Net ashaway Black Box","15561585","China Imported","1","350","550","");
INSERT INTO stock VALUES("301","67514301","2021-02-24","1172356838","BM Net Awami Gold","155615825","Local Awami ","1","400","750","");
INSERT INTO stock VALUES("303","67514303","2021-02-24","1172356838","BB Net Batter ","15561581","Baskitball Net Batter","2","150","250","");
INSERT INTO stock VALUES("304","67514304","2021-02-24","117235685","TT Ball Double Circal ","15561585","TT Balls Double Circle ","55","27","35","");
INSERT INTO stock VALUES("305","67514305","2021-02-24","117235685","TT Ball Butterfly ","15561585","TT Balls Butterfly","21","35","50","");
INSERT INTO stock VALUES("306","67514306","2021-02-24","117235686","Jump  Rope Metter","15561585","China Imported","5","135","300","");
INSERT INTO stock VALUES("307","67514307","2021-02-24","117235686","Jump  Rope Metter","15561585","China Imported","5","135","300","");
INSERT INTO stock VALUES("308","67514308","2021-02-24","117235686","Jump  Rope Metter","15561585","China Imported","5","135","300","");
INSERT INTO stock VALUES("309","67514309","2021-02-24","117235686","Jump  Rope Metter","15561585","China Imported","5","135","300","");
INSERT INTO stock VALUES("310","67514310","2021-02-24","117235686","Jump  Rope Baring ","15561585","China Imported","8","150","400","");
INSERT INTO stock VALUES("311","67514311","2021-02-24","117235686","Jump  Rope Baring ","15561585","China Imported","8","150","400","");
INSERT INTO stock VALUES("312","67514312","2021-02-24","1172356814","FB Grippers BO Imported","155615840","Blue Ochian Chaina Gripper","6","2100","2500","");
INSERT INTO stock VALUES("313","67514313","2021-02-24","1172356814","FB Stud China Imported","15561585","China","12","1300","1800","");
INSERT INTO stock VALUES("314","67514314","2021-02-24","1172356814","FB Stud China Imported","15561585","China","12","1300","1800","");
INSERT INTO stock VALUES("315","67514315","2021-02-24","1172356814","FB Stud China Imported","15561585","China","12","1300","1800","");
INSERT INTO stock VALUES("316","67514316","2021-02-24","1172356814","CT Gripper CA 15K","155615827","CA 15K ","2","3000","3200","");
INSERT INTO stock VALUES("317","67514317","2021-02-24","1172356814","CT Gripper CA 15K","155615827","CA 15K ","2","3000","3200","");
INSERT INTO stock VALUES("318","67514318","2021-02-24","1172356814","CT Gripper Big Baing CA ","155615827","CA Big Bang KP","1","3000","3200","");
INSERT INTO stock VALUES("319","67514319","2021-02-24","1172356814","CT Gripper AC Local","155615826","AC Local","5","1700","2100","");
INSERT INTO stock VALUES("320","67514320","2021-02-24","1172356814","CT Gripper Ihsan","155615850","Ehsan","2","2000","2500","");
INSERT INTO stock VALUES("321","67514321","2021-02-24","1172356814","CT Gripper CA 6116","155615827","CA 6116","2","2500","3000","");
INSERT INTO stock VALUES("322","67514322","2021-02-24","1172356814","CT Gripper CA 6116","155615827","CA 6116","2","2500","3000","");
INSERT INTO stock VALUES("323","67514323","2021-02-24","1172356814","CT Gripper Jazba One Drive111","155615828","Jazba One Drive 111 Black","4","3350","3600","");
INSERT INTO stock VALUES("324","67514324","2021-02-24","1172356814","CT Gripper Jazba One Drive111","155615828","Jazba One Drive 111 Black","4","3350","3600","");
INSERT INTO stock VALUES("325","67514325","2021-02-24","1172356810","Cube Game Magic Show Small Blue Box","15561581","Rube Cube Small Blue Box","3","70","150","");
INSERT INTO stock VALUES("326","67514326","2021-02-24","1172356810","Cube Game Magic Show Large White box","15561581","Rube Cube Large White Box","6","130","200","");
INSERT INTO stock VALUES("327","67514327","2021-02-24","1172356810","Cube Game Magic Show Large White box","15561581","Rube Cube Large White Box","6","130","200","");
INSERT INTO stock VALUES("329","67514329","2021-02-24","1172356810","Playing Cards Golding Box","15561581","Playing Cards Gold Box","6","30","50","");
INSERT INTO stock VALUES("330","67514330","2021-02-24","1172356843","Water Bottal Contesi ","15561581","Water bottal BLue","1","300","450","");
INSERT INTO stock VALUES("331","67514331","2021-02-24","1172356843","Water Bottal Contesi ","15561581","Water bottal BLue","1","300","450","");
INSERT INTO stock VALUES("332","67514332","2021-02-24","1172356843","Water Bottal Crystal ","15561581","Water bottal Crystal","1","250","350","");
INSERT INTO stock VALUES("333","67514333","2021-02-24","1172356843","Water Bottal Crystal ","15561581","Water bottal Crystal","1","250","350","");
INSERT INTO stock VALUES("334","67514334","2021-02-24","1172356836","Ludo Gotti Crystal Bottal Box","15561581","Bottal Box Crystal","8","150","70","");
INSERT INTO stock VALUES("335","67514335","2021-02-24","1172356836","Ludo Gotti Box","15561581","Gatta Box","15","30","50","");
INSERT INTO stock VALUES("336","67514336","2021-02-24","1172356846","CB Dental Small Box","15561581","Dental Small Box","24","13","20","");
INSERT INTO stock VALUES("337","67514337","2021-02-24","117235685","CT Hardball Crown Local","15561581","Hardball Crown","6","230","270","");
INSERT INTO stock VALUES("338","67514338","2021-02-24","117235685","CT Hardball Crown Local","15561581","Hardball Crown","6","230","270","");
INSERT INTO stock VALUES("339","67514339","2021-02-24","117235685","CT Hardball V12","15561581","Hardball V12","4","240","280","");
INSERT INTO stock VALUES("340","67514340","2021-02-24","117235685","CT Hardball V12","15561581","Hardball V12","4","240","280","");
INSERT INTO stock VALUES("341","67514341","2021-02-24","117235685","CT Hardball Turner","15561581","Hardball Turner","7","270","350","");
INSERT INTO stock VALUES("342","67514342","2021-02-24","117235685","CT Hardball Grade A White G","15561581","Grade A White","1","400","450","");
INSERT INTO stock VALUES("343","67514343","2021-02-24","1172356846","CB Borak Aqeel Box","15561581","Gatta Box","4","20","40","");
INSERT INTO stock VALUES("344","67514344","2021-02-24","1172356846","CB Borak Aqeel Box","15561581","Gatta Box","4","20","40","");
INSERT INTO stock VALUES("345","67514345","2021-02-24","117235685","CT Tennis Ball Helios ","155615862","Tennis Helios Shine","30","165","180","");
INSERT INTO stock VALUES("346","67514346","2021-03-30","1172356843","CT Scoring Book Shine","155615863","Scoring Book Shine ","4","30","70","");
INSERT INTO stock VALUES("347","67514347","2021-03-30","1172356843","CT Scoring Book Shine","155615863","Scoring Book Shine ","4","30","70","");
INSERT INTO stock VALUES("348","67514348","2021-03-30","1172356826","Sekate Board Wood Medium","15561585","Woode  M","1","400","650","");
INSERT INTO stock VALUES("349","67514349","2021-03-30","1172356827","BM Rackets Orignal 110 With Netting","155615844","110 Orignal Frame ","2","2200","3700","");
INSERT INTO stock VALUES("350","67514350","2021-03-30","1172356827","BM Rackets Orignal 39 With Netting","155615844","39 Orignal Frame  With Neating","2","2200","4000","");
INSERT INTO stock VALUES("351","67514351","2021-03-30","1172356827","BM Rackets Orignal 800 With Netting","155615844","39 Orignal Frame  With Neating","1","2000","3500","");
INSERT INTO stock VALUES("352","67514352","2021-03-30","1172356827","BM Rackets Orignal 810With Netting","155615844","810 Orignal Frame  With Neating","1","2500","4500","");
INSERT INTO stock VALUES("353","67514353","2021-03-30","1172356827","BM Rackets Orignal 900 With Netting","155615844","900 Orignal Frame  With Neating","7","2700","5000","");
INSERT INTO stock VALUES("354","67514354","2021-03-30","1172356827","BM Rackets Orignal ERA 55 With Netting","155615844","ERA 55 Light Wait Orignal Frame  With Neating","1","3200","7500","");
INSERT INTO stock VALUES("355","67514355","2021-03-30","1172356827","BM Rackets Yonex Voltric Force","155615844","Yonex Voltric Force Light Wait Orignal Frame  With Neating","3","2800","6000","");
INSERT INTO stock VALUES("356","67514356","2021-03-30","1172356827","BM Rackets Yonex Voltric Force 2","155615842","Yonex Voltric Force 2 Orignal Frame  With Neating","1","3000","7000","");
INSERT INTO stock VALUES("357","67514357","2021-03-30","1172356827","BM Rackets Carlton Victor 100","155615848","Carlton 100 Orignal Frame  With Neating","1","2650","6000","");
INSERT INTO stock VALUES("358","67514358","2021-03-30","1172356827","BM Rackets Yonex Light Wait 13","155615842","Light Wait Beyond 13  Orignal Frame  With Neating","1","4200","8500","");
INSERT INTO stock VALUES("359","67514359","2021-03-30","1172356827","BM Rackets Victor X 600","155615864","Meteor X 600  Orignal Frame  With Neating","1","2850","6500","");
INSERT INTO stock VALUES("360","67514360","2021-03-30","1172356827","BM Rackets Victor X 600","155615864","Meteor X 600  Orignal Frame  With Neating","1","2850","6500","");
INSERT INTO stock VALUES("361","67514361","2021-03-30","1172356810","Scrabble Game Sunshine","15561585","Green Box Sunshine ","1","450","850","");
INSERT INTO stock VALUES("362","67514362","2021-03-30","117235686","Silicone Chest Expander 3211","15561585","Chest Expander Box","1","800","1200","");
INSERT INTO stock VALUES("363","67514363","2021-03-30","1172356837","JYM Fitness Gloves 611 China ","15561585","China Imported","1","200","500","");
INSERT INTO stock VALUES("364","67514364","2021-03-30","1172356837","JYM Fitness Gloves 611 China ","15561585","China Imported","1","200","500","");
INSERT INTO stock VALUES("365","67514365","2021-03-30","1172356843","JYM Physiotherapy Tape ","15561585","China Imported Black Box","1","300","600","");
INSERT INTO stock VALUES("366","67514366","2021-03-30","1172356826","JYM Body Exerciser Pull Hammer 1119","15561585","China Imported","1","200","350","");
INSERT INTO stock VALUES("367","67514367","2021-03-30","1172356826","JYM Adjustable Grip Exerciser Spring","15561585","China Imported","3","250","550","");
INSERT INTO stock VALUES("368","67514368","2021-03-30","1172356821","SW Arm Band 9*6","15561585","China","3","150","400","");
INSERT INTO stock VALUES("369","67514369","2021-03-30","117235686","JYM Grip Ball Soft 1305","15561585","China Soft Ball 1","1","200","350","");
INSERT INTO stock VALUES("370","67514370","2021-03-30","117235686","JYM Grip Ball Soft 1305","15561585","China Soft Ball 1","1","200","350","");
INSERT INTO stock VALUES("371","67514371","2021-03-30","117235685","LT Ball Fort Dunlop","15561585","China Dunlop ","3","220","280","");
INSERT INTO stock VALUES("372","67514372","2021-03-30","117235685","LT Ball Fort Dunlop","15561585","China Dunlop ","3","220","280","");
INSERT INTO stock VALUES("373","67514373","2021-03-30","117235685","SQ Ball Dunlop Pro","155615865","China Dunlop ","9","280","330","");
INSERT INTO stock VALUES("374","67514374","2021-03-30","117235685","SQ Ball Dunlop Pro","155615865","China Dunlop ","9","280","330","");
INSERT INTO stock VALUES("375","67514375","2021-03-30","117235686","JYM Sports Bands 2000","15561585","China Brown","2","150","400","");
INSERT INTO stock VALUES("376","67514376","2021-03-30","117235686","JYM Sports Bands 2000","15561585","China Brown","2","150","400","");
INSERT INTO stock VALUES("377","67514377","2021-03-30","117235686","JYM Wait Fix 5KG China ","15561585","China ","3","1100","1250","");
INSERT INTO stock VALUES("378","67514378","2021-03-30","117235686","JYM Wait Fix 5KG China ","15561585","China ","3","1100","1250","");
INSERT INTO stock VALUES("379","67514379","2021-03-30","117235686","JYM Ball Rubber China Imported","15561585","China ","1","650","1200","");
INSERT INTO stock VALUES("380","67514380","2021-03-31","1172356829","Hockey Grip Packet ","15561581","Crystal Box","5","130","200","");
INSERT INTO stock VALUES("381","67514381","2021-03-31","1172356818","FB Head Band Imported","15561585","Headband Imported/Club","17","80","120","");
INSERT INTO stock VALUES("383","67514383","2021-03-31","1172356818","FB Wrist Band Imported","15561585","Headband Imported/Club","27","30","60","");
INSERT INTO stock VALUES("385","67514385","2021-03-31","1172356843","CT Sleeves China","15561581","Sleeves Bazo","36","50","100","");
INSERT INTO stock VALUES("386","67514386","2021-03-31","1172356837","Snooker Gloves China ","15561585","China Imported Single ","3","80","150","");
INSERT INTO stock VALUES("387","67514387","2021-03-31","1172356837","Snooker Gloves China ","15561585","China Imported Single ","3","80","150","");
INSERT INTO stock VALUES("388","67514388","2021-03-31","1172356843","Palm Support Club Single ","15561585","Single Packet Club ","18","30","50","");
INSERT INTO stock VALUES("390","67514390","2021-03-31","117235686","JYM Nun Chaku Foam","15561585","China Foam","2","130","200","");
INSERT INTO stock VALUES("391","67514391","2021-03-31","117235686","JYM Strap Huk Steel","15561585","Huk Steel ","5","200","300","");
INSERT INTO stock VALUES("392","67514392","2021-03-31","117235686","JYM Strap Huk Steel","15561585","Huk Steel","6","200","300","");
INSERT INTO stock VALUES("393","67514393","2021-03-31","117235686","JYM Strap  Simple","15561585","Simple Long","2","120","250","");
INSERT INTO stock VALUES("394","67514394","2021-03-31","1172356847","TT Racket Rubber 729 Pair","15561585","729 Friendship","1","1050","2300","");
INSERT INTO stock VALUES("395","67514395","2021-03-31","1172356847","TT Racket Rubber 729 Pair","15561585","729 Friendship","1","1050","2300","");
INSERT INTO stock VALUES("396","67514396","2021-03-31","1172356847","TT Racket Rubber Butterfly Single","155615846","Butterfly Single","2","1000","2000","");
INSERT INTO stock VALUES("397","67514397","2021-03-31","1172356847","TT Racket Rubber Butterfly Single","155615846","Butterfly Single","2","1000","2000","");
INSERT INTO stock VALUES("398","67514398","2021-03-31","1172356848","FB Shin Guards Local","15561581","Local Orange","1","80","150","");
INSERT INTO stock VALUES("399","67514399","2021-03-31","1172356848","FB Shin Guards Club Imported","155615843","China  Imported","2","200","350","");
INSERT INTO stock VALUES("400","67514400","2021-03-31","1172356848","FB Shin Guards Club Imported Plastic Ribber","15561585","China  Imported Plastic Rubber","1","350","600","");
INSERT INTO stock VALUES("401","67514401","2021-03-31","1172356848","FB Shin Guards Imported Nike","15561585","China  Imported Nike","1","250","500","");
INSERT INTO stock VALUES("402","67514402","2021-03-31","1172356848","FB Shin Guards Local Stip Gray","15561585","Local","1","150","300","");
INSERT INTO stock VALUES("403","67514403","2021-03-31","117235689","FB Sports Club Bags Local","15561581","Local","8","140","250","");
INSERT INTO stock VALUES("404","67514404","2021-03-31","1172356849","Snooker Stick Bags","15561581","Local","3","120","200","");
INSERT INTO stock VALUES("405","67514405","2021-03-31","1172356849","Snooker Stick Bags","15561581","Local","3","120","200","");
INSERT INTO stock VALUES("406","67514406","2021-03-31","1172356837","JYM Gloves Fehar International ","15561585","China Gray/Green","6","250","450","");
INSERT INTO stock VALUES("407","67514407","2021-03-31","1172356837","JYM Gloves World Jym","15561585","China White/Black","3","250","450","");
INSERT INTO stock VALUES("408","67514408","2021-03-31","1172356837","JYM Gloves World Jym","15561585","China White/Black","3","250","450","");
INSERT INTO stock VALUES("409","67514409","2021-03-31","1172356837","JYM Gloves Black RTX","15561585","China Black","1","150","250","");
INSERT INTO stock VALUES("410","67514410","2021-03-31","1172356837","Gloves Steel ","15561585","China Black","1","130","200","");
INSERT INTO stock VALUES("411","67514411","2021-03-31","1172356848","FB Gripper China Orignal Mix","15561585","Talib Shah ","30","1600","2500","");
INSERT INTO stock VALUES("412","67514412","2021-03-31","1172356848","FB Nozals China/Local","15561581","Nozals","300","5","10","");
INSERT INTO stock VALUES("413","67514413","2021-03-31","1172356824","CT Plastic Wicket Set Kids","15561581","Plastic Kids","1","100","200","");
INSERT INTO stock VALUES("414","67514414","2021-03-31","1172356824","CT Plastic Wicket Set Kids","15561581","Plastic Kids","1","100","200","");
INSERT INTO stock VALUES("415","67514415","2021-03-31","1172356827","BM Rackets Hiqua 900 Orgnal","155615844","Orgnal 900 With Gutt","5","2500","5000","");
INSERT INTO stock VALUES("416","67514416","2021-03-31","1172356814","Casual Shoes Nike 301","15561586","Black Box ","5","1700","2500","");
INSERT INTO stock VALUES("418","67514418","2021-03-31","1172356814","Casual Shoes T20 Blue Box","155615866","Blue Box","11","1700","2500","");
INSERT INTO stock VALUES("419","67514419","2021-03-31","1172356814","Casual Shoes T20 Blue Box","155615866","Blue Box","11","1700","2500","");
INSERT INTO stock VALUES("420","67514420","2021-03-31","1172356814","Casual Shoes 177-S White Blue Box","15561585","White Box","9","1200","1800","");
INSERT INTO stock VALUES("421","67514421","2021-03-31","1172356814","Casual Shoes Nike9068 Blue Box","15561586","Nike Red Box","10","1000","1600","");
INSERT INTO stock VALUES("422","67514422","2021-03-31","1172356814","Casual Shoes Nike9068 Blue Box","15561586","Nike Red Box","10","1000","1600","");
INSERT INTO stock VALUES("423","67514423","2021-03-31","1172356814","Casual Shoes Walk  Brown Box","15561585","China Brown Box","2","1200","1800","");
INSERT INTO stock VALUES("424","67514424","2021-03-31","1172356814","Casual Shoes Local Black Box","15561581","Local ","4","500","800","");
INSERT INTO stock VALUES("425","67514425","2021-03-31","1172356814","Casual Shoes Local Black Box","15561581","Local ","4","500","800","");
INSERT INTO stock VALUES("426","67514426","2021-03-31","1172356814","Casual Shoes Local Black Box","15561581","Local ","4","500","800","");
INSERT INTO stock VALUES("427","67514427","2021-03-31","1172356814","Casual Shoes Orignal 1828 Box","15561585","China Orignal Blue Box","3","2500","3000","");
INSERT INTO stock VALUES("428","67514428","2021-03-31","1172356814","Casual Shoes Orignal 1828 Box","15561585","China Orignal Blue Box","3","2500","3000","");

