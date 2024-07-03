from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from time import sleep

# Replace with the path to your chromedriver executable
driver = webdriver.Chrome()

# Navigate to the registration page
driver.get('http://localhost/mini/register.php')

# Fill in the registration form fields
driver.find_element(By.ID,'reg_uname').send_keys('username')
driver.find_element(By.ID,'pwd').send_keys('password@34')
driver.find_element(By.ID,'cpwd').send_keys('password@34')
driver.find_element(By.ID,'reg_phone').send_keys('1234567890')
driver.find_element(By.ID,'reg_email').send_keys('example@example.com')

# Wait for the file input field to become visible
file_input = WebDriverWait(driver, 10).until(
    EC.visibility_of_element_located((By.ID, 'reg_file'))
)

# Upload an image file
file_input.send_keys('C:/Users/erick/OneDrive/Pictures/Screenshot 2022-05-28 232852.png')

# Click the submit button
driver.find_element(By.ID,'submit').click()
sleep(3)
if(driver.current_url == "http://localhost/mini/mailverify.php"):
  print("sample test case successfully completed") 
else :
    print("sample test case failed") 

# Close the browser
driver.quit()
