    from selenium import webdriver
    from selenium.webdriver.common.by import By
    from selenium.webdriver.common.keys import Keys
    from time import sleep


    # set up the driver
    driver = webdriver.Chrome()
    driver.maximize_window()

    driver.get("http://localhost/mini/index1.php")

    username_input = driver.find_element(By.ID, "form3Example3")
    username_input.send_keys("mail.ajulkjose@gmail.com")

    password_input = driver.find_element(By.ID, "form3Example4")
    password_input.send_keys("Gokul@123")
    sleep(5)
    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()
    sleep(5)

    click1=driver.find_element(By.ID,"pp")
    click1.click()
    sleep(2)
    click2=driver.find_element(By.ID,"pi")
    click2.click()

    click3=driver.find_element(By.ID,"del")
    click3.click()

    sleep(5)
    if(click3.click()):
        print("sample test case successfully completed")  
    # close the browser window
    driver.quit()
