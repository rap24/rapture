<?php
/**
 * Rapture Therapy Centre — Database Seed Script
 * Populates all tables from existing static content.
 * Run: php database/seed.php
 */
require_once __DIR__ . '/../includes/db.php';

$db = getDB();
echo "Database connected.\n";

// === ADMIN ===
$existingAdmin = $db->query("SELECT COUNT(*) FROM admins")->fetchColumn();
if ($existingAdmin == 0) {
    $db->prepare("INSERT INTO admins (username, password_hash) VALUES (?, ?)")
        ->execute(['admin', password_hash('rapture2026', PASSWORD_BCRYPT)]);
    echo "  Admin account created (admin / rapture2026)\n";
} else {
    echo "  Admin already exists, skipping.\n";
}

// === THERAPISTS ===
$db->exec("DELETE FROM therapists");
$therapists = [
    [
        'name' => 'Monika',
        'credential' => 'B.Sc SLP (Speech & Hearing), Mysore | Certified Oral Placement Therapist (Level 4, USA)',
        'bio' => 'With over 5 years of pediatric clinical experience, Monika founded Rapture Therapy Centre to bring interdisciplinary developmental care to Bangalore. She holds advanced certifications in Oral Placement Therapy (TalkTools) and specializes in Gestalt Language Processing, Autism communication protocols, and structural speech rehabilitation for both children and adults recovering from stroke.',
        'photo' => 'monika.jpg',
        'category' => 'speech',
        'specialties' => 'Oral Placement Therapy,Gestalt Language Processing,Autism Communication,Stuttering,Stroke Rehabilitation,Feeding Therapy',
        'rating' => 5.0,
        'is_available' => 1,
        'is_founder' => 1,
        'founder_label' => 'Founder & Senior Speech Language Pathologist',
        'sort_order' => 1
    ],
    [
        'name' => 'Likitha V.',
        'credential' => 'B.Sc Speech & Hearing (Bangalore)',
        'bio' => 'Likitha is a dedicated speech language pathologist with strong expertise in pediatric articulation disorders, language delays, and adult stroke rehabilitation. Praised by parents for her sincerity and skill, she creates engaging therapy sessions that drive measurable progress.',
        'photo' => 'likitha.jpg',
        'category' => 'speech',
        'specialties' => 'Articulation,Language Delays,Stroke Rehabilitation,Pediatric Speech',
        'rating' => 5.0,
        'is_available' => 1,
        'is_founder' => 0,
        'founder_label' => '',
        'sort_order' => 2
    ],
    [
        'name' => 'Tharani C.',
        'credential' => 'B.Sc Speech & Hearing (Tamil Nadu)',
        'bio' => 'Tharani brings clinical focus in fluency disorders, voice therapy, and early intervention programs. She is skilled at building rapport with young children and making therapy sessions playful and productive.',
        'photo' => 'tharani.jpg',
        'category' => 'speech',
        'specialties' => 'Fluency,Voice Therapy,Early Intervention,Pediatric Speech',
        'rating' => 5.0,
        'is_available' => 1,
        'is_founder' => 0,
        'founder_label' => '',
        'sort_order' => 3
    ],
    [
        'name' => 'Selva Priya J.',
        'credential' => 'B.OT (Occupational Therapy)',
        'bio' => 'Selva Priya is a certified occupational therapist specializing in sensory integration, fine motor development, and daily living skills training. She works with children facing coordination challenges, ADHD, and autism spectrum needs.',
        'photo' => 'selva.jpg',
        'category' => 'ot',
        'specialties' => 'Sensory Integration,Fine Motor,ADHD,Autism,Daily Living Skills',
        'rating' => 5.0,
        'is_available' => 0,
        'is_founder' => 0,
        'founder_label' => '',
        'sort_order' => 4
    ],
    [
        'name' => 'Kirubasri',
        'credential' => 'B.OT (Occupational Therapy)',
        'bio' => 'Kirubasri focuses on pediatric occupational therapy with emphasis on handwriting remediation, visual motor integration, and sensory processing challenges. She creates individualized treatment plans that are both fun and functional.',
        'photo' => 'kirubasri.jpg',
        'category' => 'ot',
        'specialties' => 'Handwriting,Visual Motor,Sensory Processing,Pediatric OT',
        'rating' => 5.0,
        'is_available' => 1,
        'is_founder' => 0,
        'founder_label' => '',
        'sort_order' => 5
    ],
];

