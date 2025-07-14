# Analisi Funzionale per l'Applicazione Blog in Laravel

Questo documento delinea le funzionalità essenziali per lo sviluppo di un'applicazione blog basata sul framework Laravel, suddividendole in aree accessibili agli utenti non autenticati (pubbliche) e agli utenti autenticati (amministrazione).

---

## Area Pubblica (Accesso non autenticato)

L'area pubblica del blog sarà accessibile a chiunque e presenterà i contenuti principali del sito.

* **Homepage (URL: `http://localhost/`)**:
    * Visualizzazione di un **elenco dei post** disponibili.
    * **Dashboard** in alto, composta da:
        * **Titolo del Blog**: Posizionato a sinistra. Cliccando su di esso si verrà reindirizzati alla homepage (`http://localhost/`).
        * **Navigazione**: Posizionata a destra, con i seguenti link:
            * **Home**: Reindirizza alla homepage (`http://localhost/`).
            * **About**: Reindirizza a una pagina di descrizione del blog.

* **Visualizzazione Post Completo**:
    * Dall'elenco dei post sulla homepage, sarà possibile cliccare su un singolo post per visualizzarne il contenuto completo.
    * Una volta visualizzato il post completo, sarà presente un'opzione o un link per **tornare indietro all'elenco dei post**.

---

## Area Amministrazione (Accesso autenticato)

L'area di amministrazione sarà protetta da autenticazione e permetterà la gestione completa dei contenuti del blog.

* **Pagina di Login (URL: `http://localhost/login`)**:
    * Accesso alla pagina di login standard di Laravel, dove gli utenti registrati potranno inserire le proprie credenziali.

* **Dashboard Amministrativa (Accesso dopo il login)**:
    * Una volta effettuato il login, l'utente verrà reindirizzato alla dashboard amministrativa.
    * **Messaggio di Benvenuto**: Verrà visualizzato un messaggio che indica che l'utente è attualmente loggato.
    * **Menu di Navigazione Amministrativo**: Saranno presenti le seguenti sezioni per la gestione dei contenuti:

    * **Posts**:
        * **Elenco dei post**: Visualizzazione di tutti i post presenti nel blog.
        * **Gestione post**: Possibilità di **cancellare**, **modificare** e **aggiungere** nuovi post.

    * **Categories**:
        * **Elenco delle categorie**: Visualizzazione di tutte le categorie definite per i post.
        * **Gestione categorie**: Possibilità di **cancellare**, **modificare** e **aggiungere** nuove categorie.

    * **Tags**:
        * **Elenco dei tag**: Visualizzazione di tutti i tag associati ai post.
        * **Gestione tag**: Possibilità di **cancellare**, **modificare** e **aggiungere** nuovi tag.


# Schema per DB
* **users**
	* **id**
	* **name**
	* **email**
	* **email_verified_at**
	* **password**
	* **remember_token**
	* **created_at**
	* **updated_at**
* **posts (articoli)**
	* **id**
	* **title**
	* **post**
	* **category_id**
	* **image**
	* **user_id**
	* **created_at**
	* **updated_at**
* **categories**
	* **id**
	* **name**
	* **created_at**
	* **updated_at**
* **tags**
	* **id**
	* **name**
	* **created_at**
	* **updated_at**
* **post_tags**
	* **post_id**
	* **tag_id**

# Passi realizzazione progetto

## Db e Modelli

* **Creazione modelli e migrazioni**  
  Creare modello, migrazione, factories e seeders.   
  Se vuoi creare tutto assieme usa l'opzione -mfs (migration, factory, seeder)   
  php artisan make:model Nome_modello -mfs (Il nome del modello deve essere maiuscolo e al singolare)  
  Es: sail php artisan make:model Category -mfs 

  Quindi incomincio a descrivere la struttura dei dati nella migrazione  
  e poi a inserire i valori di prova nella factory e il numero di occorrenze nel seeder e gli eventuali legami con altre tabelle.  

  Per creare solo la migrazione di una tabella di nome post_tag   
  Es: sail php artisan make:migration --create post_tag create_post_tag_table

  Per lanciare le migrazioni creando solo le tabelle => sail php artisan migrate 
  Per cancellare tutto e rilanciare le migrazioni creando solo le tabelle => sail php artisan migrate:fresh  
  Per cancellare tutto e rilanciare le migrazioni popolando le tabelle => sail php artisan migrate:fresh --seed  

  Per indicare le chiavi esterne (foreign key) usare nella migrazione:  
  $table->foreignId('category_id')->constrained();

  * **Differenza chiave esterna Laravel**  
