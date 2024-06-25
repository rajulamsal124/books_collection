<?php
class Books extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
    }
    public function index() {
        $data['books'] = $this->Book_model->get_books();
        $this->load->view('books_list', $data);
    }
    public function get_books() {
        $books = $this->Book_model->get_books();

        if ($this->input->is_ajax_request()) {
            echo json_encode($books);
        } else {
            $data['books'] = $books;
            $this->load->view('books_list', $data);
        }
    }
    public function get_book($id) {
        $book = $this->Book_model->get_book($id);
        $data['book_id'] = $id;
        $this->load->view('view_book', $data);
    }

    public function get_book_api($id) {
        $book = $this->Book_model->get_book($id);
        echo json_encode($book);
        
    }
    public function create_book() {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->validate_book($data)) {
            $this->Book_model->create_book($data);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Validation failed']);
        }
    }
    public function update_book($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($this->validate_book($data)) {
            $this->Book_model->update_book($id, $data);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Validation failed']);
        }
    }
    public function delete_book($id) {
        $this->Book_model->delete_book($id);
        echo json_encode(['status' => 'success']);
    }
    private function validate_book($data) {
        if (empty($data['title']) || strlen($data['title']) < 3) {
            return false;
        }
        if (empty($data['author']) || strlen($data['author']) < 3 || !strpos($data['author'], ' ')) {
            return false;
        }
        if (empty($data['genre']) || strlen($data['genre']) < 3) {
            return false;
        }
        $current_year = date("Y");
        if (empty($data['published_year']) || !is_numeric($data['published_year']) || $data['published_year'] > $current_year) {
            return false;
        }
        if (empty($data['description']) || strlen($data['description']) < 100) {
            return false;
        }

        return true;
    }
    public function new_book() {
        $this->load->view('create_book');
    }
}
