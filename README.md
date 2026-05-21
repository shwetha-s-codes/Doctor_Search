# 🏥 DocFinder - Doctor Search Application

[![GitHub](https://img.shields.io/badge/GitHub-shwetha--s--codes-blue?logo=github)](https://github.com/shwetha-s-codes/Doctor_Search)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Active-success)]()

> **Find The Right Doctor, Anytime** - A comprehensive web application designed to help users search and connect with healthcare professionals based on specialization and location.

🌐 **Live Demo:** https://docfinder.infinityfreeapp.com

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Interactive Features](#interactive-features)
- [Database Setup](#database-setup)
- [API Endpoints](#api-endpoints)
- [Dark Mode](#dark-mode)
- [Responsive Design](#responsive-design)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## 🎯 Overview

**DocFinder** is a modern healthcare platform that simplifies the process of finding qualified doctors. Whether you're looking for a cardiologist, dermatologist, pediatrician, or any other medical specialist, DocFinder provides a seamless experience to search, filter, and connect with healthcare professionals.

### Key Benefits:
- 🔍 Easy doctor discovery by specialization and location
- 💼 Comprehensive doctor profiles with ratings and experience
- 🔐 Secure user authentication system
- 📱 Fully responsive mobile design
- 🌙 Dark mode support for comfortable browsing
- ⚡ Fast and intuitive search functionality
- 💬 Real-time notifications and feedback

---

## ✨ Features

### User Features
- ✅ **User Registration & Authentication** - Create accounts with secure password handling
- ✅ **Advanced Search** - Filter doctors by specialization and location
- ✅ **Doctor Profiles** - View detailed information about doctors including experience and ratings
- ✅ **Appointments** - Book appointments with preferred doctors
- ✅ **Responsive UI** - Works seamlessly on desktop, tablet, and mobile devices

### Interactive Features
- ✅ **Smooth Navigation** - Elegant scroll animations between sections
- ✅ **Real-Time Form Validation** - Immediate feedback on form inputs
- ✅ **Interactive Doctor Cards** - Hover effects and click-to-view profiles
- ✅ **Dynamic Filtering** - Filter results without page reload
- ✅ **Dark Mode Toggle** - Switch between light and dark themes
- ✅ **Toast Notifications** - User-friendly feedback messages
- ✅ **Mobile Menu** - Responsive hamburger navigation

### Admin Features
- ✅ **Admin Dashboard** - Manage doctors and users
- ✅ **Doctor Management** - Add, edit, and remove doctor profiles
- ✅ **Analytics** - View usage statistics and trends

---

## 🛠️ Tech Stack

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Modern styling with animations and responsive design
- **JavaScript (ES6+)** - Interactive features and DOM manipulation
  - Smooth scrolling
  - Form validation
  - Dark mode toggle
  - Dynamic filtering
  - Modal popups
  - Notification system

### Backend
- **PHP 7.4+** - Server-side logic and session management
- **MySQL** - Database for user and doctor information

### Deployment
- **Hosting:** InfinityFreeApp
- **Version Control:** Git & GitHub

### Language Composition
```
PHP:        78.8%  (Backend logic & server functionality)
CSS:        19.9%  (Styling & animations)
JavaScript: 15%+   (Interactive features)
Hack:       1.3%   (Configuration files)
```

---

## 📁 Project Structure

```
doctor_search/
│
├── index.php                 # Main landing page
├── style.css                 # Global styles with dark mode & animations
├── script.js                 # Interactive JavaScript features
│
├── auth/                     # Authentication module
│   ├── login.php            # User login page
│   ├── register.php         # User registration page
│   └── logout.php           # User logout handler
│
├── admin/                    # Admin module
│   ├── admin_login.php      # Admin authentication
│   ├── admin_dashboard.php  # Admin control panel
│   └── manage_doctors.php   # Doctor management
│
├── search/                   # Search module
│   ├── search.php           # Search logic and results
│   └── filter.php           # Dynamic filtering
│
├── includes/                 # Shared components
│   ├── db_connect.php       # Database connection
│   ├── header.php           # Common header
│   └── footer.php           # Common footer
│
├── README.md                # Project documentation
├── .gitignore               # Git ignore file
└── LICENSE                  # MIT License
```

---

## 🚀 Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache, Nginx, etc.)
- Git installed on your machine

### Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/shwetha-s-codes/Doctor_Search.git
   cd Doctor_Search
   ```

2. **Set Up Database**
   ```bash
   # Create a new database
   CREATE DATABASE doctor_search;
   
   # Import database schema
   mysql -u your_username -p doctor_search < database.sql
   ```

3. **Configure Database Connection**
   - Edit `includes/db_connect.php`
   - Update database credentials:
     ```php
     $servername = "localhost";
     $username = "your_db_user";
     $password = "your_db_password";
     $dbname = "doctor_search";
     ```

4. **Start Web Server**
   ```bash
   # Using PHP built-in server
   php -S localhost:8000
   ```

5. **Access the Application**
   - Open your browser and navigate to: `http://localhost:8000`

---

## 💻 Usage

### For Users

1. **Sign Up**
   - Click "Register" on the home page
   - Fill in your details and create an account
   - Verify your email (if email verification is enabled)

2. **Search for Doctors**
   - Log in to your account
   - Go to "Search Doctors" section
   - Select specialization (Cardiologist, Dermatologist, etc.)
   - Select location (New York, Los Angeles, Chicago, Houston)
   - Click "Search" to view results

3. **View Doctor Profile**
   - Click "View Profile" on any doctor card
   - See detailed information:
     - Experience level
     - Ratings and reviews
     - Specialization details
     - Contact information
   - Book an appointment

4. **Toggle Dark Mode**
   - Click the moon icon (🌙) in the navbar
   - Your preference is saved automatically

### For Administrators

1. **Admin Login**
   - Click "Admin" link in navbar
   - Enter admin credentials
   - Access the admin dashboard

2. **Manage Doctors**
   - Add new doctors with details
   - Edit existing doctor information
   - Remove doctors from the system
   - Update specializations and locations

3. **View Analytics**
   - Monitor user registrations
   - Track search statistics
   - Review appointment bookings

---

## ⚙️ Interactive Features

### 1. **Smooth Scrolling Navigation**
- Click navigation links to smoothly scroll to sections
- Enhances user experience with elegant animations

### 2. **Form Validation**
- Real-time validation of search forms
- Visual feedback with glowing effects
- Error notifications for incomplete inputs

### 3. **Doctor Cards**
- Hover animations with lift effect
- Click to view full doctor profiles
- Fade-in animations on page load

### 4. **Dynamic Filtering**
- Filter results instantly without page reload
- Combine specialization and location filters
- Real-time search results update

### 5. **Dark Mode**
```javascript
// Features:
- Toggle button in navbar (🌙/☀️)
- Automatic theme detection
- LocalStorage persistence
- Smooth color transitions
- Applied to all UI elements
```

### 6. **Mobile Responsive Menu**
- Hamburger menu on mobile devices
- Touch-friendly navigation
- Collapsible menu items
- Works on all screen sizes

### 7. **Toast Notifications**
- Success messages (green)
- Error messages (red)
- Auto-dismisses after 3 seconds
- Top-right corner positioning

### 8. **Modal Popups**
- Beautiful doctor profile modals
- Smooth animations
- Click outside to close
- Book appointment button

---

## 🗄️ Database Setup

### Users Table
```sql
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Doctors Table
```sql
CREATE TABLE doctors (
    doctor_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL,
    experience INT,
    rating DECIMAL(3, 2),
    bio TEXT,
    phone VARCHAR(15),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Appointments Table
```sql
CREATE TABLE appointments (
    appointment_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATE,
    appointment_time TIME,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
);
```

---

## 🔌 API Endpoints

### Authentication
- `POST /auth/register.php` - Register new user
- `POST /auth/login.php` - User login
- `GET /auth/logout.php` - User logout

### Search
- `GET /search/search.php` - Search doctors with filters
- `POST /search/filter.php` - Apply dynamic filters

### Admin
- `POST /admin/admin_login.php` - Admin authentication
- `GET /admin/admin_dashboard.php` - Dashboard overview
- `POST /admin/manage_doctors.php` - CRUD operations on doctors

---

## 🌙 Dark Mode

### How It Works
1. Click the moon icon (🌙) in the navbar
2. Theme preference is automatically saved in browser storage
3. Click sun icon (☀️) to switch back to light mode
4. Your preference persists across sessions

### Supported Elements
- ✅ Navigation bar
- ✅ Hero section
- ✅ Search section
- ✅ Doctor cards
- ✅ Footer
- ✅ Modal dialogs
- ✅ Form inputs

### CSS Variables (Dark Mode)
```css
body.dark-mode {
    background-color: #1a1a1a;
    color: #f0f0f0;
}

body.dark-mode .card {
    background-color: #333;
    color: #f0f0f0;
}
```

---

## 📱 Responsive Design

### Breakpoints
- **Desktop:** 1024px and above
- **Tablet:** 768px to 1023px
- **Mobile:** Below 768px
- **Small Mobile:** Below 480px

### Mobile Optimizations
- ✅ Touch-friendly buttons and inputs
- ✅ Hamburger navigation menu
- ✅ Single-column doctor card layout
- ✅ Optimized form layouts
- ✅ Readable text sizes
- ✅ Proper spacing and padding

### Testing
```bash
# Test on different devices:
- Chrome DevTools (F12 → Toggle Device Toolbar)
- Firefox Developer Tools
- Safari Developer Tools
- Physical device testing
```

---

## 🤝 Contributing

We welcome contributions from the community! Here's how to contribute:

### Steps
1. **Fork the Repository**
   ```bash
   git clone https://github.com/yourusername/Doctor_Search.git
   ```

2. **Create a Feature Branch**
   ```bash
   git checkout -b feature/YourFeatureName
   ```

3. **Make Your Changes**
   - Write clean, documented code
   - Follow existing code style
   - Test your changes thoroughly

4. **Commit Your Changes**
   ```bash
   git commit -m "Add YourFeatureName"
   ```

5. **Push to Your Fork**
   ```bash
   git push origin feature/YourFeatureName
   ```

6. **Create a Pull Request**
   - Describe your changes
   - Reference any related issues
   - Submit for review

### Code Guidelines
- Use meaningful variable names
- Add comments for complex logic
- Follow PSR-12 for PHP code style
- Use semantic HTML5
- Keep CSS organized by sections
- Write modular JavaScript functions

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

### MIT License Summary
- ✅ Free to use commercially
- ✅ Free to modify
- ✅ Free to distribute
- ✅ Free to use privately
- ⚠️ Include license and copyright notice
- ⚠️ No liability or warranty

---

## 👤 Contact

**Developer:** Shwetha Shetty

- **GitHub:** [@shwetha-s-codes](https://github.com/shwetha-s-codes)
- **Email:** shwethakodimar29@gmail.com
- **Live Demo:** https://docfinder.infinityfreeapp.com

---

## 🐛 Bug Reports & Feature Requests

Found a bug or have a feature suggestion?

1. **Check existing issues** - Avoid duplicates
2. **Create a new issue** with:
   - Clear title and description
   - Steps to reproduce (for bugs)
   - Expected vs. actual behavior
   - Screenshots if applicable
   - System information

---

## 📚 Additional Resources

- [PHP Documentation](https://www.php.net/manual/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [MDN Web Docs - JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [CSS Tricks](https://css-tricks.com/)
- [Web Accessibility](https://www.w3.org/WAI/)

---

## 🎉 Acknowledgments

- Thanks to the open-source community
- InfinityFreeApp for hosting
- All contributors and supporters

---

## 📈 Project Statistics

| Metric | Value |
|--------|-------|
| **Language Composition** | PHP (78.8%), CSS (19.9%), JavaScript (15%+), Hack (1.3%) |
| **Total Files** | 10+ |
| **Database Tables** | 3+ |
| **Interactive Features** | 8+ |
| **Responsive Breakpoints** | 4+ |
| **Supported Specializations** | 5 (Cardiologist, Dermatologist, Pediatrician, Neurologist, Orthopedic) |
| **Supported Locations** | 4 (New York, Los Angeles, Chicago, Houston) |

---

<div align="center">

### Made with ❤️ by Shwetha Shetty

⭐ If you find this project helpful, please consider giving it a star!

[![Star on GitHub](https://img.shields.io/github/stars/shwetha-s-codes/Doctor_Search?style=social)](https://github.com/shwetha-s-codes/Doctor_Search)

</div>
