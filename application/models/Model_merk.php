<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_merk extends CI_Model {
	// Tabel
	private $table = 'pj_merk_barang pmb';

	// Pengurutan
	private $columnOrder 	= [
		null, 
		'pmb.merk', 
		// 'pmg.dihapus', 
		null,
	];
	// Pencarian
	private $columnSearch 	= [
		'pmb.merk', 
	];
	// Urukan
	private $orderBy 		= ['pmb.id_merk_barang' => 'DESC'];
	// Select field
	private function _setSelect()
	{

	}
	// Relasi
	public function _setJoin()
	{
		
	}
	//

	public function _setWhere()
	{
		$cari = $this->input->post('cari');

		if($cari != ''){
			$this->db->like('pmb.merk',$cari);
		}
	}
	// 
	private function _setLimit()
	{
		$limit = $this->input->post('length') + 1 + $this->input->post('start');
		$this->db->limit($limit);
	}
	// 
	private function _getBuilder()
	{
		$this->_setLimit();
		$this->_setWhere();
		$this->db->from($this->table);
		$this->datatables->generate($this->columnOrder, $this->columnSearch, $this->orderBy);
	}
	// 
	private function _countResult() 
	{
		return $this->db->count_all_results($this->table);
	}
	// 
	private function _status($status_user_nama = null, $status_user_id = 1) 
	{
		if ($status_user_id == 1) {
			return '<b style="color: green">'.$status_user_nama.'</b>';
		} else {
			return '<b style="color: red">'.$status_user_nama.'</b>';
		}
	}
	// 
	private function _button($data) 
	{
		 $button = '<div class="btn-group pull-left">';

            $button .= '<button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">Aksi</button>';

            $button .= '<span class="sr-only">Klik</span>';

            $button .= '</button>';

            $button .= '<ul class="dropdown-menu" role="menu">';

            $button .= '<li><a  href="' . site_url('admin/master/merk/editmerk/' . md5($data->id_merk_barang)) . '">Edit</a></li>';

            $button .= '<li><a onclick="return confirm(' . "'Apakah Anda Yakin?'" . ')" href="' . site_url('admin/master/merk/hapusmerk/' . md5($data->id_merk_barang)) . '">Hapus</a></li>';

            $button .= '</ul>';

            $button .= '</div>';

        return $button;
	}
	// 
	public function getDataTables()
	{
		$query 	= $this->datatables->getResult($this->_getBuilder());
		$data 	= array();
		$start  = $this->input->post('start');
		$no  	= $start + 1;
		foreach ($query as $field) {
		    $row    = array();
		    $row[]  = $no++;
	   	 	$row[]	= $field->merk ? $field->merk : '-';
	   	 	// $row[]	= $field->dihapus ? $field->dihapus : '-';
		    $row[]	= $this->_button($field);
		    $data[] = $row;
		}

		$output = [
			'draw' 				=> $this->input->post('draw'), 
			'recordsTotal' 	 	=> $this->_countResult(), 
			'recordsFiltered'	=> $this->db->get($this->_getBuilder())->num_rows(), 
			'data' 				=> $data, 
		];

		return $output;
	}


}

/* End of file Atur_mata_pelajaran.php */
/* Location: ./application/models/Atur_mata_pelajaran.php */