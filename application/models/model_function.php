<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_function extends CI_Model {

    function cekadmin()
    {
        if($this->session->userdata('idadmin')=="")
        {
            redirect('admin/sign');
        }
    }

    function cekuser()
    {
        if($this->session->userdata('iduser')=="")
        {
            redirect('sign');
        }
    }

	function antiInjections($string) {
	    $string = stripslashes($string);
	    $string = strip_tags($string);
	    $string = mysql_real_escape_string($string);
	    return $string;
	}

	function tanggal($tanggal) {

    $array_bulan = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "Nopember", "Desember");

    $tanggalnya = substr($tanggal, 8, 2);
    $bulannya = $array_bulan[ceil(substr($tanggal, 5, 2)) - 1];
    $tahunnya = substr($tanggal, 0, 4);
    $jamnya = substr($tanggal, 11, 2);
    $menitnya = substr($tanggal, 14, 2);
    $detiknya = substr($tanggal, 17, 2);
    if( $jamnya!=""){
        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya . " " . $jamnya . ":" . $menitnya . " WIB";
    }else{
        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya;
    }

    return $tglsekarang;
}

    function rupiah($uang) {
    $rp = "";
    $digit = strlen($uang);

    while ($digit > 3) {
        $rp = "." . substr($uang, -3) . $rp;
        $lebar = strlen($uang) - 3;
        $uang = substr($uang, 0, $lebar);
        $digit = strlen($uang);
    }
    $rp = $uang . $rp . ",-";
    return "Rp. " . $rp;
}

    function upload($path){
        $this->load->helper(array('form', 'url'));
        $config['upload_path']          = BASEPATH.$path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo "<script>alert('";
            print_r($error);
            echo "');</script>";
        }
        else
        {
            $data =  $this->upload->data();
            return $data['file_name'];
        }
    }

    function bulan($bln) {

        $array_bulan = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "Nopember", "Desember");

        $bulannya = $array_bulan[ceil($bln) - 1];

        return $bulannya;
    }

}
?>