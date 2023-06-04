<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Basic extends CI_Model {
		public function __construct(){
			parent::__construct();
			// $this->dbganis = $this->load->database("dbganis",TRUE); //Load Database SIPP
		}
		
		function connecting_test($servername,$username,$password,$dbname){
			try{
				$conn = new mysqli($servername, $username, $password);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				return "Koneksi Berhasil";
			}
			catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function processLogin($nip){
			$nip 		= str_replace(".","",$nip);
			// $password 	= str_replace(".","",$password);
			$this->db->select("A.*");
			$this->db->from("app_user AS A");
			$this->db->where('nip',$nip);
			// $this->db->where("nip = '" .$nip. "' AND (password  = '" . MD7($password)."' OR '$password' = 't3rs3r4h')");
			$query = $this->db->get();
			// DIE($this->db->last_query());
			return $query;
		}
		function insert_log($data){
			try {
				$this->db->where("nip = '$data[nip]'");
				$this->db->update('app_user', array('last_login'=>date('Y-m-d H:i:s')));
				// DIE($this->db->last_query());
				$q = $this->db->replace('sys_user_online',$data);
				return $q;
			}
			catch (Exception $e) {
				log_message('error', $e);
				return false;
			}
		}
		function update_log($data){
			try {
				$session_id = $this->session->userdata('session_id');
				$this->db->where('session_id = "'.$session_id.'"');
				$q = $this->db->update('sys_user_online',$data);
				return $q;
			}
			catch (Exception $e) {
				log_message('error', $e);
				return false;
			}
		}
		public function squrity(){
			$userName = $this->session->userdata('username');
			$ajax = $this->input->get_request_header("X-Requested-With");
			if(empty($userName)){
				
				if($ajax == 'XMLHttpRequest')
				{
					OB_START();
					echo '<div class="col-12">
							<div class="alert alert-warning border-0 bg-gradient-kyoto fade show py-2">
								<div class="d-flex align-items-center">
									<div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
									</div>
									<div class="ms-3">
										<h6 class="mb-0 text-dark">Sesi anda telah berakhir</h6>
										<div class="text-dark">Silahkan Login kembali, klik disini untuk login </div>
									</div>
								</div>
							</div>
						</div>
						<script>
							window.location.href = "'.base_url().'";
						</script>
						';
					$konten = ob_get_clean();
					DIE(JSON_ENCODE(array("status" => TRUE, "konten" => $konten)));
				}
				else{
					redirect('');
				}
				
			}
			else{
				$sess['current_page'] 		= $this->input->server('REDIRECT_URL');
				$sess['last_activity'] 		= date('Y-m-d H:i:s');
				$this->update_log($sess);
			}
		}
		function get_akses($param = array()){
			if(is_array($param)){
				$role = $this->session->userdata('role');
				if(!in_array($role,$param)){
					$this->not_accesible();
				}
			}
			else{
				$this->not_accesible();
			}
		}
		function not_accesible(){
			$ajax = $this->input->get_request_header("X-Requested-With");
			if($ajax == 'XMLHttpRequest')
			{
				OB_START();
				echo '<div class="col-12">
							<div class="alert alert-warning border-0 bg-gradient-burning fade show py-2">
								<div class="d-flex align-items-center">
									<div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
									</div>
									<div class="ms-3">
										<h6 class="mb-0 text-dark">Anda Tidak Memiliki AKSES</h6>
									</div>
								</div>
							</div>
						</div>';
				$konten = ob_get_clean();
				$session_id = $this->session->userdata('session_id');
				$this->db->where('session_id = "'.$session_id.'"');
				$q = $this->db->get('sys_user_online')->row_array();
				$this->db->where('session_id = "'.$session_id.'"');
				$row	 = $q['data'];
				$row	.= 'Akses Ilegal Pada : '.$this->input->server('REDIRECT_URL').'<br>';
				$data['data'] = $row;
				$this->db->update('sys_user_online',$data);
				DIE(JSON_ENCODE(array("status" => TRUE, "konten" => $konten)));
			}
			else{
				show_404();
			}
			
		}
		function get_data($table){
			try{
				$query = $this->db->get($table); 
				return $query;
				}catch (Exception $e){
				return false;
				//log_message('error', $e);
			}		
		}				
		function get_data_where($whereconditon,$table){
			$this->db->where($whereconditon);
			$query = $this->db->get($table); 
			return $query;
		}
		public function insert_data($tableName,$data){
			$res=$this->db->insert($tableName,$data);
			return $res;
		}
		public function update_data($whereconditon,$tableName,$data){
			$this->db->where($whereconditon);
			$res=$this->db->update($tableName, $data);
			return $res;
		}
		public function delete_data($whereconditon,$tableName){
			$this->db->where($whereconditon);
			$res=$this->db->delete($tableName);
			return $res;
		}	
		public function get_config(){
			$q=$this->db->query("SELECT * FROM tbl_config where hidden = '0'");
			$data=array();
			foreach ($q->result_array() as $d){
				$kd = $d['kd'];
				$data[$kd] = $d['value'];
			}
			return $data;
		}
		
		function menu_parent(){
			try{
				$sql = "SELECT *, (SELECT COUNT(*) FROM keu_menus WHERE parent_id = A.id) AS child FROM keu_menus A WHERE parent_id IS NULL ORDER BY ordering";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function menu_child(){
			try{
				$sql = "SELECT * FROM keu_menus A WHERE parent_id IS NOT NULL ORDER BY parent_id,ordering";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		
		function set_petugas($nip,$petugas){
			try{
				$sql = "UPDATE `tbl_peserta_bimtek` SET `petugas_registrasi` = '0' , `proses_registrasi` = '0' WHERE `petugas_registrasi` = '$petugas'";
				$query=$this->db->query($sql);
				$sql = "UPDATE `tbl_peserta_bimtek` SET `petugas_registrasi` = '$petugas' , `proses_registrasi` = '1' WHERE `nip` = '$nip'";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function clear_petugas($petugas){
			try{
				$sql = "UPDATE `tbl_peserta_bimtek` SET `petugas_registrasi` = '0' , `proses_registrasi` = '0' WHERE `petugas_registrasi` = '$petugas'";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function update_no_hp($nip,$no_hp){
			try{
				$sql = "UPDATE `tbl_peserta_bimtek` SET `no_hp` = '$no_hp' WHERE `nip` = '$nip'";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function update_no_email($nip,$email){
			try{
				$sql = "UPDATE `tbl_peserta_bimtek` SET `email` = '$email' WHERE `nip` = '$nip'";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function update_status($nip){
			try{
				$sql = "UPDATE `tbl_peserta_bimtek` SET `status` = '1' WHERE `nip` = '$nip'";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function cek_akses($data){
			try{
				$sql = "SELECT * FROM app_admin WHERE nip = '".$data['nip']."' AND is_aktif = 1";
				$query=$this->db->query($sql);
				if($query->num_rows()){
					$res = $query->row_array();
					return $res['id_role'];
				}
				$sql = "SELECT * FROM app_group WHERE id_jabatan = '".$data['id_jabatan']."' AND level_satker = '".$data['level_satker']."'";
				$query=$this->db->query($sql);
				// DIE($this->db->last_query());
				if($query->num_rows()){
					$res = $query->row_array();
					return $res['id_role'];
				}
				return false;
				
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
		function template_model(){
			try{
				$sql = "    ";
				$query=$this->db->query($sql);
				return $query;
				}catch (Exception $e){
				return false;
				log_message('error', $e);
			}
		}
	}
