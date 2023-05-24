
# 1. Import the necessary libraries:
import cv2
import pytesseract


# 2. Initialize the Tesseract OCR engine (make sure you have installed pytesseract and have the Tesseract OCR engine installed on your system):
pytesseract.pytesseract.tesseract_cmd = r'C:\Users\rajva\AppData\Local\Programs\Tesseract-OCR\tesseract.exe'


# 3. Define a function to preprocess the image:
def preprocess_image(image):
    # Convert image to grayscale
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    # Apply adaptive thresholding to segment the foreground from the background
    threshold = cv2.adaptiveThreshold(gray, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY_INV, 11, 2)

    # Apply morphological transformations to further clean up the image
    kernel = cv2.getStructuringElement(cv2.MORPH_RECT, (3, 3))
    processed_image = cv2.morphologyEx(threshold, cv2.MORPH_CLOSE, kernel)

    return processed_image


# 4. Define a function to extract numbers from the preprocessed image using OCR:
def extract_numbers(image):
    # Use Tesseract OCR to extract text from the image
    text = pytesseract.image_to_string(image, config='--psm 6 digits')

    # Extract only the numbers from the text
    numbers = ''.join(filter(str.isdigit, text))

    return numbers


# 5. Initialize the video capture object for accessing the mobile camera:
capture = cv2.VideoCapture(0)  # Use 0 for default camera, or provide the device index


# 6. Start a loop to continuously read frames from the camera and perform number recognition:
while True:
    ret, frame = capture.read()  # Read a frame from the camera

    # Preprocess the frame
    processed_frame = preprocess_image(frame)

    # Extract numbers from the preprocessed frame
    numbers = extract_numbers(processed_frame)

    # Display the frame with the recognized numbers
    cv2.putText(frame, numbers, (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)
    cv2.imshow("Number Recognition", frame)

    # Exit the loop if 'q' is pressed
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

capture.release()  # Release the video capture object
cv2.destroyAllWindows()  # Close all OpenCV windows

