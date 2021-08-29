<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembiayaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_global', 'mapp');
        $this->load->helper('tgl_indo');
        $this->load->helper('rupiah');
    }

    var $simpanan = 'tb_pembiayaan';


    public function getAll()
    {
        $datas = $this->db->get($this->simpanan)->result();
        $no = 0;
        $pemohon = [];
        foreach ($datas as $data) {
            $pemohon[$no++] = array(
                // data pembiayaan
                'id_pengajuan' => $data->id_pengajuan,
                'created_at'    => longdate_indo($data->created_at),
                'kode_pembiayaan'    => $data->kode_pembiayaan,
                'jns_biaya'    => $data->jns_biaya,
                'pengajuan'    => $data->pengajuan,

                // data pribadi 
                'nama'    => $data->nama,
                'ttl'    => $data->ttl,
                'pendidikan'    => $data->pendidikan,
                'ktp'    => $data->ktp,
                'npwp'    => $data->npwp,
                'sex'    => $data->sex,
                'alamat_ktp'    => $data->alamat_ktp,
                'kode_pos'    => $data->kode_pos,
                'tlp_rumah'    => $data->tlp_rumah,
                'hp'    => $data->hp,

                // data domisili 
                'domisili'    => $data->domisili,
                'post'    => $data->post,
                'lama_tinggal'    => $data->lama_tinggal,
                'status_rmh'    => $data->status_rmh,
                'status_kawin'    => $data->status_kawin,
                'agama'    => $data->agama,
                'ibu'    => $data->ibu,

                // data kekayaan 
                'hrg_rumah'    => $data->hrg_rumah,
                'hrg_mobil'    => $data->hrg_mobil,
                'hrg_motor'    => $data->hrg_motor,
                'hrg_tanah'    => $data->hrg_tanah,
                'hrg_emas'    => $data->hrg_emas,
                'hrg_saham'    => $data->hrg_saham,

                // data pekerjaan 
                'pt'    => $data->pt,
                'lama_bekerja'    => $data->lama_bekerja,
                'divisi'    => $data->divisi,
                'atasan'    => $data->atasan,
                'alamat_pt'    => $data->alamat_pt,
                'tlp_pt'    => $data->tlp_pt,
                'ext_pt'    => $data->ext_pt,

                // data pasangan 
                'nama_istri'    => $data->nama_istri,
                'pekerjaan'    => $data->pekerjaan,
                'pt_istri'    => $data->pt_istri,
                'lama_bekerja_istri'    => $data->lama_bekerja_istri,
                'tlp_pt'    => $data->tlp_pt,
                'ext_istri'    => $data->ext_istri,

                // penghasilan pemohon 
                'penghasilan'    => $data->penghasilan,
                'penghasilan_add'    => $data->penghasilan_add,
                'penghasilan_istri'    => $data->penghasilan_istri,
                'total_penghasilan'    => $data->total_penghasilan,
                'family'    => $data->family,
                'out_rutin'    => $data->out_rutin,
                'hutang'    => $data->hutang,
                'sisa'    => $data->sisa,

                // pengajuan pembiayaan 
                'jumlah_dimohon'    => rupiah($data->jumlah_dimohon),
                'tenor'    => $data->tenor,
                'bayar_perbulan'    => $data->bayar_perbulan,

                // data asset diam
                'asset'    => $data->asset,
                'alamat_agunan'    => $data->alamat_agunan,
                'hrg_jual'    => $data->hrg_jual,
                'bukti'    => $data->bukti,
                'an_pemilik'    => $data->an_pemilik,
                'tlp_milik'    => $data->tlp_milik,

                // data asset bergerak 
                'jns_kendaraan'    => $data->jns_kendaraan,
                'merek'    => $data->merek,
                'jual_kendaraan'    => $data->jual_kendaraan,
                'type'    => $data->type,
                'tahun_kendaraan'    => $data->tahun_kendaraan,
                'no_mesin'    => $data->no_mesin,
                'no_rangka'    => $data->no_rangka,
                'nama_dealer'    => $data->nama_dealer,
                'hp_dealer'    => $data->hp_dealer,
            );
        }

        
        echo json_encode($pemohon);
    }

    public function getBy()
    {
        $this->db->where('id_pengajuan', $_POST['id']);
        $data = $this->db->get($this->simpanan)->row();

        $pemohon = array(
            // data pembiayaan
            'id_pengajuan' => $data->id_pengajuan,
            'created_at'    => longdate_indo($data->created_at),
            'kode_pembiayaan'    => $data->kode_pembiayaan,
            'jns_biaya'    => $data->jns_biaya,
            'pengajuan'    => $data->pengajuan,

            // data pribadi 
            'nama'    => $data->nama,
            'ttl'    => $data->ttl,
            'pendidikan'    => $data->pendidikan,
            'ktp'    => $data->ktp,
            'npwp'    => $data->npwp,
            'sex'    => $data->sex,
            'alamat_ktp'    => $data->alamat_ktp,
            'kode_pos'    => $data->kode_pos,
            'tlp_rumah'    => $data->tlp_rumah,
            'hp'    => $data->hp,

            // data domisili 
            'domisili'    => $data->domisili,
            'post'    => $data->post,
            'lama_tinggal'    => $data->lama_tinggal.' tahun',
            'status_rmh'    => $data->status_rmh,
            'status_kawin'    => $data->status_kawin,
            'agama'    => $data->agama,
            'ibu'    => $data->ibu,

            // data kekayaan 
            'hrg_rumah'    => rupiah($data->hrg_rumah),
            'hrg_mobil'    => rupiah($data->hrg_mobil),
            'hrg_motor'    => rupiah($data->hrg_motor),
            'hrg_tanah'    => rupiah($data->hrg_tanah),
            'hrg_emas'    => rupiah($data->hrg_emas),
            'hrg_saham'    => rupiah($data->hrg_saham),

            // data pekerjaan 
            'pt'    => $data->pt,
            'lama_bekerja'    => $data->lama_bekerja.' tahun',
            'divisi'    => $data->divisi,
            'atasan'    => $data->atasan,
            'alamat_pt'    => $data->alamat_pt,
            'tlp_pt'    => $data->tlp_pt,
            'ext_pt'    => $data->ext_pt,

            // data pasangan 
            'nama_istri'    => $data->nama_istri,
            'pekerjaan'    => $data->pekerjaan,
            'pt_istri'    => $data->pt_istri,
            'divisi_istri'    => $data->divisi_istri,
            'lama_bekerja_istri'    => $data->lama_bekerja_istri.' tahun',
            'tlp_istri'    => $data->tlp_istri,
            'ext_istri'    => $data->ext_istri,

            // penghasilan pemohon 
            'penghasilan'    => rupiah($data->penghasilan),
            'penghasilan_add'    => rupiah($data->penghasilan_add),
            'penghasilan_istri'    => rupiah($data->penghasilan_istri),
            'total_penghasilan'    => rupiah($data->total_penghasilan),
            'family'    => rupiah($data->family),
            'out_rutin'    => rupiah($data->out_rutin),
            'hutang'    => rupiah($data->hutang),
            'sisa'    => rupiah($data->sisa),

            // pengajuan pembiayaan 
            'jumlah_dimohon'    => rupiah($data->jumlah_dimohon),
            'tenor'    => $data->tenor,
            'bayar_perbulan'    => rupiah($data->bayar_perbulan),

            // data asset diam
            'asset'    => $data->asset,
            'alamat_agunan'    => $data->alamat_agunan,
            'hrg_jual'    => rupiah($data->hrg_jual),
            'bukti'    => $data->bukti,
            'an_pemilik'    => $data->an_pemilik,
            'tlp_milik'    => $data->tlp_milik,

            // data asset bergerak 
            'jns_kendaraan'    => $data->jns_kendaraan,
            'merek'    => $data->merek,
            'jual_kendaraan'    => $data->jual_kendaraan,
            'type'    => $data->type,
            'tahun_kendaraan'    => $data->tahun_kendaraan,
            'no_mesin'    => $data->no_mesin,
            'no_rangka'    => $data->no_rangka,
            'nama_dealer'    => $data->nama_dealer,
            'hp_dealer'    => $data->hp_dealer,
        );
        // var_dump($data);
        echo json_encode($pemohon);
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        if ($id) {

            $level = $this->session->userdata('level');
            $table = 'tb_user';
            $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
            $data['title'] = 'Pembiayaan';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['menu'] = $this->db->get('tb_menu')->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $data['pembiayaan'] = $this->db->get('tb_pembiayaan')->result_array();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/v_pembiayaan', $data);
            $this->load->view('admin/footer', $data);
        } else {
            redirect('uuth');
        }
    }

    public function add()

    {
        $this->form_validation->set_rules('nama', 'Nama Pengaju', 'trim|required');

        $data = array(
            // Data Pemohon 
            'created_at' => date('Y-m-d'),
            'kode_pembiayaam' => $_POST['kode_pembiayaam'],
            'jns_biaya' => $_POST['jns_biaya'],
            'pengajuan' => $_POST['pengajuan'],
            'nama' => htmlspecialchars($_POST['nama']),
            'ttl' => htmlspecialchars($_POST['ttl']),
            'pendidikan' => htmlspecialchars($_POST['pendidikan']),
            'ktp' => htmlspecialchars($_POST['ktp']),
            'npwp' => htmlspecialchars($_POST['npwp']),
            'sex' => htmlspecialchars($_POST['sex']),
            'alamat' => htmlspecialchars($_POST['alamat']),
            'kode_pos' => htmlspecialchars($_POST['kode_pos']),
            'tlp' => htmlspecialchars($_POST['tlp']),
            'hp' => htmlspecialchars($_POST['hp']),
            'email' => htmlspecialchars($_POST['email']),
            'domisili' => htmlspecialchars($_POST['domisili']),
            'kode' => htmlspecialchars($_POST['kode']),
            'lama_tgl' => htmlspecialchars($_POST['lama_tgl']),
            'sts_rumah' => $_POST['sts_rumah'],
            'sts_kawin' => htmlspecialchars($_POST['sts_kawin']),
            'agama' => htmlspecialchars($_POST['agama']),
            'ibu' => htmlspecialchars($_POST['ibu']),

            // Data Kekayaan 
            'hrg_rumah' => htmlspecialchars($_POST['hrg_rumah']),
            'hrg_mobil' => htmlspecialchars($_POST['hrg_mobil']),
            'hrg_motor' => $_POST['hrg_motor'],
            'hrg_tanah' => htmlspecialchars($_POST['hrg_tanah']),
            'hrg_emas' => $_POST['hrg_emas'],
            'hrg_saham' => $_POST['hrg_saham'],

            // Data perusahaan 
            'nama_pt' => htmlspecialchars($_POST['nama_pt']),
            'lama_kerja' => $_POST['lama_kerja'],
            'divisi' => $_POST['divisi'],
            'atasan' => $_POST['atasan'],
            'jabatan' => $_POST['jabatan'],
            'alamat_pt' => $_POST['alamat_pt'],
            'ext_pt' => $_POST['ext_pt'],

            // Data pasangan 
            'nama_istri' => htmlspecialchars($_POST['nama_istri']),
            'pekerjaan' => $_POST['pekerjaan'],
            'divisi_istri' => $_POST['divisi_istri'],
            'lm_bekerja' => $_POST['lm_bekerja'],
            'tlp_istri' => $_POST['tlp_istri'],

            // data penghasilan perbulan 
            'income' => htmlspecialchars($_POST['income']),
            'income_add' => $_POST['income_add'],
            'imcome_istri' => $_POST['imcome_istri'],
            'total_income' => $_POST['total_income'],
            'tanggungan' => $_POST['tanggungan'],
            'rutin_perbulan' => $_POST['rutin_perbulan'],
            'hutang' => $_POST['hutang'],
            'sisa' => $_POST['sisa'],

            // Detail Pembiayaan 
            'jumlah_dimohon' => $_POST['jumlah_dimohon'],
            'tenor' => $_POST['tenor'],
            'angsuran' => $_POST['angsuran'],

            // Data asset fixed 
            'jns_asset' => htmlspecialchars($_POST['jns_asset']),
            'alamat_asset' => $_POST['alamat_asset'],
            'hrg_asset' => $_POST['hrg_asset'],
            'bukti_milik' => $_POST['bukti_milik'],
            'an_milik' => $_POST['an_milik'],
            'tlp_milik' => $_POST['tlp_milik'],

            // Data agunan non fixed 
            'jns_kendataan' => htmlspecialchars($_POST['jns_kendataan']),
            'merek' => $_POST['merek'],
            'tipe' => $_POST['tipe'],
            'tahun' => $_POST['tahun'],
            'no_mesin' => $_POST['no_mesin'],
            'no_rangka' => $_POST['no_rangka'],
            'dealer' => $_POST['dealer'],
            'tlp_dealer' => $_POST['tlp_dealer'],
        );

        if ($this->form_validation->run() == TRUE) {
            $this->db->insert('tb_pembiayaan', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data Anda telah masuk ke sistem kami, tim kami akan segera memproses pengajuan Anda</div>');
            redirect('home/pembiayaan');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. Data Anda gagal terinput, silahkan coba lagi</div>');
            redirect('home/pembiayaan');
        }
    }

    public function editSlider($id)
    {
        $config['upload_path']          = './asset/img/slide/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
        $this->form_validation->set_rules('caption', 'Caption Slider', 'trim|required');


        $nama = htmlspecialchars($this->input->post('nama'));
        $caption = htmlspecialchars($this->input->post('caption'));

        $data = array(
            'nama' => $nama,
            'caption' => $caption
        );

        if (!$this->upload->do_upload('img')) {
            $this->upload->display_errors();
        } else {
            $img = $this->upload->data('file_name');
            $this->db->set('img', $img);
        };

        if ($this->form_validation->run() == TRUE) {
            $this->db->where('id_slider', $id);
            $this->db->update('tb_slider', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
            redirect('slider');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
            redirect('slider');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_slider', $id);
        $this->db->delete('tb_slider');
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dihapus</div>');
        redirect('slider');
    }
}
