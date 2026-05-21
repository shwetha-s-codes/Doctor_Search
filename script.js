// ============================================
// DOCTOR SEARCH - INTERACTIVE FEATURES
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    setupSmoothScrolling();
    setupFormValidation();
    setupCardInteractions();
    setupSearchFiltering();
    setupDarkMode();
    setupResponsiveMenu();
}

// ============================================
// 1. SMOOTH SCROLLING FOR NAVIGATION
// ============================================
function setupSmoothScrolling() {
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#search' || href === '#about') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
}

// ============================================
// 2. FORM VALIDATION & INTERACTIVE FEEDBACK
// ============================================
function setupFormValidation() {
    const searchForm = document.querySelector('.search-box');
    
    if (searchForm) {
        const selects = searchForm.querySelectorAll('select');
        
        selects.forEach(select => {
            select.addEventListener('change', function() {
                this.style.borderColor = '#007bff';
                this.style.boxShadow = '0 0 5px rgba(0, 123, 255, 0.5)';
            });
        });
        
        const submitBtn = searchForm.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.addEventListener('click', function(e) {
                const specialization = searchForm.querySelector('[name="specialization"]').value;
                const location = searchForm.querySelector('[name="location"]').value;
                
                if (!specialization || !location) {
                    e.preventDefault();
                    showNotification('Please select both specialization and location', 'error');
                }
            });
        }
    }
}

// ============================================
// 3. CARD HOVER INTERACTIONS & PROFILES
// ============================================
function setupCardInteractions() {
    const cards = document.querySelectorAll('.card');
    
    cards.forEach((card, index) => {
        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 8px 20px rgba(0, 123, 255, 0.3)';
            this.style.transition = 'all 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 10px rgba(0,0,0,0.1)';
        });
        
        // Add click handler for "View Profile" button
        const viewBtn = card.querySelector('button');
        if (viewBtn) {
            viewBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const doctorName = card.querySelector('h3').textContent;
                const specialization = card.querySelectorAll('p')[0].textContent;
                const location = card.querySelectorAll('p')[1].textContent;
                
                openDoctorProfile(doctorName, specialization, location);
            });
        }
        
        // Add fade-in animation on page load
        card.style.opacity = '0';
        card.style.animation = `fadeIn 0.5s ease forwards`;
        card.style.animationDelay = `${index * 0.1}s`;
    });
}

// ============================================
// 4. DYNAMIC SEARCH FILTERING
// ============================================
function setupSearchFiltering() {
    const specialSelect = document.querySelector('[name="specialization"]');
    const locationSelect = document.querySelector('[name="location"]');
    const cards = document.querySelectorAll('.card');
    
    if (!specialSelect || !locationSelect) return;
    
    const filterCards = () => {
        const selectedSpecial = specialSelect.value;
        const selectedLocation = locationSelect.value;
        
        cards.forEach(card => {
            const cardSpecial = card.querySelectorAll('p')[0].textContent;
            const cardLocation = card.querySelectorAll('p')[1].textContent;
            
            const specialMatch = !selectedSpecial || cardSpecial.includes(selectedSpecial);
            const locationMatch = !selectedLocation || cardLocation.includes(selectedLocation);
            
            if (specialMatch && locationMatch) {
                card.style.display = 'block';
                card.style.animation = 'fadeIn 0.3s ease';
            } else {
                card.style.display = 'none';
            }
        });
    };
    
    specialSelect.addEventListener('change', filterCards);
    locationSelect.addEventListener('change', filterCards);
}

// ============================================
// 5. DARK MODE TOGGLE
// ============================================
function setupDarkMode() {
    // Check if dark mode preference is saved
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    
    if (isDarkMode) {
        enableDarkMode();
    }
    
    // Add a toggle button dynamically
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        const darkModeToggle = document.createElement('button');
        darkModeToggle.innerHTML = '🌙';
        darkModeToggle.id = 'dark-mode-toggle';
        darkModeToggle.style.cssText = `
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.3s;
        `;
        
        darkModeToggle.addEventListener('click', function() {
            if (document.body.classList.contains('dark-mode')) {
                disableDarkMode();
                darkModeToggle.innerHTML = '🌙';
            } else {
                enableDarkMode();
                darkModeToggle.innerHTML = '☀️';
            }
        });
        
        navbar.appendChild(darkModeToggle);
    }
}

