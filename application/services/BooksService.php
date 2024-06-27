<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BooksService {
    public function validate_book($data) {
        if (empty($data['title']) || strlen($data['title']) < 3) {
            return false;
        }
        if (empty($data['author']) || strlen($data['author']) < 3 || strpos($data['author'], ' ') === false) {
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
}
