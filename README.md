# AP-Grad Meal

# Introduction:
AP-Grab Meal is an online meal ordering system that intended to develop a better approach to solve the long waiting line in the cafeteria and student card top-up area of Asia Pacific University, especially in the peak hour such as lunch time.

The system offers a new way to order food and top-up throught the web application. The whole system contain 4 different web-based system and functionality:
- Meal ordering application(main website - AP-Grab Meal):
  - Made food order, track order, and cancel order
  - Set Favourite Order
  - Top-up student card
  - Modify users own account
  - View Transaction history including generate invoice
- Financial department web application:
  - Be able to search and view Student/Staff activities and profile
  - Reload / Refund Credit Balance for users
  - View Order / Customer / Credit Transaction.
  - View and generate Invoice
  - Generate Total Sales Report
  - Generate Vendor specific report
- Stall/Vendor web application:
  - Add, Update or Delete vendor's dishes to the menu in AP-Grab Meal
  - Manage vendor's food availability status
  - Manage and track incoming food order
  - Manage Vendor own Profile
  - Generate monthly Report and Profit Report
- System Admin web application:
  - upload, edit, delete post at the ads banner in AP-Grab Meal
  - Be able to Register, access and modify student or staff profile
  - Be able to modify Vendor/Stall Owner account
  - Be able to access and mofidy some database entries
    
<br>
<br>

# Technology:
- plain/vanilla PHP, HTML, CSS, JS, BootStrap, MySQL

<br>
<br>

# Steps to setup the project in your computer:
## Step 1:
1. Download the respository
2. unzip the folder

## Step 2:
1. Copy and paste the folder "online-meal-ordering-system" into your web server, im using XAMPP but you use anything you want
2. If you using XAMPP:
    - Put the entire folder into folder called "htdocs"

## Step 3:
1. Start your MySQL, ProFTPD and Apache Webserver in XAMPP
2. Open your phpMyAdmin (http://localhost/phpmyadmin/) from your XAMPP server and create a database called "online_meal_system"
3. Import the online_meal_system.sql into your database
- NOTE: Below is the code to connect the phpMyAdmin MySQL databases in conn.php, if your username, password or database name is different then you have to update it in every conn.php in each sub-folder
    <img width="605" alt="Screenshot 2023-07-04 at 2 03 16 PM" src="https://github.com/zengkeat/Online-meal-ordering-system/assets/42499826/65c03bf0-5dc9-469b-9ecf-ed5689e4fe33">

## Step 4:
1. In your web browser, type "http://localhost/online-meal-ordering-system/meal-ordering-app/customer_login.php" to navigate to the AP-Grab Meal login page, you should see something like this:
    <img width="1564" alt="Screenshot 2023-07-04 at 2 50 38 PM" src="https://github.com/zengkeat/Online-meal-ordering-system/assets/42499826/af31dda1-f73e-4f6f-98ee-8c3e459d983e">
2. If you want to login into staff (financial, system admin or vendor) application, then click on the link "Staff?Click Here", or type "http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php"

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
          - username: finance, password:12345678, role: Financial Department(pick at the drop down)
      - system-admin-application http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php):
          - username: admin, password:12345678, role: System Admin(pick at the drop down)
      - vendor-dept-application (http://localhost/online-meal-ordering-system/meal-ordering-app/staff_login.php):
          - username: western, password:12345678, role: Stall Department(pick at the drop down)
          - username: chinese, password:12345678, role: Stall Department(pick at the drop down)
          - username: malay, password:12345678, role: Stall Department(pick at the drop down)
          - username: indian, password:12345678, role: Stall Department(pick at the drop down)
          - username: arab, password:12345678, role: Stall Department(pick at the drop down)
          - username: bakery, password:12345678, role: Stall Department(pick at the drop down)
          - username: dessert, password:12345678, role: Stall Department(pick at the drop down)
          - username: beverage, password:12345678, role: Stall Department(pick at the drop down)
            

