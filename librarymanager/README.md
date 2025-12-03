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
