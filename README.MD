# Book Collection CRUD Application

This project is a CRUD (Create, Read, Update, Delete) application for managing a book collection. It is built using CodeIgniter 3.1.13 for the backend and Vue.js 2 for the frontend.

### Challenges Faced

During the development of this CRUD application, several challenges were encountered and successfully addressed:

- **Integration of Vue.js with CodeIgniter**: Initially, integrating Vue.js with CodeIgniter posed challenges due to different approaches to frontend and backend architecture. This was addressed by setting up separate API endpoints in CodeIgniter (`Books.php`) to handle data retrieval and manipulation using AJAX requests from Vue components.

- **Validation and Error Handling**: Implementing robust validation for book data inputs was crucial. Challenges included ensuring input formats (author name validation, year format validation) and handling validation errors both on the frontend (Vue.js) and backend (CodeIgniter). This was achieved by implementing custom validation methods in both PHP and JavaScript.

- **Security Measures**: Ensuring security measures such as CSRF protection in CodeIgniter and input sanitization to prevent SQL injection attacks were challenges that required careful implementation. This was addressed by following best practices and using CodeIgniter's built-in security features.

### Additional Features or Improvements

Beyond basic CRUD functionalities, the following features and improvements were implemented to enhance the application:

- **Advanced Search and Filtering**: Implemented a search feature allowing users to search books by title, author, or genre. Filtering options were added to refine search results based on various criteria, enhancing user experience and usability.

- **Pagination**: To improve performance and user experience with large datasets, pagination was implemented on the frontend (Vue.js) and backend (CodeIgniter) to efficiently manage and display book lists.

- **RESTful API Endpoints**: Expanded API capabilities by implementing RESTful endpoints (`get_book_api`, `create_book`, `update_book`, `delete_book`) in CodeIgniter, enabling seamless integration with Vue.js frontend for CRUD operations.

## Getting Started

To run this project locally, follow these steps:

1. Clone the repository: `git clone https://github.com/your/repository.git`
2. Install dependencies for both backend and frontend:
   - Backend (CodeIgniter): Follow instructions in `backend/README.md`
   - Frontend (Vue.js): Follow instructions in `frontend/README.md`
3. Configure your database settings in `backend/application/config/database.php`.
4. Start the backend server.
5. Start the frontend development server.
6. Access the application in your browser at `http://localhost:your_port`.

## Conclusion

This project demonstrates the integration of CodeIgniter and Vue.js to build a robust CRUD application for managing a book collection. The challenges faced and solutions implemented showcase the development team's proficiency in handling complex web development tasks while delivering a user-friendly and secure application.
