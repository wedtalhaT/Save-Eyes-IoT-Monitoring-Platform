#include <Arduino.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <TinyGPS++.h>

#define TRIG_PIN 5
#define ECHO_PIN 18
#define MOTOR_PIN 19

const char* ssid = "Karam_4G";
const char* password = "Ka36100@";
const char* serverUrl = "http://192.168.100.13/iot-monitoring-platform/api/device/019dbe8d-f0a5-722c-b1a9-b09f039aa2ac/update";

HardwareSerial gpsSerial(2);
TinyGPSPlus gps;

float lat = 0;
float lng = 0;
bool gpsValid = false;

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

float readDistance() {
    digitalWrite(TRIG_PIN, LOW);
    delayMicroseconds(2);
    digitalWrite(TRIG_PIN, HIGH);
    delayMicroseconds(10);
    digitalWrite(TRIG_PIN, LOW);

    long duration = pulseIn(ECHO_PIN, HIGH, 30000);

    if (duration == 0) return -1;

    return duration * 0.034 / 2;
}

void setup() {
    Serial.begin(115200);
    Serial.println("BOOT START");

    pinMode(TRIG_PIN, OUTPUT);
    pinMode(ECHO_PIN, INPUT);
    pinMode(MOTOR_PIN, OUTPUT);

    digitalWrite(MOTOR_PIN, LOW);
    Serial.println("PINS OK");

    WiFi.begin(ssid, password);
    Serial.print("Connecting WiFi");

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("\nWiFi CONNECTED");

    gpsSerial.begin(9600, SERIAL_8N1, 16, 17);

}

void readGPS() {
    gpsValid = false;

    while (gpsSerial.available()) {
        gps.encode(gpsSerial.read());
    }

    if (gps.location.isValid()) {
        lat = gps.location.lat();
        lng = gps.location.lng();
        gpsValid = true;
    } else {
        gpsValid = false;
    }
}

void sendData(float distance) {
    if (WiFi.status() != WL_CONNECTED) return;

    HTTPClient http;
    http.begin(serverUrl);
    http.addHeader("Content-Type", "application/json");

    String json;

    if (gpsValid) {
        json = "{";
        json += "\"lat\":" + String(lat, 6) + ",";
        json += "\"lng\":" + String(lng, 6) + ",";
        json += "\"distance\":" + String(distance, 2) + ",";
        json += "\"mode\":\"REAL\"";
        json += "}";
    } else {
        json = "{";
        json += "\"lat\":" + String(testCoords[testIndex][0], 6) + ",";
        json += "\"lng\":" + String(testCoords[testIndex][1], 6) + ",";
        json += "\"distance\":" + String(distance, 2) + ",";
        json += "\"mode\":\"TEST\"";
        json += "}";

        testIndex++;
        if (testIndex >= 20) testIndex = 0;
    }

   int httpcode =  http.POST(json);

    Serial.println("DATA: ");
    Serial.println(json);
    Serial.println("HTTP CODE: ");
    Serial.println(httpcode);


    http.end();
}

void loop() {
    float distance = readDistance();

    if (distance > 0 && distance <= 5) {
        digitalWrite(MOTOR_PIN, HIGH);
    } else {
        digitalWrite(MOTOR_PIN, LOW);
    }

    readGPS();
    sendData(distance);

    delay(3000);
}
