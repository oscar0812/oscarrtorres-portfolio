# CREATE MODELS FROM EXISTING MYSQL DB
  - create MySQL user:
      > mysql

      > GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'passpass';

  - commands:
      > composer require reliese/laravel

      - Add the service provider to your config/app.php file
      Reliese\Coders\CodersServiceProvider::class

      > php artisan vendor:publish --tag=reliese-models

      > php artisan code:models

  - if directory permission error:
      - Doctrine\DBAL\Driver\PDOException::("SQLSTATE[HY000]: General error: 1018 Can't read dir of './lost+found/' (errno: 13 - Permission denied)")

      - find folder
          > sudo find / -type d | grep "lost+found"

      - give it permissions
          > sudo chmod 777 /homestead-vg/master/lost+found


# BACKPACK CRUD INSTALLATION
  - commands:
      > composer update

      > composer require backpack/crud:"4.1.STAR"

      > composer require backpack/generators --dev

      > php artisan config:clear

      > php artisan cache:clear

      > php artisan view:clear

      > php artisan backpack:install

      > php artisan backpack:crud OBJECT
          OBJECT naming convention: table name = 'game_ranks', OBJECT = 'gameRank'

      - Exception: Please use CrudTrait on the model.
          "use Backpack\CRUD\app\Models\Traits\CrudTrait;"

# CREATE USERS AUTH
  - commands:
      > composer require laravel/ui --dev

      > php artisan ui vue --auth

      > npm install && npm run dev
