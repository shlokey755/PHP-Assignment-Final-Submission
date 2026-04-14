# 📘 PHP-Based Web Application with Login and Database Integration

## 📌 Introduction
This project is a simple web application developed using **PHP, HTML, CSS, and SQLite database**. The main objective is to demonstrate how a dynamic website works with user authentication, session management, form handling, and database operations.

The system allows users to log in securely, submit data through a form, and view stored records. It uses sessions and cookies to manage user authentication and ensures data persistence through a database file.

---

## 🎯 Objectives
- Design a multi-page website (minimum 5 pages)
- Implement a login system using sessions and cookies
- Create and connect a database (SQLite file)
- Design a form with at least 6 input fields
- Perform data insertion using POST method
- Fetch and display data using GET method
- Implement reusable header and footer components
- Apply CSS styling for better UI

---

## 🛠️ Technologies Used
- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** SQLite (file-based)  
- **Server:** XAMPP / Localhost  

---

## 🏗️ System Architecture
The application follows a simple client-server architecture:

- User interacts via browser  
- PHP processes requests on server  
- Data is stored/retrieved from SQLite database  
- Sessions & cookies manage authentication  

---

## 📂 Project Structure
/project
│── config.php
│── header.php
│── footer.php
│── index.php
│── login.php
│── dashboard.php
│── form.php
│── fetch.php
│── logout.php
│── style.css
│── database.db

---


---

## 🔐 Module Description

### 1. Login Module
- Users enter username and password  
- Session is created upon successful login  
- Cookie is stored for temporary user tracking  

### 2. Dashboard Module
- Accessible only after login  
- Displays welcome message  
- Provides logout option  

### 3. Form Module
- Contains 6 fields:
  - Name  
  - Email  
  - Phone  
  - Age  
  - City  
  - Message  
- Data is sent using POST method  
- Stored in database  

### 4. Fetch Module
- Retrieves data from database  
- Displays in table format  
- Uses GET request  

### 5. Logout Module
- Destroys session  
- Redirects to login page  

---

## 🗄️ Database Design

### Table: `users`
| Field     | Type    |
|----------|--------|
| id       | INTEGER |
| username | TEXT    |
| password | TEXT    |

### Table: `records`
| Field   | Type    |
|--------|--------|
| id     | INTEGER |
| name   | TEXT    |
| email  | TEXT    |
| phone  | TEXT    |
| age    | INTEGER |
| city   | TEXT    |
| message| TEXT    |

---

## 🔄 Working of the System
1. User opens the homepage  
2. Navigates to login page  
3. Enters credentials  
4. On success:
   - Session starts  
   - Cookie is stored  
   - Redirect to dashboard  
5. User fills the form  
6. Data is stored in database using POST  
7. User can view records via fetch page  

---

## 🎨 User Interface
- Clean and responsive design using CSS  
- Styled forms and buttons  
- Table layout for displaying records  
- Header and footer included on all pages  

---

## ✅ Features
- Multi-page website  
- Login authentication  
- Session & cookie handling  
- Database integration  
- Form validation and submission  
- Data retrieval and display  
- Reusable components (header/footer)  
- CSS styling  

---

## ⚠️ Limitations
- No password encryption (basic implementation)  
- No user registration system  
- Limited security features  
- Basic UI design  

---

## 🚀 Future Enhancements
- Add password hashing (security improvement)  
- Implement user registration system  
- Use MySQL instead of SQLite  
- Add search and filter functionality  
- Improve UI using Bootstrap  
- Deploy online  

---

## 🧾 Conclusion
This project successfully demonstrates the fundamentals of web development using PHP and database integration. It provides practical knowledge of authentication, session management, and CRUD operations, forming a strong base for building advanced web applications.

---

## 📚 References
- PHP Official Documentation  
- W3Schools (PHP, HTML, CSS)  
- SQLite Documentation  


