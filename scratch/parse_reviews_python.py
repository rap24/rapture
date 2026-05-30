import re
import json

with open("f:\\Rapture\\scratch\\final_maps_page.html", "r", encoding="utf-8") as f:
    html = f.read()

print("HTML length:", len(html))

# Let's search for some patterns
print("Search for 'Rapture':", html.count("Rapture"))
print("Search for 'Therapy':", html.count("Therapy"))

# Let's find any text that looks like reviews
# Typically Google maps HTML lists reviews in a JSON-like structure inside a <script> block,
# or in raw HTML strings.
matches = re.findall(r'"([A-Za-z0-9\s.,!\-\'\":?]{15,200})"', html)
potential_reviews = []
for m in matches:
    if any(word in m.lower() for word in ["recommend", "therapist", "clinic", "son", "daughter", "child", "speech", "occupational", "veena", "good", "great", "excellent", "best", "experience"]):
        potential_reviews.append(m)

print(f"Found {len(potential_reviews)} potential review snippets:")
for i, r in enumerate(potential_reviews[:30]):
    print(f"[{i}] {r}")
