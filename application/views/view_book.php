<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View/Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="app">
            <div>
                <h1>View/Edit Book</h1>
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="book.title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" v-model="book.author">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" v-model="book.genre">
                    </div>
                    <div class="form-group">
                        <label for="published_year">Published Year</label>
                        <input type="number" class="form-control" id="published_year" v-model="book.published_year">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" v-model="book.description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                book: {
                    title: '',
                    author: '',
                    genre: '',
                    published_year: '',
                    description: ''
                }
            },
            created() {
                const bookId = <?= $book_id ?>;

                fetch('/books/api/' + bookId)
                    .then(response => response.json())
                    .then(data => {
                        this.book = data;
                    });
            },
            methods: {
                updateBook() {
                    fetch('/books/update/' + this.book.id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(this.book)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Book updated successfully');
                            window.location.href = '/books';
                        } else {
                            alert(data.message);
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>
