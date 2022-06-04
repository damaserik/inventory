SELECT mesin.`zona`,mtc.`nama_mtc`,mesin.`id_mesin`,barang_keluar.`tgl_keluar` AS tanggal,barang.`nama_barang`,
SUM(harga) AS biaya,stok_keluar AS jumlah_pakai
FROM mesin,barang,mtc,barang_keluar,dtl_barang_keluar
WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
AND barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_mtc`=mtc.`id_mtc`
GROUP BY   mesin.`zona`,mtc.`nama_mtc`,mesin.`id_mesin`,barang_keluar.`tgl_keluar`,barang.`nama_barang`,stok_keluar
UNION ALL
SELECT '' AS ZONA,'' AS Nama,''AS MC, '' AS tanggal,
	'Grand Total' AS nama_barang,
	SUM(total_harga_keluar) AS biaya,
	SUM(stok)AS total
FROM mesin,barang,barang_keluar,dtl_barang_keluar
WHERE mesin.`id_mesin`=barang_keluar.`id_mesin` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` 
AND barang.`id_barang`=dtl_barang_keluar.`id_barang`