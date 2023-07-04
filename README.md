# AP-Grad Meal

# Introduction:
AP-Grab Meal is an online meal ordering system that intended to develop a better approach to solve the long waiting line in the cafeteria and student card top-up area of Asia Pacific University, especially in the peak hour such as lunch time.

The system offers a new way to order food and top-up throught the web application. The whole system contain 4 different web-based system and functionality:
- Meal ordring application:
  - Take order, track order, and cancel order
  - Set Favourite Order
  - Top-up student card
  - Modify Account
  - View Transaction history including generate invoice
- Financial department web application:
  - Search Customer Profile
  - Reload / Refund Credit Balance
  - View Order / Customer / Credit, Transaction.
  - View Invoice
  - Sales Report
  - Stall Report
- Stall/Vendor web application:
  - Update Available Food
  - Manage Food
  - View Food Information
  - Stall Profile
  - Change Password
  - Monthly Report and Profit Report
- System Admin web application:
  - upload, edit, delete post at the ads banner
  - Register and Manage student, lecturer, staff
  - Manage Stall Owner account
  - Display database information
    
<br>
<br>
<br>

# Step to setup the project in your computer:
## Step 1:
  - Download the respository

## Step 2:
  - Put the entire folder "online-mea-ordering-system" into web server, im using XAMPP but you use anything you want
  - If you using XAMPP:
    - Put the entire folder into folder called "htdocs"

## Step 3:
  - Start your MySQL, ProFTPD and Apache Webserver in XAMPP
  - Create a database called "online_meal_system" in phpMyAdmin
  - Import the online_meal_system.sql into your database
  - NOTE: Below is the code to connect the phpMyAdmin MySQL databases in conn.php, if your username, password or database name is different then you have to update it in every conn.php in each sub-folder
    <img width="605" alt="Screenshot 2023-07-04 at 2 03 16 PM" src="https://github.com/zengkeat/Online-meal-ordering-system/assets/42499826/65c03bf0-5dc9-469b-9ecf-ed5689e4fe33">

## Step 4:
  - In your web browser, type "localhost/online-meal-ordeing-system/customer_login.php" to navigate to the AP-Grab Meal login page, you should see something like this:
    <img width="1564" alt="Screenshot 2023-07-04 at 2 50 38 PM" src="https://github.com/zengkeat/Online-meal-ordering-system/assets/42499826/af31dda1-f73e-4f6f-98ee-8c3e459d983e">
  - If you want to login into staff (financial, system admin or stall) application, then type "localhost/online-meal-ordeing-system/staff_login.php", or click on the link "Staff?Click Here"

<br>
<br>
<br>


# Username and Password:
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
            

