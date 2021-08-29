<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function rupiah($data){
    $rupiah = "Rp ". number_format($data,0,',','.').',-';
    return $rupiah;
}
