-- === generate unmatch

use mattools_db;
-- select count(*) from yap_detail ;

-- select * from edc_unmatch where is_match=1
SELECT coun(*) FROM mattools_db.edc_detail where WILAYAH IS NULL OR CHANNEL IS NULL

-- select * from edc_unmatch
-- select count(*) from edc_unmatch