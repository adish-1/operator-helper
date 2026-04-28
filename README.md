# 🚀 Operator Helper

Operator Helper is a simple and practical web application built for local cable/network operators to manage customers and track monthly payment status.

This project focuses on providing a fast, simple, and real-world solution for managing customer data without complex software.

---

## 🌐 Live Demo
🔗 https://adish.wuaze.com/operator/login/loginpage.html

---

## ⚙️ Features

- 👤 Add new customers  
- 🔍 Search customers by name  
- 🆔 Search using User ID  
- 📊 View all customer records  
- 💰 Track payment status (Paid / Unpaid)  
- ✏️ Update payment status instantly  
- 📞 Click-to-call customer directly from dashboard  
- 🔐 Login system with session handling  
- 👨‍💼 Separate Admin & Operator dashboards  

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Hosting:** InfinityFree  

---

## 🔐 Security Note

Database credentials are not included in this repository.  
A localhost db with a table operator is available use that for local host testing.
create a `db.php` file with your database details when you host online.

---

## 💡 Use Case

This project is built for:

- Local cable TV operators  
- Small ISP providers  
- Field technicians managing customers  
- Anyone needing a simple customer/payment tracking system  

---

## 📁 Project Structure

```
operator-helper/
│
├── authentication/
│   ├── auth.php          # Login authentication + session handling
│   └── message.php       # Error message display page
│
├── login/
│   ├── loginpage.html    # Main login UI
│   └── loginpage.css     # Login page styling
│
├── main/
│   ├── operator.php      # Operator dashboard (view/search customers)
│   ├── admin.php         # Admin dashboard (search/update customers)
│   └── logout.php        # Session destroy + redirect
│
├── customer/
│   ├── customer.php      # Add new customer page
│   └── customer.css      # Customer page styling
│
└── database/
    └── db.php            # MySQL database connection
```

---

## 📈 Future Improvements

- Password hashing (security upgrade)  
- Monthly billing automation  
- Export data (CSV/Excel)  
- Mobile UI improvements  
- Multi-user role management  

---

## 👨‍💻 Author

**Adish Jagan AV**  
Aspiring Hybrid Engineer (Networking + Full Stack Development)

---

## ⭐ Note

This project is built with a strong focus on real-world usability, simplicity, and practical problem solving.
