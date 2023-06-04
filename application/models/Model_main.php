<?php
class Model_main extends CI_Model
{
	function get_data_where($whereconditon, $table)
	{
		$this->db->where($whereconditon);
		$query = $this->db->get($table);
		return $query;
	}
	function insert_data($tableName, $data)
	{
		$res = $this->db->insert($tableName, $data);
		return $res;
	}
	function update_data($whereconditon, $tableName, $data)
	{
		$this->db->where($whereconditon);
		$res = $this->db->update($tableName, $data);
		return $res;
	}
	function delete_data($whereconditon, $tableName)
	{
		$this->db->where($whereconditon);
		$res = $this->db->delete($tableName);
		return $res;
	}
	function get_satker($id_satker=false)
	{
		$this->db->select("*");
		$this->db->from('master_satker AS A');
		$this->db->where("MD7(A.id_dipa01) = '$id_satker' OR A.id_dipa01 = '$id_satker'");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}
	function get_max_stream()
	{
		$this->db->select("MAX(id_stream) as last_id");
		$this->db->from('data_broadcast AS A');
		$query = $this->db->get()->row_array();
		// DIE($this->db->last_query());
		return $query['last_id'];
	}
	function menu_list($id = null, $jenis = null)
	{
		$this->db->select("A.id_satker,A.nama AS nama_satker, A.id_dipa01, NAMA_SATKER(A.id_satker_parent) AS nama_satker_parent,A.tingkat,(SELECT COUNT(*) FROM master_satker WHERE id_satker_parent=A.id_satker) AS total,
			IF(A.tingkat='PA',CONCAT((SELECT urutan FROM master_satker WHERE id_satker=A.id_satker_parent),A.urutan),A.urutan) AS ngurut");
		$this->db->from('master_satker AS A');
		$this->db->where("A.aktif='1'");
		if ($id and $jenis == false) $this->db->where("A.id_dipa01='$id'");
		if ($id and $jenis) $this->db->where("A.id_dipa01='$id' or A.`id_satker_parent` = (SELECT id_satker from master_satker where id_dipa01 = '$id')");
		$this->db->order_by("ngurut", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function management_server($id = null)
	{
		$this->db->select("A.*");
		$this->db->select("NAMA_SATKER(B.id_satker) AS nama_satker");
		$this->db->from('data_server AS A');
		$this->db->join('master_satker AS B', 'A.id_satker = B.id_dipa01', 'LEFT');
		$this->db->where("A.is_aktif", "1");
		$this->db->order_by("B.urutan", "ASC");
		if ($id) $this->db->where(MD7S("A.id")." = '$id' OR ".MD7S("A.id")." = '". MD7($id)."'"); //WHERE ID
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function management_channel($nm_channel = false, $id_server = false, $id_satker = false)
	{
		$this->db->select("A.*");
		$this->db->select("NAMA_SATKER(B.id_satker) AS nama_satker");
		$this->db->from('data_channel AS A');
		$this->db->join('master_satker AS B', 'A.id_satker = B.id_dipa01', 'LEFT');
		// $this->db->where("A.aktif" , "1");
		$this->db->order_by("B.urutan", "ASC");
		if ($nm_channel) $this->db->where("nama_channel = '$nm_channel'"); //WHERE NAMA CHANNEL
		if ($id_satker) $this->db->where(MD7S("A.id_satker")." = '$id_satker' or ".MD7S("A.id_satker")." = '". MD7($id_satker)."'"); //WHERE ID_SATKER
		if ($id_server) $this->db->where(MD7S("A.id_server")." = '$id_server' or ".MD7S("A.id_server")." = '". MD7($id_server)."'"); //WHERE ID
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function management_broadcast($id_stream = false, $id_satker = false, $id_lokasi = false)
	{
		$this->db->select("A.*");
		$this->db->select("C.nama_lokasi");
		$this->db->select("NAMA_SATKER(B.id_satker) AS nama_satker");
		$this->db->from('data_broadcast AS A');
		$this->db->join('master_satker AS B', 'A.id_satker = B.id_dipa01', 'LEFT');
		$this->db->join('master_lokasi AS C', 'A.id_lokasi = C.id', 'LEFT');
		// $this->db->where("A.aktif" , "1");
		$this->db->order_by("B.urutan", "ASC");
		if ($id_stream) $this->db->where("id_stream = '$id_stream'");
		if ($id_satker) $this->db->where("A.id_satker = '$id_satker'");
		if ($id_lokasi) $this->db->where("A.id_lokasi = '$id_lokasi'");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function list_pta()
	{
		$this->db->select("A.id_dipa01 as id_satker,A.nama AS nama_satker");
		$this->db->select("NAMA_SATKER(A.id_satker) AS nama_satker");
		$this->db->from('master_satker AS A');
		$this->db->where("A.aktif", "1");
		$this->db->where("A.tingkat IN ('PTA','MA')");
		$this->db->order_by("A.urutan", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}
	function list_lokasi()
	{
		$this->db->select("*");
		$this->db->from('master_lokasi AS A');
		$this->db->where("A.is_aktif", "1");
		// $this->db->where("A.tingkat IN ('PTA','MA')"); BY LOGIN
		$this->db->order_by("A.id", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function list_sakter_ch($id_server)
	{
		$this->db->select("B.`id_satker");
		$this->db->from('data_server AS A');
		$this->db->join('master_satker AS B', 'A.id_satker = B.id_dipa01', 'LEFT');
		$this->db->where(MD7S("A.id")." = '$id_server'"); //WHERE ID SERVER
		$q = $this->db->get()->row_array();
		$id_pta = $q['id_satker'];

		$this->db->select("A.id_dipa01 AS id_satker"); //SEPAKAT PAKE DIPA01 UNTUK ID SATKER
		$this->db->select("A.nama AS nama_satker, NAMA_SATKER(A.id_satker_parent) AS nama_satker_parent,A.tingkat,(SELECT COUNT(*) FROM master_satker WHERE id_satker_parent=A.id_satker) AS total,IF(A.tingkat='PA',CONCAT((SELECT urutan FROM master_satker WHERE id_satker=A.id_satker_parent),A.urutan),A.urutan) AS ngurut ");
		$this->db->from('master_satker AS A');
		$this->db->where("A.aktif='1'");
		if ($id_pta !== '200066') $this->db->where("A.id_satker = '$id_pta' OR A.id_satker_parent = '$id_pta'");
		$this->db->order_by("ngurut", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function management_api()
	{
		$this->db->select("A.id_satker");
		$this->db->select("NAMA_SATKER(A.id_satker) AS nama_satker");
		$this->db->select("db_simtepa.NAMA_SATKER_PARENT(A.id_satker) AS nama_satker_parent");
		$this->db->select("IF(A.tingkat='PA',CONCAT((SELECT urutan FROM master_satker WHERE id_satker=A.id_satker_parent),A.urutan),A.urutan) AS ngurut");
		$this->db->select("B.url");
		$this->db->select("B.cctv1");
		$this->db->select("B.cctv2");
		$this->db->select("B.cctv3");
		$this->db->select("B.cctv4");
		$this->db->from('master_satker AS A');
		$this->db->join('data_cctv AS B', 'A.id_satker = B.id_satker', 'LEFT');
		$this->db->where("A.aktif", "1");
		$this->db->where("A.tingkat", "PA");
		$this->db->order_by("ngurut", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function management_api_simpan($D)
	{
		$this->db->select("A.id_satker");
		$this->db->from("data_cctv AS A");
		$this->db->where("A.id_satker", $D['id_satker']);
		$query = $this->db->get();
		$ketemu = COUNT($query->result_array());

		// dipake abis login selesai        $data_fix = array("id_satker" =>$D['id_satker'],"updnip" => $this->session->userdata('nip'),"upddate" => DATE('Y-m-d H:i:s'),$data['field'] => $data['value']);
		$data_fix = array("id_satker" => $D['id_satker'], $D['field'] => $D['value']);

		if (!$ketemu > 0) {
			$status = $this->db->insert('data_cctv', $data_fix);
			// $this->Model_log_data_tpm->log_data_tpm_tambah("hakim", "tambah", "", "Menambah Data Prestasi Satker: $data[id_satker]"); //LOG DATA FUNCTION 
		} else {
			$this->db->where('id_satker', $D['id_satker']);
			$status = $this->db->update('data_cctv', $data_fix);
			// $this->Model_log_data_tpm->log_data_tpm_tambah("hakim", "update", "", "Merubah Data Prestasi Satker: $data[id_satker]"); //LOG DATA FUNCTION 
		}
		// DIE($this->db->last_query());
		return $status;
	}
	function management_server_simpan($data)
	{
		if (empty($data['id'])) {
			$status = $this->db->insert('data_server', $data);
			// $this->Model_log_data_tpm->log_data_tpm_tambah("hakim", "tambah", "", "Menambah Data Prestasi Satker: $data[id_satker]"); //LOG DATA FUNCTION 
		} else {
			$this->db->where('MD7(id)', $data['id']);
			unset($data['id']);
			$status = $this->db->update('data_server', $data);
			// $this->Model_log_data_tpm->log_data_tpm_tambah("hakim", "update", "", "Merubah Data Prestasi Satker: $data[id_satker]"); //LOG DATA FUNCTION 
		}
		// DIE($this->db->last_query());
		return $status;
	}
	function get_ch_jwt($id_server, $nama_channel)
	{
		$id_server = $this->input->post('id_server');
		$svr = $this->Model_main->management_server($id_server)->row_array();
		$url = $svr['link_server'] . 'rest/v2/applications/settings/' . $nama_channel;
		$jwt = CallAPI('GET', $url, array()); //SET JWT UNTUK CH TERSEBUT
		if ($jwt['status']) {
			if ($jwt['respone']) {
				$data = json_decode($jwt['respone'], true);
				return $data['jwtSecretKey'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function get_all_broadcast()
	{
		$res = $this->db->query("SELECT A.`id_stream`, 
				NAMA_SATKER(D.id_satker) AS nama_satker,
				E.`nama_lokasi` AS nama_lokasi, C.`link_server`, B.`nama_channel`
				FROM data_broadcast AS A
				LEFT JOIN data_channel AS B ON A.`id_satker` = B.`id_satker`
				LEFT JOIN data_server AS C ON B.`id_server` = C.id
				LEFT JOIN master_satker AS D ON A.`id_satker` = D.`id_dipa01`
				LEFT JOIN master_lokasi AS E ON A.`id_lokasi` = E.`id`
				");
		return $res;
	}

	function statistik()
	{
		$this->db->select("id_lokasi, NAMA_LOKASI(id_lokasi) AS nama_lokasi, COUNT(*) AS jumlah_lokasi ");
		$this->db->from('data_broadcast AS A');
		$this->db->join('master_satker AS B', "B.id_dipa01 = A.id_satker AND B.tingkat IN ('PA','PTA')", 'INNER');
		$this->db->group_by('id_lokasi');
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function statistik_detail($satker = 0, $status = 0, $id_lokasi = 0)
	{
		// echo $satker;
		$this->db->select("A.id_satker");
		$this->db->select("B.streamUrl");
		$this->db->select("A.tingkat");
		$this->db->select("IF(B.date_updated IS NULL, B.date_created, B.date_updated) AS creupd");
		$this->db->select("NAMA_SATKER(A.id_satker) AS nama_satker");
		$this->db->select("NAMA_SATKER_PARENT(A.id_satker) AS nama_satker_parent");
		$this->db->select("IF(A.tingkat='PA',CONCAT((SELECT urutan FROM master_satker WHERE id_satker=A.id_satker_parent),A.urutan),A.urutan) AS ngurut");
		$this->db->select("COUNT(B.id_stream) AS jumlah_lokasi");
		$this->db->from('master_satker AS A');
		$this->db->join('data_broadcast AS B', "A.id_dipa01 = B.id_satker AND B.id_lokasi = '$id_lokasi'", 'LEFT');
		$this->db->where("A.aktif", "1");
		if (INTVAL($satker) > 0) $this->db->where("(A.id_satker = '$satker' OR A.id_satker_parent = '$satker')");
		if ($satker == "PTA") $this->db->where("A.tingkat = 'PTA'");
		if ($satker == "PA")  $this->db->where("A.tingkat = 'PA'");
		if ($status == "offline") $this->db->where("B.id_stream IS NULL");
		if ($status == "online") $this->db->where("B.id_stream IS NOT NULL");
		// $this->db->where("A.tingkat", "PA");
		$this->db->where("A.tingkat IN ('PA','PTA')");
		$this->db->group_by('A.id_satker');
		$this->db->order_by("jumlah_lokasi", "ASC");
		$this->db->order_by("ngurut", "ASC");
		$query = $this->db->get();
		// die($this->db->last_query());
		return $query;
	}

	function master_lokasi()
	{
		$this->db->select("A.*");
		$this->db->from('master_lokasi AS A');
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}

	function master_satker_pta()
	{
		$this->db->select("A.*");
		$this->db->select("IF(A.tingkat='PA',CONCAT((SELECT urutan FROM master_satker WHERE id_satker=A.id_satker_parent),A.urutan),A.urutan) AS ngurut");
		$this->db->from('master_satker AS A');
		$this->db->where("A.tingkat", "PTA");
		$this->db->order_by("ngurut", "ASC");
		$query = $this->db->get();
		// DIE($this->db->last_query());
		return $query;
	}
}
