# No Cheese for the Wicked - E-Commerce Platform

This project is a database-driven web application developed for **No Cheese for the Wicked**, a specialist cheese shop, to enable them to sell their products online. The platform was built as part of a second-year university assignment, achieving 100% marks by meeting all functional and non-functional requirements. The application was developed using **PHP, JavaScript, jQuery, CSS, and HTML**, with a **MySQL** database backend.

---

## Key Features

1. **Product Search**: Customers can search for cheeses by name, type (hard/soft), country of origin, strength (1-5), and price per gram.
2. **Browsing and Basket**: Users can browse products and add multiple items to a basket without needing to log in.
3. **Checkout Process**: Customers can complete purchases by providing contact details and order information. The system confirms the order without handling payments.
4. **Admin Management**: Shop managers can add, update, or remove cheeses via a secure admin-only section.

---

## Technical Implementation

- **MVC Architecture**: The application follows the **Model-View-Controller (MVC)** design pattern, ensuring separation of concerns and maintainable code.
- **Object-Oriented (OO) Format**: PHP code is written in an object-oriented style for better structure and reusability.
- **Database Security**: Protection against **SQL injection** is implemented using prepared statements with the PDO API.
- **Cross-Site Scripting (XSS) Protection**: User inputs are sanitised to prevent XSS attacks.
- **User Distinction**: The application distinguishes between casual users and admin users. Admins have access to a secure section for managing products, while casual users can browse and purchase without logging in.

---

## Accessibility and Responsiveness

- **Accessibility**: The app adheres to accessibility best practices, ensuring it is usable for all customers, including those with disabilities.
- **Responsiveness**: The user interface is designed to be responsive, providing a seamless experience across devices (desktop, tablet, and mobile).

---

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, jQuery
- **Backend**: PHP (with PDO for database access)
- **Database**: MySQL
- **AJAX**: Implemented using jQuery for dynamic updates without page reloads.

---
