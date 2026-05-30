<?php
$active_page = 'contact';
$page_title = 'Contact Us - Rapture Therapy Centre Rajarajeshwari Nagar Bangalore';
$page_description = 'Get in touch with Rapture Therapy Centre in Rajarajeshwari Nagar, Bangalore. Find our address, operating hours, phone, and interactive map.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/physiotherapy.png');">
        <div class="page-hero-content">
            <h1>Connect With Us</h1>
            <div class="page-breadcrumbs">
                <a href="index.php">Home</a> / <span>Contact Us</span>
            </div>
        </div>
    </section>

    <!-- Contact section -->
    <section class="section-padding" style="background: var(--bg-white);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Schedule A Screening</h2>
                <p class="section-subtitle">Have questions about vocabulary milestones or sensory sensitivities? Connect with our RR Nagar clinical experts.</p>
            </div>
            
            <div class="contact-grid">
                <!-- Details column -->
                <div class="contact-card-box fade-in-element" style="border: 2px solid var(--border-color); box-shadow: var(--shadow-sm);">
                    <h3 style="font-size: 1.5rem; margin-bottom: 30px; color: var(--primary);">Clinic Coordinates</h3>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>Exact Address</h4>
                            <p><a href="https://www.google.com/maps/place/Rapture+Therapy+Centre/@12.9200872,77.5144621,17z/data=!3m2!4b1!5s0x3bae3e556f2a271f:0xa940087a601dd771!4m6!3m5!1s0x3bae3fe118873703:0x366bea6fbd53c678!8m2!3d12.920082!4d77.517037!16s%2Fg%2F11y4bc_qky?entry=ttu&g_ep=EgoyMDI2MDUyNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" style="color: inherit; text-decoration: underline;">2nd Floor, Sree Narayana Sankeerna, 1704, BEML Layout, 1st Phase, 5th Stage, Rajarajeshwari Nagar, Bengaluru, Karnataka 560098</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon" style="background: var(--bg-occupational); color: var(--border-occupational);">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>Phone Support</h4>
                            <p><a href="tel:+917902709974" style="color: inherit; text-decoration: none;">+91 7902 709 974</a></p>
                            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Call during clinic hours for bookings</p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon" style="background: var(--bg-physio); color: var(--border-physio);">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4>Email Support</h4>
                            <p><a href="mailto:rapturetherapy24@gmail.com" style="color: inherit; text-decoration: none;">rapturetherapy24@gmail.com</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item" style="border-top: 2px solid var(--border-color); padding-top: 30px; margin-top: 30px;">
                        <div class="contact-detail-icon" style="background: var(--bg-education); color: var(--border-education);">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="contact-detail-content">
                            <h4 style="margin-bottom: 8px;">Operating Hours</h4>
                            <span class="clinic-status-badge status-badge open">
                                <span class="status-dot"></span>
                                <span class="status-text">Open Now</span>
                            </span>
                            <p style="font-size: 0.95rem; color: var(--text-muted); margin-top: 10px;">Monday – Friday: 9:00 AM – 7:00 PM</p>
                            <p style="font-size: 0.95rem; color: var(--text-muted);">Saturday: 9:30 AM – 1:30 PM</p>
                            <p style="font-size: 0.95rem; color: var(--text-muted);">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <!-- Feedback Form -->
                <div class="contact-form-box fade-in-element">
                    <h3 style="font-size: 1.5rem; margin-bottom: 30px; color: var(--primary);">Direct Messaging</h3>
                    
                    <div id="contact-success-msg" style="display: none; background-color: var(--bg-occupational); border: 2px solid var(--border-occupational); color: #15803d; padding: 18px; border-radius: var(--border-radius-sm); font-weight: 700; margin-bottom: 24px; text-align: center; animation: fadeInUp 0.4s ease;">
                        <i class="ri-checkbox-circle-fill"></i> Thank you! Message sent successfully. We will reply to your email shortly.
                    </div>
                    
                    <form id="contact-us-form">
                        <div class="form-group">
                            <label class="form-label" for="contact-name">Guardian Full Name *</label>
                            <input type="text" id="contact-name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="contact-email">Email Address *</label>
                                <input type="email" id="contact-email" class="form-control" placeholder="yourname@email.com" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="contact-subject">Subject *</label>
                                <input type="text" id="contact-subject" class="form-control" placeholder="Milestone / Consultation" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="contact-message">Your Inquiry *</label>
                            <textarea id="contact-message" class="form-control" rows="5" placeholder="Write details about your concerns..." required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Submit Message <i class="ri-send-plane-line"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Map box -->
            <div class="text-center fade-in-element" style="margin-top: 50px;">
                <h3 style="font-size: 1.65rem; font-weight: 850; margin-bottom: 12px; color: var(--primary);">Locate Our Clinic In RR Nagar</h3>
                <p style="color: var(--text-muted); margin-bottom: 30px;">Located on the 2nd floor, Sree Narayana Sankeerna, 1st Phase BEML Layout, RR Nagar, Bangalore.</p>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.7523298642217!2d77.51446217464003!3d12.920082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3fe118873703%3A0x366bea6fbd53c678!2sRapture%20Therapy%20Centre!5e0!3m2!1sen!2sin!4v1716761000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Structured Premium Footer -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
