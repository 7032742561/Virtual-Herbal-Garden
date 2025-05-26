<?php
session_start();  // Start session to check login status


include 'db_connect.php';

// Initialize results array
$searchResults = [];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $ayush_System = $_POST['ayush_System'] ?? '';
    $plant_Part = $_POST['plant_Part'] ?? '';
    $region = $_POST['region'] ?? '';
    $medicinal_Use = $_POST['medicinal_Use'] ?? '';

    // Build the SQL query with filters
    $query = "SELECT * FROM plants_info WHERE 1=1";
    if ($ayush_System) {
        $query .= " AND ayush_System = '" . mysqli_real_escape_string($conn, $ayush_System) . "'";
    }
    if ($plant_Part) {
        $query .= " AND plant_Part = '" . mysqli_real_escape_string($conn, $plant_Part) . "'";
    }
    if ($region) {
        $query .= " AND region = '" . mysqli_real_escape_string($conn, $region) . "'";
    }
    if ($medicinal_Use) {
        $query .= " AND medicinal_Use LIKE '%" . mysqli_real_escape_string($conn, $medicinal_Use) . "%'";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    mysqli_free_result($result);
}

// Close the database connection
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Herbal Garden</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo.webp" alt="Herbal Garden Logo" class="logo-image">
            <h2>VHG</h2>
        </div>
        <div class="navbar">
            <ul class="nav-links">
                <li><a href="#" onclick="scrollToSection('hero-section')">HOME</a></li>
                <li><a href="#" onclick="scrollToSection('ayush')">AYUSH</a></li>
                <li><a href="plants.php" onclick="loadPlantsPage()">PLANTS</a></li>
                <li><a href="diseases.php" onclick="loadDiseasesPage()">DISEASES</a></li>
            </ul>
            
			
			<?php if (isset($_SESSION['email'])): ?>
            <a href="logout.php" class="nav-btn logout-btn">SIGN OUT</a>
        <?php else: ?>
            <a href="loginpage1.php" class="nav-btn login-btn">SIGN IN</a>
        <?php endif; ?>
		
		</div>
		
    </header>
	
    <!-- Hero Section -->
    <section id="hero-section" class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Explore Nature's Healing Wisdom With Our Virtual Herbal Garden</h1>
            <p class="hero-subtitle">Discover the diverse world of medicinal plants used in AYUSH with our immersive Virtual Herbal Garden. Learn, interact, and experience the ancient traditions of herbal medicine through 3D models, detailed information, and intuitive features.</p>
        </div>
    </section>

    
	

    <!-- Traditional Healing Systems Section -->
	<section id="ayush" class="systems">
    <h2 class="section-title">Traditional Healing Systems</h2>
    <section class="systems">
	
	    <!---ayurveda--->
        <div class="system-card">
           
            <div class="card-content">
                <h2 onclick="toggleDetails('ayurveda-details')">Ayurveda</h2>
                <p>Ayurveda is a traditional system of medicine that originated in India thousands of years ago. It is based on the belief that the mind and body are interconnected.</p>
                <div id="ayurveda-details" class="details">
                    <p>Ayurveda uses a holistic approach to treat various physical and mental conditions by balancing the body's doshas (energies) – Vata, Pitta, and Kapha. It emphasizes natural treatments like herbal remedies, dietary adjustments, yoga, and meditation to promote well-being.</p>
                    <ul>
                        <li>Focuses on balancing the body's energies: Vata, Pitta, and Kapha.</li>
                        <li>Uses natural treatments like herbal remedies and dietary adjustments.</li>
                        <li>Emphasizes yoga and meditation for mental and physical well-being.</li>
                        <li>Addresses both prevention and cure of ailments.</li>
                        <li>Believes in a holistic approach to health, integrating lifestyle changes.</li>
                    </ul>
				</div>   
			</div>
			 <div class="card-image">
                <img src="Ayurveda1.jpg" alt="Ayurveda">
            </div>
        </div>

        <!---yoga--->
        <div class="system-card">
            <div class="card-image">
                <img src="yoga.jpg" alt="Yoga">
            </div>
            <div class="card-content">
                <h2 onclick="toggleDetails('yoga-details')">Yoga</h2>
                <p>Yoga is a physical, mental, and spiritual practice that aims to promote balance and harmony in the body and mind. It includes postures, breathing exercises, and meditation.</p>
                <div id="yoga-details" class="details">
                    <p>Originating in ancient India, yoga combines various postures (asanas), breathing exercises (pranayama), and meditation techniques. It is widely used today for stress reduction, mental clarity, and improving physical health and flexibility.</p>
                    <ul>
                        <li>Combines physical postures (asanas) with breathing exercises (pranayama).</li>
                        <li>Enhances flexibility, strength, and mental clarity.</li>
                        <li>Promotes stress reduction and relaxation.</li>
                        <li>Includes meditation as a core component for inner peace.</li>
                        <li>Widely practiced worldwide for its health benefits.</li>
                    </ul>
				</div>
			</div>
        </div>

        <!---naturopathy--->
        <div class="system-card">
            
            <div class="card-content">
                <h2 onclick="toggleDetails('naturopathy-details')">Naturopathy</h2>
                <p>Naturopathy is a cost effective drugless, non-invasive therapy involving the use of natural materials for health care and healthy living.</p>
                <div id="naturopathy-details" class="details">
                    <p>Naturopathy integrates nutrition, exercise, and stress management as key components. It uses therapies like hydrotherapy, herbal medicine, and lifestyle counseling to encourage the body's self-healing abilities.</p>
                    <ul>
                        <li>Focuses on nutrition, exercise, and stress management.</li>
                        <li>Uses therapies like hydrotherapy and herbal medicine.</li>
                        <li>Encourages self-healing through lifestyle changes.</li>
                        <li>Based on the belief that the body has an inherent healing capacity.</li>
                        <li>Often used for chronic conditions and preventive care.</li>
                    </ul>
				</div>
			</div>
			<div class="card-image">
                <img src="naturopathy.jpg" alt="Naturopathy">
            </div>
        </div>

        <!---unani--->
        <div class="system-card">
            <div class="card-image">
                <img src="unani.jpg" alt="Unani">
            </div>
            <div class="card-content">
                <h2 onclick="toggleDetails('unani-details')">Unani</h2>
                <p>Unani medicine offers a holistic approach to health and well-being and takes into account the physical, mental, and emotional aspects of health.</p>
                <div id="unani-details" class="details">
                    <p>Unani uses a combination of herbal medicines, dietary adjustments, and physical therapies to treat ailments. It is based on the concept of balancing bodily humors and focuses on preventive as well as curative care.</p>
                    <ul>
                        <li>Uses herbal medicines and dietary adjustments.</li>
                        <li>Focuses on balancing bodily humors.</li>
                        <li>Includes physical therapies for treatment.</li>
                        <li>Believes in preventive and curative care.</li>
                        <li>Common in South Asia and the Middle East.</li>
                    </ul>
				</div>
			</div>
        </div>

        <!---siddha--->
        <div class="system-card">
           
            <div class="card-content">
                <h2 onclick="toggleDetails('siddha-details')">Siddha</h2>
                <p>Siddha medicine focuses on maintaining a balance between the five elements of the body: earth, water, fire, air, and ether.</p>
                <div id="siddha-details" class="details">
                    <p>Siddha uses natural substances and practices like alchemy, yoga, and herbal remedies to prevent and treat illnesses. It emphasizes the concept of spiritual balance as a way to achieve physical health.</p>
                    <ul>
                        <li>Uses natural substances like herbs and minerals.</li>
                        <li>Incorporates alchemy and yoga in treatments.</li>
                        <li>Emphasizes spiritual balance for health.</li>
                        <li>Focuses on both prevention and treatment.</li>
                        <li>Widely practiced in southern India.</li>
                    </ul>
				</div>
			</div>
			 <div class="card-image">
                <img src="siddha.jpg" alt="Siddha">
            </div>
        </div>

        <!---homeopathy--->
        <div class="system-card">
            <div class="card-image">
                <img src="homeopathy.webp" alt="Homeopathy">
            </div>
            <div class="card-content">
                <h2 onclick="toggleDetails('homeopathy-details')">Homeopathy</h2>
                <p>Homeopathy is based on the principle that "like cures like" – a substance that causes symptoms in a healthy person can cure the same symptoms in a sick person.</p>
                <div id="homeopathy-details" class="details">
                    <p>Developed in the 18th century, homeopathy uses highly diluted substances to stimulate the body's healing responses. It is often used to treat chronic illnesses and focuses on individual treatment plans.</p>
                    <ul>
                        <li>Uses highly diluted substances to stimulate healing.</li>
                        <li>Treatments are individualized for each patient.</li>
                        <li>Commonly used for chronic and minor illnesses.</li>
                        <li>Developed in the 18th century in Germany.</li>
                        <li>Popular in Europe, India, and Latin America.</li>
                    </ul>
				</div>
			</div>
        </div>
    </section>
