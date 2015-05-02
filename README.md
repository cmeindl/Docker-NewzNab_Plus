# Docker-NewzNab_Plus
NewzNab plus as Docker - Does  SQL Run as seperate container

Newznab as a Docker file 
You will need to modify config.php for your settings (im working on making this persist in docker but the way NN install runs is a little painful)
You will also need to modify the Dockerfile to include the NewzNab Plus SVN Username and password (Provided when you registered)

For the first run go to http://yourserver/install   and step through the installer - This forces a Build of the Database in MYSQL and creates a user.

Save NZBs in /nzb/ you will need to use the -v command to expose this volume to your local host filesystem

Dont forget to go to Site Settings in Newznab and add your Newznab user id or you wont get Regex downloads and releases wont build

uses a standard MySQL docker image for database.

Commands to get started 

MySQL
sudo docker run  -v <LocalConfigDir>:/var/lib/mysql --name mysql -e MYSQL_ROOT_PASSWORD=90210 -p 3306:3306 -d mysql:latest

Build the Docker file with 
Sudo docker build -t "newznab" .
Then run with 
sudo docker run --restart=always -v <LocalNZBDir>:/nzb -v /etc/localtime:/etc/localtime:ro   -p 80:80 -d   --name="newznab" newznab



