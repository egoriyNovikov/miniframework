feather.replace();

function renderBooks(id = null) {
    const url = id ? `http://localhost:8080/api/?id=${id}` : 'http://localhost:8080/api/';
    
    fetch(url)
        .then(response => response.json())
        .then(books => {
            console.log(books);
            
            const bookList = document.getElementById('bookList');
            bookList.innerHTML = '';
            
            if (Array.isArray(books.result)) {
                books.result.forEach(book => {
                    const row = document.createElement('tr');
                    row.className = 'border-b hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="py-2 px-4">${book.name}</td>
                        <td class="py-2 px-4">${book.author}</td>
                        <td class="py-2 px-4">${book.dt}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <button onclick="editBook(${book.id})" class="text-blue-500 hover:text-blue-700">
                                <i data-feather="edit"></i>
                            </button>
                            <button onclick="deleteBook(${book.id})" class="text-red-500 hover:text-red-700">
                                <i data-feather="trash-2"></i>
                            </button>
                        </td>`;
                    bookList.appendChild(row);
                });
            } else {
                console.error('Ожидался массив книг, получен:', books);
            }
            
            feather.replace();
        })
        .catch(error => {
            console.error('Ошибка при загрузке книг:', error);
        });
}
function deleteBook(index) {
    if (confirm('Are you sure you want to delete this book?')) {
        fetch(`http://localhost:8080/api/?id=${index}`,{
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            renderBooks();
        });
        
    }
}
function addBook() {
    const title = document.getElementById('title').value;
    const author = document.getElementById('author').value;
    const year = document.getElementById('year').value;
    
    const body = {
        name: title,
        author: author,
        dt: year
    };
    
    console.log(body);
    
    fetch('http://localhost:8080/api/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.result.success) {
            renderBooks();
        } else {
            console.error('Ошибка:', data.error);
        }
    })
    .catch(error => {
        console.error('Ошибка при добавлении книги:', error);
    });
}

function editBook(id) {
    fetch(`http://localhost:8080/api/?id=${id}`)
        .then(response => response.json())
        .then(data => {
            const book = data.result;
            document.getElementById('title').value = book.name;
            document.getElementById('author').value = book.author;
            document.getElementById('year').value = book.dt;
            
            const form = document.getElementById('addBookForm');
            form.onsubmit = function(e) {
                e.preventDefault();
                updateBook(id);
            };
            
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.textContent = 'Обновить книгу';
        })
        .catch(error => {
            console.error('Ошибка при загрузке книги:', error);
        });
}

function updateBook(id) {
    deleteBook(id);
    addBook();
    this.reset();
    

}


document.getElementById('addBookForm').addEventListener('submit', function(e) {
    e.preventDefault();
    addBook();
    this.reset();
});


renderBooks();
// feather.replace();
        
//         let books = JSON.parse(localStorage.getItem('books')) || [];
        
//         function renderBooks() {
//             const bookList = document.getElementById('bookList');
//             bookList.innerHTML = '';
            
//             books.forEach((book, index) => {
//                 const row = document.createElement('tr');
//                 row.className = 'border-b hover:bg-gray-50';
//                 row.innerHTML = `
//                     <td class="py-2 px-4">${book.title}</td>
//                     <td class="py-2 px-4">${book.author}</td>
//                     <td class="py-2 px-4">${book.year}</td>
//                     <td class="py-2 px-4 flex space-x-2">
//                         <button onclick="editBook(${index})" class="text-blue-500 hover:text-blue-700">
//                             <i data-feather="edit"></i>
//                         </button>
//                         <button onclick="deleteBook(${index})" class="text-red-500 hover:text-red-700">
//                             <i data-feather="trash-2"></i>
//                         </button>
//                     </td>
//                 `;
//                 bookList.appendChild(row);
//             });
//             feather.replace();
//         }
        

        

        
       
        
//         renderBooks();


