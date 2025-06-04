<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_superadmin');
        $this->load->model('M_pasien');
        if ($this->session->has_userdata('is_Loggin') != true) {
            redirect('/');
        }
    }

    public function index()
    {
        // Default
        $this->data['title'] = 'Manajemen';
        $this->data['menuManajemen'] = [
            'Dashboard'     => 'active',
            'data_pasien'        => '',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->data['total_pasien'] = $this->M_superadmin->get_total_pasien();
        $this->data['total_log'] = $this->M_superadmin->get_total_log();

        $this->template->load('template/default/template', 'manajemen/index', $this->data);
    }

    public function data_pasien()
    {
        // Default
        $this->data['title'] = 'Data Pasien';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => 'active',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/data_pasien', $this->data);
    }

    public function get_pasien()
    {
        header('Content-Type: application/json');

        $logs = $this->M_superadmin->get_pasien();

        if (!$logs) {
            echo json_encode(["data" => []]);
            return;
        }

        // Ubah dari array biasa ke format JSON yang benar
        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                "nama_pasien"     => htmlspecialchars($log['nama_pasien']),
                "tanggal_lahir"   => date('d/m/Y', strtotime($log['tanggal_lahir'])),
                "no_whatsapp"     => htmlspecialchars($log['no_whatsapp']),
                "kamar"           => htmlspecialchars($log['kamar'] ?? ""),
                "jaminan"           => htmlspecialchars($log['jaminan'] ?? ""),
                "created_at"      => date('d/m/Y H:i:s', strtotime($log['created_at'])),
                "updated_at"      => date('d/m/Y H:i:s', strtotime($log['updated_at'])),
                "id_pasien"       => $log['id_pasien']
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }

    public function log_SendWhatsApp()
    {
        // Default
        $this->data['title'] = 'History Pengiriman WhatsApp SIAP';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => '',
            'log_WA'        => 'active',
            'status_pesan' => ''
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/log_sendWA', $this->data);
    }

    public function get_log_WhatsApp()
    {
        header('Content-Type: application/json');

        $this->load->model('M_superadmin');
        $logs = $this->M_superadmin->get_log_WhatsApp();

        if (!$logs) {
            echo json_encode(["data" => []]);
            return;
        }

        // Ubah dari array biasa ke format JSON yang benar
        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                "tgl_kirim" => date('d/m/Y H:i:s', strtotime($log['tgl_kirim'])),
                "nama_pasien" => htmlspecialchars($log['nama_pasien']),
                "kamar" => htmlspecialchars($log['kamar'] ?? ""), // Pastikan tidak null
                "nomor_pasien" => htmlspecialchars($log['nomor_pasien']),
                "username_pengirim" => htmlspecialchars($log['username_pengirim']),
                "nama_status" => htmlspecialchars($log['nama_status'])
            ];
        }

        echo json_encode(["data" => $data], JSON_PRETTY_PRINT);
    }

    // ============= LAPORAN =============
    public function m_lap_pasien()
    {
        // Default
        $this->data['title'] = 'Tarik Laporan Data Pasien by Excel';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => '',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownManajemen'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => 'active'
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/m_lap_pasien', $this->data);
    }

    public function m_lap_log_wa()
    {
        // Default
        $this->data['title'] = 'Tarik Laporan Log WhatsApp by Excel';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => '',
            'log_WA'        => '',
            'status_pesan' => ''
        ];

        // MENU LAPORAN
        $this->data['dropdownManajemen'] = [
            'nav' => 'nav-item-open',
            'style' => 'display: block;',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => 'active',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $this->template->load('template/default/template', 'manajemen/m_lap_log_wa', $this->data);
    }

    // ============= LAPORAN =============


    // ========================== LAPORAN ==================================
    public function export_lap_pasien_all()
    {
        $data = $this->M_superadmin->get_all_pasien_lap();
        $this->_export_all_data_pasien($data, 'Semua_Data_Pasien');
    }

    public function export_lap_log_all()
    {
        $data = $this->M_superadmin->get_log_WhatsApp();
        $this->_export_all_data_log_wa($data, 'Semua_History_Pengiriman');
    }

    // ==================================================== START FUNCTION EXPORT EXCEL ====================================================
    public function export_lap_pasien_by_date()
    {
        $start_date_input = $this->input->get('dari_tanggal');
        $end_date_input = $this->input->get('sampai_tanggal');
        // var_dump($start_date_input);
        // var_dump($start_date_input);
        // die;
        if (!$start_date_input || !$end_date_input) {
            $this->session->set_flashdata('error', 'Invalid date range.');
            redirect('users/manajemen/m_lap_pasien');
            return;
        }

        // Konversi format
        // $start_date = DateTime::createFromFormat('m/d/Y', $start_date_input)->format('Y-m-d');
        // $end_date = DateTime::createFromFormat('m/d/Y', $end_date_input)->format('Y-m-d');

        // Model Query
        $data = $this->M_superadmin->get_pasien_by_date($start_date_input, $end_date_input);

        // Debug hasil data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        if (empty($data)) {
            $this->session->set_flashdata('error', 'No data available for the selected date range.');
            redirect('users/manajemen/m_lap_pasien');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $spreadsheet->getProperties()->setCreator('export by Manajemen')
            ->setTitle('export Data Pasien by Manajemen')
            ->setDescription('Dari ' . $start_date_input . ' Sampai ' . $end_date_input);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Pasien')
            ->setCellValue('C1', 'Tanggal Lahir')
            ->setCellValue('D1', 'No WhatsApp')
            ->setCellValue('E1', 'Ruangan')
            ->setCellValue('F1', 'Jaminan')
            ->setCellValue('G1', 'Tanggal Input');

        $row = 2;
        $no = 1;
        foreach ($data as $datPasien) {
            $sheet->setCellValue('A' . $row, $no++)
                ->setCellValue('B' . $row, $datPasien['nama_pasien'])
                ->setCellValue('C' . $row, date('d-m-Y', strtotime($datPasien['tanggal_lahir'])))
                ->setCellValueExplicit('D' . $row, $datPasien['no_whatsapp'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('E' . $row, $datPasien['kamar'])
                ->setCellValue('F' . $row, $datPasien['jaminan'])
                ->setCellValue('G' . $row, date('d-m-Y H:i:s', strtotime($datPasien['created_at'])));
            $row++;
        }

        $filename = 'Data Pasien_' . date('d-m-Y', strtotime($start_date_input)) . ' sampai ' . date('d-m-Y', strtotime($end_date_input)) . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    private function _export_all_data_pasien($data, $filename = 'Data_Pasien')
    {
        $spreadsheet = $this->excel->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Pasien');
        $sheet->setCellValue('C1', 'Tanggal Lahir');
        $sheet->setCellValue('D1', 'No WhatsApp');
        $sheet->setCellValue('E1', 'Ruangan');
        $sheet->setCellValue('F1', 'Jaminan');
        $sheet->setCellValue('G1', 'Tanggal Input');

        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d->nama_pasien);
            $sheet->setCellValue('C' . $row, date('d-m-Y', strtotime($d->tanggal_lahir)));
            $sheet->setCellValueExplicit('D' . $row, $d->no_whatsapp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('E' . $row, $d->kamar);
            $sheet->setCellValue('F' . $row, $d->jaminan);
            $sheet->setCellValue('G' . $row, date('d-m-Y H:i:s', strtotime($d->created_at)));
            $row++;
        }

        // Set nama file
        $filename .= '_' . date('d-m-Y') . '.xlsx';

        // Set header untuk download
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = $this->excel->createWriter($spreadsheet);
        $writer->save('php://output');
    }

    public function export_lap_log_WA_by_date()
    {
        $start_date_input = $this->input->get('dari_tanggal');
        $end_date_input = $this->input->get('sampai_tanggal');

        // print_r($start_date_input);
        // print_r($end_date_input);

        // Tambahkan waktu untuk rentang penuh dalam satu hari
        $start_datetime = $start_date_input . ' 00:00:00';
        $end_datetime   = $end_date_input . ' 23:59:59';

        if (!$start_datetime || !$end_datetime) {
            $this->session->set_flashdata('error', 'Invalid date range.');
            redirect('users/manajemen/m_lap_log_wa');
            return;
        }

        // Model Query
        $data = $this->M_superadmin->get_log_by_date($start_datetime, $end_datetime);

        // Debug hasil data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        if (empty($data)) {
            $this->session->set_flashdata('error', 'No data available for the selected date range.');
            redirect('users/manajemen/m_lap_log_wa');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $spreadsheet->getProperties()->setCreator('export by Manajemen')
            ->setTitle('export Data Log WA by Manajemen')
            ->setDescription('Dari ' . $start_date_input . ' Sampai ' . $end_date_input);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal Kirim')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'Ruangan')
            ->setCellValue('E1', 'Nomor WhatsApp')
            ->setCellValue('F1', 'Pesan Status')
            ->setCellValue('G1', 'Pengirim Pesan')
            ->setCellValue('H1', 'Pesan Status');

        $row = 2;
        $no = 1;
        foreach ($data as $datLog) {
            $sheet->setCellValue('A' . $row, $no++)
                ->setCellValue('B' . $row, date('d-m-Y H:i:s', strtotime($datLog['tgl_kirim'])))
                ->setCellValue('C' . $row, $datLog['nama_pasien'])
                ->setCellValue('D' . $row, $datLog['kamar'])
                ->setCellValueExplicit('E' . $row, $datLog['nomor_pasien'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('F' . $row, $datLog['nama_status'])
                ->setCellValue('G' . $row, $datLog['username_pengirim'])
                ->setCellValue('H' . $row, $datLog['pesan_whatsapp']);
            $row++;
        }

        $filename = 'Data Log WhatsApp_' . date('d-m-Y', strtotime($start_datetime)) . ' sampai ' . date('d-m-Y', strtotime($end_datetime)) . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    private function _export_all_data_log_wa($data, $filename = 'History_Pengiriman')
    {
        $spreadsheet = $this->excel->createSpreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Kirim');
        $sheet->setCellValue('C1', 'Nama Pasien');
        $sheet->setCellValue('D1', 'Ruangan');
        $sheet->setCellValue('E1', 'Nomor WhatsApp');
        $sheet->setCellValue('F1', 'Pesan Status');
        $sheet->setCellValue('G1', 'Pengirim Pesan');
        $sheet->setCellValue('H1', 'Pesan Status');

        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, date('d-m-Y H:i:s', strtotime($d['tgl_kirim'])));
            $sheet->setCellValue('C' . $row, $d['nama_pasien']);
            $sheet->setCellValue('D' . $row, $d['kamar']);
            $sheet->setCellValueExplicit('E' . $row, $d['nomor_pasien'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('F' . $row, $d['nama_status']);
            $sheet->setCellValue('G' . $row, $d['username_pengirim']);
            $sheet->setCellValue('H' . $row, $d['pesan_whatsapp']);
            $row++;
        }

        // Set nama file
        $filename .= '_' . date('d-m-Y') . '.xlsx';

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = $this->excel->createWriter($spreadsheet);
        $writer->save('php://output');
    }

    // ==================================================== END FUNCTION EXPORT EXCEL ====================================================

    // ========================== END LAPORAN ==============================

    public function status_pengiriman_pesan()
    {
        // Default
        $this->data['title'] = 'Status Pengiriman Whatsapp';
        $this->data['menuManajemen'] = [
            'Dashboard'     => '',
            'data_pasien'        => '',
            'log_WA'        => '',
            'status_pesan' => 'active'
        ];

        $this->data['dropdownManajemen'] = [
            'nav' => '',
            'style' => '',
            // nav : nav-item-open
            // style : display: block;
        ];
        $this->data['linkManajemen'] = [
            // LINK ACTIVE
            'linkLapLogWA' => '',
            'linkLapPasien' => ''
        ];
        // END Default

        // WAJIB ADA
        $session = $this->session->userdata('username');
        $this->data['user'] = $this->M_superadmin->getuser($session)->row_array();
        // WAJIB ADA

        $status = $this->input->get('status');
        $this->data['data_pesan'] = $this->M_superadmin->get_status_pesan(100, $status);
        $this->data['filter_status'] = $status;
        $this->template->load('template/default/template', 'manajemen/log_UltraMsg', $this->data);
    }

    public function get_log_pesan_ajax()
    {
        $status = $this->input->get('status');
        $data_pesan = $this->M_superadmin->get_status_pesan(100, $status);

        // Jika butuh sorting di PHP:
        usort($data_pesan, function ($a, $b) {
            return ($b['sent_at'] ?? 0) - ($a['sent_at'] ?? 0);
        });

        $output = ['data' => $data_pesan];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }
}
