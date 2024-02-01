sudo apt-get update
sudo apt-get install apache2 php php-mysql -y
sudo phpenmod mysqli
sudo systemctl restart apache2
sudo loadkeys ch