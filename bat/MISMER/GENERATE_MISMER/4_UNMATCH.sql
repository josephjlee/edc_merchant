-- === generate unmatch

use mattools_db;
-- select count(*) from yap_detail ;

INSERT IGNORE INTO edc_unmatch
-- select * from edc_unmatch where is_match=1
SELECT *,0 IS_MATCH FROM mattools_db.edc_detail where WILAYAH IS NULL OR CHANNEL IS NULL

--mysql -u root mattools_db -e "SELECT count(*) FROM mattools_db.edc_detail where WILAYAH IS NULL OR CHANNEL IS NULL"

-- select * from edc_unmatch
-- select count(*) from edc_unmatch