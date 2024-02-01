sudo apt-get update
sudo apt-get install mysql-server -y
sudo loadkeys ch
sudo sed -i 's/bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo systemctl restart mysql
sudo mysql -uroot -e "
CREATE DATABASE IF NOT EXISTS vagra1;
use vagra1;
CREATE TABLE IF NOT EXISTS song(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(100),
  testo VARCHAR(500),
  PRIMARY KEY(id)
);
INSERT INTO song (title,testo) VALUES('lost1','What the hell is fucking wrong with me?');
INSERT INTO song (title,testo) VALUES('lost2','I guess there s no remedy, Im so terribly lost');
CREATE USER IF NOT EXISTS 'webAccess'@'10.10.20.10' IDENTIFIED BY 'Password&1';
GRANT SELECT, INSERT, ALTER ON vagra1.* TO 'webAccess'@'10.10.20.10';
FLUSH PRIVILEGES;
"