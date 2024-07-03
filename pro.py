from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep
# initialize the Chrome browser
driver = webdriver.Chrome()

driver.get("http://localhost/mini/index1.php")


# enter the username
username_input = driver.find_element(By.ID, "form3Example3")
username_input.send_keys("mail.ajulkjose@gmail.com")

# enter the password
password_input = driver.find_element(By.ID, "form3Example4")
password_input.send_keys("Gokul@123")
submit_button = driver.find_element(By.ID, "submit")
submit_button.click()
sleep(5)

click1=driver.find_element(By.ID,"prodlist")
click1.click()
sleep(2)



# select the radio button for sorting by name in ascending order
nameasc_radio = driver.find_element(By.CSS_SELECTOR, "input[value='nameasc']")

# Click on the radio button to select it
nameasc_radio.click()

# click the "Sort" button to apply the filter
sort_button = driver.find_element(By.CSS_SELECTOR, "button[name='apply']")
sort_button.click()

# wait for the page to reload with the sorted products
driver.implicitly_wait(10)

# verify that the products are sorted by name in ascending order

product_names = driver.find_elements(By.CSS_SELECTOR, ".product .name") 
prev_name = ""
for name in product_names:
    assert name.text >= prev_name
    prev_name = name.text

print("the test was successfull")

# close the browser
driver.quit()