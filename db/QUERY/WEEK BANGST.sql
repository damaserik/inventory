SELECT CONCAT('Mgg ', (WEEK(`tgl_keluar`))) AS minggu, IFNULL(id_kagrup, 'TOTAL') AS id_kagrup,IFNULL(id_mtc, 'TOTAL') AS id_mtc,
SUM(`total_harga_keluar`) AS total 
FROM `barang_keluar` 
WHERE tgl_keluar BETWEEN '2019-06-1' AND '2019-07-29'
GROUP BY WEEK(DATE(`tgl_keluar`)),id_kagrup,id_mtc
WITH ROLLUP