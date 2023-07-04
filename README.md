# Online-meal-ordering-system

# Step 1:
  - Download the respository

# Step 2:
  - Put the entire folder "online-mea-ordering-system" into web server, im using XAMPP but you use anything you want
  - If you using XAMPP:
    - Put the entire folder into folder called "htdocs"

# Step 3:
  - Start your MySQL, ProFTPD and Apache Webserver in XAMPP
  - Create a database called "online_meal_system" in phpMyAdmin
  - Import the online_meal_system.sql into your database
  - NOTE: Below is the code to connect the phpMyAdmin MySQL databases in conn.php, if your username, password or database name is different then you have to update it in every conn.php in each sub-folder
  - <img width="605" alt="Screenshot 2023-07-04 at 2 03 16 PM" src="https://github.com/zengkeat/Online-meal-ordering-system/assets/42499826/65c03bf0-5dc9-469b-9ecf-ed5689e4fe33">

# Step 4:
  - In your web browser, type "localhost/online-meal-ordeing-system/customer_login.php" to navigate to the login page
  - Depend on which application you want to visit, enter the username, password and choose a role(if you want to access financial, system admin or stall department) web application.

# Example of Username and Password:
  - You can visit the database table "customer", "staff", "stall" to get username and password to access different web application, all the passwords is set to "12345678".
  - I have list some example of username and password that you can to login to each application 
      - Meal-ordering-application (http://localhost/online-meal-ordering-system/meal-ordering-app/customer_login.php):
          - username: TP044766, password: 12345678
          - username: TP044765, password: 12345678
      - financial-dept-application (http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php):
          - username: finance1, password:12345678, role: Financial Department(pick at the drop down)
      - system-admin-application (http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php):
          - username: admin1, password:12345678, role: System Admin(pick at the drop down)
      - vendor-dept-application (http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php):
          - username: western, password:12345678, role: Stall Department(pick at the drop down)
          - username: chinese, password:12345678, role: Stall Department(pick at the drop down)
          - username: malay, password:12345678, role: Stall Department(pick at the drop down)
          - username: indian, password:12345678, role: Stall Department(pick at the drop down)
          - username: arab, password:12345678, role: Stall Department(pick at the drop down)
          - username: bakery, password:12345678, role: Stall Department(pick at the drop down)
          - username: dessert, password:12345678, role: Stall Department(pick at the drop down)
          - username: beverage, password:12345678, role: Stall Department(pick at the drop down)
            

