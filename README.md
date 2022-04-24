<!-- ABOUT THE PROJECT -->
## Le projet

![Screenshot]()

L'objectif était de créer un site vitrine qui présente des produits (NFT dans notre cas).

<p align="right">



### Développé sous

* [Laravel](https://laravel.com)

<p align="right">



<!-- GETTING STARTED -->
## Commencer

### Prérequis

1 Installer composer [https://getcomposer.org/]

2 Vérifier la configuration du serveur
  ```sh
    PHP >= 7.3 
    Extension PHP BCMath 
    Extension PHP Ctype 
    Extension PHP Fileinfo 
    Extension PHP JSON 
    Extension PHP Mbstring 
    Extension PHP OpenSSL 
    Extension PHP PDO 
    Extension PHP de Tokenizer 
    Extension PHP XML. 
  ```

### Installation (Windows)

1. Cloner ce repository et ce rendre dans le dossier
   ```sh
   git clone https://github.com/stevenmvn/justmining.git
   cd justmining
   ```
2. Installer les packages
   ```sh
   composer install
   ```
3. Créer une base de données puis modifier le fichier .env avec les informations de votre base de données
   ```yaml
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=justmining
    DB_USERNAME=root
    DB_PASSWORD=
   ```
4. Effectuer une migration pour générer les tables dans la base 
   ```sh
   php artisan migrate
   ```

5. [Conseillé] Générer un jeu de données factice
   ```sh
   php artisan db:seed --class=ProductTableSeeder
   ```

<!-- CONTACT -->
## Contact

MORVAN Steven - [@linkedin](https://www.linkedin.com/in/morvansteven/) - pro.morvan.steven@gmail.com

Lien du projet : [https://github.com/stevenmvn/justmining](https://github.com/stevenmvn/justmining)



