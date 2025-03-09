<?php

function is_admin()
{
    $ci = get_instance();

    $data = [
        'username' => $ci->session->userdata('username'),
        'akses' => $ci->session->userdata('akses'),
    ];

    if ($data) {
        if ($data['akses'] != 1) {
            redirect('block');
            // echo "hayoo kamu mau kemana!";
        }
    } else {
        redirect('auth');
    }
}

function is_siswa()
{
    $ci = get_instance();

    $data = [
        'username' => $ci->session->userdata('username'),
        'akses' => $ci->session->userdata('akses'),
    ];

    if ($data) {
        if ($data['akses'] != 2) {
            redirect('block');
            // echo "hayoo kamu mau kemana Ssiwa!";
        }
    } else {
        redirect('auth');
    }
}

?>