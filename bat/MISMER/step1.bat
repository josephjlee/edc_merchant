@echo off
for /f "delims=" %%a in ('wmic OS Get localdatetime  ^| find "."') do set dt=%%a
set YYYY=%dt:~0,4%
set MM=%dt:~4,2%
set DD=%dt:~6,2%
set HH=%dt:~8,2%
set Min=%dt:~10,2%
set Sec=%dt:~12,2%

set stamp=%MM%%DD%


:: SETIAP HARI SENIN 08.30

:: COPY MISMER BSK (\\172.18.16.15\Mis) KE PC LOCAL 
net use \\172.18.16.15\Mis\ pbk_domain\Admin SLN01 /USER:SLN123/
:: KE PC LOCAL file asli & .txt
::COPY FORMAT TXT
copy "\\172.18.16.15\Mis\mismer%stamp%" "c:\xampp\htdocs\mattools\MISMER\BSK_TXT\mismer%stamp%.txt" /Y
::COPY FORMAT ASLI
copy "\\172.18.16.15\Mis\mismer%stamp%" "c:\MISMER\" /Y
::copy "\\172.18.16.15\Mis\mismer%stamp%" "c:\xampp\htdocs\mattools\MISMER\BSK_NEW\" /Y

net use \\10.70.18.174\Users\Public\MISMER\ Admin SLN01 /USER:sln
::COPY MISMER BSK KE PC MUIZ (\\10.70.18.174\Users\Public\MISMER)
copy "\\172.18.16.15\Mis\mismer%stamp%" "\\10.70.18.174\Users\Public\MISMER\" /Y