</Section>
		
		
	<!-- Support Section -->
    <!-- Interactive Plant Models Section -->
    <section class="support-section">
    <div class="support-card">
        <h3>Interactive 3D Plant Models : 
            <select id="plant-models" onchange="showPlantModel()">
                <option value="select">--Select a Plant--</option>
                <option value="rosemary">Rosemary</option>
                <option value="neem">Neem</option>
                <option value="ginseng">Ginseng</option>
                <option value="stylized-tree">Stylized Tree</option>
                <option value="hibiscus">Hibiscus</option>
                <option value="date-palm">Date Palm</option>
                <option value="aloe-vera">Aloe Vera</option>
                <option value="ginger">Ginger</option>
            </select>
        </h3>
        
        <!-- Container for displaying the selected plant 3D model -->
        <div id="plant-model-display" class="model-display">
            <!-- Preloaded model frames hidden by default -->
			
			<div id="no-selection-message">Please select a plant to view its 3D model.</div>
			
            <div id="model-rosemary" class="model-frame" style="display: none;">
                <iframe title="Rosemary 3D Model" src="https://sketchfab.com/models/04165be20ed94ae1b28c5793fe5180de/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-neem" class="model-frame" style="display: none;">
                <iframe title="Neem Tree 3D Model" src="https://sketchfab.com/models/03edef8009d942d3a3db6fa64cecbe56/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-ginseng" class="model-frame" style="display: none;">
                <iframe title="Ficus Ginseng 3D Model" src="https://sketchfab.com/models/88b1bf03a6254dc2b56cec4dce3f22f1/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-stylized-tree" class="model-frame" style="display: none;">
                <iframe title="Stylized Tree 3D Model" src="https://sketchfab.com/models/6d1aeea748f147789004bc03e1930d32/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-hibiscus" class="model-frame" style="display: none;">
                <iframe title="Chinese Hibiscus 3D Model" src="https://sketchfab.com/models/4517d6f8a28e492494e03cf1bee12ecf/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-date-palm" class="model-frame" style="display: none;">
                <iframe title="Date Palm 3D Model" src="https://sketchfab.com/models/401f40e31e12428bb56866d3af6c85c5/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-aloe-vera" class="model-frame" style="display: none;">
                <iframe title="Aloe Vera 3D Model" src="https://sketchfab.com/models/ad2a3704a5294dfcb93b224fc0c5a530/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
            <div id="model-ginger" class="model-frame" style="display: none;">
                <iframe title="Ginger 3D Model" src="https://sketchfab.com/models/302be40cdf08485aac1111f39e70dbd0/embed" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking"></iframe>
            </div>
        </div>
    </div>
