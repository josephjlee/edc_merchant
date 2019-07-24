@echo off
for /f "delims=" %%a in ('wmic OS Get localdatetime  ^| find "."') do set dt=%%a \
set YYYY=%dt:~0,4% \
set MM=%dt:~4,2% \
set DD=%dt:~6,2% \
:: MANUAL JIKA TIDAK DIPROSES DI HARI SENIN
::set stamp=%0128%

set stamp=%MM%%DD% \

:: use mattools;
:: truncate mismer_bulk;
:: select count(*) from mismer_bulk; -- 776022
:: LOAD DATA INFILE 'E:/MISMER_BSK/2018/TXT/mismer1224.txt' INTO TABLE mismer_bulk FIELDS TERMINATED BY '|' IGNORE 1 ROWS;

:: mysql -h localhost -u root -p < mismer\1
:: mysql -u root -p mattools_db -e "TRUNCATE mismer_all"

:: UPDATE DATA ROWS MINGGU SEBELUMNYA
mysql -u root mattools_db -e "INSERT INTO mismer_rows SELECT NULL id, COUNT(*) jumlah_rows, now() update_at FROM mismer_all"
::mysql -u root mattools_db -e "SELECT * FROM mismer_rows"
::mysql -u root mattools_db -e "SELECT count(*) FROM mismer_all"

:: TRUNCATE DATA LAMA
mysql -u root mattools_db -e "TRUNCATE mismer_all"
::mysql -u root mattools_db -e "CREATE table SEGMENTASI_WILAYAH(CIF INT(25),KARTU_KREDIT INT(5));"
:: INSERT BULK DARI txt FILE MISMER ke Database mattools_db tabel mismer_all 
:::::::::mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer%stamp%.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"
mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0701.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"


::mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/MISMER/mismer0624' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"


:::::mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0415.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"

::mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0301.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"

::mysql -u root mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0225.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"
::mysql -u root mattools_db -e "SELECT count(*) FROM mismer_all"


:: MANUAL 
::mysql -u root -p mattools_db -e "LOAD DATA INFILE 'C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0128.txt' INTO TABLE mismer_all FIELDS TERMINATED BY '|' IGNORE 1 ROWS"
:: C:/xampp/htdocs/mattools/MISMER/BSK_TXT/mismer0128.txt

REM copy "c:\xampp\htdocs\mattools\EDC_UNMATC_DEV.csv" "c:\xampp\htdocs\mattools\mismer%stamp%.txt
REM COPY MISMER BSK KE PC LOCAL
:: copy "c:\xampp\htdocs\mattools\BSK\Mis\mismer%stamp%" "c:\xampp\htdocs\mattools\MISMER\NEW_BSK\" /Y
:: copy "c:\xampp\htdocs\mattools\BSK\Mis\mismer%stamp%" "c:\xampp\htdocs\mattools\MISMER\TXT_BSK\mismer%stamp%.txt" /Y