#include <ESP8266WiFi.h>
#include <Wire.h>
#include <BMP180.h>
#include "dht.h"

const char *wifi_ssid = ""; //Nome della rete
const char *wifi_password = ""; //Password della rete
float valueTemperature; //Variabile per la temperatura
float valueHumidity; //Variabile per l'umidità
long valuePressure; //Variabile per la pressione
const char* server = "192.168.178.36"; //Indirizzo IP del terminale 
String strURL = ""; //Stringa inviata da arduino dopo la connessione

dht DHT;
BMP180 barometer;
WiFiClient client;
 
void setup(void)
{  
  Serial.begin(9600); //Numero di Baud con cui lavora l'ESP8266
  Serial.println("");
  delay(1000);//Tempo necessario per l'accensione del sensore
  
  Serial.print("Connessione a ");
  Serial.println(wifi_ssid);
  setup_wifi(); //Connessione alla rete WiFi
  
  pinMode(D4,INPUT); //Inizializziamo il pin D4 come input(DHT11)
  pinMode(D3,INPUT); //Inizializziamo il pin D3 come input(BMP180)
  barometer = BMP180();
  barometer.initialize();
}
 
void loop(void)
{   
  DHT.read11(D4);
  
  valueTemperature = DHT.temperature;//Acquisizione della temperatura
  valueHumidity =  DHT.humidity; //Acquisizione dell' umidità
   valuePressure = barometer.GetPressure(); //Acquisizione della pressione
  
  if(client.connect(server,80))
  {
    //Creo L'url utilizzando una stringa
    strURL = "GET /add.php?Temperatura=";
    strURL +=  valueTemperature; 
    strURL += "&Umidita=";
    strURL += valueHumidity;
    strURL += "&Pressione=";
    strURL += "valuePressure"
    strURL += " HTTP/1.1";
    
    //Invio la richiesta al server
    client.println(strURL);
    client.println("Host: arduino");                              
    client.println("Connection: close");
    client.println();
    
    //chiudo la connessione
    client.stop();
  }
  
  delay(30000); //Manda una richiesta HTTP GET ogni 30 secondi*/
}
 
/***** Funzioni ***********************************************************************/
void setup_wifi() 
{
  WiFi.begin(wifi_ssid, wifi_password); 
  Serial.print("Mi sto connettendo");
  
  while (WiFi.status() != WL_CONNECTED) 
  {
    delay(500);
    Serial.print(".");
  }
  
  Serial.println("");
  Serial.print("Connessione riuscita! ");
}
