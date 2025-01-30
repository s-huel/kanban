# Todo-List Applicatie

Dit is een eenvoudige todo-list applicatie gebouwd met PHP en MySQL. De applicatie maakt gebruik van een kanban-board stijl, waarbij taken worden georganiseerd in drie kolommen: **Todo**, **In Progress** en **Done**. Je kunt taken toevoegen, verplaatsen tussen kolommen en verwijderen.

---

## **Functies**
- **Taken Toevoegen**: Voeg nieuwe taken toe aan een kolom.
- **Taken Verplaatsen**: Verplaats taken tussen kolommen (bijvoorbeeld van **Todo** naar **In Progress**).
- **Taken Verwijderen**: Verwijder taken die niet meer nodig zijn.

---

## **Technologieën**
- **PHP**: Voor de backend logica.
- **MySQL**: Voor het opslaan van taken en kolommen.
- **PDO**: Voor een veilige databaseverbinding.
- **HTML/CSS**: Voor de frontend weergave.

---

## **Installatie**

### **Stap 1: Clone het Project**
>Clone dit project naar je lokale machine:

```bash
git@github.com:s-huel/kanban.git
```

### **Stap 2: Importeer de Database**
>In de structuur kun je de import voor de database terug vinden onder `/app/database/import.sql`.

>Het `import.sql` bestand moet je in een database programma importeren. Een voorbeeld van zo een programma kan Phpmyadmin zijn.

### **Stap 3: Configureer de Databaseverbinding**
>Pas de databasegegevens aan in `database/connect.php` als dat nodig is:

```php
$host = 'localhost';
$db = 'todo_list_db';
$user = 'root';
$pass = 'root';
```

### **Stap 4: Start de Applicatie**
Nu kun je de applicatie runnen op jouw apparaat. Aangezien ik een lokale host op mijn laptop heb staan waardoor het automatisch runt zijn er in principe maar 2 opties.

>De beste optie, naar mijn mening, is het runnen van het volgende commando in de terminal:
```bash
php -S localhost:8000
```

>Een ander prima optie zou het gebruik kunnen zijn van een applicatie zoals xampp of Wamp. Dit zou ik eerder aanraden voor een Windows gebruiker dan een Mac of Linux gebruiker.

---


## **Hoe Gebruik je de Applicatie?**

1. Taken Toevoegen

    >Vul het formulier onder een kolom in en klik op Item toevoegen.

    >De taak wordt toegevoegd aan de geselecteerde kolom.

2. Taken Verplaatsen

    >Klik op de knop [ Naar In Progress ] of [ Naar Done ] om een taak naar de volgende kolom te verplaatsen.

    >Taken in de Done kolom kunnen niet verder worden verplaatst.

3. Taken Verwijderen

    >Klik op de knop [ X ] om een taak te verwijderen.

---

## Bestand Structuur

```bash
todo-list/
├── database/
│   ├── connect.php          # Databaseverbinding
│   └── import.sql           # Database setup en voorbeeldgegevens
├── css/
│   └── styles.css           # Styling voor de applicatie
├── index.php                # Hoofdpagina
├── move_item.php            # Verwerkt het verplaatsen van taken
├── delete_item.php          # Verwerkt het verwijderen van taken
└── README.md                # Dit bestand
```

---

## **Toekomstige Verbeteringen**
>Gebruikersauthenticatie: Voeg gebruikers toe zodat iedereen zijn eigen takenlijst heeft.

>Drag-and-Drop: Maak het mogelijk om taken te slepen tussen kolommen.
