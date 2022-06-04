SELECT barang_keluar.tgl_keluar,dtl_barang_keluar.id_barang AS kode,nama_barang AS nama,stok_keluar AS NB_pakai, total_harga_keluar AS Harga_NB_pakai
FROM barang_keluar,barang,dtl_barang_keluar
WHERE barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi`
GROUP BY barang_keluar.tgl_keluar,dtl_barang_keluar.id_barang,nama_barang ,stok_keluar, total_harga_keluar
UNION ALL
SELECT "" AS tgl_keluar, "" AS kode,
	"Grand Total" AS nama,
stok_keluar AS NB_pakai, total_harga_keluar AS Harga_NB_pakai
FROM barang_keluar,barang,dtl_barang_keluar
WHERE barang.`id_barang`=dtl_barang_keluar.`id_barang` AND barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi`
GROUP BY barang_keluar.tgl_keluar,dtl_barang_keluar.id_barang,nama_barang ,stok_keluar, total_harga_keluar, dtl_barang_keluar.id_transaksi