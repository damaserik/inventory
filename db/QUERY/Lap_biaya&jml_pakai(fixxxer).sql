SELECT mesin.`zona`,mtc.`nama_mtc` AS mtc,mesin.`id_mesin` AS mc,barang_keluar.`tgl_keluar` AS tanggal,barang.`nama_barang`,stok_keluar AS jumlah_pakai,
SUM(sub_harga) AS biaya
FROM mesin,barang,mtc,barang_keluar,dtl_barang_keluar
WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
AND barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_mtc`=mtc.`id_mtc` AND mesin.`zona` LIKE 'Zona 3'
GROUP BY   mesin.`id_mesin`,barang_keluar.`tgl_keluar`,barang.`nama_barang`
UNION ALL
SELECT '' AS zona,'' AS mtc,''AS mc, '' AS tanggal,
	'Grand Total' AS nama_barang,
	SUM(dtl_barang_keluar.stok)AS jumlah_pakai,
	SUM(sub_harga) AS biaya
FROM mesin,barang,mtc,barang_keluar,dtl_barang_keluar
WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
AND barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_mtc`=mtc.`id_mtc` AND mesin.`zona` LIKE 'Zona 3'