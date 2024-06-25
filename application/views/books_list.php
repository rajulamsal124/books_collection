<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="app">
            <div>
                <h1>Book Collection</h1>
                <a href="/books/new_book" class="btn btn-primary mb-3">Add New Book</a>
                <table class="table table-bordered">
                    <thead>
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
                            <td>{{ book.id }}</td>
                            <td>{{ book.title }}</td>
                            <td>{{ book.author }}</td>
                            <td>{{ book.genre }}</td>
                            <td>{{ book.published_year }}</td>
                            <td>{{ book.description }}</td>
                            <td>
                                <a :href="'/books/' + book.id" class="btn btn-sm btn-info">View/Edit</a>
                                <button @click="deleteBook(book.id)" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