function enableDarkMode() {
    document.body.classList.add('dark-mode');
    localStorage.setItem('darkMode', 'true');
    
    // Update styles
    document.body.style.backgroundColor = '#1a1a1a';
    document.body.style.color = '#f0f0f0';
    
    // Update navbar
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        navbar.style.backgroundColor = '#222';
        navbar.style.borderBottomColor = '#444';
    }
    
    // Update logo
    const logo = document.querySelector('.logo');
    if (logo) {
        logo.style.color = '#66b3ff';
    }
    
    // Update nav links
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.style.color = '#66b3ff';
    });
    
    // Update hero section
    const hero = document.querySelector('.hero');
    if (hero) {
        hero.style.backgroundColor = '#262626';
        hero.style.color = '#f0f0f0';
    }
    
    // Update cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.backgroundColor = '#333';
        card.style.color = '#f0f0f0';
    });
    
    // Update footer
    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.backgroundColor = '#003d99';
    }
    
    // Update sections
    const sections = document.querySelectorAll('.search-section, .results');
    sections.forEach(section => {
        if (section.classList.contains('results')) {
            section.style.backgroundColor = '#262626';
        }
    });
}

function disableDarkMode() {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('darkMode', 'false');
    location.reload(); // Reload to restore original styles
}

// ============================================
// 6. RESPONSIVE MOBILE MENU
// ============================================
function setupResponsiveMenu() {
    const navbar = document.querySelector('.navbar');
    const nav = document.querySelector('nav');
    
    if (navbar && nav && window.innerWidth <= 768) {
        const hamburger = document.createElement('button');
        hamburger.innerHTML = '☰';
        hamburger.className = 'hamburger';
        hamburger.style.cssText = `
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            display: none;
        `;
        
        navbar.insertBefore(hamburger, nav);
        
        if (window.innerWidth <= 768) {
            hamburger.style.display = 'block';
        }
        
        hamburger.addEventListener('click', function() {
            nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
            nav.style.flexDirection = 'column';
            nav.style.position = 'absolute';
            nav.style.top = '60px';
            nav.style.left = '0';
            nav.style.right = '0';
            nav.style.backgroundColor = '#ffffff';
            nav.style.borderTop = '1px solid #e6f0ff';
            nav.style.padding = '20px';
        });
    }
}

// ============================================
// 7. DOCTOR PROFILE MODAL
// ============================================
function openDoctorProfile(name, specialization, location) {
    // Create modal
    const modal = document.createElement('div');
    modal.className = 'doctor-modal';
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        animation: fadeIn 0.3s ease;
    `;
    
    const modalContent = document.createElement('div');
    modalContent.style.cssText = `
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
    `;
    
    modalContent.innerHTML = `
        <h2>${name}</h2>
        <p><strong>Specialization:</strong> ${specialization}</p>
        <p><strong>Location:</strong> ${location}</p>
        <p><strong>Experience:</strong> 10+ years</p>
        <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (4.8/5)</p>
        <p><strong>About:</strong> Highly experienced professional dedicated to providing excellent healthcare services.</p>
        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button style="flex: 1; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Book Appointment</button>
            <button class="close-modal" style="flex: 1; padding: 10px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
        </div>
    `;
    
    modal.appendChild(modalContent);
    document.body.appendChild(modal);
    
    // Add animations
    addAnimations();
    
    // Close modal
    const closeBtn = modalContent.querySelector('.close-modal');
    closeBtn.addEventListener('click', function() {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => modal.remove(), 300);
    });
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.animation = 'fadeOut 0.3s ease';
            setTimeout(() => modal.remove(), 300);
        }
    });
}

// ============================================
// 8. NOTIFICATION SYSTEM
// ============================================
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background-color: ${type === 'error' ? '#dc3545' : '#28a745'};
        color: white;
        border-radius: 5px;
        z-index: 2000;
        animation: slideInRight 0.3s ease;
        font-weight: 500;
    `;
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============================================
// 9. CSS ANIMATIONS (ADD TO STYLE TAG)
// ============================================
function addAnimations() {
    if (!document.getElementById('animations-style')) {
        const style = document.createElement('style');
        style.id = 'animations-style';
        style.textContent = `
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            
            @keyframes fadeOut {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
            }
            
            @keyframes slideUp {
                from {
                    transform: translateY(30px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
            
            /* Dark Mode Styles */
            body.dark-mode {
                background-color: #1a1a1a;
                color: #f0f0f0;
            }
            
            body.dark-mode .search-box select,
            body.dark-mode .search-box input {
                background-color: #333;
                color: #f0f0f0;
                border-color: #555;
            }
            
            /* Card interactions */
            .card {
                transition: all 0.3s ease;
            }
            
            .card:hover {
                cursor: pointer;
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                nav {
                    display: none;
                }
                
                .hamburger {
                    display: block !important;
                }
            }
        `;
        document.head.appendChild(style);
    }
}

// Initialize animations on load
addAnimations();
