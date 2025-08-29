**Test technique en PHP sans Framework**

---

## Description

L'appli permet de rechercher des films via un formulaire de recherche simple et d’afficher via l’API TMDb:

* Les affiches des films
* Le titre et l’année de sortie
* Le synopsis

Un Historique des recherches est disponible en haut a droite de l'app dans la navbar ainsi que dans un fichier log utilisable.


---

## Contraintes imposées

* Recherche de films par titre
* Utilisation de PHP sans framework
* Affichage responsive des résultats via CSS/Bootstrap
* Historique des recherches dans un fichier log
* Utilisation de l’API TMDb pour recuperer les infos du film
* Utilisation de GIT pour le versionning



---

## Installation

1. Cloner le repo :

git clone https://github.com/Bobinette5915/TestLemon.git


2. Ouvrir `config.php` et ajouter le token fournis par TMDb :

```php
<?php
return [
    'api_key' => 'VOTRE_TOKEN_ICI',
    'base_url' => 'https://api.themoviedb.org/3',
    'log_file' => __DIR__ . '/recherche.log'
];
```

3. Lancer un serveur PHP local :

```bash
php -S localhost:8000
```

4. Accéder à l’application dans le navigateur :

```
http://localhost:8000/index.php
```

---

## Structure du projet

```
index.php       → Page principale et formulaire de recherche
main.php        → Fonctions searchMovie() et logSearch()
config.php      → Configuration 
recherche.log   → Historique des recherches avec acces graphique sur index.php
```

---

En vous souhaitant une bonne journée, 
Cordialement
