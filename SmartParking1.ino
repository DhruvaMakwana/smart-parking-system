#include <AsyncEventSource.h>
#include <AsyncJson.h>
#include <AsyncWebSocket.h>
#include <AsyncWebSynchronization.h>
#include <ESPAsyncWebSrv.h>
#include <SPIFFSEditor.h>
#include <StringArray.h>
#include <WebAuthentication.h>
#include <WebHandlerImpl.h>
#include <WebResponseImpl.h>

#include <WiFi.h>
#include <ESP32Servo.h>

#define SERVO_PIN 16                                                   // Define servo motor pin
#define IR1_PIN 12                                                     // Define IR sensor 1 pin
#define IR2_PIN 13                                                     // Define IR sensor 2 pin
#define IR3_PIN 14                                                     // Define IR sensor 3 pin
#define IR4_PIN 15                                                     // Define IR sensor 4 pin

const char* ssid = "Rushabh";                                          // network credentials
const char* password = "Captain@123";

Servo servo;                                                           // Create a Servo object
AsyncWebServer server(80);                                             // Create a web server on port 80

void setup() {
  pinMode(IR1_PIN, INPUT);                                             // Set IR sensor 1 pin as input
  pinMode(IR2_PIN, INPUT);                                             // Set IR sensor 2 pin as input
  pinMode(IR3_PIN, INPUT);                                             // Set IR sensor 3 pin as input
  pinMode(IR4_PIN, INPUT);                                             // Set IR sensor 4 pin as input
  servo.attach(SERVO_PIN);                                             // Attach the servo motor to the specified pin
  Serial.begin(9600);                                                  // Start serial communication
  WiFi.begin(ssid, password);                                          // Connect to Wi-Fi network
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
  server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    request->send(200, "text/plain", "Hello, world");
  });
  server.begin();                                                      // Start the web server
}

void loop() {
  int ir1 = digitalRead(IR1_PIN);                                      // Read the state of IR sensor 1
  int ir2 = digitalRead(IR2_PIN);                                      // Read the state of IR sensor 2
  int ir3 = digitalRead(IR3_PIN);                                      // Read the state of IR sensor 3
  int ir4 = digitalRead(IR4_PIN);                                      // Read the state of IR sensor 4

  Serial.print("IR Sensor Values: ");
  Serial.print(ir1);
  Serial.print(", ");
  Serial.print(ir2);
  Serial.print(", ");
  Serial.print(ir3);
  Serial.print(", ");
  Serial.println(ir4);

  if (ir1 == LOW ) {                                                   // Entry Sensor detect Obstacle
    if (ir3 == HIGH)  {                                                // SLot 1 is Empty
      Serial.print("Slot :1\n");  
      for (int pos = 0; pos <= 180; pos += 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);                                                     // waits 15ms for the servo to reach the position
      }
      delay(2000);
      for (int pos = 180; pos >= 0; pos -= 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);                                                     // Rotate Servo to -90 Degree
      }
    }

    else if (ir3 == LOW && ir4 == HIGH) {                              // Slot 2 is Empty
      Serial.print("Slot :2\n");
      for (int pos = 0; pos <= 180; pos += 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);                                                     // waits 15ms for the servo to reach the position
      }
      delay(2000);
      for (int pos = 180; pos >= 0; pos -= 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);
      }
    }

    else if (ir3 == HIGH && ir4 == HIGH) {                             // Both Slots are Empty
      Serial.print("Slot :1\n");  
      delay(2000);
      for (int pos = 0; pos <= 180; pos += 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);                                                     // waits 15ms for the servo to reach the position
      }
      delay(2000);
      for (int pos = 180; pos >= 0; pos -= 1) {
        servo.write(pos);                                              // tell servo to go to position in variable 'pos'
        delay(10);
      }
    }

    else if (ir3 == LOW && ir4 == LOW) {                               // Both Slots are Full   
      Serial.print("Full !!!\n");
      delay(2000);
    
    }
  }

  if (ir2 == LOW ) {                                                   // Exit Sensor detect an obstacle
    for (int pos = 0; pos <= 180; pos += 1) {
    servo.write(pos);                                                  // tell servo to go to position in variable 'pos'
    delay(10);                                                         // waits 15ms for the servo to reach the position
  }
    delay(2000);
    for (int pos = 180; pos >= 0; pos -= 1) {
    servo.write(pos);                                                  // tell servo to go to position in variable 'pos'
    delay(10);
    }
  }
  
  else {
    servo.write(0);                                                    // No Detection
  }

  delay(1000);                                                         // Wait for 100 milliseconds before checking the IR sensors again

  }
