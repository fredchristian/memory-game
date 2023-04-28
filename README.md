# Memory game

Ce repository est un PoC (Proof of Concept) démontrant qu'il est possible de créer un memory game en s'appuyant sur la TALL stack, qui englobe [TailwindCSS](https://tailwindcss.com/docs/), [AlpineJS](http://alpinejs.dev/docs), [Livewire](https://laravel-livewire.com/docs/quickstart) et [Laravel](https://laravel.com/docs/10.x).

Les fonctionnalités sont pour l'heure très rudimentaires, il est fort probable que le markup HTML et le CSS puissent être largement amélioré et optimisé, tout comme le code propre à la logique du jeu, qui s'appuye énormément sur le couple Livewire/AlpineJS

## Installation

Après clonage du repository, lancer la commande suivante afin d'installer les dépendances

````
composer install && npm install
````

suivi de la commande 

````
npm run build && artisan serve
````

pour pouvoir lancer une instance (accessible via http://localhost:8000)

## What's next? 

Pour l'heure, rien de précis. Dans la liste des fonctionnalités éventuelles, il y avait :
- une animation qui indique que les deux cartes ne sont pas similaires en cas de match échoué
- un écran "game over" qui s'affiche à la fin d'une partie
- un système de high-score, avec des enregistrements d'un timer/nombre de coups joués via SQLite ou tout autre SGBD compatible avec l'un des drivers de Laravel
