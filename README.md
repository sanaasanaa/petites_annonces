# petites_annonces

Projet en groupe - Temps estimés : 15 jours
Technologies, outils et concept travaillés : HTML / CSS, PHP, POO, MVC, AltoRouter, Réécritures
d'url, Serveur web local, IDE, PhpMyAdmin, Mysql, Git, Composer, SASS, twig
Description du projet
Vous aller devoir créer un site de petites-annonces qui n’utilise pas de logins et de mots de passe
pour créer une annonce. Concrètement le site doit afficher les annonces créées et permettre
d’ajouter une annonce avec une simple adresse courriel.
Lors de la création d’une nouvelle annonce par un utilisateur anonyme celui-ci va recevoir un
courriel permettant de valider son annonce s’il clique sur un lien, dans ce même courriel un autre
lien lui permettra de modifier son annonce visuellement avant de la valider. Une fois celle-ci
validée il recevra un courriel de confirmation comme quoi l’annonce a bien été mise en ligne et
aura dans ce même courriel la possibilité de la supprimer. Vous devez mettre en place des
messages de confirmation lors de la validation et lors de la suppression.
Vous devez penser à la sécurité de l’application : en effet les nouvelles annonces ne doivent pas
être modifiable sans le lien. grâce à un identifiant unique pour chaque annonce qui vous
permettra de la récupérer pour afficher le formulaire de modification.
La page d’accueil doit lister les 10 premières annonces du site et permettre d’afficher les suivantes
10 par 10.
Lorsque l’on clique sur une annonce afin de la visualiser plus précisément, celle doit afficher un
lien permettant de la télécharger au format pdf.
Vous devez afficher une image par défaut dans le cas ou l’utilisateur n’ait pas ajouter d’image a
son annonce. Lors de la création de l’annonce ne pas ajouter d’image ne doit être pas bloquant
pour l’utilisateur.
Les +
1. Tâche cron qui supprime les annonces qui sont en attente de publication à n+2 jours de la
date de création. Envoyer un courriel à la personne de la suppression de son annonce en
attente.
2. Tâche cron qui supprime les annonces qui sont publiées à n+15 jours de la date de
création. Envoyer un mail à la personne de la suppression de son annonce
3. Créer un infinite-scroll pour la pagination des annonces 
