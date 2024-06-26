<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .table-responsive {
            display: flex;
            flex-direction: row;
        }
        .table thead {
            display: none;
        }
        .table tbody {
            display: flex;
            flex-direction: column;
        }
        .table tbody tr {
            display: flex;
            flex-direction: column;
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table tbody tr td {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Center align the content */
            padding: 0.75rem;
            border-top: none;
        }
        .table tbody tr td::before {
            content: attr(data-label);
            font-weight: bold;
            flex: 1;
            margin-right: 0.5rem;
        }
        .table tbody tr:nth-child(even) {
            background-color: #ececec;
        }
        .table tbody tr td .btn {
            display: inline-flex; /* Use inline-flex to keep icons in line */
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            padding: 0;
            border-radius: 50%;
        }
        .table tbody tr td .btn i {
            margin: 0;
        }
        @media (min-width: 768px) {
            .table thead {
                display: table-header-group;
            }
            .table tbody {
                display: table-row-group;
            }
            .table tbody tr {
                display: table-row;
                border: none;
                margin-bottom: 0;
            }
            .table tbody tr td {
                display: table-cell;
                border-top: 1px solid #dee2e6;
            }
            .table tbody tr td::before {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div id="app">
            <div>
                <h1>Book Collection</h1>
                <a href="/books/new_book" class="btn btn-primary mb-3">Add New Book</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Published Year</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="book in books" :key="book.id">
                                <td data-label="ID">{{ book.id }}</td>
                                <td data-label="Title">{{ book.title }}</td>
                                <td data-label="Author">{{ book.author }}</td>
                                <td data-label="Genre">{{ book.genre }}</td>
                                <td data-label="Published Year">{{ book.published_year }}</td>
                                <td data-label="Description">{{ book.description }}</td>
                                <td data-label="Actions" >
                                    <a :href="'/books/' + book.id" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button @click="deleteBook(book.id)" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                books: <?= json_encode($books) ?>
            },
            methods: {
                deleteBook(id) {
                    if (confirm('Are you sure you want to delete this book?')) {
                        fetch('/books/delete/' + id)
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    this.books = this.books.filter(book => book.id !== id);
                                }
                            });
                    }
                }
            }
        });
    </script>
</body>
</html>
