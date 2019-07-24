CREATE TABLE `edc_detail` (
  `MID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `MERCHANT_DBA_NAME` varchar(255) NOT NULL,
  `STATUS_EDC` int(11) NOT NULL,
  `CITY` varchar(255) NOT NULL,
  `ID_NUMBER` int(11) NOT NULL,
  `MSO` varchar(25) NOT NULL,
  `SOURCE_CODE` varchar(255) NOT NULL,
  `POS_1` int(11) NOT NULL,
  `WILAYAH` varchar(100) DEFAULT NULL,
  `CHANNEL` varchar(100) DEFAULT NULL,
  `TYPE_MID` varchar(100) DEFAULT NULL,
  `OPEN_DATE` date DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `BULAN` int(5) DEFAULT NULL,
  `generate_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=InnoDB AUTO_INCREMENT=218174996 DEFAULT CHARSET=utf8;
