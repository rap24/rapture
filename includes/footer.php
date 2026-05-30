<?php
/**
 * Rapture Therapy Centre — Public Footer Include
 */
$base = isset($is_article) ? '../' : '';
?>
    <!-- Structured Premium Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>Rapture Therapy Centre</h3>
                    <p class="footer-desc">A premium, interdisciplinary developmental clinic in RR Nagar, Bangalore. We nurture children's physical, sensory, and communication potential in collaboration with the Centre for Child Development.</p>
                    <div class="footer-socials">
                        <a href="https://www.facebook.com/profile.php?id=61582809779188" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                        <a href="https://www.instagram.com/rapturetherapycentre/" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Instagram"><i class="ri-instagram-fill"></i></a>
                        <a href="https://wa.me/917902709974" class="footer-social-link" aria-label="WhatsApp" style="background-color: #25d366; color: white;"><i class="ri-whatsapp-line"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="<?= $base ?>index.php">Home</a></li>
                        <li><a href="<?= $base ?>services.php">Therapy Services</a></li>
                        <li><a href="<?= $base ?>therapists.php">Our Therapists</a></li>
                        <li><a href="<?= $base ?>about.php">About Ecosystem</a></li>
                        <li><a href="<?= $base ?>blog.php">Learning Centre</a></li>
                        <li><a href="<?= $base ?>contact.php">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="<?= $base ?>services.php#speech">Speech & Language</a></li>
                        <li><a href="<?= $base ?>services.php#occupational">Occupational Therapy</a></li>
                        <li><a href="<?= $base ?>services.php#education">Special Education</a></li>
                        <li><a href="<?= $base ?>services.php#physiotherapy">Physiotherapy Care</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Clinic Location</h3>
                    <div class="footer-contact-item">
                        <i class="ri-map-pin-line footer-contact-icon"></i>
                        <span><a href="https://www.google.com/maps/place/Rapture+Therapy+Centre/@12.9200872,77.5144621,17z/" target="_blank" rel="noopener" style="color: inherit; text-decoration: underline;">2nd Floor, Sree Narayana Sankeerna, 1704, BEML Layout, 1st Phase, 5th Stage, Rajarajeshwari Nagar, Bengaluru, Karnataka 560098</a></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="ri-phone-line footer-contact-icon"></i>
                        <span><a href="tel:+917902709974" style="color: inherit; text-decoration: none;">+91 7902 709 974</a></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="ri-mail-line footer-contact-icon"></i>
                        <span><a href="mailto:rapturetherapy24@gmail.com" style="color: inherit; text-decoration: none;">rapturetherapy24@gmail.com</a></span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="ri-time-line footer-contact-icon"></i>
                        <span>Mon-Fri: 9:00 AM - 7:00 PM<br>Sat: 9:30 AM - 1:30 PM<br>Sunday: Closed</span>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 Rapture Therapy Centre. All rights reserved. Designed with premium visual excellence.</p>
                <div class="footer-bottom-links">
                    <a href="<?= $base ?>privacy.php">Privacy Policy</a>
                    <a href="<?= $base ?>contact.php">Find Us On Map</a>
                </div>
            </div>
        </div>
    </footer>

    <?php include __DIR__ . '/booking-modal.php'; ?>

    <script src="<?= $base ?>js/app.js"></script>
</body>
</html>
