#include <ESP32Servo.h>

// Define the pins for the IR sensors
int irPin1 = 12;
int irPin2 = 13;
int irPin3 = 14;
int irPin4 = 15;

// Define the pin for the servo motor
int servoPin = 16;

// Define the servo object
Servo myservo;

void setup() {
  Serial.begin(9600);

  // Attach the servo to the servoPin
  myservo.attach(servoPin);

  // Set the IR sensor pins to input mode
  pinMode(irPin1, INPUT);
  pinMode(irPin2, INPUT);
  pinMode(irPin3, INPUT);
  pinMode(irPin4, INPUT);
}

void loop() {
  // Read the values of the IR sensors
  int irValue1 = digitalRead(irPin1);
  int irValue2 = digitalRead(irPin2);
  int irValue3 = digitalRead(irPin3);
  int irValue4 = digitalRead(irPin4);

  // Print the IR sensor values to the Serial Monitor
  Serial.print("IR Sensor Values: ");
  Serial.print(irValue1);
  Serial.print(", ");
  Serial.print(irValue2);
  Serial.print(", ");
  Serial.print(irValue3);
  Serial.print(", ");
  Serial.println(irValue4);

  // If all IR sensors detect an obstacle, rotate the servo motor to 90 degrees
  if (irValue1 == HIGH || irValue2 == HIGH ) {
    myservo.write(90);
    delay(5000);
    myservo.write(-90);
  }
  
  // If any of the IR sensors detect an obstacle, rotate the servo motor to 0 degrees
  else {
    myservo.write(0);
  }

  // Wait for 100 milliseconds before checking the IR sensors again
  delay(100);
}