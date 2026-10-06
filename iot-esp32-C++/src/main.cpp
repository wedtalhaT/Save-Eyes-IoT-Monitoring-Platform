#include <Arduino.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <TinyGPSPlus.h>

#define RXD2 16
#define TXD2 17

const char* ssid = "HUAWEI-1BYRA0";
const char* password = "Aa0530306446";
const char* serverUrl = "http://127.0.0.1/api/device/019dbe8d-f0a5-722c-b1a9-b09f039aa2ac/update";

TinyGPSPlus gps;
HardwareSerial gpsSerial(1);


float testCoords[20][2] = {
    {21.5200, 39.1700}, {21.5201, 39.1701}, {21.5202, 39.1702},
    {21.5203, 39.1703}, {21.5204, 39.1704}, {21.5205, 39.1705},
    {21.5206, 39.1706}, {21.5207, 39.1707}, {21.5208, 39.1708},
    {21.5209, 39.1709}, {21.5210, 39.1710}, {21.5211, 39.1711},
    {21.5212, 39.1712}, {21.5213, 39.1713}, {21.5214, 39.1714},
    {21.5215, 39.1715}, {21.5216, 39.1716}, {21.5217, 39.1717},
    {21.5218, 39.1718}, {21.5219, 39.1719}
};

int testIndex = 0;

float lat = 0;
float lng = 0;
bool gpsValid = false;

void setup()
{
    Serial.begin(115200);

    gpsSerial.begin(9600, SERIAL_8N1, RXD2, TXD2);

    Serial.println("Connecting WiFi...");
    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
    }

    Serial.println("\nWiFi Connected!");
    Serial.println(WiFi.localIP());
}

void loop()
{
   
    while (gpsSerial.available())
    {
        gps.encode(gpsSerial.read());
    }

    if (gps.location.isValid())
    {
        lat = gps.location.lat();
        lng = gps.location.lng();
        gpsValid = true;
    }
    else
    {
        gpsValid = false;
    }

    if (WiFi.status() == WL_CONNECTED)
    {
        HTTPClient http;

        http.begin(serverUrl);
        http.addHeader("Content-Type", "application/json");

        String json;

        if (gpsValid)
        {
            json = "{";
            json += "\"lat\":" + String(lat, 6) + ",";
            json += "\"lng\":" + String(lng, 6) + ",";
            json += "\"mode\":\"REAL\"";
            json += "}";
        }
        else
        {
            float fakeLat = testCoords[testIndex][0];
            float fakeLng = testCoords[testIndex][1];

            json = "{";
            json += "\"lat\":" + String(fakeLat, 6) + ",";
            json += "\"lng\":" + String(fakeLng, 6) + ",";
            json += "\"mode\":\"TEST\"";
            json += "}";

            testIndex++;
            if (testIndex >= 20) testIndex = 0;
        }

        Serial.println("Sending JSON:");
        Serial.println(json);

        int response = http.POST(json);

        Serial.print("HTTP Code: ");
        Serial.println(response);

        http.end();
    }
    else
    {
        Serial.println("WiFi LOST");
    }

    delay(3000);
}