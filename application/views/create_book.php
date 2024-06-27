<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="app">
            <div>
                <h1>Create New Book</h1>
                <form @submit.prevent="validateForm">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="book.title" :class="{'is-invalid': errors.title}">
                        <div v-if="errors.title" class="invalid-feedback">{{ errors.title }}</div>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" v-model="book.author" :class="{'is-invalid': errors.author}">
                        <div v-if="errors.author" class="invalid-feedback">{{ errors.author }}</div>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" v-model="book.genre" :class="{'is-invalid': errors.genre}">
                        <div v-if="errors.genre" class="invalid-feedback">{{ errors.genre }}</div>
                    </div>
                    <div class="form-group">
                        <label for="published_year">Published Year</label>
                        <input type="number" class="form-control" id="published_year" v-model="book.published_year" :class="{'is-invalid': errors.published_year}">
                        <div v-if="errors.published_year" class="invalid-feedback">{{ errors.published_year }}</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" v-model="book.description" :class="{'is-invalid': errors.description}"></textarea>
                        <div v-if="errors.description" class="invalid-feedback">{{ errors.description }}</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/books" class="btn btn-secondary">Back to Book List</a>
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
                },
                errors: {}
            },
            methods: {
                validateForm() {
                    this.errors = {};
                    if (!this.book.title || this.book.title.length < 3) {
                        this.errors.title = 'Title is required and must be at least 3 characters.';
                    }
                    if (!this.book.author || this.book.author.length < 3 || !this.book.author.includes(' ')) {
                        this.errors.author = 'Author is required, must be at least 3 characters, and include a space.';
                    }
                    if (!this.book.genre || this.book.genre.length < 3) {
                        this.errors.genre = 'Genre is required and must be at least 3 characters.';
                    }
                    const currentYear = new Date().getFullYear();
                    if (!this.book.published_year || !Number.isInteger(+this.book.published_year) || +this.book.published_year > currentYear) {
                        this.errors.published_year = `Published year is required and must be a valid year up to ${currentYear}.`;
                    }
                    if (!this.book.description || this.book.description.length < 100) {
                        this.errors.description = 'Description is required and must be at least 100 characters.';
                    }
                    if (Object.keys(this.errors).length === 0) {
                        this.createBook();
                    }
                },
                createBook() {
                    fetch('/books/create', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(this.book)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Book created successfully');
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
