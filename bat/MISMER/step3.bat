

:: use mattools;
:: truncate mismer_bulk;
:: select count(*) from mismer_bulk; -- 776022
:: LOAD DATA INFILE 'E:/MISMER_BSK/2018/TXT/mismer1224.txt' INTO TABLE mismer_bulk FIELDS TERMINATED BY '|' IGNORE 1 ROWS;

mysql -u root < C:/xampp/htdocs/mattools/bat/MISMER/GENERATE_MISMER/1_EDC.sql
mysql -u root < C:/xampp/htdocs/mattools/bat/MISMER/GENERATE_MISMER/2_YAP.sql
mysql -u root < C:/xampp/htdocs/mattools/bat/MISMER/GENERATE_MISMER/3_EBK.sql

:: mysql -h localhost -u root -p < mismer\1

:: UPDATE DATA ROWS 
::mysql -u root mattools_db > "C:/Tes/MISMER/step_generate/step2_2.sql"
:: TRUNCATE DATA LAMA
