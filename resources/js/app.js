// import "./bootstrap";
import 'flowbite';

// Initialize Flowbite and handle all UI interactions
document.addEventListener('DOMContentLoaded', () => {
    // Flowbite initialization code if needed
    
    // Dark mode toggle functionality
    const themeToggleBtn = document.getElementById('theme-toggle');
    
    if (themeToggleBtn) {
        const darkIcon = document.getElementById('dark-icon');
        const lightIcon = document.getElementById('light-icon');
        
        // Check for saved theme preference or use system preference
        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            if (lightIcon && darkIcon) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            }
        } else {
            document.documentElement.classList.remove('dark');
            if (lightIcon && darkIcon) {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }
        
        // Add click event to toggle button
        themeToggleBtn.addEventListener('click', function() {
            // Toggle dark class on html element
            document.documentElement.classList.toggle('dark');
            
            // Toggle icons if they exist
            if (darkIcon && lightIcon) {
                darkIcon.classList.toggle('hidden');
                lightIcon.classList.toggle('hidden');
            }
            
            // Update localStorage
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('color-theme', 'dark');
            } else {
                localStorage.setItem('color-theme', 'light');
            }
        });
    }
    
    // Enhanced mobile menu toggle with animation
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = mobileMenu.classList.contains('open');
            if (isExpanded) {
                mobileMenu.classList.remove('open');
                // Don't hide immediately, let the transition finish
                setTimeout(() => {
                    mobileMenu.style.display = 'none';
                }, 300); // Match this with the transition duration
            } else {
                // Make sure it's visible before adding the open class
                mobileMenu.style.display = 'block';
                // Small delay to ensure display:block takes effect
                setTimeout(() => {
                    // Trigger reflow to enable animation
                    void mobileMenu.offsetHeight;
                    mobileMenu.classList.add('open');
                }, 10);
            }
            
            // Memastikan menu desktop tetap tampil
            const desktopMenu = document.querySelector('.md\\:flex');
            if (desktopMenu && window.innerWidth >= 768) {
                desktopMenu.style.display = 'flex';
            }

            // Toggle aria-expanded attribute
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);

            // Change icon
            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }

    // Improved dropdown handling
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const button = dropdown.querySelector('button');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (button && menu) {
            // Handle click
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = !menu.classList.contains('opacity-0');

                // Close all other dropdowns first
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    if (m !== menu) {
                        m.classList.add('opacity-0', 'invisible', '-translate-y-2');
                    }
                });

                // Toggle current dropdown
                if (isOpen) {
                    menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
                } else {
                    menu.classList.remove('opacity-0', 'invisible', '-translate-y-2');
                }
            });

            // Handle hover for desktop
            if (window.innerWidth > 768) {
                dropdown.addEventListener('mouseenter', () => {
                    menu.classList.remove('opacity-0', 'invisible', '-translate-y-2');
                });

                dropdown.addEventListener('mouseleave', () => {
                    menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
                });
            }
        }
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
        });
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && mobileMenu) {
            mobileMenu.classList.remove('open');
            mobileMenu.style.display = 'none';
            const menuButton = document.getElementById('mobile-menu-button');
            if (menuButton) {
                menuButton.setAttribute('aria-expanded', 'false');
                const icon = menuButton.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            }
            
            // Memastikan menu desktop tampil
            const desktopMenu = document.querySelector('.hidden.md\\:flex');
            if (desktopMenu) {
                desktopMenu.classList.remove('hidden');
                desktopMenu.classList.add('md:flex');
            }
        }
    });

    // Add active state to current page link
    const currentPath = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes(currentPath)) {
            link.classList.add('text-blue-600', 'font-medium');
            link.classList.remove('text-gray-700');
        }
    });
});