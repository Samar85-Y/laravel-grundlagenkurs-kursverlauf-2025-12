# Laravel-Grundlagenkurs – Teilnehmer-Starter-Repo

Dieses Repository dient als Ausgangspunkt für den Kurs „Laravel-Grundlagen“.

Es enthält:

- eine leere Projektstruktur (oder Verweis auf das Campusmanager-Projekt)
- diese README mit den wichtigsten Befehlen
- Hinweise zur Arbeit mit VS Code und SSH

---

## Voraussetzungen

- Zugang zu einer Ubuntu-VM (wird im Kurs gestellt)
- VS Code mit „Remote – SSH“-Erweiterung
- PHP und Composer auf der VM installiert

---

## Projekt auf der VM einrichten

1. Per VS Code auf die VM verbinden.
2. Terminal öffnen und Ordner anlegen:

   ```bash
   mkdir -p ~/laravel
   cd ~/laravel
   ```

3. Starter-Repo klonen (URL bekommst du im Kurs):

   ```bash
   git clone <DEINE_REPO_URL> campusmanager
   cd campusmanager
   ```

4. Abhängigkeiten installieren:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

5. Datenbankverbindung in `.env` anpassen (Werte aus dem Kurs übernehmen).

6. Migrationen ausführen:

   ```bash
   php artisan migrate
   ```

7. Entwicklungsserver starten:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

   Danach im Browser:

   ```text
   http://trainer.local:8000
   ```

---

## Nützliche Befehle im Kurs

```bash
# Datenbank migrieren
php artisan migrate

# Datenbank neu aufsetzen und Seeder ausführen
php artisan migrate:fresh --seed

# Konfigurations-Cache leeren (z. B. nach Änderung von .env)
php artisan config:clear
```

---

## Git-Hinweise (optional)

Während des Kurses kannst du deine Arbeit mit Git versionieren:

```bash
git status
git add .
git commit -m "Stand Tag 1"
git push origin main
```

Dieser Teil ist optional und wird im Kurs je nach Zeit behandelt.
 