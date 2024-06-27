# Book Collection CRUD Application

## Objective

Develop a web application that allows users to manage a collection of books with CRUD operations. The application is built using CodeIgniter 3.1.13 for the backend and Vue 2 for the frontend.

## Technologies Used

- Backend: CodeIgniter 3.1.13 (PHP 7.4)
- Frontend: Vue 2 (JavaScript)
- Database: MySQL

## Features

- List all books
- Add a new book
- View a specific book
- Edit a book
- Delete a book

## Installation Instructions

### macOS

### Clone the repository

- git clone https://github.com/rajulamsal124/books_collection
- cd book-collection

## Configure database settings

- Open application/config/database.php
- Set your database hostname, username, password, and database name

### Running Application

- php -S localhost:8000
- Access the application
- Open your web browser and go to http://localhost:8000

### Windows

### Clone the repository

- git clone https://github.com/rajulamsal124/books_collection
- cd book-collection
- Configure database settings

### Open application/config/database.php

- Set your database hostname, username, password, and database name
- Navigate to the project directory in Command Prompt or PowerShell
- php -S localhost:8000
- Access the application
- Open your web browser and go to http://localhost:8000

### Linux

### Clone the repository

- git clone https://github.com/rajulamsal124/books_collection
- cd book-collection
- Configure database settings

### Open application/config/database.php

- Set your database hostname, username, password, and database name
- php -S localhost:8000
- Access the application
- Open your web browser and go to http://localhost:8000

## Database Installation and Setup

### Installation Instructions for MySQL Workbench

### macOS

### Download MySQL Workbench (community version)

- Download the macOS version of MySQL Workbench from https://dev.mysql.com/downloads/mysql/

### Install MySQL Workbench

- Open the downloaded .dmg file.
- Drag MySQL Workbench to the Applications folder.
- Setup MySQL Server

### Open MySQL Workbench.

- Click on the + icon to add a new MySQL server connection.
- Enter your MySQL server connection details (hostname, username, password).

### Connect to MySQL Server

- Once configured, click Test Connection to ensure the connection is successful.
- Click OK to save the connection settings.

### Windows

- Download the MySQL Installer for Windows from https://dev.mysql.com/downloads/mysql/
- Run MySQL Installer

### Open the downloaded installer (e.g., mysql-installer-web-community-x.x.xx.x.msi).

- Follow the installer instructions to install MySQL Server and MySQL Workbench.
- Setup MySQL Server
- During installation, configure MySQL Server with desired settings.
- Make note of the root password set during installation.

### Install MySQL Workbench

- In MySQL Installer, select MySQL Workbench for installation.
- Complete the installation process.
- Configure MySQL Workbench

### Open MySQL Workbench.

- Click on the + icon to add a new MySQL server connection.
- Enter your MySQL server connection details (hostname, username, password).

### Connect to MySQL Server

- Once configured, click Test Connection to ensure the connection is successful.
- Click OK to save the connection settings.

### Linux

### Install MySQL Server

- Use your Linux distribution's package manager to install MySQL Server. For example, on Ubuntu:
- open terminal and run the following commands

  `sudo apt-get update`

  `sudo apt-get install mysql-server`

### Install MySQL Workbench

- Use your Linux distribution's package manager to install MySQL Workbench. For example, on Ubuntu:
  `sudo apt-get install mysql-workbench`

### Setup MySQL Server

- During installation, set the root password for MySQL Server.
- Make note of the root password set during installation.
- Configure MySQL Workbench

### Open MySQL Workbench.

- Click on the + icon to add a new MySQL server connection.
- Enter your MySQL server connection details (hostname, username, password).
- Connect to MySQL Server
- Once configured, click Test Connection to ensure the connection is successful.
- Click OK to save the connection settings.

### Database Setup

Ensure you have MySQL installed and create a database named `book_collection`. Then, run the following SQL query to create the `books` table:

```sql
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    published_year YEAR NOT NULL,
    description TEXT
);
```

## Challenges and Solution

### Avoiding business logic

- One of the challenges that I've faced was Avoiding the business logic inside the Books controller.

### Solution

To overcome this challenges, I seperated the business logic, in this case `validate_book()` function from Books controller to Services. The reason behind solution are mentioned below:

1. Separation of Concerns: By placing validation logic in a service class, you adhere to the Single Responsibility Principle (SRP). Services should focus on handling business logic related to books (or other entities), including validation.

2. Reusability: Once encapsulated in a service, the validate_book function can be easily reused across multiple controllers or parts of your application that deal with book data. This promotes DRY (Don't Repeat Yourself) principles.

3. Testability: Services are typically easier to unit test compared to controllers. You can write dedicated tests for your validation logic to ensure that it behaves correctly under various conditions without needing to involve the entire application flow.

4. Maintainability: Placing validation in a central service class makes it easier to maintain and update. If validation rules change or need to be extended, you only need to update them in one place rather than in multiple controllers.

5. Encapsulation: By encapsulating validation in a service, you can also encapsulate other related business logic that may need to interact with validated data, ensuring a cohesive approach to handling book-related operations.

### Implementing Manual Dependency Injection

Another challenges that I have faced was implementing Dependency Injection (DI) manually within the CodeIgniter framework.

- Solution: To overcome this challenge, I adopted a structured approach:
  Constructor Injection: Utilized constructor injection to pass dependencies into classes when instantiated. This method promotes loose coupling and enhances testability without relying on a built-in DI container.

```php
public function __construct() {
   parent::__construct();
   $this->load->model('Book_model');
   $this->booksService = new BooksService();
}

```

The reason behind solution are mentioned below:

- Separation of Concern: By manually injecting dependencies, I separated the responsibility of managing dependencies from the classes that use them, adhering to the Single Responsibility Principle (SRP).
- Testability: Improved the testability of my codebase by easily mocking dependencies during unit tests, ensuring each component behaves as expected in isolation.
- Flexibility and Maintainability: Enabled easier refactoring and extension of the application, allowing updates to dependencies or introduction of new functionalities without extensive modifications.
- Encapsulation: Encapsulated dependencies within dedicated service classes or components, promoting modular design and enhancing overall application architecture.
