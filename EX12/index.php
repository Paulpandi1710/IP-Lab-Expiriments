<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Library Catalog</title>
    <style>
        :root { --accent: #6b48ff; --bg: #f8f9fc; --text: #2d3748; }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        body { background: var(--bg); color: var(--text); padding: 40px 20px; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { font-size: 2.5rem; color: #1a202c; font-weight: 800; }
        .header p { color: #718096; margin-top: 10px; font-size: 1.1rem; }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .book-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05), 0 10px 15px -3px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }
        
        .book-cover { height: 200px; background: #e2e8f0; width: 100%; overflow: hidden; position: relative; }
        .book-cover img { width: 100%; height: 100%; object-fit: cover; }
        .book-cover::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.5), transparent); }
        
        .book-content { padding: 25px; }
        .book-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 5px; color: #1a202c; }
        .book-author { color: #718096; font-size: 0.95rem; margin-bottom: 15px; display: flex; align-items: center; gap: 5px; }
        
        .book-meta { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #edf2f7; }
        .book-year { background: #edf2f7; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; color: #4a5568; }
        .book-price { font-size: 1.25rem; font-weight: 800; color: var(--accent); }
    </style>
</head>
<body>

    <div class="header">
        <h1>Digital Library</h1>
        <p>Explore our curated collection of timeless classics</p>
    </div>

    <div class="grid">
        <?php
        if (file_exists("books.xml")) {
            $xml = simplexml_load_file("books.xml") or die("Error: Cannot load XML file.");
            
            foreach ($xml->book as $book) {
                // Using fallback image if cover is missing in older XML
                $cover = !empty($book->cover) ? $book->cover : 'https://images.unsplash.com/photo-1495640388908-05fa85288e61?q=80&w=200&auto=format&fit=crop';
                
                echo '<div class="book-card">';
                echo '  <div class="book-cover"><img src="'.htmlspecialchars($cover).'" alt="Cover"></div>';
                echo '  <div class="book-content">';
                echo '      <h3 class="book-title">'.htmlspecialchars($book->title).'</h3>';
                echo '      <div class="book-author">✍️ '.htmlspecialchars($book->author).'</div>';
                echo '      <div class="book-meta">';
                echo '          <span class="book-year">'.htmlspecialchars($book->year).'</span>';
                echo '          <span class="book-price">$'.htmlspecialchars($book->price).'</span>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo "<p style='text-align:center; grid-column: 1/-1;'>No books.xml file found.</p>";
        }
        ?>
    </div>

</body>
</html>
