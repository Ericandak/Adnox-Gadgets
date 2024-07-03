from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep

# set up the driver
driver = webdriver.Chrome()

# navigate to the login page
driver.get("http://localhost/mini/index1.php")

# enter the username
username_input = driver.find_element(By.ID, "form3Example3")
username_input.send_keys("mail.ajulkjose@gmail.com")

# enter the password
password_input = driver.find_element(By.ID, "form3Example4")
password_input.send_keys("Gokul@12")

# submit the form
submit_button = driver.find_element(By.ID, "submit")
submit_button.click()
sleep(3)
if(driver.current_url == "http://localhost/mini/index.php"):
  print("sample test case successfully completed") 
else :
    print("sample test case failed") 
  

driver.quit()