$stmt = $db->prepare('INSERT INTO therapists (name, credential, bio, photo, category, specialties, rating, is_available, is_founder, founder_label, sort_order) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
foreach ($therapists as $t) {
    $stmt->execute(array_values($t));
}
echo "  " . count($therapists) . " therapists seeded.\n";

// === SERVICES ===
$db->exec("DELETE FROM services");
$services = [
    [
        'title' => 'Speech & Language Therapy',
        'slug' => 'speech',
        'badge_text' => 'SLP Specialties',
        'description' => 'Our speech therapy department addresses the full spectrum of communication challenges across all ages — from toddlers with language delays to adults recovering from neurological events.',
        'sub_sections' => json_encode([
            ['title' => 'Articulation & Phonological Therapy', 'content' => 'Systematic correction of sound production errors using evidence-based approaches including minimal pairs, cycles approach, and motor-based interventions.'],
            ['title' => 'Oral Placement Therapy (TalkTools / OPT)', 'content' => 'A tactile-proprioceptive approach using specialized tools (horns, straws, bite blocks) to build jaw stability, lip closure, and tongue control for speech.'],
            ['title' => 'Gestalt Language Processing (GLP)', 'content' => 'Supporting children who acquire language in chunks (scripts/echolalia) through the Natural Language Acquisition framework.'],
            ['title' => 'Fluency & Stuttering Therapy', 'content' => 'Evidence-based stuttering modification and fluency shaping techniques for children and adults.'],
            ['title' => 'Voice Therapy', 'content' => 'Treatment for vocal nodules, breathiness, pitch disorders, and voice fatigue using resonant voice techniques.'],
        ]),
        'conditions_list' => json_encode(['Speech sound disorders', 'Expressive & receptive language delays', 'Autism spectrum communication', 'Stuttering & cluttering', 'Voice disorders', 'Dysphagia (swallowing)', 'Apraxia of speech', 'Aphasia (post-stroke)', 'Hearing impairment support']),
        'red_flags' => json_encode(['No words by 18 months', 'Not combining words by 24 months', 'Speech unclear to strangers by age 3', 'Difficulty following simple instructions', 'Loss of previously acquired speech']),
        'card_title' => 'Speech & Language',
        'icon' => 'ri-speak-line',
        'category_color' => 'speech',
        'sort_order' => 1
    ],
    [
        'title' => 'Occupational Therapy & Sensory Integration',
        'slug' => 'occupational',
        'badge_text' => 'OT Specialties',
        'description' => 'Our occupational therapy team helps children develop the foundational skills needed for daily life, play, and school participation through sensory integration and motor development.',
        'sub_sections' => json_encode([
            ['title' => 'Sensory Integration Therapy', 'content' => 'Using swings, climbing equipment, tactile bins, and weighted activities to help children process sensory information more effectively.'],
            ['title' => 'Fine Motor Development', 'content' => 'Building hand strength, dexterity, and coordination for writing, buttoning, cutting, and self-care tasks.'],
            ['title' => 'Visual Motor Integration', 'content' => 'Improving the coordination between visual perception and motor output — essential for handwriting and classroom tasks.'],
        ]),
        'conditions_list' => json_encode(['Sensory processing disorder', 'ADHD & attention challenges', 'Fine motor delays', 'Handwriting difficulties', 'Self-care skill delays', 'Coordination disorders (DCD)', 'Autism-related sensory needs']),
        'red_flags' => json_encode(['Extreme reactions to textures, sounds, or movement', 'Difficulty with buttons, zippers, or utensils', 'Avoids playground equipment', 'Unusually clumsy or uncoordinated', 'Cannot sit still for age-appropriate periods']),
        'card_title' => 'Occupational Therapy',
        'icon' => 'ri-shake-hands-line',
        'category_color' => 'occupational',
        'sort_order' => 2
    ],
    [
        'title' => 'Special Education & Learning Support',
        'slug' => 'education',
        'badge_text' => 'Education Specialties',
        'description' => 'Our special education program provides individualized academic support and cognitive skill development for children with learning disabilities and developmental delays.',
        'sub_sections' => json_encode([
            ['title' => 'Academic Remediation', 'content' => 'Targeted instruction in reading, writing, and mathematics using multisensory teaching methods.'],
            ['title' => 'Cognitive Skill Building', 'content' => 'Developing attention, memory, problem-solving, and executive function skills through structured activities.'],
            ['title' => 'Behavioral Support', 'content' => 'Positive behavior intervention strategies and social skill development for school and home settings.'],
        ]),
        'conditions_list' => json_encode(['Dyslexia & reading difficulties', 'Dyscalculia', 'ADHD-related learning challenges', 'Intellectual disability', 'Autism spectrum learning needs', 'School readiness gaps']),
        'red_flags' => json_encode(['Struggling to recognize letters by age 5', 'Significant gap between ability and school performance', 'Difficulty following classroom routines', 'Avoiding reading or writing tasks', 'Behavioral challenges at school']),
        'card_title' => 'Special Education',
        'icon' => 'ri-book-open-line',
        'category_color' => 'education',
        'sort_order' => 3
    ],
    [
        'title' => 'Pediatric Physiotherapy',
        'slug' => 'physiotherapy',
        'badge_text' => 'Physio Specialties',
        'description' => 'Our physiotherapy services focus on gross motor development, posture correction, and physical rehabilitation for children with neurological and musculoskeletal conditions.',
        'sub_sections' => json_encode([
            ['title' => 'Gross Motor Development', 'content' => 'Activities targeting crawling, walking, running, jumping, and balance milestones.'],
            ['title' => 'Neurological Rehabilitation', 'content' => 'Specialized therapy for cerebral palsy, muscular dystrophy, and other neurological conditions.'],
        ]),
        'conditions_list' => json_encode(['Cerebral palsy', 'Delayed motor milestones', 'Muscular dystrophy', 'Torticollis', 'Post-surgical rehabilitation', 'Balance and coordination issues']),
        'red_flags' => json_encode(['Not sitting independently by 9 months', 'Not walking by 18 months', 'Persistent toe-walking after age 2', 'Difficulty with stairs by age 3', 'One-sided weakness or movement patterns']),
        'card_title' => 'Physiotherapy',
        'icon' => 'ri-run-line',
        'category_color' => 'physio',
        'sort_order' => 4
    ],
];

$stmt = $db->prepare('INSERT INTO services (title, slug, badge_text, description, sub_sections, conditions_list, red_flags, card_title, icon, category_color, sort_order) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
foreach ($services as $s) {
    $stmt->execute(array_values($s));
}
echo "  " . count($services) . " services seeded.\n";

// === ARTICLES ===
$db->exec("DELETE FROM articles");
$articles = [
    ['Gestalt Language Processing in Everyday Play', 'gestalt-language-processing', 'Learn how Gestalt Language Processors learn language in chunks and how to support GLP in everyday play.', 'gestalt_language.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '10 MIN READ', '2026-04-28'],
    ['Understanding Your Child\'s Communication', 'understanding-child-communication', 'What\'s typical in child communication development and when should parents pause and seek professional guidance.', 'understanding_child_communication.png', 'wellness', 'SOCIAL WELLNESS', 'Clinical Team', '11 MIN READ', '2026-01-10'],
    ['How a Child\'s Environment Shapes Communication Growth', 'environment-shapes-communication-growth', 'Discover how daily environments and routines influence your child\'s communication development journey.', 'environment_shapes_communication.png', 'lifestyle', 'LIFESTYLE', 'Clinical Team', '9 MIN READ', '2026-01-15'],
    ['How Online Speech Therapy Helps Your Child Thrive', 'online-speech-therapy-helps-child-thrive', 'Explore how virtual speech therapy sessions can be just as effective as in-person therapy.', 'online_speech_therapy_child.png', 'child-dev', 'CHILD DEV', 'Clinical Team', '14 MIN READ', '2026-01-05'],
    ['Small Everyday Habits That Help Children Communicate Better', 'small-everyday-habits-children-communicate', 'Simple daily strategies parents can use to boost their child\'s communication skills naturally.', 'child_communication_habits.png', 'parenting', 'PARENTING TIPS', 'Clinical Team', '12 MIN READ', '2026-01-02'],
    ['Signs Your Child Might Need Speech Therapy', 'signs-child-needs-speech-therapy', 'Key indicators that your child may benefit from a professional speech language evaluation.', 'signs_child_speech_therapy.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '8 MIN READ', '2025-12-28'],
    ['Why Sensory Integration Matters', 'why-sensory-integration-matters', 'Understanding sensory processing and how sensory integration therapy helps children.', 'sensory_integration.png', 'ot', 'OCCUPATIONAL THERAPY', 'Clinical Team', '10 MIN READ', '2025-12-20'],
    ['The Power of Play-Based Therapy', 'power-of-play-based-therapy', 'How play-based approaches enhance therapy outcomes for children across all disciplines.', 'play_based_therapy.png', 'child-dev', 'CHILD DEV', 'Clinical Team', '9 MIN READ', '2025-12-15'],
    ['Oral Placement Therapy: A Comprehensive Guide', 'oral-placement-therapy-guide', 'Everything parents need to know about OPT/TalkTools and how it helps speech production.', 'opt_guide.png', 'opt', 'OPT & TALKTOOLS', 'Clinical Team', '13 MIN READ', '2025-12-10'],
    ['Helping Your Child with Stuttering', 'helping-child-with-stuttering', 'Practical strategies for parents to support a child who stutters in everyday communication.', 'stuttering_help.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '11 MIN READ', '2025-12-05'],
    ['Understanding Autism Communication', 'understanding-autism-communication', 'How communication differs for autistic children and how therapy supports their unique needs.', 'autism_communication.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '12 MIN READ', '2025-11-28'],
    ['Fine Motor Skills: A Parent\'s Guide', 'fine-motor-skills-parents-guide', 'Activities and tips to develop your child\'s fine motor skills at home.', 'fine_motor_skills.png', 'ot', 'OCCUPATIONAL THERAPY', 'Clinical Team', '10 MIN READ', '2025-11-20'],
    ['When Should My Child Start Talking?', 'when-should-child-start-talking', 'Age-by-age speech milestones and when to consult a speech language pathologist.', 'child_start_talking.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '8 MIN READ', '2025-11-15'],
    ['Sensory Diet: What Is It and Does Your Child Need One?', 'sensory-diet-explained', 'A guide to sensory diets and how they support children with sensory processing challenges.', 'sensory_diet.png', 'ot', 'OCCUPATIONAL THERAPY', 'Clinical Team', '11 MIN READ', '2025-11-10'],
    ['Building Communication Through Mealtime', 'building-communication-through-mealtime', 'How family mealtimes can become powerful communication-building opportunities.', 'mealtime_communication.png', 'parenting', 'PARENTING TIPS', 'Clinical Team', '9 MIN READ', '2025-11-05'],
    ['Understanding Dysphagia in Children', 'understanding-dysphagia-children', 'What feeding and swallowing difficulties look like and how therapy can help.', 'dysphagia_children.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '12 MIN READ', '2025-10-28'],
    ['The Role of Parents in Speech Therapy', 'role-of-parents-speech-therapy', 'Why parental involvement is critical for speech therapy success.', 'parents_speech_therapy.png', 'parenting', 'PARENTING TIPS', 'Clinical Team', '10 MIN READ', '2025-10-20'],
    ['Handwriting Difficulties: When to Seek Help', 'handwriting-difficulties-when-seek-help', 'Understanding why some children struggle with handwriting and how OT can help.', 'handwriting_difficulties.png', 'ot', 'OCCUPATIONAL THERAPY', 'Clinical Team', '9 MIN READ', '2025-10-15'],
    ['Speech Therapy for Adults After Stroke', 'speech-therapy-adults-after-stroke', 'How speech language therapy supports communication recovery after stroke.', 'speech_adults_stroke.png', 'speech', 'SPEECH & LANGUAGE', 'Clinical Team', '13 MIN READ', '2025-10-10'],
    ['Creating a Language-Rich Home Environment', 'creating-language-rich-home', 'Practical tips for making your home an environment that supports language development.', 'language_rich_home.png', 'parenting', 'PARENTING TIPS', 'Clinical Team', '10 MIN READ', '2025-10-05'],
    ['What to Expect at Your First Therapy Session', 'what-to-expect-first-therapy-session', 'A guide for parents on preparing for and understanding the first therapy session.', 'first_therapy_session.png', 'child-dev', 'CHILD DEV', 'Clinical Team', '8 MIN READ', '2025-09-28'],
];

$stmt = $db->prepare('INSERT INTO articles (title, slug, excerpt, featured_image, category, category_label, author, read_time, is_published, published_date, content) VALUES (?,?,?,?,?,?,?,?,1,?,?)');

// For the first article (GLP), load the full HTML content from the actual file
$glpContent = '';
$glpFile = __DIR__ . '/../articles/gestalt-language-processing.html';
if (file_exists($glpFile)) {
    $html = file_get_contents($glpFile);
    // Extract content between article-main-content tags
    if (preg_match('/<article class="article-main-content">(.*?)<\/article>/s', $html, $matches)) {
        $glpContent = trim($matches[1]);
    }
}

foreach ($articles as $i => $a) {
    $content = ($i === 0 && $glpContent) ? $glpContent : '<p>' . htmlspecialchars($a[2]) . '</p><p>Full article content will be migrated from the original HTML files. This is a placeholder for the Learning Centre article.</p>';
    $stmt->execute([$a[0], $a[1], $a[2], $a[3], $a[4], $a[5], $a[6], $a[7], $a[8], $content]);
}
echo "  " . count($articles) . " articles seeded.\n";

echo "\nSeed complete! Database is ready.\n";
echo "Admin login: admin / rapture2026\n";
echo "Start server: php\\php.exe -S localhost:8000\n";
