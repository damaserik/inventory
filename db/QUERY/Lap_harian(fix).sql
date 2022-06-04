SELECT tgl_keluar,dtl_barang_keluar.id_barang AS kode,nama_barang AS nama,SUM(stok)  AS NB_pakai,SUM(sub_harga)AS Harga_NB_pakai
FROM dtl_barang_keluar, barang
WHERE dtl_barang_keluar.`id_barang`=barang.`id_barang`
GROUP BY id_transaksi
UNION ALL
SELECT "" AS tgl_keluar,"" AS kode,
	"Grand Total" AS nama,
SUM(stok) AS NB_pakai,SUM(sub_harga)AS Harga_NB_pakai
FROM dtl_barang_keluar, barang
WHERE dtl_barang_keluar.`id_barang`=barang.`id_barang`