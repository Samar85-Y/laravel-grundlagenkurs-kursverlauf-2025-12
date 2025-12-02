# Git-Korrektur Tag 1 – Teilnehmer-Version

Ordnerstruktur im GitHub-Repo korrigieren, damit sie zur VM passt.

## Ziel

Dein GitHub-Repository soll später so aussehen:

```txt
laravel/
  campusmanager/     (Laravel-Beispiel-Projekt)
  librarymanager/    (weitere Übungen)
```

Wenn zuvor versehentlich das Laravel-Projekt direkt ins Root gepusht wurde, muss das korrigiert werden.

---

## 1. Prüfen, ob du im richtigen Ordner bist

```bash
cd ~/laravel
ls
```

Erwartet:

```txt
campusmanager
librarymanager
```

---

## 2. Prüfen, ob in den Unterordnern eigene `.git/`-Ordner liegen

Nur ausführen, wenn der Trainer dir sagt, dass du es brauchst.

```bash
ls -a campusmanager
ls -a librarymanager
```

Wenn in einem der Ordner ein `.git/` angezeigt wird → weiter mit Schritt 3.  
Wenn kein `.git/` angezeigt wird → direkt zu Schritt 4.

---

## 3. Falsche `.git/`-Ordner entfernen

⚠️ Wichtig: Nur die `.git`-Ordner in den Unterordnern löschen – nicht den im Projekt-Root!

```bash
rm -rf campusmanager/.git
rm -rf librarymanager/.git
```

Damit werden beide Ordner wieder normale Projektordner.

---

## 4. Alle Änderungen in Git aufnehmen

Falls im `librarymanager`-Verzeichnis noch ein `.git`-Ordner existiert:

```bash
rm -rf .git
git init
git remote add origin https://github.com/<DEIN-ACCOUNT>/<DEIN-REPO>.git
```


```bash
git add .
git commit -m "fix: Ordnerstruktur korrigiert"
```

Wenn Git meldet, dass es nichts zu committen gibt: alles okay.

---

## 5. Normalen Push durchführen

```bash
git push origin main
```

Wenn das funktioniert → fertig!

---

## 6. Falls eine Fehlermeldung kommt

Typische Meldungen:

- non-fast-forward
- rejected
- fetch first
- tip of your current branch is behind

Dann bitte den Trainer rufen.  
Nicht selbst `--force` benutzen!

Der Trainer entscheidet, ob ein Force-Push nötig ist.

---

## Abschluss

Wenn der Push erfolgreich war, sollte dein GitHub-Repo jetzt dieselbe Struktur haben wie deine VM.  
Ab Tag 2 arbeitest du ausschließlich in den Unterordnern:

```bash
cd ~/laravel/campusmanager
```

Alles Weitere folgt im Unterricht.
