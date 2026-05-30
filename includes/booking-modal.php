<?php
/**
 * Rapture Therapy Centre — Booking Modal Widget
 */
?>
    <div class="booking-modal" id="booking-modal">
        <div class="booking-modal-content">
            <span class="booking-modal-close" id="booking-close"><i class="ri-close-line"></i></span>
            <div class="booking-modal-body">
                <form id="appointment-booking-form">
                    <div class="booking-step active">
                        <h2 class="booking-step-title" style="margin-bottom: 24px;">Request a Clinical Consultation</h2>
                        <div class="form-group">
                            <label class="form-label" for="parent-name">Parent / Guardian Name *</label>
                            <input type="text" id="parent-name" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="parent-phone">Phone Number *</label>
                                <input type="tel" id="parent-phone" class="form-control" placeholder="+91 XXXXX XXXXX" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="parent-email">Email Address *</label>
                                <input type="email" id="parent-email" class="form-control" placeholder="yourname@email.com" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="child-name">Child's Name *</label>
                                <input type="text" id="child-name" class="form-control" placeholder="Child's full name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="child-age">Child's Age (Years) *</label>
                                <input type="number" id="child-age" class="form-control" placeholder="Age" min="1" max="18" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="booking-service">Specialized Care Category *</label>
                            <select id="booking-service" class="form-control" required>
                                <option value="" disabled selected>Select service discipline</option>
                                <option value="Speech Therapy">Speech & Language Therapy</option>
                                <option value="Oral Placement Therapy">Oral Placement Therapy (TalkTools)</option>
                                <option value="Occupational Therapy">Occupational Therapy & Sensory Integration</option>
                                <option value="Special Education">Special Education</option>
                                <option value="Pediatric Physiotherapy">Pediatric Physiotherapy</option>
                                <option value="Psychological Counseling">Psychological Assessment & Parent Counselling</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="booking-date">Preferred Date *</label>
                                <input type="date" id="booking-date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="booking-time">Preferred Time slot *</label>
                                <select id="booking-time" class="form-control" required>
                                    <option value="" disabled selected>Select slot</option>
                                    <option value="09:30 AM">09:30 AM - 10:30 AM</option>
                                    <option value="11:00 AM">11:00 AM - 12:00 PM</option>
                                    <option value="12:30 PM">12:30 PM - 01:30 PM</option>
                                    <option value="03:00 PM">03:00 PM - 04:00 PM</option>
                                    <option value="04:30 PM">04:30 PM - 05:30 PM</option>
                                    <option value="06:00 PM">06:00 PM - 07:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="booking-step">
                        <div style="text-align: center; padding: 20px 0;">
                            <i class="ri-checkbox-circle-fill" style="font-size: 5rem; color: var(--success); display: block; margin-bottom: 24px; animation: float 3s ease-in-out infinite;"></i>
                            <h2 class="booking-success-title" style="font-size: 2rem; margin-bottom: 16px;">Booking Provisionally Placed!</h2>
                            <p class="result-desc" id="booking-confirmation-details">We have provisionally scheduled your child's clinical evaluation. Our team in Rajarajeshwari Nagar will call you shortly to confirm the appointment slot.</p>
                        </div>
                    </div>
                    
                    <div class="form-buttons" style="justify-content: flex-end;">
                        <button type="button" class="btn btn-primary" id="booking-next">Confirm Booking <i class="ri-check-double-line"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
