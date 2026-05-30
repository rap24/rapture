<?php
$active_page = 'home';
$page_title = 'Rapture Therapy Centre - India\'s Premier Hub for Pediatric Therapy';
$page_description = 'Rapture Therapy Centre is Bangalore\'s leading developmental clinic in Rajarajeshwari Nagar (RR Nagar). Specializing in Speech Therapy, Occupational Therapy, TalkTools (OPT), and Special Education.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Centered Expressable Hero Section -->
    <section id="hero" class="hero-expressable">
        <video class="hero-bg-video" src="assets/hero_video.mp4" autoplay muted loop playsinline></video>
        <div class="container relative-z">
            <div class="hero-rating-badge">
                <span class="hero-rating-stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                </span>
                <span>100+ local Bangalore 5-star reviews</span>
            </div>
            <h1>Expert Speech & Occupational Therapy in RR Nagar, Bangalore</h1>
            <p>Delivering world-class interdisciplinary care through both in-clinic and accessible online therapy. As Bangalore's premier center, we integrate advanced Speech Therapy, Occupational Therapy, and Sensory Integration tailored to unlock the full potential of both children and adults.</p>
            <div class="hero-ctas">
                <button class="btn btn-secondary open-booking-modal">Schedule Free Consultation <i class="ri-arrow-right-line"></i></button>
                <a href="#milestones" class="btn btn-outline">Check Developmental Milestones <i class="ri-focus-3-line"></i></a>
            </div>
        </div>
    </section>

    <!-- Specialties Grid Section -->
    <section id="specialties" class="section-padding" style="background: var(--bg-white);">
        <div class="container text-center">
            <h2 class="section-title">Coordinated Specialties</h2>
            <p class="section-subtitle">We integrate therapy protocols across age groups and disciplines to build comprehensive rehabilitation roadmaps.</p>
            
            <!-- Sliding Kids vs. Adults Tab Toggler (Expressable style) -->
            <div class="tab-switcher-wrapper">
                <div class="tab-switcher-slider"></div>
                <button class="tab-btn tab-btn-kids active" type="button">For Kids & Families</button>
                <button class="tab-btn tab-btn-adults" type="button">For Adults</button>
            </div>
            
            <div class="tab-content-container text-center">
                <!-- Kids Panel -->
                <div class="tab-content-panel active" id="kids-tab-panel">
                    <div class="organic-cards-grid">
                        <!-- 1. Speech Therapy -->
                        <div class="organic-card speech-card fade-in-element stagger-1">
                            <div class="organic-icon-box">
                                <i class="ri-speak-line"></i>
                            </div>
                            <h3>Speech & Language Therapy</h3>
                            <p>Overcoming stutters, speech sound difficulties, and vocabulary delays. We incorporate Oral Placement systems and Gestalt script validation.</p>
                            <a href="services.php#speech" class="organic-link">Speech Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 2. Occupational Therapy -->
                        <div class="organic-card occupational-card fade-in-element stagger-2">
                            <div class="organic-icon-box">
                                <i class="ri-shake-hands-line"></i>
                            </div>
                            <h3>Occupational Therapy</h3>
                            <p>Sensory integration swings, developing pincer grip strength, motor planning, and school coordination support in a premium setup.</p>
                            <a href="services.php#occupational" class="organic-link">OT Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 3. Paired Therapy Sessions -->
                        <div class="organic-card fade-in-element stagger-3">
                            <div class="organic-icon-box">
                                <i class="ri-user-heart-line"></i>
                            </div>
                            <h3>Paired Therapy Sessions</h3>
                            <p>Two children matched by developmental level for focused dyadic interaction, joint attention, and reciprocal communication practice.</p>
                            <a href="services.php#sessions" class="organic-link">Paired Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 4. Online Speech Therapy -->
                        <div class="organic-card fade-in-element stagger-4">
                            <div class="organic-icon-box">
                                <i class="ri-vidicon-line"></i>
                            </div>
                            <h3>Online Speech Therapy</h3>
                            <p>Live virtual therapy sessions via secure video call&mdash;accessible from anywhere in India and abroad with full parent coaching.</p>
                            <a href="services.php#sessions" class="organic-link">Online Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 5. Special Education -->
                        <div class="organic-card education-card fade-in-element stagger-1">
                            <div class="organic-icon-box">
                                <i class="ri-book-open-line"></i>
                            </div>
                            <h3>Special Education</h3>
                            <p>Simplifying scholastic learning delays, dyslexia, ADHD focus exercises, and visual curriculum adaptation tailored to local classrooms.</p>
                            <a href="services.php#education" class="organic-link">Education Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 6. Group Therapy -->
                        <div class="organic-card fade-in-element stagger-2">
                            <div class="organic-icon-box">
                                <i class="ri-team-line"></i>
                            </div>
                            <h3>Group Therapy Sessions</h3>
                            <p>Small-group sessions of 3–5 children targeting turn-taking, peer modelling, cooperative play, and functional communication in a naturalistic setting.</p>
                            <a href="services.php#sessions" class="organic-link">Group Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 7. Parental Counselling -->
                        <div class="organic-card fade-in-element stagger-3">
                            <div class="organic-icon-box">
                                <i class="ri-parent-line"></i>
                            </div>
                            <h3>Parental Counselling</h3>
                            <p>Guided parent coaching sessions to support your child's development at home&mdash;strategies for communication, behaviour management, and emotional regulation.</p>
                            <a href="services.php#sessions" class="organic-link">Counselling Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- 8. Feeding Intervention -->
                        <div class="organic-card fade-in-element stagger-4">
                            <div class="organic-icon-box">
                                <i class="ri-restaurant-line"></i>
                            </div>
                            <h3>Feeding Intervention</h3>
                            <p>Addressing picky eating, oral aversions, chewing difficulties, and mealtime challenges through structured sensory-based feeding therapy.</p>
                            <a href="services.php#sessions" class="organic-link">Feeding Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Adults Panel -->
                <div class="tab-content-panel" id="adults-tab-panel">
                    <div class="organic-cards-grid">
                        <!-- Speech Therapy (Adults) -->
                        <div class="organic-card speech-card fade-in-element stagger-1">
                            <div class="organic-icon-box">
                                <i class="ri-speak-line"></i>
                            </div>
                            <h3>Adult Speech & Voice</h3>
                            <p>Therapy for stutters, voice restoration, accent modification, and post-stroke communication support (aphasia retraining).</p>
                            <a href="services.php#speech" class="organic-link">Speech Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- Neuro OT (Adults) -->
                        <div class="organic-card occupational-card fade-in-element stagger-2">
                            <div class="organic-icon-box">
                                <i class="ri-shake-hands-line"></i>
                            </div>
                            <h3>Neuro-Occupational Rehab</h3>
                            <p>Cognitive retraining, fine motor restoration post-injury, stroke recovery tasks, and functional life skills training.</p>
                            <a href="services.php#occupational" class="organic-link">OT Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- Swallowing Care -->
                        <div class="organic-card education-card fade-in-element stagger-3">
                            <div class="organic-icon-box">
                                <i class="ri-bubble-chart-line"></i>
                            </div>
                            <h3>Dysphagia (Swallowing) Care</h3>
                            <p>Targeted neuromuscular stimulation and exercises to restore smooth, comfortable, and safe chewing and swallowing functions.</p>
                            <a href="services.php#speech" class="organic-link">Dysphagia Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                        
                        <!-- Stuttering Intervention -->
                        <div class="organic-card speech-card fade-in-element stagger-4">
                            <div class="organic-icon-box">
                                <i class="ri-mic-line"></i>
                            </div>
                            <h3>Stuttering Intervention</h3>
                            <p>Evidence-based fluency shaping and stuttering modification techniques for adults&mdash;reducing blocks, prolongations, and speech anxiety in professional and social settings.</p>
                            <a href="services.php#speech" class="organic-link">Stuttering Details <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us split content -->
    <section id="ecosystem" class="section-padding why-section">
        <div class="container">
            <div class="split-content-section">
                <!-- Visual Card -->
                <div class="bold-image-card fade-in-element">
                    <img src="assets/occupational_therapy.png" alt="Indian child playing inside occupational sensory therapy chamber">
                </div>
                
                <!-- Feature stack -->
                <div class="fade-in-element">
                    <h2 class="section-title" style="text-align: left; margin-bottom: 24px;">Unified Pediatric Ecosystem</h2>
                    <p class="section-subtitle" style="text-align: left; margin-bottom: 40px;">Our clinic in Rajarajeshwari Nagar operates in structural collaboration with SS Occupational Therapy - Centre for Child Development (SSOT-CCD).</p>
                    
                    <div class="large-feature-list">
                        <!-- Item 1 -->
                        <div class="large-feature-item">
                            <span class="large-feature-num">01</span>
                            <div class="large-feature-content">
                                <h4>Interdisciplinary Co-Design</h4>
                                <p>Special educators, speech language pathologists, and OT consultants map goals together, avoiding standard isolated therapy methods.</p>
                            </div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="large-feature-item">
                            <span class="large-feature-num">02</span>
                            <div class="large-feature-content">
                                <h4>Intensive Tactile Protocols</h4>
                                <p>Certified clinicians practicing Oral Placement Therapy (TalkTools) using blowing/drinking exercises to build anatomical sound production.</p>
                            </div>
                        </div>
                        
                        <!-- Item 3 -->
                        <div class="large-feature-item">
                            <span class="large-feature-num">03</span>
                            <div class="large-feature-content">
                                <h4>Parental Milestone Empowerment</h4>
                                <p>We offer specialized parent coaching blocks so you can continue developmental stimulation tasks during everyday routines at home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialized spot lights -->
    <section id="protocols" class="section-padding" style="background: var(--bg-white);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Specialized Developmental Protocols</h2>
                <p class="section-subtitle">We deploy certified advanced practices targeting physical and structural speech layers.</p>
            </div>
            
            <div class="organic-cards-grid" style="grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));">
                <!-- OPT Spot -->
                <div class="organic-card speech-card fade-in-element" style="padding: 50px;">
                    <div class="organic-icon-box">
                        <i class="ri-bubble-chart-line"></i>
                    </div>
                    <h3>Oral Placement Therapy (TalkTools / OPT)</h3>
                    <p>A tactile, physical articulation pathway. OPT implements customized straws, horns, and bite blocks to systematically build mouth coordinate strength, lip closure, jaw stability, and tongue control required for structural speech production.</p>
                    <a href="services.php#speech" class="organic-link" style="color: var(--border-speech);">Explore OPT Details <i class="ri-arrow-right-line"></i></a>
                </div>
                
                <!-- GLP Spot -->
                <div class="organic-card education-card fade-in-element" style="padding: 50px;">
                    <div class="organic-icon-box">
                        <i class="ri-voiceprint-line"></i>
                    </div>
                    <h3>Gestalt Language Processing (GLP)</h3>
                    <p>Autistic and neurodiverse children often learn language in complete chunks (scripts/echolalia) before breaking them down. We structure our communication pathways to validate these scripts, transitioning kids gracefully into self-authored dialogue.</p>
                    <a href="services.php#speech" class="organic-link" style="color: var(--border-education);">Explore GLP Guidelines <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
        </div>
    </section>



    <!-- Milestone Screening Wizard -->
    <section id="milestones" class="section-padding why-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Milestone Screening Wizard</h2>
                <p class="section-subtitle">Quick 4-step check &mdash; is your child hitting key communication & sensory milestones?</p>
            </div>
            
            <div class="checklist-card fade-in-element">
                <!-- Step dots navigation -->
                <div class="wizard-step-dots">
                    <div class="wizard-dot active" data-dot="0"><span>1</span></div>
                    <div class="wizard-dot-line"></div>
                    <div class="wizard-dot" data-dot="1"><span>2</span></div>
                    <div class="wizard-dot-line"></div>
                    <div class="wizard-dot" data-dot="2"><span>3</span></div>
                    <div class="wizard-dot-line"></div>
                    <div class="wizard-dot" data-dot="3"><span>4</span></div>
                </div>

                <div class="checklist-header">
                    <span class="step-indicator" id="checklist-step-indicator">Step 1 of 4</span>
                    <span class="clinic-status-badge status-badge open">
                        <span class="status-dot"></span>
                        <span class="status-text">Open Now</span>
                    </span>
                </div>
                
                <div class="checklist-wizard-container">
                    <!-- Step 1 -->
                    <div class="checklist-wizard-step active" data-step="0">
                        <h3 class="checklist-question">Communication (18 Months)</h3>
                        <p class="checklist-question-desc">Does your child point at objects, wave bye-bye, and use at least 5-10 words consistently?</p>
                        <div class="checklist-options">
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-18" value="yes">
                                <i class="ri-checkbox-circle-line checklist-opt-icon opt-yes"></i>
                                <span>Yes, consistently achieves these goals</span>
                            </label>
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-18" value="no">
                                <i class="ri-error-warning-line checklist-opt-icon opt-no"></i>
                                <span>No, rarely points or uses under 5 words</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="checklist-wizard-step" data-step="1">
                        <h3 class="checklist-question">Combining Language (24 Months)</h3>
                        <p class="checklist-question-desc">Does your child join two or more words together (e.g. "more water") and copy pretend play actions?</p>
                        <div class="checklist-options">
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-24" value="yes">
                                <i class="ri-checkbox-circle-line checklist-opt-icon opt-yes"></i>
                                <span>Yes, combines words and imitates play</span>
                            </label>
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-24" value="no">
                                <i class="ri-error-warning-line checklist-opt-icon opt-no"></i>
                                <span>No, mostly single words or gestures only</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="checklist-wizard-step" data-step="2">
                        <h3 class="checklist-question">Speech Clarity (3 Years)</h3>
                        <p class="checklist-question-desc">Is your child understood by family and peers at least 75% of the time, and can they follow multi-step instructions?</p>
                        <div class="checklist-options">
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-36" value="yes">
                                <i class="ri-checkbox-circle-line checklist-opt-icon opt-yes"></i>
                                <span>Yes, clear speech and follows commands well</span>
                            </label>
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-36" value="no">
                                <i class="ri-error-warning-line checklist-opt-icon opt-no"></i>
                                <span>No, speech unclear or struggles with commands</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="checklist-wizard-step" data-step="3">
                        <h3 class="checklist-question">Sensory Integration</h3>
                        <p class="checklist-question-desc">Does your child react intensely to noises, reject fabric textures, or appear unusually clumsy or restless?</p>
                        <div class="checklist-options">
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-sensory" value="no">
                                <i class="ri-error-warning-line checklist-opt-icon opt-no"></i>
                                <span>Yes, frequently struggles with sensitivity</span>
                            </label>
                            <label class="checklist-option-label">
                                <input type="radio" name="ms-sensory" value="yes">
                                <i class="ri-checkbox-circle-line checklist-opt-icon opt-yes"></i>
                                <span>No, handles sensory input smoothly</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="checklist-nav-buttons">
                        <button class="btn btn-outline" id="checklist-prev"><i class="ri-arrow-left-line"></i> Back</button>
                        <button class="btn btn-primary" id="checklist-next">Next <i class="ri-arrow-right-line"></i></button>
                    </div>
                </div>
                
                <!-- Result Dashboard -->
                <div class="checklist-result-box" id="checklist-result">
                    <i class="ri-checkbox-circle-fill result-icon"></i>
                    <h3 class="result-title">Evaluating Milestones...</h3>
                    <p class="result-desc">Your clinical recommendation will appear here.</p>
                    <div class="result-actions">
                        <button class="btn btn-primary open-booking-modal">Book Assessment <i class="ri-calendar-event-line"></i></button>
                        <button class="btn btn-outline" id="checklist-restart">Restart <i class="ri-restart-line"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intake Journey Section -->
    <section id="intake" class="section-padding" style="background: var(--bg-white);">
        <div class="container text-center">
            <h2 class="section-title">The Intake Timeline</h2>
            <p class="section-subtitle">How we guide your family step-by-step from initial inquiry to milestone breakthroughs.</p>
            
            <div class="intake-timeline-grid">
                <!-- Block 1 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">01</span>
                    <h4>Detailed Intake</h4>
                    <p>An in-depth initial clinical consultation evaluating physical, sensory, and verbal skills.</p>
                </div>
                
                <!-- Block 2 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">02</span>
                    <h4>Ecosystem Plan</h4>
                    <p>Special educator, SLP, and OT experts design unified milestone targets tailored to the child.</p>
                </div>
                
                <!-- Block 3 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">03</span>
                    <h4>Active Therapy</h4>
                    <p>Fun, child-focused weekly clinical play sessions mapped directly to physical & neurological needs.</p>
                </div>
                
                <!-- Block 4 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">04</span>
                    <h4>Parent Pathways</h4>
                    <p>Equipping caregivers with structured guidelines to stimulate learning during daily home routines.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Reviews -->
    <section class="section-padding why-section" id="google-reviews">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">What Parents Say</h2>
                <p class="section-subtitle">Real reviews from Google &mdash; rated 5.0 <i class="ri-star-fill" style="color: var(--accent-gold);"></i> by families across Bangalore.</p>
            </div>
            
            <div class="reviews-grid">
                <!-- Review 1 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar">SS</div>
                        <div class="review-meta">
                            <h4 class="review-author">Sudarshan Shankar</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> a year ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">Monika is an incredibly gifted and compassionate speech and language therapist. We have been working with Monika for over 3 years now. When we first met her, my Daughter was going through some major changes and wasn't always easy to engage. She had a lot of anxiety issues. Monika's patience and determination has led to really positive outcomes. My Daughter is becoming a more confident communicator. She is able to express her emotions in greater detail and is working on understanding how to self regulate. Monika continuously takes the time to understand her needs and works amazingly well with our multidisciplinary team so speech targets are a priority all week. She truly has a gift for working with children and making therapy a positive and enjoyable experience. We highly recommend Rapture Therapy to any parent looking for a skilled therapist for their child.</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>

                <!-- Review 2 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #22c55e, #16a34a);">BM</div>
                        <div class="review-meta">
                            <h4 class="review-author">Bhavitha Mallesh</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> a year ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">We have been associated with Likitha for speech and language therapy. Both Monika and Likitha are the best STs in town. No doubt that my son has improved his communication skills. Right people do the right things. I thank Likitha for her sincere efforts. GOD BLESS!</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>

                <!-- Review 3 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #a855f7, #7c3aed);">KP</div>
                        <div class="review-meta">
                            <h4 class="review-author">Kalyani Pandey</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> a year ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">Monika is a wonderful speech therapist. She has a very unique ability to gel with kids and bring amazing improvements in them. My son went from being completely non verbal to almost sentence building level with the help of her therapies. Haven't come across any therapist with such lovely personality. My son is so fond of her. She makes sure the children get comfortable so that she may help them with their issues in the best possible way.</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>

                <!-- Review 4 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #f59e0b, #d97706);">VS</div>
                        <div class="review-meta">
                            <h4 class="review-author">Vani Shampura</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> a year ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">On behalf of my wife I am writing this review. My name is Niranjan. My wife Vani suffered brain stroke in the month of April 2024 and was admitted to Sparsh Hospital where she was treated. Eventually she lost her speech and sensation of the right parts of the body. The doctor suggested Rapture therapy centre for her speech training which was handled by Likitha in a very professional manner. After reviewing the status she gave a report that the therapy should improve her speech and she can slowly talk. Currently after undergoing training for more than 36 sessions, I am happy to write that Likitha has done a wonderful job and handled her assignment professionally which has made Vani to repeat words and sentences on a regular basis. Yes, one has to be patient for the treatment to have a positive effect on the patient.</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>

                <!-- Review 5 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #ec4899, #db2777);">SS</div>
                        <div class="review-meta">
                            <h4 class="review-author">Sujata Swamy</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> a year ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">My husband had a brain stroke in 2023, and it affected his ability to speak completely. We are extremely grateful to find Miss Monika at that time. She has been working on his speech for more than a year now. She is very dedicated and her consistent approach helped him a lot. Still a long way to go but overall I see a great improvement in him in terms of understanding, recognising and responding. Thank you so much Monika. I hope the review will help someone who is looking for a good speech therapist, I highly recommend.</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>

                <!-- Review 6 -->
                <div class="review-card fade-in-element">
                    <div class="review-card-header">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">PP</div>
                        <div class="review-meta">
                            <h4 class="review-author">Priyanka Prakash</h4>
                            <div class="review-badge-row">
                                <span class="review-time"><i class="ri-time-line"></i> 10 months ago</span>
                            </div>
                        </div>
                        <i class="ri-google-fill review-google-icon"></i>
                    </div>
                    <div class="review-stars">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>
                    <p class="review-text">My son Kushal, we started occupational therapy and speech therapy at Rapture a month ago. He was very hyperactive and had a lot of sensory issues. After occupational therapy by Bercy he showed a lot of progress &mdash; his attention and focus has improved, he follows instructions better now. I highly recommend this place to everyone.</p>
                    <button class="review-read-more" aria-label="Read more">Read more</button>
                </div>
            </div>

            <div class="reviews-cta">
                <a href="https://www.google.com/maps/place/Rapture+Therapy+Centre/@12.9200872,77.5144621,17z/data=!3m2!4b1!5s0x3bae3e556f2a271f:0xa940087a601dd771!4m6!3m5!1s0x3bae3fe118873703:0x366bea6fbd53c678!8m2!3d12.920082!4d77.517037!16s%2Fg%2F11y4bc_qky?entry=ttu&g_ep=EgoyMDI2MDUyNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="btn btn-outline">
                    <i class="ri-google-fill"></i> View All Reviews on Google
                </a>
            </div>
        </div>
    </section>

    <!-- Accordion FAQ -->
    <section id="faqs" class="section-padding" style="background: var(--bg-white);">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Common Parental Questions</h2>
                <p class="section-subtitle">Everything you need to know about starting developmental and communication therapies.</p>
            </div>
            
            <div class="faqs-container">
                <!-- FAQ 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How can I tell if my child needs Speech and Language Therapy?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Red flags include: speaking fewer than 10 words at 18 months, struggling to combine two words by age 2, difficulty understanding simple commands, or if unfamiliar listeners struggle to understand their speech by age 3. A pediatric evaluation can quickly address concerns and outline structured support.</p>
                    </div>
                </div>
                
                <!-- FAQ 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is Occupational Therapy (OT), and how does it help?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Occupational Therapy focuses on sensory processing, fine motor planning (such as holding pencils or buttoning shirts), core body balance, and self-care skills. It helps children who might overreact to loud noises, reject fabric textures, appear clumsy, or struggle with focus in school.</p>
                    </div>
                </div>
                
                <!-- FAQ 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is unique about Oral Placement Therapy (TalkTools)?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Unlike traditional speech therapy which relies on verbal mimicry, TalkTools is a tactile therapy. It uses straws, horns, bubbles, and jaw grading tools to physically train the muscles of the lips, tongue, and jaw. This builds the foundational muscle strength necessary to articulate complex speech sounds.</p>
                    </div>
                </div>
                
                <!-- FAQ 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How long does a standard therapy plan last?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Every child is unique. Therapy duration depends on the severity of the developmental gap, the child's response rate, and home exercise consistency. Typically, initial milestones are reviewed every 3 to 6 months. Consistent weekly sessions show the fastest progress.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Structured Footer -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
