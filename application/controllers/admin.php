<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('db_company');
		$this->load->helper('url');
	}
	public function index() {
		$this->load->view('admin/index');
		
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$this->load->view('admin/customer');
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
		//$this->load->view('admin/company');
		$data['finalsisfor'] = $this->db_company->getCompany();
		$this->load->view('admin/company',$data);
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	function editCompany($id){
		$where = array('id' => $id);
		$data['company']= $this->db_company->edit_data($where, 'company')->result();
		$this->load->view('admin/update',$data);
	}
	public function companyTambahAksi()
	{
		$nama_perusahaan = $this->input->post('nama_perusahaan');		
		$no_tlp = $this->input->post('no_tlp');	
		$email = $this->input->post('alamat');
		$alamat = $this->input->post('email');
		
		$data =array(
			'nama_perusahaan' =>$nama_perusahaan,
			'no_tlp' =>$no_tlp,
			'email' =>$alamat,
			'alamat' =>$email);
		$this->db_company->input_data($data,'company');
		redirect('admin/company');
	}
	function hapusCompany($id){
		$where = array('id' => $id);
		$this->db_company->delete_data($where,'company');
		redirect('admin/company');
	}	
	function update(){	
		$nama_perusahaan = $this->input->post('nama_perusahaan');		
		$no_tlp = $this->input->post('no_tlp');	
		$email = $this->input->post('alamat');
		$alamat = $this->input->post('email');
		
		$data =array(
			'nama_perusahaan' =>$nama_perusahaan,
			'no_tlp' =>$no_tlp,
			'email' =>$alamat,
			'alamat' =>$email);
		$this->db_company->update_data($where,$data,'company');
		redirect('admin/company');
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}