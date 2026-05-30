import os
import glob
import re

root_dir = r"f:\Rapture"
files_to_update = glob.glob(os.path.join(root_dir, "*.html")) + glob.glob(os.path.join(root_dir, "articles", "*.html"))

# Regex to match the Home nav item
# It handles both root 'index.html' and nested '../index.html'
# It captures the href value, any extra classes (like ' active'), and the closing tag
pattern = re.compile(
    r'<li class="nav-item">\s*<a href="([^"]*?index\.html)" class="nav-link(.*?)">Home</a>\s*</li>',
    re.DOTALL
)

def get_replacement(match):
    href = match.group(1)
    extra_classes = match.group(2)
    
    # Generate the submenu based on the href (whether it's index.html or ../index.html)
    base_href = href
    
    return f'''<li class="nav-item">
                        <a href="{base_href}" class="nav-link{extra_classes}">Home <i class="ri-arrow-down-s-line"></i></a>
                        <div class="nav-submenu">
                            <a href="{base_href}#specialties" class="nav-submenu-link">Specialties</a>
                            <a href="{base_href}#ecosystem" class="nav-submenu-link">Our Ecosystem</a>
                            <a href="{base_href}#protocols" class="nav-submenu-link">Protocols</a>
                            <a href="{base_href}#milestones" class="nav-submenu-link">Milestone Wizard</a>
                            <a href="{base_href}#intake" class="nav-submenu-link">Intake Timeline</a>
                            <a href="{base_href}#google-reviews" class="nav-submenu-link">Reviews</a>
                            <a href="{base_href}#faqs" class="nav-submenu-link">FAQs</a>
                        </div>
                    </li>'''

count = 0
for file_path in files_to_update:
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
        
    new_content, num_subs = pattern.subn(get_replacement, content)
    
    if num_subs > 0:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        count += 1
        print(f"Updated: {file_path}")

print(f"Total files updated: {count}")
