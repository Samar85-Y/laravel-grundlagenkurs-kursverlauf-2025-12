# LibraryManager – Aufgabenstellung Tag 1 (Laravel-Kurs)

Heute legst Du die Basis für das Projekt **LibraryManager**: Projektstruktur, Datenbank, erste Route und eine erste View.

---

## 1. Neues Laravel-Projekt erstellen

```bash
laravel new librarymanager
```

oder

```bash
composer create-project laravel/laravel librarymanager
```

---

## 2. Lokalen Server starten

```bash
php artisan serve
```

---

## 3. Datenbank vorbereiten

1. Neue Datenbank erstellen, z. B.:  
   **librarymanager**

2. In der `.env` eintragen:

```
DB_DATABASE=librarymanager
DB_USERNAME=dein_user
DB_PASSWORD=dein_passwort
```

3. Verbindung testen:

```bash
php artisan migrate
```

---

## 4. Controller & Route anlegen

Controller erstellen:

```bash
php artisan make:controller BookController
```

Route in `routes/web.php`:

```php
Route::get('/books', [BookController::class, 'index']);
```

---

## 5. Erste View erstellen

Datei:  
`resources/views/books.blade.php`

Inhalt: Begrüßungstext wie  
„LibraryManager – Startseite“.

---

## 6. Controller mit View verbinden

```php
public function index()
{
    return view('books');
}
```

# LibraryManager – Aufgabenstellung Tag 2 (Laravel-Kurs)

Heute arbeitest Du an den ersten echten Datenstrukturen: Migration, Model und erste Datenbankabfragen.

---

## Übung 5: Book Model

**Datei**: `app/Models/Book.php`

Model mit `$fillable`:

* `title`
* `author`
* `isbn`
* `published_year`
* `category`

---

## Übung 6: Migration für Books

**Datei**: `database/migrations/...create_books_table.php`

Spalten:

* `title` (string)
* `author` (string)
* `isbn` (string, unique)
* `published_year` (unsigned integer, nullable)
* `category` (string, nullable)

Mit Tinker ein paar Bücher anlegen:

```bash
php artisan tinker
```

Beispiel:

```php
Book::create([
  'title' => 'Der Hobbit',
  'author' => 'J.R.R. Tolkien',
  'year' => 1937
]);
```

Mindestens drei Bücher anlegen.

---

## Übung 7: Seeder für Book

**Datei**: `database/seeders/BookSeeder.php`

Anforderungen:

* min. 5 feste Bücher mit realistischem Inhalt
* optional: zusätzliche Faker-Daten

---

## Übung 8: Route & Controller für Bücherliste

Route in `web.php` mit:

```bash
/books
```

Controller:

**Datei**: `app/Http/Controllers/BookListController.php`

Aufgabe:

* Alle Bücher laden, sinnvoll sortieren
* An View übergeben

---

## Übung 9: Bücherliste anzeigen

**Datei**: `resources/views/books/index.blade.php`

Darstellung:

* Tabelle mit Spalten
  * Titel
  * Autor
  * ISBN
  * Erscheinungsjahr
  * Kategorie
* Hinweis, falls keine Bücher existieren

---
# LibraryManager – Aufgabenstellung Tag 5 (Laravel-Kurs)

Heute baust Du Extras ein: API-Controller, Pagination, einfache Suche und ein wenig Layout-Feinschliff.

---

## Übung 23: API-Controller für Books

**Datei**: `app/Http/Controllers/Api/BookApiController.php`

Methoden:

* `index()` → alle Bücher
* `show(Book $book)`
* `store(Request $request)`
* `update(Request $request, Book $book)`
* `destroy(Book $book)`

Alle Rückgaben im Format:

```json
{
  "success": true,
  "data": ...
}
```

---

## Übung 24: API-Routen

**Datei**: `routes/api.php`

```bash
GET    /api/books
GET    /api/books/{book}
POST   /api/books
PUT    /api/books/{book}
DELETE /api/books/{book}
```

---

## Übung 25: Einheitliche API-Response

Anweisung:

* Erfolg: `{ success: true, data: ... }`
* Fehler: `{ success: false, errors: [...] }`
* Statuscodes korrekt setzen (201 bei create, 404 bei Fehlzugriff etc.)

---

## Zusatz (optional)

### 1. Pagination einbauen

Im `BookController` in der `index`-Methode anstelle von `Book::all()`:

```php
$books = Book::orderBy('title')->paginate(5);

return view('books', ['books' => $books]);
```

In `resources/views/books.blade.php` unter der Liste:

```blade
{{ $books->links() }}
```

---

### 2. Einfache Suche nach Titel oder Autor

#### Route anpassen

Die vorhandene `/books`-Route bleibt, wird aber um Suchlogik ergänzt (nur im Controller ändern).

#### Controller anpassen

In der `index`-Methode:

```php
public function index(Request $request)
{
    $query = Book::query();

    if ($request->filled('q')) {
        $q = $request->input('q');

        $query->where(function ($sub) use ($q) {
            $sub->where('title', 'like', '%' . $q . '%')
                ->orWhere('author', 'like', '%' . $q . '%');
        });
    }

    $books = $query->orderBy('title')->paginate(5)->withQueryString();

    return view('books', [
        'books' => $books,
        'q' => $request->input('q')
    ]);
}
```

#### Suchformular in der View

Oben in `resources/views/books.blade.php`:

```blade
<form action="/books" method="GET">
    <input
        type="text"
        name="q"
        placeholder="Suche nach Titel oder Autor"
        value="{{ $q ?? '' }}"
    >
    <button type="submit">Suchen</button>
</form>
```

---

### 3. Layout-Feinschliff

* Überschrift über die Liste setzen, z. B.:

  ```blade
  <h1>LibraryManager – Bücherliste</h1>
  ```

* Die Ausgaben der Bücher in eine ungeordnete Liste packen:

  ```blade
  <ul>
      @foreach ($books as $book)
          <li>
              {{ $book->title }} – {{ $book->author }} ({{ $book->year }})
              <!-- Links für Bearbeiten/Löschen bleiben erhalten -->
          </li>
      @endforeach
  </ul>
  ```

* Optional: Einfache CSS-Klassen hinzufügen (z. B. in einer gemeinsamen Layout-Datei oder direkt mit Klassenattributen).

---
