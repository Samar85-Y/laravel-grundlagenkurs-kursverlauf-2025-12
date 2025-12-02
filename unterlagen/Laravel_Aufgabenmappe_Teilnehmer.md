# Aufgabenmappe – Laravel Grundlagenkurs

Diese Aufgabenmappe gehört zum Projekt **librarymanager**.

---

## Tag 1 – Routing & Views

1. Lege drei Routen an: `/welcome`, `/team`, `/contact`.
2. Erstelle den `SiteController` mit den Methoden `welcome`, `team`, `contact`.
3. Baue ein Layout `layouts/main.blade.php` mit Header, Navigation und Footer.
4. Erstelle einfache Views für die drei Seiten.

---

## Tag 2 – Models, Migrationen, Seeder

1. Erstelle das Model `Book` mit den Feldern:
   - `title`, `author`, `isbn`, `published_year`, `category`
2. Erstelle eine Migration `books` mit passenden Spalten.
3. Lege einen `BookSeeder` an und füge mindestens 5 Bücher ein.
4. Erstelle eine Route `/books` sowie einen `BookListController`, der alle Bücher anzeigt.

---

## Tag 3 – CRUD für Books

1. Lege einen `BookController` als Resource-Controller an.
2. Implementiere:
   - `index()`, `create()`, `store()`, `edit()`, `update()`, `destroy()`.
3. Erstelle die Views:
   - `books/index.blade.php`
   - `books/create.blade.php`
   - `books/edit.blade.php`
   - `books/show.blade.php`
4. Baue Validierung über eine Request-Klasse `StoreBookRequest`.
5. Zeige Validierungsfehler in einem Partial (`partials/errors.blade.php`) an.

---

## Tag 4 – Relationen Author ↔ Book

1. Erstelle ein Model `Author` mit:
   - `firstname`, `lastname`, `country`
2. Erstelle eine Migration `authors`.
3. Füge in der `books`-Tabelle ein Feld `author_id` als Foreign Key ein.
4. Implementiere Relationen:
   - `Author::books()` → `hasMany(Book::class)`
   - `Book::author()` → `belongsTo(Author::class)`
5. Erstelle einen `AuthorBooksController`, der alle Bücher eines Autors anzeigt.
6. Erstelle eine View `authors/books.blade.php`, die die Bücher eines Autors auflistet.

---

## Tag 5 – API für Books

1. Erstelle einen `BookApiController` im Namespace `App\Http\Controllers\Api`.
2. Implementiere Methoden:
   - `index()` → alle Bücher als JSON
   - `show(Book $book)`
   - `store(Request $request)`
   - `update(Request $request, Book $book)`
   - `destroy(Book $book)`
3. Nutze ein einheitliches JSON-Schema:
   - Erfolg: `{ "success": true, "data": ... }`
   - Fehler: `{ "success": false, "errors": [...] }`
4. Lege in `routes/api.php` die passenden Routen an.
5. Teste alle Endpunkte mit einem API-Client (Thunder Client, Insomnia, Postman).

---

Viel Erfolg! Nutze das Beispielprojekt **campusmanager**, wenn du unsicher bist.