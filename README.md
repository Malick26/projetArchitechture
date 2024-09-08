# projetArchitechture

Participants :
Malick Wane
Pape Toule Yade
Guide d'Installation 
Prérequis :

XAMPP ou tout autre serveur local compatible avec PHP et MySQL.
Composer (pour la gestion des dépendances PHP).
Git (optionnel).
Étapes d'Installation
1. Cloner le Projet
2. Installer les Dépendances
      composer install
      npm install
3. Importation de la base de donnee (nom : management) 
4. generation cle
    php artisan key:generate
5. Démarrer le Serveur
   php artisan serve
7. demarrage
   npm run dev


Fonctionnalite : 
Apres avoir suivi les etapes de l'installation vous pouvez voir 3 type de profils (admin , supplier et customer)

admin :
Pour se connecter il faut mettre adresse mail : admin@gmail.com et mot de passe : 12345678
L'administration gere la gestion des utlisateurs il peut creer un utilisateur definir son type , l'editer ou le supprimer
il est notifier aussi a chaque commande il suffit de cliquer sur l'icone notification pour voir les notifications

supplier:
Pour se connecter il faut mettre adresse mail : supplier@gmail.com et mot de passe : 12345678
Le supplier gere la gestion de ses produits , stock il peut creer un produit definir son prix et stock, l'editer ou le supprimer
il est notifier aussi a chaque commande il suffit de cliquer sur l'icone notification pour voir les notifications
il peut voir aussi la liste des ses stock

customer:
Pour se connecter il faut mettre adresse mail : customer@gmail.com et mot de passe : 12345678
Le customer gere la gestion de ses commandes il peut creer une commande definir la quantite 
il peut voir ces commande apres avoir valider sa commande en cliquand sur commande il peut meme telechager la facture 
chaque fois qu'il valide une commande le stock sera mis a jour il peut pas commander plus que le stock
