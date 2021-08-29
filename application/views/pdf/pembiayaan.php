<html>

<head>
    <title>Cetak PDF Pembiayaan</title>
</head>

<body>
    <div style="text-align: center;">
        <h3>FORM PENGAJUAN PERMOHONAN PEMBIAYAAN</h3>   
        <H5 style="margin-top: -10px;">KSPPS BMT BINA USAHA MANDIRI INDONESIA
            (BMT BUMI)</H5>
    </div>

    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Data Pribadi Pemohon</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">kode Pembiayaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->kode_pembiayaan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Jenis Pembiayaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->jns_biaya ?></td>
                        </tr>
                        <tr>
                            <td class="q">Pengajuan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->pengajuan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Pemohon</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->nama ?></td>
                        </tr>
                        <tr>
                            <td class="q">Tempat, tgl lahir</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ttl ?></td>
                        </tr>
                        <tr>
                            <td class="q">Pendidikan Terakhir</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->pendidikan ?></td>
                        </tr>
                        <tr>
                            <td class="q">No. KTP</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ktp ?></td>
                        </tr>
                        <tr>
                            <td class="q">No. NPWP</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->npwp ?></td>
                        </tr>
                        <tr>
                            <td class="q">Jenis Kelamin</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->sex ?></td>
                        </tr>
                        <tr>
                            <td class="q">Alamat KTP</td>
                            <td class="n">:</td>
                            <td class="a">
                                <p style="max-width:100px"><?= $key->alamat_ktp ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="q">Kode Pos</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->kode_pos ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="q">No. Tlp Rumah</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tlp_rumah ?></td>
                        </tr>
                        <tr>
                            <td class="q">No. HP</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hp ?></td>
                        </tr>
                        <tr>
                            <td class="q">Alamat Domisili</td>
                            <td class="n">:</td>
                            <td class="a">
                                <p style="max-width:100px"><?= $key->domisili ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="q">Kode Post</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->post ?></td>
                        </tr>
                        <tr>
                            <td class="q">Lama Tinggal</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->lama_tinggal ?></td>
                        </tr>
                        <tr>
                            <td class="q">Status Rumah</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->status_rmh ?></td>
                        </tr>
                        <tr>
                            <td class="q">Status Perkawinan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->status_kawin ?></td>
                        </tr>
                        <tr>
                            <td class="q">Agama</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->agama ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Ibu Kandung</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ibu ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Data Kekayaan</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">Harga Rumah</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_rumah ?></td>
                        </tr>
                        <tr>
                            <td class="q">Harga Mobil</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_mobil ?></td>
                        </tr>
                        <tr>
                            <td class="q">Harga Motor</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_motor ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="q">Harga Tanah</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_tanah ?></td>
                        </tr>
                        <tr>
                            <td class="q">Harga Emas</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_emas ?></td>
                        </tr>
                        <tr>
                            <td class="q">Harga Saham</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_saham ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Data Pekerjaan Pemohon</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">Nama Perusahaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->pt ?></td>
                        </tr>
                        <tr>
                            <td class="q">Lama Bekerja</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->lama_bekerja ?></td>
                        </tr>
                        <tr>
                            <td class="q">Bagian / Divisi</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->divisi ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Atasan Langsung</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->atasan ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="q">Alamat Perusahaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->alamat_pt ?></td>
                        </tr>
                        <tr>
                            <td class="q">Tlp. Perusahaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tlp_pt ?></td>
                        </tr>
                        <tr>
                            <td class="q">Ext.</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ext_pt ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Data Suami/Istri</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">Nama Istri / Suami</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->nama_istri ?></td>
                        </tr>
                        <tr>
                            <td class="q">Pekerjaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Perusahaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->pt_istri ?></td>
                        </tr>
                        <tr>
                            <td class="q">Bagian / Divisi</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->divisi_istri ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="q">Lama Bekerja</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->lama_bekerja_istri ?></td>
                        </tr>
                        <tr>
                            <td class="q">Tlp. Perusahaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tlp_istri ?></td>
                        </tr>
                        <tr>
                            <td class="q">Ext</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ext_istri ?></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

    </div>
   
    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Detail Pembiayaan</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">Jumlah Dimohon</td>
                            <td class="n">:</td>
                            <td class="a"><?= rupiah($key->jumlah_dimohon) ?></td>
                        </tr>
                        <tr>
                            <td class="q">Lama Pembiayaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tenor ?></td>
                        </tr>
                        <tr>
                            <td class="q">Kesanggupan membayar</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->bayar_perbulan ?></td>
                        </tr>

                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="q">Tujuan pembiayaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tujuan ?></td>
                        </tr>
                        <tr>
                            <td class="q">DP </td>
                            <td class="n">:</td>
                            <td class="a"><?= rupiah($key->dp) ?></td>
                        </tr>
                        <tr>
                            <td class="q">Jaminan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->agunan ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
    <div style="font-size:10px;">
        <div style="background-color: #616161;">
            <h5 style="text-align: center;color: white;">Data Asset</h5>
        </div>
        <table style="width: 100%; padding:10px">
            <tr>
                <td>
                    <h5>Fixed Asset</h5>
                    <table>
                        <tr>
                            <td class="q">Jenis Asset</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->asset ?></td>
                        </tr>
                        <tr>
                            <td class="q">Alamat Agunan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->alamat_agunan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Harga Jual</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hrg_jual ?></td>
                        </tr>
                        <tr>
                            <td class="q">Bukti Kepemilikan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->bukti ?></td>
                        </tr>
                        <tr>
                            <td class="q">Atas Nama Kepemilikan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->an_pemklik ?></td>
                        </tr>
                        <tr>
                            <td class="q">Telp. Pemilik</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tlp_milik ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <h5>Moveable Asset</h5>
                    <table>
                        <tr>
                            <td class="q">Jenis Asset</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->jns_kendaraan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Typen</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->type ?></td>
                        </tr>
                        <tr>
                            <td class="q">Tahun Kendaraan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->tahun_kendaraan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nomor Mesin</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->no_mesin ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nomor Rangka</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->no_rangka ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Dealer</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->nama_dealer ?></td>
                        </tr>
                        <tr>
                            <td class="q">Tlp. Dealer</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hp_dealer ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>



</body>

</html>