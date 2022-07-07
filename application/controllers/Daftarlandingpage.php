<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarLandingPage extends MY_Controller {
    
    public function index(){
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
        ];

        $data['title'] = "Form Pendaftaran Landing Page New Cluster Emeralda Resort";

        $this->load->view("sales/registrasi", $data);
    }

    public function kalkulator(){
        $this->load->view("sales/kalkulator");
    }

    // public function index(){
    //     $data['js'] = [
    //         "ajax.js",
    //         "function.js",
    //         "helper.js",
    //     ];

    //     $data['title'] = "Form Landing Page Klaster Nayanika";
    //     $data['data_title'] = "Form Landing Page <br>www.sakinahmountainview.com";
    //     $this->load->view("sales/registrasi", $data);
    // }

    public function add_registrasi_marketing(){
        $project = ["emeralda-kolmas"];

        $panggilan = $this->input->post("panggilan");
        $nama_panggilan = $this->input->post("nama_panggilan");
        $nama = $this->input->post("nama");
        $no_wa = $this->input->post("no_wa");
        $email = $this->input->post("email");
        $id_name = $this->input->post("id_name");

        foreach ($project as $project) {
            $data = [
                "id_name" => $id_name,
                "nama" => $nama,
                "nama_panggilan" => $nama_panggilan,
                "panggilan" => $panggilan,
                "no_wa" => $no_wa,
                "email" => $email,
                "project" => $project,
            ];
    
            $this->daftarlandingpage->add_data("marketing", $data);
        }

        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $to = $email;
        $subject = 'Link Landing Page';

        $web = "https://emeralda.launchproperty.net/{$id_name}";

        $message = "
            <h3>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page</h3>
            <p><b>Berikut Landing Page Yang Telah Anda Buat : </b></p>
            <ol>
                <li><b>New Cluster Emeralda Resort</b> <br> {$web}<br><br></li>
            </ol>
            <p>Dan berikut data diri Anda : </p>
            
            <table style='margin-left: 20px'>
                <tr>
                    <td>&#9830; Panggilan</td>
                    <td>: {$panggilan}</td>
                </tr>
                <tr>
                    <td>&#9830; Nama Lengkap</td>
                    <td>: {$nama}</td>
                </tr>
                <tr>
                    <td>&#9830; Nama Panggilan</td>
                    <td>: {$nama_panggilan}</td>
                </tr>
                <tr>
                    <td>&#9830; No. WhatsApp</td>
                    <td>: {$no_wa}</td>
                </tr>
                <tr>
                    <td>&#9830; Email</td>
                    <td>: {$email}</td>
                </tr>
            </table>
            
            <p>Nah selanjutnya, inilah beberapa <b>TIPS & TRICK</b> cara penggunaan Landing Page</p>
            <p>Namun sebelum itu, yuk pahami terlebih dahulu <b>cara kerja</b> dari Landing Page itu sendiri</p>
            <ol type='radio'>
                <li>Pilih Landing Page produk atau project yang ingin Anda jualkan</li>
                <li>Salin (copy) link Landing Page tersebut, kemudian tempel (paste) atau share link tersebut di sosmed / platform yang Anda inginkan</li>
                <li>Landing Page tersebut adalah informasi berisi penawaran produk atau project.</li>
                <li>Di Landing Page tersebut tersedia pula konten yang isinya mengajak konsumen untuk membaca informasi yang tersedia.</li>
                <li>Jika konsumen tertarik, mereka bisa langsung menghubungi Anda dengan cara mengklik tombol &quot;Chat WhatsApp&quot; di sebelah kiri.</li>
                <li>Pada saat konsumen menekan tombol Call To Action (CTA) yang diatur sedemikian rupa (Tombol &quot;Chat WhatsApp&quot;, maka mereka akan diarahkan langsung ke WhatsApp Anda.</li>
                <li>Nah setelah sampai ke WhatsApp Anda silahkan di handling dengan baik sehingga lebih tertarik dan akhirnya mau survey dan selanjutnya membeli unit yang Anda tawarkan.</li>
            </ol>
            <p>Setelah mengetahui bagaimana cara kerjanya, selanjutnya bagaimana sih <b>cara menggunakan Landing Page</b> ini ?</p>
            <ol type='number'>
                <li>Ketika update status ataupun posting iklan, Anda bisa menyelipkan link Landing Page Anda ke dalam suatu iklan tersebut</li>
                <li>Bisa juga ketika ada sanak keluarga atau teman yang tertarik, sangat memungkinkan jika Anda mengirim link Landing Page tersebut untuk membantu menjelaskan produk kepada mereka </li>
            </ol>
            <p><b>Berikut beberapa platform yang bisa untuk share link Landing Page :</b></p>
            <ol type='number'>
                <li>WhatsApp</li>
                <li>Facebook </li>
                <li>Instagram</li>
                <li>Youtube</li>
                <li>Tiktok</li>
                <li>Marketplace </li>
                <li>dan lain sebagainya..</li>
            </ol>
            <p>Nah jika ada yang kurang dipahami, silahkan langsung konsultasikan dan tanya-tanya di grup atau ke leadernya yaa..</p>
            <p>Selamat mencoba, semoga berhasil dan mendapatkan closingan dan KOMISI yang BERKAH serta BERLIMPAH yang bisa bermanfaat untuk diri sendiri, keluarga dan juga orang lain. Aamiin Ya Allah</p>
            <p><b>Yanprolandclub</b></p>";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $replace_wa = array(
            ' ' => '%20',
            '"' => '%22',
            '@' => '%40',
            ':' => '%3A',
            '/' => '%2F',
        );

        $nama_panggilan = str_replace(array_keys($replace_wa), $replace_wa, $nama_panggilan);
        $nama = str_replace(array_keys($replace_wa), $replace_wa, $nama);
        $email = str_replace(array_keys($replace_wa), $replace_wa, $email);
        $web = str_replace(array_keys($replace_wa), $replace_wa, $web);

        $link = "https://wa.me/62881022072757?text=Halo%20Admin%2C%20Saya%20mau%20konfirmasi%20data%20landing%20page%20saya.%0ABerikut%20data%20diri%20Saya%3A%0A%E2%99%A6%20Panggilan%20%3A%20{$panggilan}%0A%E2%99%A6%20Nama%20Lengkap%09%3A%20{$nama}%0A%E2%99%A6%20Nama%20Panggilan%20%3A%20{$nama_panggilan}%0A%E2%99%A6%20No.%20WhatsApp%20%3A%20{$no_wa}%0A%E2%99%A6%20Email%20%3A%20{$email}%0A%E2%99%A6%20Landing%20Page%20%3A%20{$web}";

        $this->session->set_flashdata("pesan", "
            <div>
                <center>
                    <h2 class='mt-4 mb-4'>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page.</h2 class='mt-5'>
                </center>
                <p><b>Berikut Landing Page Yang Telah Anda Buat : </b></p>
                <ol>
                    <li class='mb-3'><b>New Cluster Emeralda Resort</b><br></li>
                </ol>
                <center>
                    <div class='mt-4'>
                        <p>Silakan cek email untuk mendapatkan link dari masing-masing landing page tersebut.<br> Oh iya, Langsung cek Email Anda sekarang, ada <b>BONUS TIPS & TRICK CARA PENGGUNAAN LANDING PAGE</b>. Cekidot!</p>
                    </div>
                    <div class='mt-4'>
                        <p>Silakan klik tombol berikut ini untuk konfirmasi pembuatan landing page Anda :</p>
                        <a href='$link' target='_blank' class='btn btn-success'>Konfirmasi</a>
                    </div>
                    <div class='mt-4'>
                        <p><b>Yanprolandclub</b></p>
                    </div>
                </center>
            </div>
        ");
        
        redirect(base_url('daftarlandingpage'));
    }

    public function add_leads(){

        $marketing = $this->daftarlandingpage->get_one("marketing", ["id" => $this->input->post("id")]);

        // var_dump($_POST);
        $data = [
            'id_marketing' => $this->input->post("id"),
            'nama' => $this->input->post("nama"),
            'no_wa' => $this->input->post("no_wa"),
            'email' => $this->input->post("email"),
            'project' => $this->input->post("project"),
        ];
        
        $id_name = $this->input->post("id_name");
        $email_marketing = $this->input->post("email_marketing");
        $query = $this->daftarlandingpage->add_data("leads", $data);

        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $to = $email_marketing;
        $project = $this->input->post("project");

        if($project == "sakinah-mountain-view"){
            $nama_project = "Sakinah Moutain View";
        }

        $subject = "Data Peminat {$nama_project}";

        $message = "
            <p>Berikut data peminat Anda yang telah download brosur {$nama_project}, silahkan di follow up maksimal ya..</p>

            <p>
                Nama : {$this->input->post('nama')} <br>
                No. WA : {$this->input->post('no_wa')}<br>
                Email : {$this->input->post('email')}
            </p>

            <p>Terima kasih, semoga berminat survey & closing. Aamiin Ya Allah</p>";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $message = "
        <p>Berikut data peminat Anda yang telah download brosur {$nama_project}, silahkan di follow up maksimal ya..</p>

        <p>
            Nama : {$this->input->post('nama')} <br>
            No. WA : {$this->input->post('no_wa')}<br>
            Email : {$this->input->post('email')}
        </p>

        <p>Terima kasih, semoga berminat survey & closing. Aamiin Ya Allah</p>
        
        <p>Leads ini di dapatkan dari : </p>
        <p>
            Nama Marketing : {$marketing['nama']}<br>
            No. WA : {$marketing['no_wa']}<br>
            Email : {$marketing['email']}
        </p>
        ";
        
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to("shariagroup1@gmail.com");
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        redirect(base_url($_POST['id_name']));
    }

    public function get_username(){
        $id_name = $this->input->post("id_name");
        $data = $this->daftarlandingpage->get_one("marketing", ["id_name" => $id_name]);
        echo json_encode($data);
    }
}