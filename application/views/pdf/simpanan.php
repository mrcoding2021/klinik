<html>

<head>
    <title>Cetak PDF</title>
</head>

<body>
    <div style="text-align: center;">                
        <h3>FORM PENGAJUAN PERMOHONAN SIMPANAN</h3>
        <H5 style="margin-top: -10px;">KSPPS BMT BINA USAHA MANDIRI INDONESIA
            (BMT BUMI)</H5>
    </div>

    <div style="font-size:18px;">
        <div style="background-color: #616161;">                                                 
            <h4 style="text-align: center;color: white;"><?= $key->nama.' | '. $key->simpanan ?></h4>
        </div>
        <table style="width: 100%; padding:12px"> 
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="q">Tanggal Pengajuan</td>
                            <td class="n">:</td>
                            <td class="a"><?= longdate_indo($key->created_at) ?></td>
                        </tr>
                        <tr>
                            <td class="q">Kode Simpanan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->kode_simpanan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Nama Pemohon</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->nama ?></td>
                        </tr>
                        <tr>
                            <td class="q">No. KTP</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ktp ?></td>
                        </tr>
                        <tr>
                            <td class="q" style="max-width:100px">Alamat Domisili</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->alamat ?></td>
                        </tr>
                        <tr>
                            <td class="q">Email</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->email ?></td>
                        </tr>
                        <tr>
                            <td class="q">Pekerjaan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->kerja ?></td>
                        </tr>
                        <tr>
                            <td class="q">Ibu Kandung</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->ibu ?></td>
                        </tr>
                        <tr>
                            <td class="q">Ahli Waris</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->waris ?></td>
                        </tr>
                        <tr>
                            <td class="q">Hubungan Ahli Waris</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->hub_waris ?></td>
                        </tr>
                        <tr>
                            <td class="q">Waktu Setoran</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->setor ?></td>
                        </tr>
                        <tr>
                            <td class="q">Produk Simpanan</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->simpanan ?></td>
                        </tr>
                        <tr>
                            <td class="q">Basil Potong Zakat</td>
                            <td class="n">:</td>
                            <td class="a"><?= $key->basil ?></td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>

    </div>




</body>

</html>