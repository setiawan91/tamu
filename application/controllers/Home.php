<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }
	
	public $data;
	
	public function index(){
		
		$this->data['nav']  = "dashboard";

		$this->load->view('header',$this->data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function listed(){
		$this->data['tamu'] = $this->m_tamu->get();
		$this->data['nav']  = "listed";

		$this->load->view('header',$this->data);
		$this->load->view('list');
		$this->load->view('footer');
	}
	
	function add(){
		//validate form input
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', 
			         array('required' => 'Nama harus diisi.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
				     array('required' => 'Email harus diisi.'));
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|integer|required', 
			         array('required' => 'No. Telpon harus diisi.'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
			         array('required' => 'Alamat harus diisi.'));
		
		if ($this->form_validation->run() == true)
		{	
			 $data['kodeunik'] = $this->m_tamu->getkodeunik();
			if( true == $this->m_tamu->insert(array(
				'nama' 		=> $this->input->post('nama'),
				'email' 	=> $this->input->post('email'),
				'telp' 		=> $this->input->post('telp'),
				'alamat' 	=> $this->input->post('alamat'),
				'kode' 	=> $data['kodeunik']
			))){
				$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> anda telah menyimpan data.</div>");
				redirect('home/listed?input-ok');
			}else{
				$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Maaf...!</b> anda gagal menyimpan data.</div>");
				redirect('home/listed?input-gagal');
			}
		}
		
		$this->data['nav']  = "tambah";

		$this->load->view('header',$this->data);
		$this->load->view('add');
		$this->load->view('footer');
	}
	
	function edit($id){
		//validate form input
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		
		if ($this->form_validation->run() == true)
		{
			if( true == $this->m_tamu->update(
				array(
					'nama' 		=> $this->input->post('nama'),
					'email' 	=> $this->input->post('email'),
					'telp' 		=> $this->input->post('telp'),
					'alamat' 	=> $this->input->post('alamat')
				),
				$id
			)){	
				$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> anda telah merubah data.</div>");    
				redirect('home/listed?update-ok', 'refresh');
			}else{
				$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Maaf...!</b> anda gagal merubah data.</div>");
				redirect('home/listed?update-gagal');
			}
		}
		$this->data['tamu'] = $this->m_tamu->getById($id);
		$this->data['nav']  = "edit";

		$this->load->view('header',$this->data);
		$this->load->view('edit');
		$this->load->view('footer');
	}
	
	function delete($id){
		if( true == $this->m_tamu->delete( $id )){
			$this->session->set_flashdata("save_tamu",
            "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> anda telah menghapus data.</div>");
			redirect('home/listed?delete-ok');
		}else{
			$this->session->set_flashdata("save_tamu",
            "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Maaf...!</b> anda gagal menghapus data.</div>");
			redirect('home/listed?delete-gagal');
		}
	}
	
	public function about()
	{	
		$this->data['nav']  = "tentang";

		$this->load->view('header',$this->data);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function error()
	{
		$this->data['nav']  = "error";

		$this->load->view('header',$this->data);
		$this->load->view('error');
		$this->load->view('footer');
	}

	/*public function send_mail($mailReceiver)
{
	 $config = array();
                $config['useragent']           = "CodeIgniter";
                $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
                $config['protocol']            = "smtp";
                $config['smtp_host']           = "ssl://smtp.gmail.com";
                $config['smtp_port']           = "465";
                $config['smtp_user'] 		   = "skawan13@gmail.com";
        		$config['smtp_pass'] 		   = "@11@hskawan13";
                $config['mailtype'] = 'html';
                $config['charset']  = 'utf-8';
                $config['newline']  = "\r\n";
                $config['wordwrap'] = TRUE;

                $this->load->library('email');

                $this->email->initialize($config);

                $this->email->from('skawan13@gmail.com', 'admin');
                $this->email->to($mailReceiver);
                $this->email->cc('skawan13@gmail.com'); 
                //$this->email->bcc($this->input->post('email')); 
                $this->email->subject('Form Registrasi');
                $msg = "Thanks for signing up!
            Your account has been created, 
            you can login with your credentials after you have activated your account by pressing the url below.
            Please click this link to activate your account:Click Here</a>";

            $this->email->message($msg);   
            //$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));

            if($this->email->send()){
            	$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> ID Card dikirim ke ".$mailReceiver.".</div>");    
				redirect('home/listed?mail-sent', 'refresh');
            	
            }else{
            	$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Gagal...!</b> ID Card dikirim ke ".$mailReceiver.".</div>");    
				redirect('home/listed?mail-failed', 'refresh');
            }
}*/

	public function send_mail($mailReceiver)
{
    $config = array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.gmail.com',
  'smtp_port' => 465,
  'smtp_user' => 'skawan13@gmail.com', // change it to yours
  'smtp_pass' => '@11@hskawan13', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '<html>
            <head>
                <title>Title</title>
            </head>
            <body>
            <h3>Heading</h3>
            <p>Message Body</p><br>
            <p>With Regards</p>
            <p>Your Name</p>
            </body>
            </html>';
     
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('skawan13@gmail.com'); // change it to yours
      $this->email->to($mailReceiver);// change it to yours
      $this->email->subject('Registrasi Card');
      $this->email->message($message);
      if($this->email->send())
     {
      $this->session->set_flashdata("save_tamu",
                "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> ID Card dikirim ke ".$mailReceiver.".</div>");    
				redirect('home/listed?mail-sent', 'refresh');
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}

/*	
	public function send_mail($mailReceiver)
    {
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "skawan13@gmail.com";  // user email address
        $mail->Password   = "@11@hskawan13";            // password in GMail
        $mail->SetFrom('skawan13@gmail.com', 'Mail');  //Who is sending 
        $mail->isHTML(true);
        $mail->Subject    = "Email Pendaftaran(Guest Book)";
        $mail->Body       = '
            <html>
            <head>
                <title>Title</title>
            </head>
            <body>
            <h3>Heading</h3>
            <p>Message Body</p><br>
            <p>With Regards</p>
            <p>Your Name</p>
            </body>
            </html>
        ';
        //$mailReceiver = "receiver@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($mailReceiver, "Receiver");
        if(!$mail->Send()) {
        	$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Gagal...!</b> ID Card dikirim ke ".$mailReceiver.".</div>");    
				redirect('home/listed?update-ok', 'refresh');
            return false;
        } else {
        	$this->session->set_flashdata("save_tamu",
                "<div class='alert alert-info fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sukses...!</b> ID Card dikirim ke ".$mailReceiver.".</div>");    
				redirect('home/listed?update-ok', 'refresh');
            return true;
        }
    }*/
}
