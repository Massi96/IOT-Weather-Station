This project implements a weather station to measure temperature, humidity and atmospheric pressure. 
It also manages to send the collected data to a database and displayed on a web page. 
Three components are used:

* DHT11 (For measuring temperature and humidity)
* BMP180 (For atmospheric pressure)
* NodeMCU (For communication with the database)

In addition, measurements are stored and displayed with three php file:

* add.php (To update the database)
* connect.php (To connect with the database)
* index.php (To view the database table)

The Progetto_reti.ino file contains the code for obtaining the measurements.
