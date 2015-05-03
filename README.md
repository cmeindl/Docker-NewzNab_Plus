# Docker-NewzNab_Plus
NewzNab plus as Docker -  SQL Runs as seperate container

Newznab as a Docker file  (http://www.newznab.com/)
You will need to modify config.php for your settings (im working on making this persist in docker but the way NN install runs is a little painful)
You will also need to modify the Dockerfile to include the NewzNab Plus SVN Username and password (Provided when you registered)

For the first run go to http://yourserver/install   and step through the installer - This forces a Build of the Database in MYSQL and creates a user.

Save NZBs in /nzb/ you will need to use the -v command to expose this volume to your local host filesystem

Dont forget to go to Site Settings in Newznab and add your Newznab user id or you wont get Regex downloads and releases wont build

uses a standard MySQL docker image for database.

MySQL
```
sudo docker run  -v <LocalConfigDir>:/var/lib/mysql --name mysql -e MYSQL_ROOT_PASSWORD=xxxxx -p 3306:3306 -d mysql:latest
```
 Newznab
Build the Docker file: 
```
git clone https://github.com/cmeindl/Docker-NewzNab_Plus.git
cd Docker-NewzNab_Plus
Sudo docker build -t "newznab" .
```
Start the image:
```
sudo docker run --restart=always -v <LocalNZBDir>:/nzb -v /etc/localtime:/etc/localtime:ro   -p 80:80 -d   --name="newznab" newznab
```
# Home Theatre Setup
This forms part of a Broader home TV System- The remainder use off the Shelf Docker files from Tim-Haak (https://github.com/timhaak)

Plex
```
git clone git@github.com:timhaak/docker-plex.git
cd docker-plex
docker build -t plex .
sudo docker run --restart=always -d --net="host" -v <LocalConfigDir>:/config -v <LocalDataDir>:/data  -v /etc/localtime:/etc/localtime:ro -p 32400:32400   --name="plex"  plex
```
Sabnzbd
```
git clone https://github.com/timhaak/docker-sabnzbd.git
cd docker-sabnzbd
docker build -t sabnzbd .
sudo docker run --restart=always -d -h ubuntu -v <LocalConfigDir>:/config -v <LocalDataDir>/data -v <LocalFileProcessDIr>:/ToProcess -v /etc/localtime:/etc/localtime:ro -p 8080:8080 -p 9090:9090 --name="sabnzbd" sabnzbd 
```
SickRage
```
git clone  https://github.com/timhaak/docker-sickrage.git
cd docker-sickrage
docker build -t sickrage .
sudo docker run --restart=always -d -h ubuntu -v <LocalConfigDir>:/config -v <LocalDataDir>:/data   -v <LocalFileProcessDIr>:/ToProcess  -v /etc/localtime:/etc/localtime:ro -p 8081:8081 --name="sickrage" sickrage
```
The /ToProcess file is where Sickrage processes files from and Sabnzbd Saves donloaded files too, Note I have mounted this externally, you could use Dockers internal concept of Volumes from but sometimes you need to look at the processing directory and fix or delete files so I have it on an accesible file system for ease

