<?php
$active_page = 'privacy';
$page_title = 'Privacy Policy - Rapture Therapy Centre Bangalore';
$page_description = 'Data Privacy Policy of Rapture Therapy Centre in Bangalore. Learn how we secure your child\'s developmental records and therapy logs.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/occupational_therapy.png');">
        <div class="page-hero-content">
            <h1>Privacy Policy</h1>
            <div class="page-breadcrumbs">
                <a href="index.php">Home</a> / <span>Privacy Policy</span>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="section-padding" style="background: var(--bg-white);">
        <div class="container" style="max-width: 900px;">
            <p style="font-size: 1.15rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 30px; font-weight: 600;">
                Welcome to Rapture Therapy Centre, a comprehensive child and adult therapy centre based in India. At Rapture Therapy Centre, we are deeply committed to maintaining a safe, secure, and confidential environment for all individuals who interact with our services—both online and offline.
            </p>

            <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-dark); margin-bottom: 30px;">
                Your trust is extremely important to us. This Privacy Policy explains how we collect, use, store, and protect your personal information, and outlines your rights regarding the data you share with us. We collect information only when it is voluntarily provided or when required to deliver our services or comply with applicable laws.
            </p>

            <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-dark); margin-bottom: 30px;">
                This Privacy Policy applies to all users who visit, access, or use the Rapture Therapy Centre website, digital platforms, or communication channels. By accessing or using our Services, you agree to the terms outlined in this Privacy Policy. If you do not agree with this policy or any related terms, please refrain from using our Services.
            </p>
            
            <div style="background-color: var(--bg-light); border: 2px solid var(--border-color); border-radius: var(--border-radius-sm); padding: 30px; margin-bottom: 45px; box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 16px; color: var(--primary);">Table of Contents</h3>
                <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 10px;">
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 8px;"><a href="#collect" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 1. What Data We Collect</a></li>
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 8px;"><a href="#how-collect" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 2. How We Collect Data About You</a></li>
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 8px;"><a href="#how-use" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 3. How We Use Your Data</a></li>
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 8px;"><a href="#share" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 4. Who We Share Your Data With</a></li>
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 8px;"><a href="#security" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 5. Security Measures</a></li>
                    <li><a href="#updates" style="font-weight: 700; color: var(--text-dark);"><i class="ri-arrow-right-s-line"></i> 6. Updates & Contact Information</a></li>
                </ul>
            </div>
            
            <!-- Section 1 -->
            <div id="collect" style="margin-bottom: 45px;">
                <h3 style="font-size: 1.6rem; color: var(--primary); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; margin-bottom: 16px;">What Data We Collect</h3>
                <p style="margin-bottom: 16px; font-weight: 500;">To access our therapy services, book appointments, or communicate with us, we may collect and store personal information that you voluntarily provide, including but not limited to:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>Full name of the client or parent/guardian</li>
                    <li>Email address</li>
                    <li>Phone number</li>
                    <li>Age and gender (where relevant to therapy planning)</li>
                    <li>Occupation (if applicable)</li>
                    <li>Address or city (for service coordination or home visits)</li>
                    <li>Photograph (with consent, if required for records)</li>
                    <li>Therapy-related details such as service type (speech therapy, occupational therapy, feeding therapy, voice therapy, etc.)</li>
                    <li>Appointment details and session history</li>
                </ul>

                <h4 style="font-size: 1.3rem; margin-top: 24px; margin-bottom: 12px; color: var(--text-dark);">Client & Therapy Data</h4>
                <p style="margin-bottom: 16px;">When you enrol in therapy or attend sessions, we may collect data related to:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>Assessment records</li>
                    <li>Therapy plans and progress notes</li>
                    <li>Attendance and session completion details</li>
                    <li>Communication logs related to therapy services</li>
                </ul>

                <h4 style="font-size: 1.3rem; margin-top: 24px; margin-bottom: 12px; color: var(--text-dark);">Payment Information</h4>
                <p style="margin-bottom: 16px;">If you make payments for services, we collect limited payment-related information such as payment confirmation or receipts. Payment processing is handled securely, and we do not store sensitive banking or card details on our systems.</p>

                <h4 style="font-size: 1.3rem; margin-top: 24px; margin-bottom: 12px; color: var(--text-dark);">Communication & Support</h4>
                <p style="margin-bottom: 16px;">When you contact us via phone, email, WhatsApp, website forms, or other communication channels, we collect and store your contact details and the information you provide to respond to your queries, schedule sessions, or provide support.</p>

                <h4 style="font-size: 1.3rem; margin-top: 24px; margin-bottom: 12px; color: var(--text-dark);">Data We Collect Through Automated Means</h4>
                <p style="margin-bottom: 16px;">When you visit our website or interact with our digital services, certain data may be collected automatically.</p>

                <h5 style="font-size: 1.1rem; margin-top: 16px; margin-bottom: 8px; color: var(--text-dark);">System Data</h5>
                <p style="margin-bottom: 8px;">This includes technical information such as:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>IP address</li>
                    <li>Device type</li>
                    <li>Operating system</li>
                    <li>Browser type and language</li>
                </ul>

                <h5 style="font-size: 1.1rem; margin-top: 16px; margin-bottom: 8px; color: var(--text-dark);">Usage Data</h5>
                <p style="margin-bottom: 8px;">This includes:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>Pages visited</li>
                    <li>Time spent on the website</li>
                    <li>Date and time of access</li>
                    <li>Interaction with forms or features</li>
                </ul>
                <p style="margin-bottom: 16px;">This data is collected through server logs and tracking technologies and is used only to improve website performance, security, and user experience.</p>
            </div>
            
            <!-- Section 2 -->
            <div id="how-collect" style="margin-bottom: 45px;">
                <h3 style="font-size: 1.6rem; color: var(--primary); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; margin-bottom: 16px;">How We Collect Data About You</h3>
                <p style="margin-bottom: 16px; font-weight: 500;">We use tools such as cookies, web beacons, and similar tracking technologies to collect certain data automatically.</p>
                
                <h4 style="font-size: 1.3rem; margin-top: 24px; margin-bottom: 12px; color: var(--text-dark);">Cookies & Tracking Tools</h4>
                <p style="margin-bottom: 16px;">Cookies are small text files stored on your browser that help us:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>Enable basic website functionality</li>
                    <li>Improve website performance</li>
                    <li>Understand user interactions</li>
                    <li>Enhance security and prevent misuse</li>
                </ul>
                <p style="margin-bottom: 16px;">You may control or disable cookies through your browser settings; however, some features of the website may not function properly as a result.</p>
            </div>
            
            <!-- Section 3 -->
            <div id="how-use" style="margin-bottom: 45px;">
                <h3 style="font-size: 1.6rem; color: var(--primary); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; margin-bottom: 16px;">How We Use Your Data</h3>
                <p style="line-height: 1.7; font-weight: 500; margin-bottom: 16px;">We use your data to:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li>Provide therapy services and manage appointments</li>
                    <li>Maintain accurate clinical and administrative records</li>
                    <li>Communicate regarding sessions, updates, or service changes</li>
                    <li>Improve our services and website functionality</li>
                    <li>Comply with legal, regulatory, or professional obligations</li>
                </ul>
            </div>
            
            <!-- Section 4 -->
            <div id="share" style="margin-bottom: 45px;">
                <h3 style="font-size: 1.6rem; color: var(--primary); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; margin-bottom: 16px;">Who We Share Your Data With</h3>
                <p style="margin-bottom: 16px; font-weight: 500;">We do not sell or misuse your personal data. We may share limited data only in the following circumstances:</p>
                <ul style="padding-left: 20px; margin-bottom: 16px; display: flex; flex-direction: column; gap: 8px;">
                    <li><strong>Therapists & Clinical Staff:</strong> For the purpose of delivering therapy services</li>
                    <li><strong>Administrative & Support Staff:</strong> To manage scheduling, communication, and records</li>
                    <li><strong>Service Providers:</strong> Third parties who assist us in website hosting, communication, or operational support</li>
                    <li><strong>Legal & Regulatory Authorities:</strong> When required by law or to protect the rights, safety, and security of Rapture Therapy Centre and its clients</li>
                </ul>
                <p style="margin-bottom: 16px;">Data is shared strictly on a need-to-know basis and with appropriate confidentiality safeguards.</p>
            </div>

            <!-- Section 5 -->
            <div id="security" style="margin-bottom: 45px;">
                <h3 style="font-size: 1.6rem; color: var(--primary); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; margin-bottom: 16px;">Security Measures</h3>
                <p style="margin-bottom: 16px; line-height: 1.7;">Rapture Therapy Centre implements appropriate technical and organizational security measures based on the sensitivity of the data we handle. These measures are designed to protect your information from unauthorized access, alteration, disclosure, or destruction.</p>
                <p style="margin-bottom: 16px; line-height: 1.7;">While we take every reasonable step to secure your data, no system can be guaranteed to be 100% secure. You are encouraged to safeguard any login credentials or communication shared with us and notify us immediately if you believe your information has been compromised.</p>
            </div>

            <!-- Section 6 -->
            <div id="updates" style="background-color: var(--bg-light); border: 2px solid var(--border-color); border-radius: var(--border-radius-sm); padding: 30px; box-shadow: var(--shadow-sm); border-left: 8px solid var(--primary-medium);">
                <h3 style="font-size: 1.6rem; color: var(--primary); margin-bottom: 16px;">Updates & Contact Information</h3>
                <p style="margin-bottom: 16px; font-size: 0.95rem;">We may update this Privacy Policy periodically to reflect changes in our practices, services, or legal requirements. Any material changes will be communicated through our website or other appropriate channels. Updates will become effective on the date they are posted.</p>
                <p style="font-size: 0.95rem; margin-bottom: 12px;">If you have any questions, concerns, or requests regarding this Privacy Policy or your personal data, please contact:</p>
                <p style="font-weight: 700; color: var(--text-dark); font-size: 1.1rem;">Rapture Therapy Centre</p>
                <p style="font-weight: 700; color: var(--text-dark); font-size: 0.95rem; margin-top: 4px;">Email: rapturetherapy24@gmail.com</p>
                <p style="font-weight: 700; color: var(--text-dark); font-size: 0.95rem; margin-top: 4px;">Phone: 7902709974</p>
            </div>
        </div>
    </section>

    <!-- Structured Premium Footer -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
