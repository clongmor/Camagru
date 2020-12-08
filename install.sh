# Make sure all neccessary services are running
sudo service sendmail start
sudo service mysql start
sudo service apache2 start

# Refresh the DB
php config/dropdatabase.php
php config/database.php
php config/setup.php