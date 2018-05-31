<?php
class Books extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('books_model');

		$this->load->helper('url');

	}

	public function index(){

		$data['books'] = $this->books_model->get_all_books();
		$data['title'] = 'books archive';

		
		$this->load->view('books/book_view',$data);

		/*. $this->load->view('templates/header', $data);
		$this->load->view('books/index', $data);
		$this->load->view('templates/footer');  */
	}


	public function book_add()
	{
		$data = array(
			'book_isbn' => $this->input->post('book_isbn'),
			'book_title' => $this->input->post('book_title'),
			'book_author' => $this->input->post('book_author'),
			'book_category' => $this->input->post('book_category'),
		);

	
		$insert = $this->book_model->book_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->book_model->get_by_id($id);
		echo json_encode($data);
	}

	public function book_update()
	{
		$data = array(
			'book_isbn' => $this->input->post('book_isbn'),
			'book_title' => $this->input->post('book_title'),
			'book_author' => $this->input->post('book_author'),
			'book_category' => $this->input->post('book_category'),
		);


		$this->book_model->book_update(array('book_id' => $this->input>post('book_id')),
			$data);
		echo json_encode(array("status" => TRUE));
	}

	public function book_delete($id)
	{
		$this->book_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	/* public function view($isbn)
	{
	$data['books_item'] = $this->books_model->get_books($isbn);
	if (empty($data['books_item']))
	{
	show_404();
	}
	// $data['title'] = $data['books_item']['title'];
	$data['book'] = $this->books_model->get_books();
	$this->load->view('templates/header', $data);
	$this->load->view('books/view', $data);
	$this->load->view('templates/footer');
	}

	public function create()
	{
	$this->load->helper('form');
	$this->load->library('form_validation');
	$data['title'] = 'Create a books item';
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	if ($this->form_validation->run() === FALSE)
	{
	$this->load->view('templates/header', $data);
	$this->load->view('books/create');
	$this->load->view('templates/footer');
	}
	else
	{
	$this->books_model->set_books();
	$this->load->view('books/success');
	}
	}
	   */
}
?>

