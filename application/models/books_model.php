<?php
class Books_model extends CI_Model {

var $table = 'books';

public function __construct()
{
$this->load->database();
}

     public function get_all_books()
{
$this->db->from('books');
$query=$this->db->get();
return $query->result();
}

     public function get_by_id($id)
{
$this->db->from($this->table);
$this->db->where('book_id',$id);
$query = $this->db->get();
return $query->row();
}
      public function book_add($data)
{
$this->db->insert($this->table, $data);
return $this->db->insert_id();
}

      public function book_update($where, $data)
{
$this->db->update($this->table, $data, $where);
return $this->db->affected_rows();
}
      public function delete_by_id($id)
{
$this->db->where('book_id', $id);
$this->db->delete($this->table);
}
        

 /*   public function get_books($isbn = FALSE)
{
if ($isbn === FALSE)
{
$query = $this->db->get('book');
return $query->result_array();
}
$query = $this->db->get_where('book', array('isbn' => $isbn));
return $query->row_array();
}
public function set_books()
{
$this->load->helper('url');
$slug = url_title($this->input->post('book'), 'dash', TRUE);
$data = array(
'title' => $this->input->post('book'),
'isbn' => $slug,
'author' => $this->input->post('text')
);
return $this->db->insert('book', $data);
} */

}

?>