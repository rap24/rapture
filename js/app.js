document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------
    // 0. Page-Hero Detection (for navbar styling)
    // ----------------------------------------
    const pageHero = document.querySelector('.page-hero');
    
    function updateHeroOverlap() {
        if (!pageHero) return;
        const heroBottom = pageHero.getBoundingClientRect().bottom;
        if (heroBottom > 0) {
            document.body.classList.add('over-hero');
        } else {
            document.body.classList.remove('over-hero');
        }
    }

    // Run on load
    updateHeroOverlap();

    // ----------------------------------------
    // 1. Theme Switcher (Dark/Light Mode)
    // ----------------------------------------
    const themeToggleBtn = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'dark';
    
    // Set initial theme
    document.documentElement.setAttribute('data-theme', currentTheme);
    updateThemeIcon(currentTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            let theme = document.documentElement.getAttribute('data-theme');
            let newTheme = theme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });
    }

    function updateThemeIcon(theme) {
        if (!themeToggleBtn) return;
        const icon = themeToggleBtn.querySelector('i');
        if (icon) {
            if (theme === 'dark') {
                icon.className = 'ri-sun-line';
            } else {
                icon.className = 'ri-moon-line';
            }
        }
    }

    // ----------------------------------------
    // 2. Sticky Header and Scroll-Reveal Animations
    // ----------------------------------------
    const header = document.querySelector('.header');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        updateHeroOverlap();
        revealElements();
    });

    const revealElements = () => {
        if (window.hasIntersectionObserver) return; // Skip fallback if observer runs
        const elements = document.querySelectorAll('.fade-in-element, .large-feature-item, .intake-timeline-block');
        const triggerBottom = window.innerHeight * 0.85;
        
        elements.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < triggerBottom) {
                el.classList.add('revealed');
            }
        });
    };
    
    // Initial reveal check
    revealElements();

    // ----------------------------------------
    // 3. Mobile Navigation Menu Toggle
    // ----------------------------------------
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('ri-menu-line');
                icon.classList.toggle('ri-close-line');
            }
        });
    }

    // 3b. Mobile Dropdown Submenu Toggle
    const navItemsWithSubmenu = document.querySelectorAll('.nav-item');
    navItemsWithSubmenu.forEach(item => {
        const link = item.querySelector('.nav-link');
        const submenu = item.querySelector('.nav-submenu');
        
        if (submenu && link) {
            link.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    // If submenu is not open, open it and prevent navigation
                    if (!item.classList.contains('active')) {
                        e.preventDefault();
                        
                        // Close any other open submenus
                        navItemsWithSubmenu.forEach(otherItem => {
                            if (otherItem !== item) otherItem.classList.remove('active');
                        });
                        
                        item.classList.add('active');
                    }
                    // If it is already active, let the click proceed to navigate
                }
            });
        }
    });

    // ----------------------------------------
    // 4. Dynamic Bangalore Timing Clock Status
    // ----------------------------------------
    const updateOpeningStatus = () => {
        const badges = document.querySelectorAll('.clinic-status-badge');
        if (badges.length === 0) return;

        // Current time in Bangalore (UTC + 5.5 hours)
        const localTime = new Date();
        const utc = localTime.getTime() + (localTime.getTimezoneOffset() * 60000);
        const bangaloreTime = new Date(utc + (3600000 * 5.5));
        
        const day = bangaloreTime.getDay(); // 0: Sunday, 1: Monday, etc.
        const hour = bangaloreTime.getHours();
        const minutes = bangaloreTime.getMinutes();
        const totalMinutes = hour * 60 + minutes;

        let isOpen = false;
        let scheduleText = '';

        if (day >= 1 && day <= 5) {
            // Monday - Friday: 9:00 AM (540 min) to 6:30 PM (1110 min)
            if (totalMinutes >= 540 && totalMinutes < 1110) {
                isOpen = true;
            }
            scheduleText = 'Mon - Fri: 9:00 AM - 6:30 PM';
        } else if (day === 6) {
            // Saturday: 9:30 AM (570 min) to 1:30 PM (810 min)
            if (totalMinutes >= 570 && totalMinutes < 810) {
                isOpen = true;
            }
            scheduleText = 'Sat: 9:30 AM - 1:30 PM';
        } else {
            // Sunday: Closed
            scheduleText = 'Sunday: Closed';
        }

        badges.forEach(badge => {
            const statusText = badge.querySelector('.status-text');
            
            if (isOpen) {
                badge.className = 'status-badge open clinic-status-badge';
                if (statusText) statusText.textContent = `Open Now • ${scheduleText}`;
            } else {
                badge.className = 'status-badge closed clinic-status-badge';
                if (statusText) statusText.textContent = `Closed Now • Clinic Hours`;
            }
        });
    };

    updateOpeningStatus();
    setInterval(updateOpeningStatus, 60000); // Check status every minute

    // ----------------------------------------
    // 5. Interactive Developmental Milestone Checklist Wizard
    // ----------------------------------------
    const checklistSteps = document.querySelectorAll('.checklist-wizard-step');
    const checklistNextBtn = document.getElementById('checklist-next');
    const checklistPrevBtn = document.getElementById('checklist-prev');
    const checklistIndicator = document.getElementById('checklist-step-indicator');
    const checklistProgress = document.getElementById('checklist-progress-fill');
    const checklistResults = document.getElementById('checklist-result');
    let currentChecklistStep = 0;
    let selectedMilestoneAnswers = {};

    if (checklistSteps.length > 0) {
        const updateChecklistUI = () => {
            checklistSteps.forEach((step, idx) => {
                step.classList.remove('active');
                if (idx === currentChecklistStep) {
                    step.classList.add('active');
                }
            });

            // Update Progress bar (if still present)
            const percent = ((currentChecklistStep) / (checklistSteps.length - 1)) * 100;
            if (checklistProgress) checklistProgress.style.width = `${percent}%`;

            // Update step text
            if (checklistIndicator) {
                checklistIndicator.textContent = `Step ${currentChecklistStep + 1} of ${checklistSteps.length}`;
            }

            // Update wizard step dots
            const dots = document.querySelectorAll('.wizard-dot');
            const dotLines = document.querySelectorAll('.wizard-dot-line');
            dots.forEach((dot, idx) => {
                dot.classList.remove('active', 'completed');
                if (idx === currentChecklistStep) {
                    dot.classList.add('active');
                } else if (idx < currentChecklistStep) {
                    dot.classList.add('completed');
                }
            });
            dotLines.forEach((line, idx) => {
                line.classList.remove('completed');
                if (idx < currentChecklistStep) {
                    line.classList.add('completed');
                }
            });

            // Buttons visibility
            if (currentChecklistStep === 0) {
                if (checklistPrevBtn) checklistPrevBtn.style.visibility = 'hidden';
            } else {
                if (checklistPrevBtn) checklistPrevBtn.style.visibility = 'visible';
            }

            if (checklistNextBtn) {
                if (currentChecklistStep === checklistSteps.length - 1) {
                    checklistNextBtn.innerHTML = 'Get Result <i class="ri-check-line"></i>';
                } else {
                    checklistNextBtn.innerHTML = 'Next <i class="ri-arrow-right-line"></i>';
                }
            }
        };

        const handleNext = () => {
            const currentOptions = checklistSteps[currentChecklistStep].querySelectorAll('input[type="radio"]');
            let selectedVal = null;
            currentOptions.forEach(opt => {
                if (opt.checked) selectedVal = opt.value;
            });

            if (!selectedVal) {
                alert('Please select an answer option to proceed.');
                return;
            }

            selectedMilestoneAnswers[currentChecklistStep] = selectedVal;

            if (currentChecklistStep < checklistSteps.length - 1) {
                currentChecklistStep++;
                updateChecklistUI();
            } else {
                showChecklistResult();
            }
        };

        const handlePrev = () => {
            if (currentChecklistStep > 0) {
                currentChecklistStep--;
                updateChecklistUI();
            }
        };

        const showChecklistResult = () => {
            // Hide wizard layout, show results panel
            document.querySelector('.checklist-wizard-container').style.display = 'none';
            if (checklistIndicator) checklistIndicator.parentElement.style.display = 'none';
            if (checklistResults) checklistResults.style.display = 'block';

            // Calculate missed milestones (where selected answer is 'no')
            let concernCount = 0;
            Object.values(selectedMilestoneAnswers).forEach(ans => {
                if (ans === 'no') concernCount++;
            });

            const resultIcon = checklistResults.querySelector('.result-icon');
            const resultTitle = checklistResults.querySelector('.result-title');
            const resultDesc = checklistResults.querySelector('.result-desc');

            if (concernCount === 0) {
                if (resultIcon) resultIcon.className = 'ri-checkbox-circle-fill result-icon';
                if (resultIcon) resultIcon.style.color = 'var(--success)';
                if (resultTitle) resultTitle.textContent = 'Development is On Track!';
                if (resultDesc) resultDesc.textContent = "All Communication & Sensory Milestones On Track! Your child is meeting key age-appropriate milestones. Keep engaging them with conversations, reading, and sensory play. Feel free to contact us if you ever have any questions.";
            } else if (concernCount <= 1) {
                if (resultIcon) resultIcon.className = 'ri-information-fill result-icon';
                if (resultIcon) resultIcon.style.color = 'var(--accent-gold)';
                if (resultTitle) resultTitle.textContent = 'Mild Developmental Gap Spotted';
                if (resultDesc) resultDesc.textContent = "Your child is meeting most milestones but is delayed in one key developmental marker. Early intervention is highly effective. We suggest a friendly, quick screening evaluation at our Rajarajeshwari Nagar clinic.";
            } else if (concernCount === 2) {
                if (resultIcon) resultIcon.className = 'ri-error-warning-fill result-icon';
                if (resultIcon) resultIcon.style.color = 'var(--secondary)';
                if (resultTitle) resultTitle.textContent = 'Developmental Assessment Recommended';
                if (resultDesc) resultDesc.textContent = "Your child has missed multiple crucial developmental markers. We recommend arranging a coordinated, multi-specialty clinical intake to help design an optimization plan with our speech and sensory experts.";
            } else {
                if (resultIcon) resultIcon.className = 'ri-alert-fill result-icon';
                if (resultIcon) resultIcon.style.color = 'var(--danger)';
                if (resultTitle) resultTitle.textContent = 'Specialized Clinical Intake Recommended';
                if (resultDesc) resultDesc.textContent = "Your child is experiencing significant delays across communication and sensory milestones. Our collaborative clinic team in Rajarajeshwari Nagar is here to help create a tailored clinical road map. Book a consultation slot today.";
            }
        };

        if (checklistNextBtn) checklistNextBtn.addEventListener('click', handleNext);
        if (checklistPrevBtn) checklistPrevBtn.addEventListener('click', handlePrev);
        
        // Reset checklist
        const restartBtn = document.getElementById('checklist-restart');
        if (restartBtn) {
            restartBtn.addEventListener('click', () => {
                currentChecklistStep = 0;
                selectedMilestoneAnswers = {};
                checklistSteps.forEach(step => {
                    step.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
                });
                document.querySelector('.checklist-wizard-container').style.display = 'block';
                if (checklistIndicator) checklistIndicator.parentElement.style.display = 'flex';
                if (checklistResults) checklistResults.style.display = 'none';
                updateChecklistUI();
            });
        }

        updateChecklistUI();
    }

    // ----------------------------------------
    // 6. Multi-step Appointment Booking Modal
    // ----------------------------------------
    const bookingModal = document.getElementById('booking-modal');
    const openBookingBtns = document.querySelectorAll('.open-booking-modal');
    const closeBookingBtn = document.getElementById('booking-close');
    const bookingSteps = document.querySelectorAll('.booking-step');
    const bookingNextBtn = document.getElementById('booking-next');
    const bookingPrevBtn = document.getElementById('booking-prev');
    let currentBookingStep = 0;

    const updateBookingUI = () => {
        bookingSteps.forEach((step, idx) => {
            step.classList.remove('active');
            if (idx === currentBookingStep) {
                step.classList.add('active');
            }
        });

        // Prev button visibility
        if (currentBookingStep === 0) {
            if (bookingPrevBtn) bookingPrevBtn.style.visibility = 'hidden';
        } else {
            if (bookingPrevBtn) bookingPrevBtn.style.visibility = 'visible';
        }

        // Next button state
        if (bookingNextBtn) {
            if (currentBookingStep === bookingSteps.length - 2) {
                bookingNextBtn.innerHTML = 'Confirm Booking <i class="ri-check-double-line"></i>';
            } else if (currentBookingStep === bookingSteps.length - 1) {
                bookingNextBtn.style.display = 'none';
                if (bookingPrevBtn) bookingPrevBtn.style.display = 'none';
            } else {
                bookingNextBtn.innerHTML = 'Continue <i class="ri-arrow-right-line"></i>';
                bookingNextBtn.style.display = 'inline-flex';
                if (bookingPrevBtn) bookingPrevBtn.style.display = 'inline-flex';
            }
        }
    };

    const validateBookingStep = () => {
        const step = bookingSteps[currentBookingStep];
        const requiredInputs = step.querySelectorAll('[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'var(--danger)';
            } else {
                input.style.borderColor = 'var(--border-color)';
            }
        });

        return isValid;
    };

    openBookingBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if (bookingModal) {
                bookingModal.classList.add('active');
                currentBookingStep = 0;
                updateBookingUI();
                
                // Show form buttons in case reset
                if (bookingNextBtn) bookingNextBtn.style.display = 'inline-flex';
                if (bookingPrevBtn) bookingPrevBtn.style.display = 'inline-flex';
                
                // Set default date to tomorrow
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                const dateInput = document.getElementById('booking-date');
                if (dateInput) {
                    dateInput.min = tomorrow.toISOString().split('T')[0];
                }
            }
        });
    });

    if (closeBookingBtn) {
        closeBookingBtn.addEventListener('click', () => {
            if (bookingModal) bookingModal.classList.remove('active');
        });
    }

    if (bookingModal) {
        bookingModal.addEventListener('click', (e) => {
            if (e.target === bookingModal) {
                bookingModal.classList.remove('active');
            }
        });
    }

    if (bookingNextBtn) {
        bookingNextBtn.addEventListener('click', () => {
            if (!validateBookingStep()) {
                alert('Please fill out all required fields before proceeding.');
                return;
            }

            if (currentBookingStep < bookingSteps.length - 2) {
                currentBookingStep++;
                updateBookingUI();
            } else if (currentBookingStep === bookingSteps.length - 2) {
                saveBookingData();
                currentBookingStep++;
                updateBookingUI();
            }
        });
    }

    if (bookingPrevBtn) {
        bookingPrevBtn.addEventListener('click', () => {
            if (currentBookingStep > 0) {
                currentBookingStep--;
                updateBookingUI();
            }
        });
    }

    const saveBookingData = () => {
        const bookingInfo = {
            parentName: document.getElementById('parent-name')?.value,
            phone: document.getElementById('parent-phone')?.value,
            email: document.getElementById('parent-email')?.value,
            childName: document.getElementById('child-name')?.value,
            childAge: document.getElementById('child-age')?.value,
            service: document.getElementById('booking-service')?.value,
            date: document.getElementById('booking-date')?.value,
            time: document.getElementById('booking-time')?.value,
            timestamp: new Date().toISOString()
        };

        // Save booking locally
        let existingBookings = JSON.parse(localStorage.getItem('clinic_bookings') || '[]');
        existingBookings.push(bookingInfo);
        localStorage.setItem('clinic_bookings', JSON.stringify(existingBookings));
        
        // Success panel customization
        const successTitle = document.querySelector('.booking-success-title');
        if (successTitle) {
            successTitle.innerHTML = `Welcome to Rapture, ${bookingInfo.parentName}!`;
            const confirmationText = document.getElementById('booking-confirmation-details');
            if (confirmationText) {
                confirmationText.textContent = `We have provisionally reserved an initial clinical evaluation slot for ${bookingInfo.childName} in ${bookingInfo.service} on ${bookingInfo.date} at ${bookingInfo.time}. Our clinic team in Rajarajeshwari Nagar will contact you at ${bookingInfo.phone} to confirm shortly.`;
            }
        }
    };

    // ----------------------------------------
    // 7. Testimonials Horizontal Slider
    // ----------------------------------------
    const testimonialsTrack = document.querySelector('.testimonials-track');
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const testimonialPrev = document.getElementById('testimonial-prev');
    const testimonialNext = document.getElementById('testimonial-next');
    let currentTestimonial = 0;

    if (testimonialSlides.length > 0 && testimonialsTrack) {
        const updateTestimonials = () => {
            const width = testimonialSlides[0].clientWidth;
            testimonialsTrack.style.transform = `translateX(-${currentTestimonial * width}px)`;
        };

        if (testimonialNext) {
            testimonialNext.addEventListener('click', () => {
                currentTestimonial = (currentTestimonial + 1) % testimonialSlides.length;
                updateTestimonials();
            });
        }

        if (testimonialPrev) {
            testimonialPrev.addEventListener('click', () => {
                currentTestimonial = (currentTestimonial - 1 + testimonialSlides.length) % testimonialSlides.length;
                updateTestimonials();
            });
        }

        window.addEventListener('resize', updateTestimonials);
    }

    // ----------------------------------------
    // 8. FAQ Accordion Toggle
    // ----------------------------------------
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all others
            faqItems.forEach(other => other.classList.remove('active'));
            
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    // ----------------------------------------
    // 9. Contact Feedback Form Validation
    // ----------------------------------------
    const contactForm = document.getElementById('contact-us-form');
    const contactSuccessMsg = document.getElementById('contact-success-msg');
    
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            let isValid = true;
            contactForm.querySelectorAll('[required]').forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = 'var(--danger)';
                } else {
                    input.style.borderColor = 'var(--border-color)';
                }
            });
            
            if (!isValid) {
                alert('Please complete all required fields.');
                return;
            }
            
            const messageInfo = {
                name: document.getElementById('contact-name').value,
                email: document.getElementById('contact-email').value,
                subject: document.getElementById('contact-subject').value,
                message: document.getElementById('contact-message').value,
                timestamp: new Date().toISOString()
            };
            
            let existingMsgs = JSON.parse(localStorage.getItem('contact_messages') || '[]');
            existingMsgs.push(messageInfo);
            localStorage.setItem('contact_messages', JSON.stringify(existingMsgs));
            
            contactForm.reset();
            if (contactSuccessMsg) {
                contactSuccessMsg.style.display = 'block';
                contactSuccessMsg.scrollIntoView({ behavior: 'smooth' });
                setTimeout(() => {
                    contactSuccessMsg.style.display = 'none';
                }, 5000);
            }
        });
    }

    // ----------------------------------------
    // 10. Kids vs. Adults Tab Toggler
    // ----------------------------------------
    const tabSwitcher = document.querySelector('.tab-switcher-wrapper');
    const tabBtnKids = document.querySelector('.tab-btn-kids');
    const tabBtnAdults = document.querySelector('.tab-btn-adults');
    const kidsPanel = document.getElementById('kids-tab-panel');
    const adultsPanel = document.getElementById('adults-tab-panel');

    if (tabSwitcher && tabBtnKids && tabBtnAdults) {
        const switchTab = (tab) => {
            if (tab === 'kids') {
                tabSwitcher.classList.remove('adult-active');
                tabBtnKids.classList.add('active');
                tabBtnAdults.classList.remove('active');
                if (kidsPanel && adultsPanel) {
                    kidsPanel.classList.add('active');
                    adultsPanel.classList.remove('active');
                }
            } else {
                tabSwitcher.classList.add('adult-active');
                tabBtnKids.classList.remove('active');
                tabBtnAdults.classList.add('active');
                if (kidsPanel && adultsPanel) {
                    kidsPanel.classList.remove('active');
                    adultsPanel.classList.add('active');
                }
            }
        };

        tabBtnKids.addEventListener('click', () => switchTab('kids'));
        tabBtnAdults.addEventListener('click', () => switchTab('adults'));
    }

    // ----------------------------------------
    // 11. Cost & Coordinated Package Estimator
    // ----------------------------------------
    const insProvider = document.getElementById('est-provider');
    const insFrequency = document.getElementById('est-frequency');
    const priceDisplay = document.getElementById('est-price-display');
    const progressMeter = document.getElementById('est-progress-bar');
    const meterLabel = document.getElementById('est-meter-label');
    const freqVal = document.getElementById('est-freq-val');

    if (insProvider && insFrequency && priceDisplay && progressMeter) {
        const calculateEstimation = () => {
            const sessionsPerWeek = parseInt(insFrequency.value, 10);
            const providerType = insProvider.value;
            
            // Base cost per session: 1500 INR (Premium Bangalore Rate)
            const costPerSession = 1500;
            const weeklyGross = costPerSession * sessionsPerWeek;
            
            let discountPercentage = 0;
            
            // Map coverage depending on selection
            if (providerType === 'coordinate') {
                discountPercentage = 25; // Coordinated CCD/SSOT Package
            } else if (providerType === 'corporate') {
                discountPercentage = 15; // Corporate/School partnership
            } else {
                discountPercentage = 0;   // Private pay standard rate
            }
            
            const clientResponsibility = weeklyGross * (1 - discountPercentage / 100);
            
            // Update labels and values
            if (freqVal) freqVal.textContent = sessionsPerWeek;
            priceDisplay.innerHTML = `₹${Math.round(clientResponsibility)}<span>/wk</span>`;
            
            // Update meter bar width (percentage matching savings)
            progressMeter.style.width = `${discountPercentage || 5}%`;
            if (meterLabel) {
                if (discountPercentage > 0) {
                    meterLabel.textContent = `Coordinated Care Savings Applied: ${discountPercentage}% (Saved ₹${Math.round(weeklyGross - clientResponsibility)}/wk!)`;
                    meterLabel.style.color = 'var(--secondary)';
                } else {
                    meterLabel.textContent = `Private Pay Standard Rate (No package discount applied)`;
                    meterLabel.style.color = 'var(--text-muted)';
                }
            }
        };

        insProvider.addEventListener('change', calculateEstimation);
        insFrequency.addEventListener('input', calculateEstimation);
        
        // Run initial calculation
        calculateEstimation();
    }

    // ----------------------------------------
    // 12. Staggered Scroll Reveal Enhancement
    // ----------------------------------------
    if ('IntersectionObserver' in window) {
        window.hasIntersectionObserver = true;
        
        const revealCallback = (entries, observer) => {
            const intersectingEntries = entries.filter(entry => entry.isIntersecting);
            
            intersectingEntries.forEach((entry, idx) => {
                const el = entry.target;
                
                if (!el.classList.contains('revealed')) {
                    if (intersectingEntries.length > 1) {
                        el.style.transitionDelay = `${idx * 0.1}s`;
                    }
                    el.classList.add('revealed');
                    observer.unobserve(el);
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealCallback, {
            root: null,
            threshold: 0.05,
            rootMargin: '0px 0px 50px 0px'
        });

        document.querySelectorAll('.fade-in-element, .large-feature-item, .intake-timeline-block').forEach(el => {
            revealObserver.observe(el);
        });
    }

    // ----------------------------------------
    // 13. Dynamic Mascot Speech Bubbles
    // ----------------------------------------
    const mascots = document.querySelectorAll('.rapture-mascot');
    mascots.forEach(mascot => {
        mascot.addEventListener('click', () => {
            const speechText = mascot.getAttribute('data-speech') || "Hi! Click me to learn!";
            
            let bubble = mascot.querySelector('.mascot-speech-bubble');
            if (bubble) {
                bubble.remove();
            }
            
            bubble = document.createElement('div');
            bubble.className = 'mascot-speech-bubble';
            bubble.style.position = 'absolute';
            bubble.style.bottom = '110%';
            bubble.style.left = '50%';
            bubble.style.transform = 'translateX(-50%)';
            bubble.style.background = 'var(--bg-white)';
            bubble.style.border = '2px solid var(--border-color)';
            bubble.style.borderRadius = '12px';
            bubble.style.padding = '8px 12px';
            bubble.style.fontSize = '0.85rem';
            bubble.style.fontWeight = '800';
            bubble.style.color = 'var(--primary)';
            bubble.style.whiteSpace = 'nowrap';
            bubble.style.boxShadow = '0 4px 12px rgba(61, 135, 138, 0.15)';
            bubble.style.zIndex = '100';
            bubble.innerHTML = `${speechText} <div style="position:absolute;top:100%;left:50%;transform:translateX(-50%);border:6px solid transparent;border-top-color:var(--border-color);"></div>`;
            
            mascot.appendChild(bubble);
            
            setTimeout(() => {
                if (bubble && bubble.parentElement) {
                    bubble.style.opacity = '0';
                    bubble.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => bubble.remove(), 500);
                }
            }, 3000);
        });
    });

    // ----------------------------------------
    // 14. Therapists & Blog Live Grid Filters
    // ----------------------------------------
    const filterButtons = document.querySelectorAll('.filter-badge');
    const therapistCards = document.querySelectorAll('.therapist-profile-card');
    const blogCards = document.querySelectorAll('.blog-post-card');

    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from sibling buttons in the same container
                const parent = btn.parentElement;
                parent.querySelectorAll('.filter-badge').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                // Filter Therapists if on therapists page
                if (therapistCards.length > 0) {
                    therapistCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        if (filterValue === 'all' || category === filterValue) {
                            card.style.display = 'flex';
                            setTimeout(() => card.classList.add('revealed'), 50);
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }

                // Filter Blog posts if on blog page
                if (blogCards.length > 0) {
                    blogCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        if (filterValue === 'all' || category === filterValue) {
                            card.style.display = 'flex';
                            setTimeout(() => card.classList.add('revealed'), 50);
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
            });
        });
    }

    // ----------------------------------------
    // Google Reviews: Read More Toggle
    // ----------------------------------------
    document.querySelectorAll('.review-read-more').forEach(btn => {
        btn.addEventListener('click', () => {
            const text = btn.previousElementSibling;
            if (text && text.classList.contains('review-text')) {
                text.classList.toggle('expanded');
                btn.textContent = text.classList.contains('expanded') ? 'Read less' : 'Read more';
            }
        });
    });

    // ----------------------------------------
    // Red Flag Checklist: Warning Sound on Hover
    // ----------------------------------------
    (function() {
        let audioCtx = null;
        let lastPlayTime = 0;
        const COOLDOWN_MS = 400; // prevent rapid-fire sounds

        function playWarningBeep() {
            const now = Date.now();
            if (now - lastPlayTime < COOLDOWN_MS) return;
            lastPlayTime = now;

            // Lazily create AudioContext (browsers require user gesture first)
            if (!audioCtx) {
                audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            }

            // Create a short, subtle warning tone
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);

            // Two-tone alert: short high beep
            oscillator.type = 'sine';
            oscillator.frequency.setValueAtTime(880, audioCtx.currentTime);        // A5
            oscillator.frequency.setValueAtTime(660, audioCtx.currentTime + 0.08); // E5 drop

            // Volume envelope: quick fade in, sustain, fade out
            gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
            gainNode.gain.linearRampToValueAtTime(0.12, audioCtx.currentTime + 0.02);  // soft volume
            gainNode.gain.linearRampToValueAtTime(0.12, audioCtx.currentTime + 0.10);
            gainNode.gain.linearRampToValueAtTime(0, audioCtx.currentTime + 0.18);

            oscillator.start(audioCtx.currentTime);
            oscillator.stop(audioCtx.currentTime + 0.2);
        }

        // Attach to all red-flag-card list items
        document.querySelectorAll('.red-flag-card li').forEach(item => {
            item.style.cursor = 'pointer';
            item.style.transition = 'transform 0.2s ease, background 0.2s ease';
            item.style.padding = '8px 12px';
            item.style.borderRadius = '8px';

            item.addEventListener('mouseenter', () => {
                playWarningBeep();
                item.style.transform = 'translateX(6px)';
                item.style.background = 'rgba(220, 38, 38, 0.08)';
            });

            item.addEventListener('mouseleave', () => {
                item.style.transform = 'translateX(0)';
                item.style.background = 'transparent';
            });
        });
    })();

    // ----------------------------------------
    // 15. Audio Feedback System (Hover Pops)
    // ----------------------------------------
    let audioCtx;
    let lastPlayTime = 0;
    const COOLDOWN_MS = 100; // Reduced cooldown for snappier feedback

    // Pre-initialize on user gesture to prevent latency on first hover
    const initGlobalAudio = () => {
        if (!audioCtx) {
            audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        }
        if (audioCtx.state === 'suspended') {
            audioCtx.resume();
        }
        // Remove listeners once initialized
        document.removeEventListener('click', initGlobalAudio);
        document.removeEventListener('keydown', initGlobalAudio);
        document.removeEventListener('touchstart', initGlobalAudio);
    };
    document.addEventListener('click', initGlobalAudio);
    document.addEventListener('keydown', initGlobalAudio);
    document.addEventListener('touchstart', initGlobalAudio);

    (function() {
        function playHoverPop() {
            const now = Date.now();
            if (now - lastPlayTime < COOLDOWN_MS) return;
            
            // If audio context isn't ready (user hasn't clicked anywhere yet), skip playing to avoid sudden delayed bursts
            if (!audioCtx || audioCtx.state !== 'running') return;
            
            lastPlayTime = now;

            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);

            // Give the browser 10ms to schedule the nodes accurately (fixes scheduling lag)
            const startTime = audioCtx.currentTime + 0.01;

            // Synthesize a pleasant UI "bloop" or water drop sound
            oscillator.type = 'sine';
            oscillator.frequency.setValueAtTime(300, startTime);        
            oscillator.frequency.exponentialRampToValueAtTime(600, startTime + 0.05); 

            // Volume envelope
            gainNode.gain.setValueAtTime(0, startTime);
            gainNode.gain.linearRampToValueAtTime(0.04, startTime + 0.02); // Keep volume very soft
            gainNode.gain.linearRampToValueAtTime(0.001, startTime + 0.1);

            oscillator.start(startTime);
            oscillator.stop(startTime + 0.1);
        }

        // Apply to sections, cards, and buttons
        const hoverTargets = document.querySelectorAll('section, .service-card, .feature-card, .specialty-card, .stat-card, .faq-item');
        
        hoverTargets.forEach(el => {
            // Use CSS transitions for smooth animations
            el.style.transition = 'transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease, background-color 0.4s ease';
            
            el.addEventListener('mouseenter', () => {
                try { playHoverPop(); } catch(e) {}
                
                if (el.tagName.toLowerCase() === 'section') {
                    // For massive full-page sections, keep the animation extremely subtle so layout doesn't break
                    el.style.transform = 'scale(1.002)'; 
                    el.style.boxShadow = 'inset 0 0 20px rgba(61, 135, 138, 0.03)';
                } else {
                    // For smaller cards, give them a nice upward floating lift
                    el.style.transform = 'translateY(-5px) scale(1.02)';
                    el.style.boxShadow = '0 15px 30px rgba(0,0,0,0.1)';
                }
            });

            el.addEventListener('mouseleave', () => {
                el.style.transform = '';
                el.style.boxShadow = '';
            });
        });
    })();

    // ----------------------------------------
    // 16. Monika "Kids Cheering" on Hover
    // ----------------------------------------
    (function() {
        // Target elements related to Monika (founder name, bio, or her image)
        const monikaElements = document.querySelectorAll('.founder-name, .founder-bio, img[alt*="Monika"]');
        let lastCheerTime = 0;
        const CHEER_COOLDOWN = 3000; // 3 seconds cooldown to prevent spamming

        // Add a fallback for selecting text nodes
        const textNodes = document.evaluate(
            "//h2[contains(., 'Monika')]", 
            document, null, XPathResult.ANY_TYPE, null
        );
        let node;
        let additionalElements = [];
        while (node = textNodes.iterateNext()) {
            additionalElements.push(node);
        }

        const allTargets = [...monikaElements, ...additionalElements];

        // Preload the cheering audio file
        const cheerAudio = new Audio('assets/kids-cheering.mp3');
        cheerAudio.volume = 0.7;

        allTargets.forEach(el => {
            el.addEventListener('mouseenter', () => {
                const now = Date.now();
                if (now - lastCheerTime < CHEER_COOLDOWN) return;
                lastCheerTime = now;

                // Play the MP3 audio file
                cheerAudio.currentTime = 0;
                cheerAudio.play().catch(e => {
                    console.log("Audio play blocked by browser until user interaction.", e);
                });
            });
        });
    })();
});