</section>

		<!--- Better info 
        <div class="card">
            <img src="information-icon.png" alt="Better Information">
            <h2>Better Information</h2>
            <p>Integrated Audio and Video Content</p>
        </div>  --->
    
		
	
	<!-- Virtual Tours Section -->
    <section id="virtual-tour">
    <div class="virtual-tours-section">
        <h2>Virtual Tours</h2>
        <!-- Button to toggle video -->
        <button class="virtual-tour-button" onclick="toggleVideo()">Virtual Garden <span>&#x25BC;</span></button>
        
         <!-- Video container, initially hidden -->
        <div id="video-container" style="display: none; margin-top: 20px;">
            <video width="100%" controls>
                <source src="videos/vhg_virtual_tour.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    </section>

    <!--- Advance Search --->
	<section id="advanced-search">
    <div class="advanced-search-section">
        <h2>Advanced Search</h2>
        <form action="" method="POST">
        <div class="search-bar">
            <select name="ayush_System">
			    <option>Select AYUSH System</option>
                <option value="Ayurveda">Ayurveda</option>
                <option value="Unani">Unani</option>
                <option value="Siddha">Siddha</option>
                <option value="Homeopathy">Homeopathy</option>
                <!-- Add more options as needed -->
            </select>
            <select name="plant_Part">
			    <option>Select plants part</option>
                <option value="Root">Root</option>
                <option value="Leaf">Leaf</option>
                <option value="Flower">Flower</option>
                <option value="Bark">Bark</option>
                <!-- Add more options as needed -->
            </select>
            <select name="region">
                <option>Select Region</option>
                <option value="Tropical">Tropical</option>
                <option value="Temperate">Temperate</option>
                <option value="Desert">Desert</option>
                <option value="Mountainous">Mountainous</option>
                <!-- Add more options as needed -->
            </select>
            <input type="text" name="medicinal_Use" placeholder="Medicinal Use">
            <button type="submit" class="search-button">Search</button>
        </div>
		</form>
		
	
	 <!-- Results Section -->
    <div id="search-results">
        <?php if (!empty($searchResults)): ?>
            <?php foreach ($searchResults as $row): ?>
                <div class="plant-result">
                    <h3><?= htmlspecialchars($row['name']); ?></h3>
                    <img src="<?= htmlspecialchars($row['image_url']); ?>" alt="<?= htmlspecialchars($row['name']); ?>">
                    <p><?= htmlspecialchars($row['description']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
	
	</div>
	</section>
	
	
	

    <footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>AYUSH Virtual Herbal Garden</h3>
            <p>Explore the healing power of traditional medicine.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#hero-section">Home</a></li>
                <li><a href="#virtual-tour">Virtual Tour</a></li>
                <li><a href="#advanced-search">Advanced Search</a></li>
                <!--<li><a href="#about-team">About Our Team</a></li>  --->
				
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p>Email: vhg2024@gmail.com</p>
            <p>Phone: 20242024</p>
        </div>
    </div>
</footer>


</body>
</html>