In Laravel, la dichiarazione di una chiave esterna in una migrazione può avvenire in due modi principali: con il metodo constrained() oppure senza, utilizzando il metodo foreignId() o altre forme esplicite. La differenza tra i due approcci riguarda principalmente la convenzione e la facilità di utilizzo.

    Chiave esterna con constrained()
    Il metodo constrained() è una forma abbreviata e convenzionale per definire una chiave esterna. Laravel assume automaticamente il nome della tabella e della colonna a cui si riferisce la chiave esterna, in base al nome della relazione definita nel modello. Ad esempio:

    $table->foreignIdFor(User::class)->constrained();
    In questo caso, Laravel presuppone che la chiave esterna si riferisca alla colonna id della tabella users. Questo approccio riduce la quantità di codice necessario e minimizza la possibilità di errori, grazie all'uso delle convenzioni del framework.

    Chiave esterna senza constrained()
    Se invece si utilizza il metodo foreignId() senza constrained(), è necessario specificare manualmente la tabella e la colonna a cui si riferisce la chiave esterna. Ad esempio:

    $table->foreignId('user_id')->constrained('users');
    In questo caso, si ha maggiore flessibilità, poiché si può indicare esplicitamente il nome della tabella e della colonna, senza dover seguire le convenzioni predefinite. Questo è utile quando si lavora con tabelle o colonne che non seguono le convenzioni di Laravel, come tabelle legacy o con nomi non standard.

## Rotte
To do


# Roadmap di Laravel: Sfida Livello Principiante
Questo è un compito per il livello principiante della Roadmap di Laravel, con l'obiettivo di implementare il maggior numero possibile di argomenti.

Questo repository è volutamente vuoto, con solo un file Readme. Il tuo compito consiste nell'inviare una Pull Request con la tua versione dell'implementazione del compito e la tua PR potrebbe essere esaminata da qualcuno del nostro team o da altri volontari.

L'obiettivo: Blog personale semplice
Devi creare un blog personale con solo tre pagine:

Homepage: Elenco degli articoli
Pagina dell'articolo
Una pagina di testo statico come "Chi sono"
Inoltre, dovrebbe esserci un meccanismo di accesso (ma non di registrazione) per consentire all'autore di scrivere articoli:

Gestire (ovvero, creare/aggiornare/eliminare) le categorie
Gestire i tag
Gestire gli articoli
Per l'Auth Starter Kit, usa Laravel Breeze (Tailwind) o il tuo starter kit preferito: il design è irrilevante per il raggiungimento dell'obiettivo
Struttura del DB:

L'articolo ha un titolo (obbligatorio), testo completo (obbligatorio) e un'immagine da caricare (facoltativa)
L'articolo può avere una sola categoria, ma può avere più tag
Funzionalità da implementare
Ecco l'elenco delle funzionalità di Laravel che devi provare a implementare nel tuo codice:

Routing e controller: nozioni di base

Funzioni di callback e Route::view()
Routing a un singolo metodo del controller
Parametri di route
Denominazione delle route
Route Gruppi
Nozioni di base su Blade

Visualizzazione delle variabili in Blade
Strutture If-Else e Loop di Blade
Loop di Blade
Layout: @include, @extends, @section, @yield
Componenti Blade
Nozioni di base sull'autenticazione

Modello di autenticazione predefinito e accesso ai suoi campi da qualsiasi posizione
Controllo dell'autenticazione in Controller / Blade
Middleware di autenticazione
Nozioni di base sui database

Migrazioni di database
Modello Eloquent di base e MVC: Controller -> Modello -> Vista
Relazioni Eloquent: belongsTo / hasMany / belongsToMany
Caricamento Eager e problema di query N+1
CRUD semplice completo

Controller di risorse di routing e controller con risorse
Form, convalida e richieste di form
Caricamenti di file e nozioni di base sulle cartelle di archiviazione
Paginazione delle tabelle
Soluzioni di esempio
Se hai bisogno di aiuto o vuoi confrontare la tua versione con la nostra versione semplice, ecco due repository pubblici con la soluzione:

Laravel Roadmap Beginner: Breeze Starter Kit
Laravel Roadmap per principianti: Laravel Daily Starter Kit
Nota: consulta questi repository SOLO DOPO aver completato l'attività da solo, o se sei sicuro delle tue competenze di Laravel per principianti e pensi di non aver bisogno di esercitarti.


<h3 align="left">Languages and Tools:</h3>
<p align="left"> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg" alt="laravel" width="40" height="40" /> </a> <a href="https://www.linux.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/linux/linux-original.svg" alt="linux" width="40" height="40"/> </a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> <a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a> </p>

            
          