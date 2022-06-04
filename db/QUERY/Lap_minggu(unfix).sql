SELECT kagrup.`nama_kagrup`,mtc.`nama_mtc`,tgl_keluar,SUM(total_harga_keluar) AS biaya
FROM kagrup,mtc,`barang_keluar`
WHERE barang_keluar.`id_kagrup`=kagrup.`id_kagrup` AND barang_keluar.`id_mtc`=mtc.`id_mtc`
GROUP BY kagrup.`nama_kagrup`,mtc.`nama_mtc`