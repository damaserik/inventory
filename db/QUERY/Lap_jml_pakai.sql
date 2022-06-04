SELECT zona,barang_keluar.tgl_keluar,nama_barang,stok_keluar AS total
FROM mesin,barang,barang_keluar,dtl_barang_keluar
WHERE barang_keluar.`id_mesin`=mesin.`id_mesin` AND barang.`id_barang`=dtl_barang_keluar.`id_barang`
AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi`
GROUP BY barang_keluar.tgl_keluar
UNION ALL
SELECT "" AS zona,barang_keluar.tgl_keluar,
	"Grand Total" AS nama_barang,
stok_keluar AS total
FROM mesin,barang,barang_keluar,dtl_barang_keluar
WHERE barang_keluar.`id_mesin`=mesin.`id_mesin` AND barang.`id_barang`=dtl_barang_keluar.`id_barang`
AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi`