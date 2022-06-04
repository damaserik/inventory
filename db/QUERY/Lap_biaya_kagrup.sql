SELECT  kagrup.`nama_kagrup`,mtc.`nama_mtc`,mesin.`zona`,mesin.`id_mesin`,barang.`nama_barang`,
MAX(CASE WHEN `id_fungsi` = '1' THEN total_harga_keluar ELSE '' END) AS LUSI_WARP_LINE,
MAX(CASE WHEN `id_fungsi` = '2' THEN total_harga_keluar ELSE '' END) AS PAKAN_WEFT_LINE,
MAX(CASE WHEN `id_fungsi` = '3' THEN total_harga_keluar ELSE '' END) AS MOTOR_UTAMA,
MAX(CASE WHEN `id_fungsi` = '4' THEN total_harga_keluar ELSE '' END) AS MESIN_PALET,
MAX(CASE WHEN `id_fungsi` = '5' THEN total_harga_keluar ELSE '' END) AS BAUT_BAUT,
MAX(CASE WHEN `id_fungsi` = '6' THEN total_harga_keluar ELSE '' END) AS BARANG_LAIN_LAIN,
total_harga_keluar AS total
FROM barang,kagrup,mtc,mesin,barang_keluar,dtl_barang_keluar
WHERE barang.`id_barang`=dtl_barang_keluar.`id_barang` AND mesin.`id_mesin`=barang_keluar.`id_mesin` 
AND kagrup.`id_kagrup`=barang_keluar.`id_kagrup` AND barang_keluar.`id_mtc`=mtc.`id_mtc`
AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` AND mesin.`zona` LIKE 'zona 3'
GROUP BY barang.`nama_barang`,kagrup.`nama_kagrup`,total_harga_keluar

