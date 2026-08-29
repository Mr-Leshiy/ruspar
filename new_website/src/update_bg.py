import os
import re

files = ["gallery.php", "menu.php", "prices.php", "contacts.php"]
base_dir = "/Users/andrejpozilenkov/Desktop/ruspar/new_website/src"

body_css_replacement = """        body {
            color: #2c2c2c;
            position: relative;
        }

        /* Задній фон з розмиттям */
        body::before {
            content: "";
            position: fixed;
            top: -10%; left: -10%; right: -10%; bottom: -10%;
            z-index: -10;
            background-image: var(--bg-photo, none);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(2px);
        }"""

for f in files:
    filepath = os.path.join(base_dir, f)
    with open(filepath, "r") as file:
        content = file.read()
    
    # Replace body CSS
    content = re.sub(r'        body\s*\{\s*background-color:\s*#F9B162;\s*color:\s*#2c2c2c;\s*\}', body_css_replacement, content)
    
    # Replace body tag
    content = content.replace('<body class="antialiased">', '<body class="antialiased" style="--bg-photo: url(\'images/new_gallery/optimized/17.jpg\');">')
    
    with open(filepath, "w") as file:
        file.write(content)
        
print("Updated files successfully")
