<?php
require_once __DIR__ . '/includes/db.php';
$db = getDB();
$active_page = 'services';
$page_title = 'Therapy Services - Rapture Therapy Centre Bangalore';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/speech_therapy.png');">
        <div class="page-hero-content">
            <h1>Specialized Therapies</h1>
            <div class="page-breadcrumbs">
                <a href="index.html">Home</a> / <span>Services</span>
            </div>
        </div>
    </section>

    <!-- Detailed Specialties Deep-Dives -->
    <!-- Speech Section -->
    <section id="speech" class="section-padding" style="background: var(--bg-white);">
        <div class="container">
            <div class="why-grid">
                <!-- Details -->
                <div class="fade-in-element">
                    <span class="status-badge open" style="margin-bottom: 16px; background-color: var(--bg-speech); color: var(--border-speech);">SLP Specialties</span>
                    <h2 style="font-size: 2.5rem; margin-bottom: 20px; letter-spacing: -0.04em;">Speech Language and Communication Therapy</h2>
                    <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 24px;">
                        Speech Language and Communication Therapy (SLT) is a specialized field focused on diagnosing and treating communication and swallowing disorders in pediatric and adult population.
                    </p>
                    
                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 30px; margin-bottom: 8px;">Oral Placement Therapy (TalkTools)</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 16px; line-height: 1.6;">
                        OPT is a specialized tactile speech protocol. When structural speech muscles lack strength or range of motion, speech mimicry alone fails. We use a progressive hierarchy of customized blowing straws, horns, and bite-grading blocks to build jaw stability, lip posture, and tongue mobility necessary to speak clear phonemes.
                    </p>

                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 24px; margin-bottom: 8px;">Gestalt Language Processing (GLP)</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 16px; line-height: 1.6;">
                        Autistic kids often acquire communication in complete blocks (echolalia/scripts) rather than single words. Our speech language clinicians are certified in Gestalt language strategies, actively validating scripts to systematically help children deconstruct scripts into flexible, self-designed expressions.
                    </p>

                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 24px; margin-bottom: 8px;">Parental Counselling</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 16px; line-height: 1.6;">
                        Guided parent coaching sessions designed to empower families with evidence-based strategies for supporting their child's development at home. Our therapists work closely with parents to build practical skills&mdash;modelling communication techniques, managing challenging behaviours, supporting emotional regulation, and creating structured home routines that reinforce therapy goals between sessions.
                    </p>

                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 24px; margin-bottom: 8px;">Feeding Intervention</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 30px; line-height: 1.6;">
                        Structured sensory-based feeding therapy for children with picky eating, oral aversions, chewing difficulties, and mealtime refusal behaviours. Our feeding specialists use a gradual desensitisation approach&mdash;introducing new textures, temperatures, and flavours at the child's pace. Combined with oral motor strengthening from OPT, we help children expand their diet, reduce mealtime stress, and develop safe, independent eating skills.
                    </p>
                    
                    <button class="btn btn-secondary open-booking-modal">Request Speech Review <i class="ri-arrow-right-line"></i></button>
                </div>
                
                <!-- Pediatric SLP Services Card -->
                <div class="fade-in-element" style="display: flex; flex-direction: column; gap: 28px; align-self: flex-start; margin-top: 40px;">
                    <div class="organic-card speech-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-speech); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-heart-pulse-line"></i> Pediatric Speech Language & Communication Therapy Services For:</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Neuro developmental disorders including down syndrome and Autism spectrum</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Specific Language impairment</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Language difficulties</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Speech Sound disorders</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Feeding and Swallowing</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Cleftlip and palate</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Stuttering and cluttering</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Gestalt language processing</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Cerebral palsy</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Childhood apraxia of speech</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Complex communication needs / AAC</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Pragmatic Language Disorder</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developmental delay</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Fluency Disorders</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Receptive / Expressive language Impairment</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Adult SLP Card -->
                    <div class="organic-card speech-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-speech); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-user-voice-line"></i> Adult Speech, Language &amp; Communication Therapy Services For:</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Aphasia (Post-Stroke Language Recovery)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Dysphagia (Swallowing Disorders)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Motor Speech Disorders (Dysarthria &amp; Apraxia)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Voice Disorders &amp; Vocal Cord Nodules</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Cognitive-Communication Disorders (TBI, Dementia)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Stuttering &amp; Fluency Disorders</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Parkinson's Disease Communication Support</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Our Treatment Card for Speech -->
                    <div class="organic-card speech-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-speech); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-service-line"></i> Our Treatment</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Articulation therapy (improving speech sound production)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Oral motor therapy (strengthening muscles used for speech and feeding)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Language intervention activities (improving receptive and expressive language)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Gestalt language processing strategies (natural language acquisition)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Augmentative and Alternative Communication (AAC) training</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Social communication and pragmatic language therapy</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Fluency shaping and stuttering modification</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Voice therapy and vocal hygiene</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Feeding and swallowing intervention (dysphagia management)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-speech); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Parent coaching and home program development</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Red flags card -->
                    <div class="red-flag-card">
                        <h3 style="font-size: 1.35rem; margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-error-warning-fill red-flag-icon"></i> Speech Red Flags Checklist</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Speaks under 5-10 words consistently at 18 months.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Struggles to combine 2 words (e.g. "want milk") by age 2.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Unfamiliar listeners struggle to understand speech at age 3.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Stutters, blocks, or struggles to push out words.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Exhibits feeding, chewing, or excessive drooling patterns.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Occupational Therapy Section -->
    <section id="occupational" class="section-padding why-section">
        <div class="container">
            <div class="why-grid">
                <!-- Details -->
                <div class="fade-in-element">
                    <span class="status-badge open" style="margin-bottom: 16px; background-color: var(--bg-occupational); color: var(--border-occupational);">Pediatric &amp; Adult OT</span>
                    <h2 style="font-size: 2.5rem; margin-bottom: 20px; letter-spacing: -0.04em;">Occupational Therapy</h2>
                    <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 12px;">
                        Occupational Therapy is a diverse field that addresses the needs of individuals across the lifespan, including both pediatric and adult populations.
                    </p>
                    <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 24px;">
                        In both pediatric and adult settings, our occupational therapists collaborate with clients, families, caregivers, and other healthcare professionals to develop individualised treatment plans that focus on improving functional abilities and enhancing overall well-being.
                    </p>
                    
                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 30px; margin-bottom: 8px;">State-of-the-Art Sensory Chamber</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 16px; line-height: 1.6;">
                        Our clinic houses an illustrative sensory environment outfitted with secure bolster swings, platform systems, tactile walking logs, and colorful balance boards. Under expert therapist tracking, children receive organized vestibular and proprioceptive stimulation that calms their central nervous systems, helping improve classroom focus.
                    </p>

                    <h4 style="font-size: 1.25rem; font-weight: 850; color: var(--primary); margin-top: 24px; margin-bottom: 8px;">Fine Motor Planning &amp; Task Success</h4>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 30px; line-height: 1.6;">
                        Through structured play blocks (manipulating beads, stacking gears, writing practices), we enhance hand-eye coordination, shoulder-girdle stability, and fine motor dexterity to ensure kids write, feed, and dress with zero anxiety.
                    </p>
                    
                    <button class="btn btn-primary open-booking-modal">Request OT Assessment <i class="ri-arrow-right-line"></i></button>
                </div>
                
                <!-- Pediatric & Adult OT Services Cards -->
                <div class="fade-in-element" style="display: flex; flex-direction: column; gap: 28px; align-self: flex-start; margin-top: 40px;">
                    <!-- Pediatric OT Card -->
                    <div class="organic-card occupational-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-occupational); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-heart-pulse-line"></i> Pediatric Occupational Therapy Services For:</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developmental Delays</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Sensory Processing Disorders</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Autism Spectrum Disorder</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Down syndrome</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Cerebral Palsy</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Dysgraphia and handwriting remediation</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Learning Disabilities / Difficulties</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Emotion Regulation / Self Regulation</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Attention Deficit Hyperactivity Disorder (ADHD)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Coordination disorders / Dyspraxia</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Fine motor / gross motor</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Adult OT Card -->
                    <div class="organic-card occupational-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-occupational); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-user-heart-line"></i> Adult Occupational Therapy Services For:</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Chronic conditions like multiple sclerosis</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Stroke</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>TBI</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Meningitis</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Parkinson, Rheumatoid arthritis, dementia, Hand function, weakness</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Our Treatment Card -->
                    <div class="organic-card occupational-card" style="box-shadow: var(--shadow-sm); padding: 40px 35px;">
                        <h3 style="font-size: 1.35rem; color: var(--border-occupational); margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-service-line"></i> Our Treatment</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Sensory integration / Sensory based treatment (ie, Proprioceptive awareness, sensory modulation)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing emotion / Self-regulation skills</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing play and social skills</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing executive functions skill (ie, Attention, Organaization, Judgement, Coping strategies, Awareness)</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing gross motor skills such as motor planing / prarcis, balance, coordination, body awareness and bilateral coordination</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing fine motor skills including handwriting and hand strength</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing visual perceptual integration skills</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Developing self-care skills</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Helping with challenging behaviours</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-checkbox-circle-fill" style="color: var(--border-occupational); font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Environmental adaptations for home and school settings</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Sensory Red Flags Card -->
                    <div class="red-flag-card">
                        <h3 style="font-size: 1.35rem; margin-bottom: 20px; letter-spacing: -0.02em;"><i class="ri-error-warning-fill red-flag-icon"></i> Sensory Red Flags Checklist</h3>
                        <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 12px;">
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Extreme over-reaction to noises, fabrics, or textures.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Appears motor-clumsy, trips often, or avoids swings.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Struggles with pincer skills (holding pencils, buttons).</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Hyperactive patterns, struggles to self-regulate or sit still.</span>
                            </li>
                            <li style="display: flex; gap: 10px; font-size: 0.95rem; font-weight: 600;">
                                <i class="ri-alert-fill red-flag-icon" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                                <span>Struggles to master self-care tasks (dressing, feeding).</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Session Formats Section -->
    <section id="sessions" class="section-padding" style="background: var(--bg-white); padding-top: 40px;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Flexible Session Formats</h2>
                <p class="section-subtitle">We offer multiple session types designed to suit your child's learning style, social needs, and family convenience.</p>
            </div>
            
            <div class="why-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
                <!-- Group Therapy -->
                <div class="organic-card fade-in-element" style="padding: 45px 35px;">
                    <div class="organic-icon-box">
                        <i class="ri-team-line"></i>
                    </div>
                    <h3 style="font-size: 1.55rem; font-weight: 850; margin-bottom: 16px;">Group Therapy Sessions</h3>
                    <p style="color: var(--text-dark); margin-bottom: 20px; font-size: 0.98rem; font-weight: 500;">
                        Small-group sessions of 3–5 children, structured around shared developmental goals and guided by a lead therapist with support staff.
                    </p>
                    <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 24px;">
                        Group therapy creates a naturalistic social learning environment where children practise turn-taking, cooperative play, peer modelling, and functional communication in real time. Sessions are carefully designed to target language use, sensory regulation, and social-emotional skills—all within a fun, interactive setting that mirrors everyday classroom and playground dynamics.
                    </p>
                    <button class="btn btn-secondary open-booking-modal">Enquire About Group Sessions <i class="ri-arrow-right-line"></i></button>
                </div>

                <!-- Paired Sessions -->
                <div class="organic-card fade-in-element" style="padding: 45px 35px;">
                    <div class="organic-icon-box">
                        <i class="ri-user-heart-line"></i>
                    </div>
                    <h3 style="font-size: 1.55rem; font-weight: 850; margin-bottom: 16px;">Paired Therapy Sessions</h3>
                    <p style="color: var(--text-dark); margin-bottom: 20px; font-size: 0.98rem; font-weight: 500;">
                        Two children are carefully matched by age and developmental level for focused, dyadic interaction under expert therapist guidance.
                    </p>
                    <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 24px;">
                        Paired sessions bridge the gap between individual therapy and group settings. Your child practises joint attention, shared problem-solving, and reciprocal communication with a compatible peer&mdash;building confidence before transitioning into larger social situations like school classrooms.
                    </p>
                    <button class="btn btn-secondary open-booking-modal">Enquire About Paired Sessions <i class="ri-arrow-right-line"></i></button>
                </div>

                <!-- Online Speech Therapy -->
                <div class="organic-card fade-in-element" style="padding: 45px 35px;">
                    <div class="organic-icon-box">
                        <i class="ri-vidicon-line"></i>
                    </div>
                    <h3 style="font-size: 1.55rem; font-weight: 850; margin-bottom: 16px;">Online Speech Therapy</h3>
                    <p style="color: var(--text-dark); margin-bottom: 20px; font-size: 0.98rem; font-weight: 500;">
                        Live, one-on-one virtual therapy sessions delivered via secure video call&mdash;accessible from home anywhere across India and abroad.
                    </p>
                    <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 24px;">
                        Our telepractice model brings the same evidence-based therapy protocols to your screen. Ideal for families in remote locations, NRI parents, or those seeking continuity of care during travel or school holidays. Each session includes interactive digital activities, real-time parent coaching, and a detailed home-practice plan.
                    </p>
                    <button class="btn btn-secondary open-booking-modal">Book Online Session <i class="ri-arrow-right-line"></i></button>
                </div>

            </div>
        </div>
    </section>

    <!-- Scholastic & Physiological Care Section -->
    <section id="education" class="section-padding" style="background: var(--bg-white); padding-top: 0;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Scholastic & Physiological Care</h2>
                <p class="section-subtitle">Completing our collaborative developmental care framework in RR Nagar.</p>
            </div>
            
            <div class="why-grid" style="gap: 40px;">
                <!-- Special Education -->
                <div class="organic-card education-card fade-in-element" style="padding: 50px;">
                    <div class="organic-icon-box">
                        <i class="ri-book-open-line"></i>
                    </div>
                    <h3 style="font-size: 1.55rem; font-weight: 850; margin-bottom: 16px;">Special Education</h3>
                    <p style="color: var(--text-dark); margin-bottom: 20px; font-size: 0.98rem; font-weight: 500;">
                        Targeted learning strategies for children with intellectual or developmental differences, scholastic delays, ADHD, and learning disabilities.
                    </p>
                    <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6;">
                        Our certified special educators break down complex subjects, adapt visual materials, and build attention span. We frame custom educational roadmaps that align smoothly with children's mainstream schools.
                    </p>
                </div>
                
                <!-- Physiotherapy -->
                <div id="physiotherapy" class="organic-card physio-card fade-in-element" style="padding: 50px;">
                    <div class="organic-icon-box">
                        <i class="ri-walk-line"></i>
                    </div>
                    <h3 style="font-size: 1.55rem; font-weight: 850; margin-bottom: 16px;">Pediatric Physiotherapy</h3>
                    <p style="color: var(--text-dark); margin-bottom: 20px; font-size: 0.98rem; font-weight: 500;">
                        Targeting gross motor coordination, balance, developmental gait milestones (crawling, walking), and posture core muscle strength.
                    </p>
                    <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6;">
                        Through structured coordination exercises, dynamic stepping paths, core balance boards, and physical muscle-stretch sequences, our physiotherapists support recovery from developmental delays, cerebral palsy, and posture imbalances.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Coordinated Intake Steps -->

    <section id="journey" class="section-padding why-section">
        <div class="container text-center">
            <h2 class="section-title">The Collaborative Therapy Journey</h2>
            <p class="section-subtitle">How we guide your family step-by-step from initial screening to developmental milestones.</p>
            
            <div class="intake-timeline-grid">
                <!-- Step 1 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">01</span>
                    <h4>Detailed Screening</h4>
                    <p>A multi-disciplinary initial evaluation assessing speech coordination, physical tone, and sensory preferences.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">02</span>
                    <h4>Shared Strategy</h4>
                    <p>Coordinated specialists design unified weekly targets built entirely around the child's natural strengths.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">03</span>
                    <h4>Clinical Play</h4>
                    <p>Fun, child-centric weekly therapy sessions in a highly secure, modern, and friendly environment.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="intake-timeline-block fade-in-element">
                    <span class="intake-step-num">04</span>
                    <h4>Parent Pathways</h4>
                    <p>Providing custom routines and visual guides to continue sensory and verbal exercises during everyday home play.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Structured Premium Footer -->
    <?php require_once __DIR__ . '/includes/footer.php'; ?>













