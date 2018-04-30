<?php
     class Siswa extends CI_Controller{
          function __construct(){
               parent:: __construct();
               $data = array();
			   
          }
		   function laporan() {
			  
			 $data["content"] = "pages/laporan_index";
               $this->load->view("template", $data);
			
		  }
          function index(){
               $siswa = $this->db->get("siswa");

               $data["query"] = $siswa;
               $data["content"] = "pages/siswa_index";
               $this->load->view("template", $data);
          }

          function tambah(){
               $data["query"]= NULL;
               $data["content"]= "pages/siswa_form";
               $this->load->view("template", $data);
          }

          function hapus($id){
               $this->db->where(array('siswa_id' => $id))->delete('siswa');
               redirect ('siswa', 'refresh');

          }

          function edit($id){
               $siswa = $this->db->get_where("siswa",array('siswa_id' => $id));

               $data["query"] = $siswa;
               $data["content"] = "pages/siswa_edit";
               $this->load->view("template", $data);
          }

          function update($id){
               $data = array              
                    (
                         'nisn' => $this->input->post('siswa_nisn'),
                         'nis' => $this->input->post('siswa_nis'),
                         'nama_lengkap' => $this->input->post('siswa_nama_lengkap'),
                         'jk' => $this->input->post('siswa_jk'),
                         'tempat_lahir' => $this->input->post('siswa_tempat_lahir'),
                         'tanggal_lahir' => $this->input->post('siswa_tanggal_lahir'),
                         'alamat' => $this->input->post('siswa_alamat'),
                         'jurusan' => $this->input->post('siswa_jurusan'),
                         'tanggal_entri' => date('Y-m-d H:i:s')


                    );

               
               $this->db->where(array('siswa_id'=>$id))->update('siswa',$data);
               redirect ('siswa', 'refresh');

          }

          function simpan(){
               $data = array              
                    (
                         'nisn' => $this->input->post('siswa_nisn'),
                         'nis' => $this->input->post('siswa_nis'),
                         'nama_lengkap' => $this->input->post('siswa_nama_lengkap'),
                         'jk' => $this->input->post('siswa_jk'),
                         'tempat_lahir' => $this->input->post('siswa_tempat_lahir'),
                         'tanggal_lahir' => $this->input->post('siswa_tanggal_lahir'),
                         'alamat' => $this->input->post('siswa_alamat'),
                         'jurusan' => $this->input->post('siswa_jurusan'),
                         'tanggal_entri' => date('Y-m-d H:i:s')


                    );

               
               $this->db->insert('siswa' , $data);
               redirect ('siswa', 'refresh');



          }
     }
?>
