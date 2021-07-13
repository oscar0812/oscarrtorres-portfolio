# only run this inside the server
# cd code
# run: sudo bash update.sh

# folder permissions
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data storage/app
sudo chown -R $USER:www-data bootstrap/cache
# sudo chown -R $USER:www-data public/uploads
# sudo chown -R $USER:www-data public/uploads/*
# sudo chown -R $USER:www-data public/uploads/*/*
# sudo chown -R $USER:www-data public/uploads/games

chmod -R 775 storage
chmod -R 775 storage/app
chmod -R 775 bootstrap/cache
# chmod -R 775 public/uploads
# chmod -R 775 public/uploads/*
# chmod -R 775 public/uploads/*/*
# chmod -R 775 public/uploads/games

# set the timezone
sudo timedatectl set-timezone America/Chicago

# COMPOSER_MEMORY_LIMIT=-1 composer install
php artisan cache:clear
php artisan config:clear
php artisan view:clear
# COMPOSER_MEMORY_LIMIT=-1 composer dump-autoload -o
