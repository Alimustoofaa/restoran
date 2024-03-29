<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function rules()
	{
		return [      
	    ['field' => 'username',
	      'label' => 'Username',
	      'rules' => 'required'],
	    ['field' => 'password',
	      'label' => 'Password',
	      'rules' => 'required']
	    ];
	}

	public function rulesDaftar()
	{
		return [      
	    ['field' => 'no_meter',
	      'label' => 'No Meter',
	      'rules' => 'required|numeric|callback_checkNoMeter'],
	    ['field' => 'nama',
	      'label' => 'Nama',
	      'rules' => 'required'],
	    ['field' => 'username',
	      'label' => 'Username',
	      'rules' => 'required|callback_checkUsername'],
	    ['field' => 'password',
	      'label' => 'password',
	      'rules' => 'required'],
	    ['field' => 'alamat',
	      'label' => 'alamat',
	      'rules' => ''],
	    ['field' => 'id_tarif',
	      'label' => 'Tarif',
	      'rules' => 'required']];
	}

	public function error_msg_daftar()
	{
		return array(               
		  'no_meter' => form_error('no_meter'),
		  'nama' => form_error('nama'),
	      'username' => form_error('username'),
	      'password' => form_error('password'),
	      'alamat' => form_error('alamat'),
	      'id_tarif' => form_error('id_tarif')
	    );
	}

	public function error_msg()
	{
		return array(               
	      'username' => form_error('username'),
	      'password' => form_error('password')
	    );
	}

	public function get_login()
    {
        return $this->db->get_where('pelanggan',array('username' => $this->input->post('username'),'password' => md5($this->input->post('password'))));
    }

    public function get_loginAdmin()
    {
        return $this->db->get_where('admin',array('username' => $this->input->post('username'),'password' => md5($this->input->post('password'))));
    }

    public function getTarif()
    {
    	return $this->db->get('tarif')->result();
    }

    public function insertPelanggan($object)
    {
    	return $this->db->insert('pelanggan', $object);
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */