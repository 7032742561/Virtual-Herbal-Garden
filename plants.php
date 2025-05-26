<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbal Plants Information</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #27ae60;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }
        header h1 {
            margin: 0;
        }
		
		/* Search bar adjustments */
        .search-bar {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            margin-right: 10px;
        }
        .search-bar input {
            width: 60%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
		
        .plant-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .plant-card img {
            max-width: 300px;
            border-radius: 20px;
            margin-right: 20px;
        }
        .plant-info {
            max-width: 70%;
        }
        .plant-info h3 {
            margin: 0 0 10px 0;
            color: #2c3e50;
        }
        .plant-info p {
            margin: 5px 0;
            color: #34495e;
        }
        .plant-info ul {
            padding-left: 20px;
        }
        .plant-info ul li {
            list-style-type: square;
            color: #16a085;
        }
        .benefits-link {
            display: inline-block;
            margin-top: 10px;
            color: #e67e22;
            text-decoration: underline;
            cursor: pointer;
        }
        .benefits-link:hover {
            color: #d35400;
        }
        .plant-benefits {
            display: none; /* Hidden by default */
            margin-top: 10px;
            font-size: 0.95rem;
            color: #34495e;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
			line-height: 1.6; /* Adjusts the space between lines */
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #27ae60;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
		 /* Bookmark Button Styles */
        .bookmark-btn {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 8px 12px;  /* Increased padding */
            /*font-size: 1.2rem    Increased font size */
            cursor: pointer;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }
        .bookmark-btn:hover {
            background-color: #e67e22;
        }
        .bookmark-btn i {
            margin-right: 5px;
        }

        /* Bookmark list style */
        .bookmark-container {
            position: relative;
            display: inline-block; /* Ensures the list aligns with the button */
        }

        #bookmark-list {
            display: none;
            position: absolute;
            top: 120%; /* Positions the list directly below the button */
            left: 0; /* Aligns the list to the left of the button */
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 250px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000; /* Ensures the list appears above other elements */
        }
        .bookmark-item {
            margin-bottom: 10px;
            font-size: 0.9rem;
            background-color: #ecf0f1;  /* Light background for the note */
            padding: 10px;
            border-radius: 5px;
            color: #2c3e50;
        }
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }
        .delete-btn:hover {
            background-color: #c0392b;
        }
		.share-button {
    background: none;
    border: none;
    cursor: pointer;
    margin-left: 10px;
    color: #27ae60;
    font-size: 1.2em;
    vertical-align: middle;
}

.share-button:hover {
    color: #2ecc71;
}
		
    </style>
</head>
<body>

    <header>
		<h1>Herbal Plants Information</h1>
		
		<!-- Search Bar -->
        <section class="search-section">
            <input type="text" id="search-input" placeholder="Search for" onkeyup="searchPlants()">
        </section>
		
		<!-- Bookmark Button in Header -->
		<div class="bookmark-container">
        <button class="bookmark-btn" onclick="toggleBookmarks()">
            <i class="fas fa-bookmark"></i> Bookmarks
        </button>
        <div id="bookmark-list"></div> </div>

        <a href="index.php">Go Back to Home</a>
		
    </header>

    <div style="height: 120px;"></div>

    <section class="plants-section" id="plants-section">
        <div class="plant-card"  data-name="neem" data-type="Tree" data-medicinal-uses="skin care, boosts immunity, insect repellent" data-region="India, tropical and subtropical regions">
            <img src="neem.jpeg" alt="Neem Plant">
            <div class="plant-info">
                <h3>Neem (Azadirachta indica) <button class="share-button" onclick="sharePlant('Neem')">🔗</button>  </h3>
                <p><strong>Known For:</strong> Antibacterial, antifungal, and anti-inflammatory properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Treats skin conditions like acne and eczema.</li>
                    <li>Boosts immunity and treats ulcers.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits">
                    <p><strong>Additional Benefits of Neem:</strong></p>
                    <ul>
                        <li><strong>Treats Acne:</strong> Neem's anti-inflammatory properties help reduce acne and skin blemishes.</li>
                        <li><strong>Nourishes Skin:</strong> Rich in Vitamin E, neem helps repair damaged skin cells.</li>
                        <li><strong>Treats Fungal Infections:</strong> Neem's antifungal properties help treat fungal infections.</li>
                        <li><strong>Useful in Detoxification:</strong> Neem can aid in detoxifying both internally and externally. Consumption of neem leaves or powder stimulates kidneys and liver, increasing metabolism and eliminating toxins. Externally, neem scrubs or paste remove germs and bacteria, preventing rashes and skin diseases.</li>
                        <li><strong>Increases Immunity:</strong> Neem’s antimicrobial and antibacterial effects help boost immunity.</li>
                        <li><strong>Insect & Mosquito Repellent:</strong> Burning neem leaves can ward off insects, including mosquitoes. Neem is effective in treating early symptoms of malaria.</li>
                        <li><strong>Prevents Gastrointestinal Diseases:</strong> Neem's anti-inflammatory properties reduce inflammation in the gastrointestinal tract, helping alleviate conditions like constipation, stomach ulcers, and flatulence.</li>
                        <li><strong>Treats Wounds:</strong> Neem leaves have antiseptic properties, making them useful for wound healing.</li>
                        <li><strong>Reduces Dandruff:</strong> Neem’s antifungal and antibacterial properties, often used in shampoos and conditioners, help eliminate dandruff and strengthen hair.</li>
                        <li><strong>Reduces Joint Pain:</strong> Applying neem oil or extract to affected areas can reduce pain and discomfort, making it beneficial for treating arthritis.</li>
                        <li><strong>Exfoliates Skin:</strong> Neem is an excellent exfoliant, helping remove dead cells from the skin surface, which prevents blemishes.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Neem', 'Azadirachta indica', 'neem')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-neem" style="display:none;">
                    <textarea class="note-input" id="note-input-neem" placeholder="Add a note about Neem..."></textarea>
                    <button onclick="saveNote('neem')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="tulsi" data-type="Herb" data-medicinal-uses="Reduces stress, common cold, fever, improves respiratory health, boosts immunity" data-region="India, Southeast Asia">
            <img src="tulsi.png" alt="Tulsi Plant">
            <div class="plant-info">
                <h3>Tulsi (Ocimum sanctum) <button class="share-button" onclick="sharePlant('Tulsi')">🔗</button> </h3>
                <p><strong>Known For:</strong> Reduces stress and respiratory issues.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces cough, cold, and bronchitis.</li>
                    <li>Improves immunity and digestion.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits">
                    <p><strong>Additional Benefits of Tulsi:</strong></p>
                    <ul>
                        <li><strong>Promotes Healthy Heart:</strong> Contains vitamin C and antioxidants like eugenol, which protect the heart from free radicals and help reduce cholesterol levels.</li>
                        <li><strong>Anti-aging:</strong> Packed with vitamins C and A, as well as phytonutrients, which act as antioxidants to protect the skin from damage caused by free radicals.</li>
                        <li><strong>Treats Kidney Stones:</strong> Acts as a mild diuretic and detoxifying agent that lowers uric acid levels. Acetic acid in tulsi helps break down kidney stones.</li>
                        <li><strong>Relieves Headaches:</strong> A natural headache reliever that can also alleviate migraine pain.</li>
                        <li><strong>Fights Acne:</strong> Helps kill bacteria and infections, with eugenol as the primary active compound in tulsi oil to treat skin disorders.</li>
                        <li><strong>Relieves Fever:</strong> An age-old ingredient for treating fever, commonly used in Ayurvedic medicines and home remedies.</li>
                        <li><strong>Eye Health:</strong> Tulsi’s anti-inflammatory properties prevent viral, bacterial, and fungal infections in the eyes, reducing inflammation and stress.</li>
                        <li><strong>Oral Health:</strong> A natural mouth freshener and oral disinfectant that treats mouth ulcers and prevents cavities, plaque, tartar, and bad breath.</li>
                        <li><strong>Cures Respiratory Disorders:</strong> Contains camphene, eugenol, and cineole, which treat infections in the respiratory system and alleviate conditions like bronchitis and tuberculosis.</li>
                        <li><strong>Rich Source of Vitamin K:</strong> Provides essential vitamin K, which supports bone and heart health.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Tulsi', 'Ocimum sanctum', 'tulsi')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-tulsi" style="display:none;">
                    <textarea class="note-input" id="note-input-tulsi" placeholder="Add a note about Tulsi..."></textarea>
                    <button onclick="saveNote('tulsi')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="aloe-vera" data-type="Succulent" data-medicinal-uses="Soothes skin irritation, promotes healing, aids digestion" data-region="Arabian Peninsula, arid climates worldwide">
            <img src="aloe_vera.jpg" alt="Aloe Vera Plant">
            <div class="plant-info">
                <h3>Aloe Vera (Aloe barbadensis miller) <button class="share-button" onclick="sharePlant('Aloe Vera')">🔗</button> </h3>
                <p><strong>Known For:</strong> Healing and hydrating properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Soothes burns and skin irritations.</li>
                    <li>Improves digestion and skin health.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits">
                    <p><strong>Additional Benefits of Aloe Vera:</strong></p>
                    <ul>
                        <li><strong>Air Purification:</strong> Removes harmful chemicals like formaldehyde and benzene from the air.</li>
                        <li><strong>Oxygen Production:</strong> Releases oxygen at night, making it suitable for bedrooms.</li>
                        <li><strong>Easy Care:</strong> Can tolerate being underwatered for up to three weeks, making it low-maintenance.</li>
                        <li><strong>Healing Properties:</strong> The gel inside aloe vera leaves has antibacterial and antioxidant properties, useful for treating minor cuts, burns, sunburns, acne, cold sores, insect bites, and psoriasis.</li>
                        <li><strong>Positive Energy:</strong> According to Vastu, placing aloe vera in the east or north direction can bring good health, peace, and spiritual energy to the home.</li>
                        <li><strong>Good Luck:</strong> Known to attract good luck and fortune, making it a popular choice for households.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Aloe Vera', 'Aloe barbadensis miller', 'aloe-vera')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-aloe-vera" style="display:none;">
                    <textarea class="note-input" id="note-input-aloe-vera" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('aloe-vera')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="ashwagandha" data-type="Herb" data-medicinal-uses="Reduces stress, boosts energy, supports immune function" data-region="India, Mediterranean regions">
            <img src="ashwagandha.jpg" alt="Ashwagandha Plant">
            <div class="plant-info">
                <h3>Ashwagandha (Withania somnifera) <button class="share-button" onclick="sharePlant('Ashwagandha')">🔗</button> </h3>
                <p><strong>Known For:</strong> Reducing stress, improving energy, and balancing hormones.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces stress and anxiety levels.</li>
                    <li>Improves sleep and brain function.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Ashwagandha:</strong></p>
                    <ul>
                        <li><strong>Helps Fight Depression:</strong> May help reduce depression levels.</li>
                        <li><strong>Treats Erectile Dysfunction:</strong> Boosts libido and may aid in treating erectile dysfunction.</li>
                        <li><strong>Increases Muscle Mass:</strong> Improves muscle mass, body composition, and strength.</li>
                        <li><strong>Increases Fertility in Men:</strong> Increases sperm count, motility, and testosterone levels, boosting fertility.</li>
                        <li><strong>Controls Diabetes:</strong> Stimulates insulin secretion, helping lower blood sugar levels.</li>
                        <li><strong>Enhances Memory:</strong> May improve brain function, memory, and reaction times.</li>
                        <li><strong>Reduces Stress & Anxiety:</strong> Proven to reduce stress hormone cortisol, alleviating stress and anxiety.</li>
                        <li><strong>Boosts Immunity:</strong> Enhances white and red blood cells, improving immunity.</li>
                        <li><strong>Antibacterial Properties:</strong> Helps prevent bacterial infections.</li>
                        <li><strong>Lowers Cholesterol:</strong> Improves heart health by reducing cholesterol.</li>
                        <li><strong>Boosts Thyroid Function:</strong> May benefit people with low thyroid function by balancing thyroid hormones.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Ashwagandha', 'Withania somnifera', 'ashwagandha')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-ashwagandha" style="display:none;">
                    <textarea class="note-input" id="note-input-ashwagandha" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('ashwagandha')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="turmeric" data-type="Rhizome" data-medicinal-uses="Anti-inflammatory, antioxidant, boosts immunity" data-region="India, Southeast Asia">
            <img src="turmeric.jpg" alt="Turmeric Plant">
            <div class="plant-info">
                <h3>Turmeric (Curcuma longa) <button class="share-button" onclick="sharePlant('Turmeric')">🔗</button> </h3>
                <p><strong>Known For:</strong> Anti-inflammatory and antioxidant properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces inflammation in the body.</li>
                    <li>Supports joint health and digestion.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Turmeric:</strong></p>
                    <ul>
                        <li><strong>Anti-inflammatory:</strong> Helps with pain relief, arthritis, and joint pain.</li>
                        <li><strong>Digestive Health:</strong> Aids in digestion and may relieve symptoms of indigestion, bloating, and gas.</li>
                        <li><strong>Heart Health:</strong> May improve cardiovascular health by reducing LDL cholesterol levels and improving blood flow.</li>
                        <li><strong>Brain Health:</strong> May help delay or reverse age-related cognitive decline.</li>
                        <li><strong>Skin Health:</strong> Anti-inflammatory and antioxidant properties may reduce acne, eczema, and psoriasis flare-ups.</li>
                        <li><strong>Cancer Prevention:</strong> Antioxidant and anti-inflammatory properties may help protect against certain types of cancer.</li>
                        <li><strong>Viral Infections:</strong> Turmeric tea may help fight off viruses, including herpes and the flu.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Turmeric', 'Curcuma longa', 'turmeric')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-turmeric" style="display:none;">
                    <textarea class="note-input" id="note-input-turmeric" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('turmeric')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="peppermint" data-type="Herb" data-medicinal-uses="Aids digestion,fever reducer, relieves headaches, reduces nausea" data-region="Europe, Middle East">
            <img src="peppermint.jpg" alt="Peppermint Plant">
            <div class="plant-info">
                <h3>Peppermint (Mentha piperita) <button class="share-button" onclick="sharePlant('Peppermint')">🔗</button> </h3>
                <p><strong>Known For:</strong> Relieving digestive issues and headaches.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Soothes indigestion and bloating.</li>
                    <li>Relieves headaches and nausea.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Peppermint:</strong></p>
                    <ul>
                        <li><strong>Headaches:</strong> Helps relieve tension headaches. Peppermint oil can be applied topically for headache relief.</li>
                        <li><strong>Skin Irritation:</strong> Soothes skin irritation, muscle aches, joint pain, and itching.</li>
                        <li><strong>Common Cold:</strong> Provides relief from symptoms of the common cold. Peppermint tea is safer than peppermint oil for regular consumption.</li>
                        <li><strong>Hair Loss:</strong> Peppermint oil promotes hair growth and helps with hair loss by improving blood flow to the scalp.</li>
                        <li><strong>Anxiety:</strong> Can help reduce anxiety associated with depression.</li>
                        <li><strong>Antibacterial, Antifungal, and Antiviral Properties:</strong> Kills certain types of bacteria, fungi, and viruses.</li>
                        <li><strong>Antispasmodic Effects:</strong> Calms the gastrointestinal tract with its antispasmodic properties.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Peppermint', 'Mentha piperita', 'peppermint')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-peppermint" style="display:none;">
                    <textarea class="note-input" id="note-input-peppermint" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('peppermint')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="ginger" data-type="Rhizome" data-medicinal-uses="Aids digestion, reduces inflammation,fever reducer, relieves nausea" data-region="Southeast Asia, tropical regions">
            <img src="ginger.jpeg" alt="Ginger Plant">
            <div class="plant-info">
                <h3>Ginger (Zingiber officinale) <button class="share-button" onclick="sharePlant('Ginger')">🔗</button> </h3>
                <p><strong>Known For:</strong> Anti-nausea and anti-inflammatory properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Relieves nausea, especially during pregnancy.</li>
                    <li>Helps reduce muscle pain and inflammation.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Ginger:</strong></p>
                    <ul>
                        <li><strong>Digestion:</strong> Gingerol, a natural compound in ginger, aids in digestion, relieves nausea, and reduces bloating.</li>
                        <li><strong>Pregnancy:</strong> Alleviates morning sickness, nausea, and vomiting during pregnancy.</li>
                        <li><strong>Inflammation:</strong> Contains anti-inflammatory compounds that help reduce inflammation.</li>
                        <li><strong>Pain Relief:</strong> Helps relieve pain and reduce inflammation in knee osteoarthritis.</li>
                        <li><strong>Muscle Soreness:</strong> Reduces muscle soreness after exercise.</li>
                        <li><strong>Uterine Cramps:</strong> Helps relieve uterine cramps.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Ginger', 'Zingiber officinale', 'ginger')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-ginger" style="display:none;">
                    <textarea class="note-input" id="note-input-ginger" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('ginger')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="rosemary" data-type="Herb" data-medicinal-uses="Enhances memory, improves digestion, anti-inflammatory" data-region="Mediterranean regions">
            <img src="rosemary.jpeg" alt="Rosemary Plant">
            <div class="plant-info">
                <h3>Rosemary (Rosmarinus officinalis) <button class="share-button" onclick="sharePlant('Rosemary')">🔗</button> </h3>
                <p><strong>Known For:</strong> Improves memory and concentration.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Enhances cognitive function and memory.</li>
                    <li>Reduces inflammation and improves digestion.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Rosemary:</strong></p>
                    <ul>
                        <li><strong>Anti-inflammatory:</strong> Used as an anti-inflammatory and analgesic agent.</li>
                        <li><strong>Antioxidant:</strong> Acts as a natural food preservative due to antioxidant and antimicrobial properties.</li>
                        <li><strong>Gastrointestinal Health:</strong> Improves gastrointestinal health by reducing oxidative stress and inflammation.</li>
                        <li><strong>Blood Sugar:</strong> Compounds in rosemary tea may help lower blood sugar levels.</li>
                        <li><strong>Antidepressant:</strong> May have antidepressant-like properties.</li>
                        <li><strong>Hair Growth:</strong> May increase blood circulation when applied to the scalp, which can help hair follicles grow.</li>
                        <li><strong>Skin Protection:</strong> Rosemary extract may help protect skin from sun damage.</li>
                    </ul>
                    <p><strong>Safety Note:</strong> Rosemary is generally safe in amounts found in food. However, consuming large amounts can cause side effects such as vomiting, uterine bleeding, kidney irritation, increased sun sensitivity, skin redness, and allergic reactions.</p>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Rosemary', 'Rosmarinus officinalis', 'rosemary')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-rosemary" style="display:none;">
                    <textarea class="note-input" id="note-input-rosemary" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('rosemary')">Save Note</button>
                </div>
            </div>
        </div>
   
        <div class="plant-card" data-name="lavender" data-type="Flowering Plant" data-medicinal-uses="Relieves stress, improves sleep, treats skin issues" data-region="Mediterranean, Europe">
            <img src="lavender.png" alt="Lavender Plant">
            <div class="plant-info">
                <h3>Lavender (Lavandula angustifolia) <button class="share-button" onclick="sharePlant('Lavender')">🔗</button> </h3>
                <p><strong>Known For:</strong> Calming and sleep-inducing properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces anxiety and stress.</li>
                    <li>Promotes better sleep and skin healing.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
        <div class="plant-benefits" style="display: none;">
            <p><strong>Additional Benefits of Lavender:</strong></p>
            <ul>
                <li><strong>Aromatherapy:</strong> Lavender oil can be used in fragrance oil burners or inhaled to reduce headaches and migraines.</li>
                <li><strong>Skin Care:</strong> Lavender has antiseptic properties and can treat skin ailments like fungal infections, wounds, eczema, and acne. Lavender decoctions and hydrolates can be used as compresses to benefit the skin.</li>
                <li><strong>Pain Relief:</strong> Lavender can help alleviate joint and muscle pain, rheumatic pain, and postoperative pain.</li>
                <li><strong>Nervous System:</strong> Known for relieving insomnia, anxiety, stress, and depression. Some studies suggest lavender oil may be effective in treating neurological disorders.</li>
                <li><strong>Blood Pressure and Heart Rate:</strong> A 2017 study found that inhaling diluted lavender essential oil after open-heart surgery reduced blood pressure and heart rate.</li>
                <li><strong>Other Uses:</strong> Lavender can be used to treat parasitic infections, burns, and insect bites, and can also be brewed into teas.</li>
            </ul>
        </div>
		<div style="height: 5px;"></div>
		        <button class="bookmark-btn" onclick="bookmarkPlant('Lavender', 'Lavandula angustifolia', 'lavender')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-lavender" style="display:none;">
                    <textarea class="note-input" id="note-input-lavender" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('lavender')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="garlic" data-type="Bulb" data-medicinal-uses="Boosts immunity, reduces blood pressure, anti-bacterial" data-region="Central Asia, worldwide cultivation">
            <img src="garlic.png" alt="Garlic Plant">
            <div class="plant-info">
                <h3>Garlic (Allium sativum) <button class="share-button" onclick="sharePlant('Garlic')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antiviral, antibacterial, and immune-boosting properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves heart health and lowers blood pressure.</li>
                    <li>Boosts the immune system and fights infections.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
        <div class="plant-benefits" style="display: none;">
            <p><strong>Additional Benefits of Garlic:</strong></p>
            <ul>
                <li><strong>Respiratory Health:</strong> Garlic can help with chronic bronchitis, mucus, sore throat, sinus problems, and the flu. It can also thin mucus and relieve chesty coughs.</li>
                <li><strong>Immune System:</strong> Boosts immunity and helps prevent and cure bacterial and fungal infections.</li>
                <li><strong>Skin Conditions:</strong> Useful for treating acne, eczema, and scabies.</li>
                <li><strong>Joint Pain:</strong> Helps relieve joint pain.</li>
                <li><strong>Memory:</strong> May help prevent cognitive decline and slow the development of Alzheimer's disease.</li>
                <li><strong>Liver Health:</strong> Supports liver health and function.</li>
                <li><strong>Diabetes:</strong> May help reduce pre-meal blood sugar levels.</li>
                <li><strong>Endometriosis:</strong> May help improve pain in people with endometriosis.</li>
            </ul>
            <p><strong>Note:</strong> Garlic's active component, allicin, is responsible for its smell and medicinal effects. Aging garlic can make it odorless, but this may also change its effects.</p>
        </div>
		<div style="height: 5px;"></div>
		        <button class="bookmark-btn" onclick="bookmarkPlant('Garlic', 'Allium sativum', 'garlic')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-garlic" style="display:none;">
                    <textarea class="note-input" id="note-input-garlic" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('garlic')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="echinacea" data-type="Flowering Plant" data-medicinal-uses="Boosts immune system, reduces inflammation, treats infections" data-region="North America">
            <img src="echinacea.jpg" alt="Echinacea Plant">
            <div class="plant-info">
                <h3>Echinacea (Echinacea purpurea) <button class="share-button" onclick="sharePlant('Echinacea')">🔗</button> </h3>
                <p><strong>Known For:</strong> Boosting immune health.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Helps prevent and treat colds and flu.</li>
                    <li>Fights infections and supports the immune system.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
        <div class="plant-benefits" style="display: none;">
            <p><strong>Additional Benefits of Echinacea:</strong></p>
            <ul>
                <li><strong>Immune Boosting:</strong> Supports and strengthens the immune system, helping the body fight infections.</li>
                <li><strong>Cold and Flu Relief:</strong> Known for reducing the duration and severity of symptoms like sore throat, cough, and fever.</li>
                <li><strong>Anti-Inflammatory Effects:</strong> Echinacea may help reduce inflammation in the body, making it useful for a variety of ailments.</li>
                <li><strong>Antioxidant Properties:</strong> Contains antioxidants that help neutralize free radicals and protect cells.</li>
            </ul>
        </div>
		<div style="height: 5px;"></div>
		        <button class="bookmark-btn" onclick="bookmarkPlant('Echinacea', 'Echinacea purpurea', 'echinacea')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-echinacea" style="display:none;">
                    <textarea class="note-input" id="note-input-echinacea" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('echinacea')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="ginseng" data-type="Root" data-medicinal-uses="Boosts energy, improves cognitive function, reduces stress" data-region="Eastern Asia, North America">
            <img src="ginseng.jpeg" alt="Ginseng Plant">
            <div class="plant-info">
                <h3>Ginseng (Panax ginseng) <button class="share-button" onclick="sharePlant('Ginseng')">🔗</button> </h3>
                <p><strong>Known For:</strong> Enhancing energy, reducing stress, and boosting the immune system.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves energy levels and reduces fatigue.</li>
                    <li>Boosts brain function and immunity.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
        <div class="plant-benefits" style="display: none;">
            <p><strong>Additional Benefits of Ginseng:</strong></p>
            <ul>
                <li><strong>Antioxidant:</strong> Ginseng contains antioxidants that help the body remove free radicals, which can damage DNA and contribute to heart disease and diabetes.</li>
                <li><strong>Stress Relief:</strong> Acts as an adaptogen, helping the body manage stress and reduce its effects.</li>
                <li><strong>Immune System:</strong> Known for boosting the immune system, making it a common choice for immunity support.</li>
                <li><strong>Heart Health:</strong> Asian ginseng may improve heart disease symptoms, lower LDL (bad) cholesterol, and raise HDL (good) cholesterol.</li>
                <li><strong>Blood Sugar:</strong> Asian ginseng may aid in glucose metabolism and lowering blood sugar levels.</li>
                <li><strong>Cancer Support:</strong> Indian ginseng may provide a natural alternative to support cancer treatment, including chemotherapy and radiation therapy.</li>
                <li><strong>Neurodegenerative Diseases:</strong> A popular supplement for neurodegenerative diseases like Alzheimer's, Parkinson's, and Huntington's disease.</li>
            </ul>
            <p><strong>Note:</strong> Ginseng is available in various forms, including dried root, fresh root, extracts, tinctures, powders, and capsules. Side effects are generally mild but may include nervousness, insomnia, headaches, and stomach upset.</p>
        </div>
		<div style="height: 5px;"></div>
		<button class="bookmark-btn" onclick="bookmarkPlant('Ginseng', 'Panax ginseng', 'ginseng')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-ginseng" style="display:none;">
                    <textarea class="note-input" id="note-input-ginseng" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('ginseng')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="lemongrass" data-type="Grass" data-medicinal-uses="Aids digestion, reduces inflammation, antimicrobial" data-region="India, Southeast Asia">
            <img src="lemongrass.png" alt="Lemongrass Plant">
            <div class="plant-info">
                <h3>Lemongrass (Cymbopogon citratus) <button class="share-button" onclick="sharePlant('Lemongrass')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antioxidant and anti-inflammatory properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces anxiety and cholesterol levels.</li>
                    <li>Supports digestive health.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
        <div class="plant-benefits" style="display: none;">
            <p><strong>Additional Benefits of Lemongrass:</strong></p>
            <ul>
                <li><strong>Blood Pressure:</strong> Lemongrass tea may help reduce high systolic blood pressure.</li>
                <li><strong>Digestion:</strong> Assists in relieving digestive issues such as indigestion and bloating.</li>
                <li><strong>Inflammation:</strong> Contains citral, a natural compound with anti-inflammatory effects.</li>
                <li><strong>Yeast Infections:</strong> Lemongrass oil has fungicide properties that can help treat yeast infections.</li>
                <li><strong>Pain and Swelling:</strong> Contains chemicals that may help relieve pain and reduce swelling.</li>
                <li><strong>Insomnia and Anxiety:</strong> May help manage insomnia and alleviate anxiety.</li>
                <li><strong>Cholesterol:</strong> Lemongrass may help lower cholesterol levels.</li>
                <li><strong>Red Blood Cells:</strong> Lemongrass tea may aid in treating anemia by supporting red blood cell production.</li>
                <li><strong>Skin:</strong> Lemongrass oil can promote glowing skin and may help treat various skin conditions.</li>
            </ul>
            <p><strong>Additional Uses:</strong> Lemongrass is a tropical plant native to Southeast Asia, widely used in Thai cuisine. It's a common ingredient in soaps, candles, disinfectants, and insect repellents. You can enjoy lemongrass tea, either commercially prepared or made from fresh lemongrass stalks, which are available in Asian grocery stores.</p>
        </div>
		<div style="height: 5px;"></div>
		        <button class="bookmark-btn" onclick="bookmarkPlant('Lemongrass', 'Cymbopogon citratus', 'lemongrass')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-lemongrass" style="display:none;">
                    <textarea class="note-input" id="note-input-lemongrass" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('lemongrass')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="fennel" data-type="Herb" data-medicinal-uses="Aids digestion, reduces inflammation, improves eye health" data-region="Mediterranean, Europe">
            <img src="fennel.png" alt="Fennel Plant">
            <div class="plant-info">
                <h3>Fennel (Foeniculum vulgare) <button class="share-button" onclick="sharePlant('Fennel')">🔗</button> </h3>
                <p><strong>Known For:</strong> Digestive aid and anti-inflammatory properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves digestion and reduces bloating.</li>
                    <li>Supports respiratory and hormonal health.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Fennel:</strong></p>
                    <ul>
                        <li><strong>Digestion:</strong> Fennel can help with digestion by reducing inflammation and bacteria that cause gas, and it may alleviate symptoms of irritable bowel syndrome.</li>
                        <li><strong>Period Cramps:</strong> Fennel can ease period cramps and has been found to be as effective as conventional medicines.</li>
                        <li><strong>Colic:</strong> Fennel can improve colic symptoms in babies.</li>
                        <li><strong>Antioxidants:</strong> A rich source of antioxidants, fennel helps fight cell damage and reduces the risk of chronic diseases.</li>
                        <li><strong>Hydration:</strong> Fennel tea is a tasty, caffeine-free beverage that promotes hydration.</li>
                        <li><strong>Respiratory Tract:</strong> Fennel helps loosen and expel phlegm from the respiratory tract.</li>
                        <li><strong>Sore Throats:</strong> Fennel seeds can soothe sore throats.</li>
                        <li><strong>Eyes:</strong> A decoction of crushed fennel seeds can help reduce eye irritation and eyestrain.</li>
                        <li><strong>Hypertension:</strong> Fennel seeds may help relieve hypertension.</li>
                        <li><strong>Weight Loss:</strong> Fennel can enhance metabolism, aiding in weight loss.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Fennel', 'Foeniculum vulgare', 'fennel')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-fennel" style="display:none;">
                    <textarea class="note-input" id="note-input-fennel" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('fennel')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="sage" data-type="Herb" data-medicinal-uses="Improves memory, reduces inflammation, treats sore throat" data-region="Mediterranean">
            <img src="sage.jpeg" alt="Sage Plant">
            <div class="plant-info">
                <h3>Sage (Salvia officinalis) <button class="share-button" onclick="sharePlant('Sage')">🔗</button> </h3>
                <p><strong>Known For:</strong> Boosting brain function and oral health.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves memory and cognitive function.</li>
                    <li>Supports oral health and reduces inflammation.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Sage:</strong></p>
                    <ul>
                        <li><strong>Sore Throat and Mouth:</strong> Sage can be used as a mouthwash or gargle to treat sore throats, mouth ulcers, and infected gums.</li>
                        <li><strong>Pain Relief:</strong> Sage may help alleviate muscle pain, pain after surgery, and other types of pain.</li>
                        <li><strong>Cholesterol:</strong> Sage may lower total cholesterol, LDL (bad cholesterol), and triglycerides, while increasing HDL (good cholesterol).</li>
                        <li><strong>Brain Health:</strong> Sage may enhance memory and thinking skills, as well as address chemical imbalances in the brain.</li>
                        <li><strong>Bone Loss:</strong> Sage may help slow the progression of bone loss.</li>
                        <li><strong>Injury Recovery:</strong> Sage may reduce the area of injury and speed up recovery from skin breaks, muscle tears, and bone fractures.</li>
                    </ul>
                </div>	
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Sage', 'Salvia officinalis', 'sage')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-sage" style="display:none;">
                    <textarea class="note-input" id="note-input-sage" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('sage')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="thyme" data-type="Herb" data-medicinal-uses="Antimicrobial, improves respiratory health, treats skin issues" data-region="Mediterranean, worldwide">
            <img src="thyme.png" alt="Thyme Plant">
            <div class="plant-info">
                <h3>Thyme (Thymus vulgaris) <button class="share-button" onclick="sharePlant('Thyme')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antimicrobial and anti-inflammatory properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves respiratory health and fights infections.</li>
                    <li>Supports digestion and reduces coughing.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Thyme:</strong></p>
                    <ul>
                        <li><strong>Sore Throat and Mouth:</strong> Sage can be used as a mouthwash or gargle to treat sore throats, mouth ulcers, and infected gums.</li>
                        <li><strong>Pain Relief:</strong> Sage may help alleviate muscle pain, pain after surgery, and other types of pain.</li>
                        <li><strong>Cholesterol:</strong> Sage may lower total cholesterol, LDL (bad cholesterol), and triglycerides, while increasing HDL (good cholesterol).</li>
                        <li><strong>Brain Health:</strong> Sage may enhance memory and thinking skills, as well as address chemical imbalances in the brain.</li>
                        <li><strong>Bone Loss:</strong> Sage may help slow the progression of bone loss.</li>
                        <li><strong>Injury Recovery:</strong> Sage may reduce the area of injury and speed up recovery from skin breaks, muscle tears, and bone fractures.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
              	<button class="bookmark-btn" onclick="bookmarkPlant('Thyme', 'Thymus vulgaris', 'thyme')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-thyme" style="display:none;">
                    <textarea class="note-input" id="note-input-thyme" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('thyme')">Save Note</button>
                </div>
			</div>
        </div>

        
        <div class="plant-card" data-name="dandelion" data-type="Flowering Plant" data-medicinal-uses="Detoxifies liver, aids digestion, reduces inflammation" data-region="Worldwide">
            <img src="dandelion.jpg" alt="Dandelion Plant">
            <div class="plant-info">
                <h3>Dandelion (Taraxacum officinale) <button class="share-button" onclick="sharePlant('Dandelion')">🔗</button> </h3>
                <p><strong>Known For:</strong> Detoxifying the liver and promoting digestion.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Supports liver function and digestion.</li>
                    <li>Reduces inflammation and improves skin health.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Dandelion:</strong></p>
                    <ul>
                        <li><strong>Diuretic:</strong> Dandelion can increase urine production to eliminate excess fluid; however, combining it with prescription diuretics or other diuretic herbs may lead to electrolyte imbalances.</li>
                        <li><strong>Appetite Stimulant:</strong> Dandelion can stimulate appetite and aid in digestion.</li>
                        <li><strong>Liver and Gallbladder:</strong> Dandelion helps detoxify the liver and gallbladder.</li>
                        <li><strong>Kidney Function:</strong> Dandelion may support kidney function.</li>
                        <li><strong>Immune System:</strong> With its antioxidant properties, dandelion can help support your immune system.</li>
                        <li><strong>Skin:</strong> Dandelion extract contains vitamins A, C, and E, which can help reduce the appearance of wrinkles and hyperpigmentation.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Dandelion', 'Taraxacum officinale', 'dandelion')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-dandelion" style="display:none;">
                    <textarea class="note-input" id="note-input-dandelion" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('dandelion')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="milk-thistle" data-type="Herb" data-medicinal-uses="Protects liver, antioxidant, anti-inflammatory" data-region="Mediterranean">
            <img src="milk-thistle.png" alt="Milk Thistle Plant">
            <div class="plant-info">
                <h3>Milk Thistle (Silybum marianum) <button class="share-button" onclick="sharePlant('Milk-Thistle')">🔗</button> </h3>
                <p><strong>Known For:</strong> Protecting and detoxifying the liver.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Promotes liver detoxification and repair.</li>
                    <li>Supports kidney health and reduces cholesterol.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Milk Thistle:</strong></p>
                    <ul>
                        <li><strong>Cancer:</strong> Milk thistle may have chemopreventive and anticancer effects against a variety of cancers, including liver, lung, prostate, breast, skin, cervical, and colorectal cancers.</li>
                        <li><strong>Asthma:</strong> Milk thistle may help reduce inflammation and control asthma symptoms.</li>
                        <li><strong>Type 2 Diabetes:</strong> Milk thistle may help decrease blood sugars and cholesterol, and improve insulin resistance.</li>
                        <li><strong>Cholesterol:</strong> Milk thistle may help lower cholesterol levels.</li>
                        <li><strong>Gallbladder Problems:</strong> Milk thistle may aid in alleviating gallbladder issues.</li>
                        <li><strong>Dialysis:</strong> Milk thistle may be beneficial for patients undergoing dialysis.</li>
                    </ul>
                    <p><strong>Note:</strong> The active ingredient in milk thistle is silymarin, a flavonoid with antioxidant and anti-inflammatory properties. However, results from human studies are mixed, and more research is needed to confirm some of the potential benefits of milk thistle.</p>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Milk Thistle', 'Silybum marianum', 'milk-thistle')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-milk-thistle" style="display:none;">
                    <textarea class="note-input" id="note-input-milk-thistle" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('milk-thistle')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="chamomile" data-type="Flowering Plant" data-medicinal-uses="Improves sleep, reduces stress, aids digestion" data-region="Europe, Western Asia">
            <img src="chamomile.png" alt="Chamomile Plant">
            <div class="plant-info">
                <h3>Chamomile (Matricaria chamomilla) <button class="share-button" onclick="sharePlant('Chamomile')">🔗</button> </h3>
                <p><strong>Known For:</strong> Calming and soothing properties, especially for sleep.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Helps with sleep, anxiety, and digestion.</li>
                    <li>Relieves menstrual cramps and skin irritations.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Chamomile:</strong></p>
                    <ul>
                        <li><strong>Anxiety:</strong> Chamomile is used to relieve anxiety and calm nerves.</li>
                        <li><strong>Digestive Issues:</strong> Chamomile can help with stomach cramps, gas, diarrhea, and indigestion, and is also beneficial for irritable bowel syndrome (IBS).</li>
                        <li><strong>Skin Conditions:</strong> Chamomile can treat skin inflammation, cuts, hemorrhoids, eczema, and gingivitis.</li>
                        <li><strong>Sleep:</strong> Chamomile can aid with insomnia, nightmares, and other sleep problems.</li>
                        <li><strong>Common Cold:</strong> Inhaling steam with chamomile extract may alleviate common cold symptoms.</li>
                        <li><strong>Blood Lipids:</strong> Chamomile can help lower blood lipids, including total cholesterol, triglycerides, and low-density lipoprotein (LDL) cholesterol.</li>
                        <li><strong>Other Conditions:</strong> Chamomile may also assist with arthritis, back pain, bedsores, and stomach cramps.</li>
                    </ul>
                    <p><strong>Forms of Chamomile:</strong></p>
                    <ul>
                        <li><strong>Tea:</strong> The most common form, made from the dried flowers of the chamomile plant.</li>
                        <li><strong>Creams and Ointments:</strong> Chamomile can be applied to the skin as a topical treatment.</li>
                        <li><strong>Mouth Rinse:</strong> Chamomile can be used orally as a mouth rinse.</li>
                        <li><strong>Capsules:</strong> Chamomile is available as a supplement in capsule form.</li>
                    </ul>
                    <p><strong>Note:</strong> Chamomile is one of the oldest medicinal herbs known to mankind. Side effects are uncommon but may include nausea, dizziness, or allergic reactions.</p>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Chamomile', 'Matricaria chamomilla', 'chamomile')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-chamomile" style="display:none;">
                    <textarea class="note-input" id="note-input-chamomile" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('chamomile')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="st-johns-wort" data-type="Herb" data-medicinal-uses="Relieves depression, reduces anxiety, treats wounds" data-region="Europe, Asia">
            <img src="st.john's_wort.jpg" alt="St. John's Wort Plant">
            <div class="plant-info">
                <h3>St. John's Wort (Hypericum perforatum) <button class="share-button" onclick="sharePlant('St-john's-wort')">🔗</button> </h3>
                <p><strong>Known For:</strong> Treating mild to moderate depression and mood disorders.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Supports mood regulation and mental health.</li>
                    <li>Has anti-inflammatory properties.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of St. John's Wort:</strong></p>
                    <ul>
                        <li><strong>Depression:</strong> St. John's wort is commonly promoted for alleviating symptoms of depression.</li>
                        <li><strong>Menopausal Symptoms:</strong> It may help relieve symptoms associated with menopause.</li>
                        <li><strong>Attention-Deficit Hyperactivity Disorder (ADHD):</strong> Some use St. John's wort to manage ADHD symptoms.</li>
                        <li><strong>Somatic Symptom Disorder:</strong> It can be beneficial for those experiencing anxiety related to physical symptoms.</li>
                        <li><strong>Obsessive-Compulsive Disorder:</strong> St. John's wort is also considered for alleviating OCD symptoms.</li>
                        <li><strong>Other Conditions:</strong> It may be promoted for various other conditions, depending on individual needs.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('St. John's Wort', 'Hypericum perforatum', 'st-johns-wort')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-st-johns-wort" style="display:none;">
                    <textarea class="note-input" id="note-input-st-johns-wort" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('st-johns-wort')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="hibiscus" data-type="Flowering Plant" data-medicinal-uses="Reduces blood pressure, antioxidant, supports heart health" data-region="Tropical regions">
            <img src="hibiscus.jpg" alt="Hibiscus Plant">
            <div class="plant-info">
                <h3>Hibiscus (Hibiscus sabdariffa) <button class="share-button" onclick="sharePlant('Hibiscus')">🔗</button> </h3>
                <p><strong>Known For:</strong> Reducing blood pressure and promoting heart health.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Reduces blood pressure and cholesterol.</li>
                    <li>Supports liver health and fights free radicals.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Hibiscus:</strong></p>
                    <ul>
                        <li><strong>Blood Pressure Regulation:</strong> Hibiscus tea can significantly lower systolic and diastolic blood pressure.</li>
                        <li><strong>Liver Health:</strong> It helps reduce inflammation and oxidative damage in the liver.</li>
                        <li><strong>Diabetes Management:</strong> Hibiscus enhances insulin sensitivity and regulates blood sugar levels.</li>
                        <li><strong>Antioxidant Properties:</strong> Rich in flavonoids and polyphenols, it neutralizes free radicals.</li>
                        <li><strong>Anti-inflammatory Effects:</strong> Hibiscus reduces inflammation and the risk of related diseases.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Hibiscus', 'Hibiscus sabdariffa', 'hibiscus')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-hibiscus" style="display:none;">
                    <textarea class="note-input" id="note-input-hibiscus" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('hibiscus')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="valerian" data-type="Root" data-medicinal-uses="Improves sleep, reduces anxiety, muscle relaxant" data-region="Europe, Asia">
            <img src="valerian.png" alt="Valerian Plant">
            <div class="plant-info">
                <h3>Valerian (Valeriana officinalis) <button class="share-button" onclick="sharePlant('Valerian')">🔗</button> </h3>
                <p><strong>Known For:</strong> Treating insomnia and anxiety.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Improves sleep quality and duration.</li>
                    <li>Relieves stress, anxiety, and headaches.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Valerian:</strong></p>
                    <ul>
                        <li><strong>Insomnia:</strong> Valerian helps people fall asleep faster and improves sleep quality.</li>
                        <li><strong>Anxiety:</strong> It treats anxiety by increasing GABA levels in the brain.</li>
                        <li><strong>Digestive Issues:</strong> Valerian alleviates stomach cramps and gastrointestinal spasms.</li>
                        <li><strong>Premenstrual Syndrome (PMS):</strong> It may reduce the severity of PMS symptoms.</li>
                        <li><strong>Menopause Symptoms:</strong> Valerian helps manage symptoms related to menopause.</li>
                        <li><strong>Headaches:</strong> It is used to treat headaches and migraines.</li>
                    </ul>
                    <p><strong>Note:</strong> Valerian is made from the roots of the Valeriana officinalis plant and is generally recognized as safe, but rare liver injury cases have been reported.</p>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Valerian', 'Valeriana officinalis', 'valerian')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-valerian" style="display:none;">
                    <textarea class="note-input" id="note-input-valerian" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('valerian')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="clove" data-type="Flower Bud" data-medicinal-uses="Pain relief, antimicrobial, aids digestion" data-region="Indonesia, tropical regions">
            <img src="clove.png" alt="Clove Plant">
            <div class="plant-info">
                <h3>Clove (Syzygium aromaticum) <button class="share-button" onclick="sharePlant('Clove')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antioxidant and antibacterial properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Relieves toothache and improves digestion.</li>
                    <li>Reduces inflammation and boosts immunity.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Clove:</strong></p>
                    <ul>
                        <li><strong>Pain Relief:</strong> Clove oil contains eugenol, helping relieve pain from toothaches, headaches, and rheumatic pains.</li>
                        <li><strong>Gastrointestinal Issues:</strong> Cloves treat stomach upset, flatulence, colic, and chronic diarrhea; clove tea can aid stomach ailments.</li>
                        <li><strong>Antiseptic and Antibiotic:</strong> Clove oil has antiseptic and antibiotic properties for treating toothaches and cavities.</li>
                        <li><strong>Antimicrobial:</strong> Cloves possess both antibacterial and antifungal properties.</li>
                        <li><strong>Liver Health:</strong> Cloves contain antioxidants that may protect the liver from damage.</li>
                        <li><strong>Bone Health:</strong> Rich in manganese, cloves may improve bone health and mass.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Clove', 'Syzygium aromaticum', 'clove')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-clove" style="display:none;">
                    <textarea class="note-input" id="note-input-clove" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('clove')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="cinnamon" data-type="Bark" data-medicinal-uses="Regulates blood sugar, antioxidant, anti-inflammatory" data-region="South Asia, Southeast Asia">
            <img src="cinnamon.png" alt="Cinnamon Plant">
            <div class="plant-info">
                <h3>Cinnamon (Cinnamomum verum) <button class="share-button" onclick="sharePlant('Cinnamon')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antioxidant, anti-inflammatory, and antimicrobial effects.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Lowers blood sugar and cholesterol levels.</li>
                    <li>Improves brain function and reduces inflammation.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Cinnamon:</strong></p>
                    <ul>
                        <li><strong>Antioxidant:</strong> Contains polyphenols that help prevent oxidative damage.</li>
                        <li><strong>Blood Sugar Control:</strong> May help regulate blood sugar levels, beneficial for diabetes.</li>
                        <li><strong>Gastrointestinal Issues:</strong> Aids in relieving diarrhea, gas, and irritable bowel syndrome.</li>
                        <li><strong>Neurological Disorders:</strong> May support brain health in conditions like Alzheimer's and Parkinson's disease.</li>
                        <li><strong>Blood Pressure:</strong> Can help lower blood pressure.</li>
                        <li><strong>Insect Repellent:</strong> Cassia cinnamon can be applied to the skin as an insect repellent.</li>
                        <li><strong>Appetite Stimulant:</strong> The oil in cinnamon bark can stimulate appetite.</li>
                        <li><strong>Spasms:</strong> The oil in cinnamon bark can help reduce spasms.</li>
                    </ul>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Cinnamon', 'Cinnamomum verum', 'cinnamon')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-cinnamon" style="display:none;">
                    <textarea class="note-input" id="note-input-cinnamon" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('cinnamon')">Save Note</button>
                </div>
            </div>
        </div>

        <div class="plant-card" data-name="oregano" data-type="Herb" data-medicinal-uses="Antimicrobial, antioxidant, improves digestion" data-region="Mediterranean, worldwide">
            <img src="oregano.png" alt="Oregano Plant">
            <div class="plant-info">
                <h3>Oregano (Origanum vulgare) <button class="share-button" onclick="sharePlant('Oregano')">🔗</button> </h3>
                <p><strong>Known For:</strong> Antibacterial, antiviral, and immune-boosting properties.</p>
                <h4>Medicinal Uses:</h4>
                <ul>
                    <li>Supports respiratory health and digestion.</li>
                    <li>Fights infections and reduces inflammation.</li>
                </ul>
                <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
                <div class="plant-benefits" style="display: none;">
                    <p><strong>Additional Benefits of Oregano:</strong></p>
                    <ul>
                        <li><strong>Antibacterial:</strong> Oregano oil possesses antibacterial, antifungal, and antimicrobial properties.</li>
                        <li><strong>Insect Repellent:</strong> Effective against certain ticks and mosquitos.</li>
                        <li><strong>Digestion:</strong> May alleviate indigestion, bloating, and flatulence.</li>
                        <li><strong>Cough:</strong> Contains compounds that may help reduce coughing.</li>
                        <li><strong>Toothache:</strong> Can be used as a mouthwash for tooth infections and sore throats.</li>
                        <li><strong>Blood Sugar Regulation:</strong> May assist in regulating blood sugar and reducing inflammation.</li>
                        <li><strong>Skin Conditions:</strong> Oregano oil can treat acne, athlete's foot, dandruff, warts, and skin infections.</li>
                    </ul>
                    <p><strong>Note:</strong> Oregano is recognized as safe by the FDA but lacks clinical evidence for specific therapeutic doses. Caution is advised when combining with diabetes medications or blood thinners.</p>
                </div>
				<div style="height: 5px;"></div>
				<button class="bookmark-btn" onclick="bookmarkPlant('Oregano', 'Origanum vulgare', 'oregano')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-oregano" style="display:none;">
                    <textarea class="note-input" id="note-input-oregano" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('oregano')">Save Note</button>
                </div>
            </div>
        </div>    

    <div class="plant-card" data-name="astragalus" data-type="Root" data-medicinal-uses="Boosts immune system, anti-aging, reduces stress" data-region="China, Asia">
        <img src="astragalus.png" alt="Astragalus Plant">
        <div class="plant-info">
            <h3>Astragalus (Astragalus membranaceus) <button class="share-button" onclick="sharePlant('Astragalus')">🔗</button> </h3>
            <p><strong>Known For:</strong> Immune support and resilience against illness.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Acts as an adaptogen to help the body resist stress.</li>
                <li>Offers anti-inflammatory and cardiovascular benefits.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Astragalus:</strong></p>
                <ul>
                    <li><strong>Immune System Support:</strong> Strengthens the immune system and helps prevent colds and respiratory infections.</li>
                    <li><strong>Heart Health:</strong> May lower cholesterol and improve heart function.</li>
                    <li><strong>Cancer Treatment:</strong> Potentially aids in treating advanced cancers and reduces chemotherapy side effects.</li>
                    <li><strong>Wound Care:</strong> Has antibacterial and anti-inflammatory properties for wound healing.</li>
                </ul>
                <p><strong>Note:</strong> Generally safe in appropriate doses but can interact with other herbs and medications. Possible side effects include rash, itching, nasal symptoms, and stomach discomfort.</p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Astragalus', 'Astragalus membranaceus', 'astragalus')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-astragalus" style="display:none;">
                    <textarea class="note-input" id="note-input-astragalus" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('astragalus')">Save Note</button>
                </div>
        </div>
    </div>

    <div class="plant-card" data-name="schisandra" data-type="Berry" data-medicinal-uses="Boosts liver health, reduces stress, antioxidant" data-region="China, Russia">
        <img src="schisandra.jpg" alt="Schisandra Plant">
        <div class="plant-info">
            <h3>Schisandra (Schisandra chinensis) <button class="share-button" onclick="sharePlant('Schisandra')">🔗</button> </h3>
            <p><strong>Known For:</strong> Supporting liver health and acting as an adaptogen.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Promotes liver health and detoxification.</li>
                <li>Increases energy and reduces stress.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits:</strong></p>
                <ul>
                    <li><strong>Gastrointestinal Health:</strong> Used for treating diseases of the GI tract.</li>
                    <li><strong>Cardiovascular Support:</strong> Beneficial for cardiovascular diseases.</li>
                    <li><strong>Fatigue Relief:</strong> Helps alleviate body fatigue and weakness.</li>
                    <li><strong>Insomnia Treatment:</strong> Used in the management of insomnia. And improves mental healthy</li>
                </ul>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Schisandra' 'Schisandra chinensis', 'schisandra')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-schisandra" style="display:none;">
                    <textarea class="note-input" id="note-input-schisandra" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('schisandra')">Save Note</button>
                </div>
        </div>
    </div>

    <div class="plant-card" data-name="goji-berry" data-type="Berry" data-medicinal-uses="Improves vision, boosts immunity, antioxidant" data-region="China, Mongolia">
        <img src="goji_berry.jpg" alt="Goji Berry Plant">
        <div class="plant-info">
            <h3>Goji Berry (Lycium barbarum) <button class="share-button" onclick="sharePlant('Goji Berry')">🔗</button> </h3>
            <p><strong>Known For:</strong> Antioxidant and immune-boosting properties.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Protects against cell damage and aging.</li>
                <li>Supports eye health and immune function.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Goji Berries:</strong></p>
                <ul>
                    <li><strong>Anti-Aging:</strong> Valued for their potential to slow the aging process.</li>
                    <li><strong>Eye Health:</strong> Contain zeaxanthin, promoting eye health and preventing macular degeneration.</li>
                    <li><strong>Hair Growth:</strong> May nourish the scalp and promote hair growth.</li>
                    <li><strong>Prebiotic Properties:</strong> Potential prebiotic effects that support gut health.</li>
                </ul>
                <p><strong>Note:</strong> Goji berries can be consumed raw, cooked, or dried, and used in herbal teas, juices, wines, and medicines.</p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Goji Berry', 'Lycium barbarum', 'goji-berry')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-goji-berry" style="display:none;">
                    <textarea class="note-input" id="note-input-goji-berry" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('goji-berry')">Save Note</button>
                </div>
        </div>
    </div>

    <div class="plant-card" data-name="chinese-skullcap" data-type="Herb" data-medicinal-uses="Reduces inflammation, improves heart health, treats anxiety" data-region="China, Eastern Asia">
        <img src="chinese-skullcap.png" alt="Chinese Skullcap Plant">
        <div class="plant-info">
            <h3>Chinese Skullcap (Scutellaria baicalensis) <button class="share-button" onclick="sharePlant('Chinese Skullcap')">🔗</button> </h3>
            <p><strong>Known For:</strong> Anti-inflammatory and anti-allergic properties.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Helps reduce inflammation and allergies.</li>
                <li>Supports liver and heart health.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Chinese Skullcap:</strong></p>
                <ul>
                    <li><strong>Insomnia Relief:</strong> Often used to help alleviate insomnia.</li>
                    <li><strong>Anti-Inflammatory:</strong> Can be beneficial for reducing inflammation.</li>
                    <li><strong>Digestive Aid:</strong> Traditionally used to treat diarrhea.</li>
                    <li><strong>Blood Sugar Regulation:</strong> May help lower blood sugar levels.</li>
                </ul>
                <p><strong>Safety Note:</strong> Chinese skullcap may interact with blood sugar levels and can slow blood clotting. It should be avoided during pregnancy and breastfeeding and in individuals with bleeding disorders.</p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Chinese Skullcap', 'Scutellaria baicalensis', 'chinese-skullcap')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-chinese-skullcap" style="display:none;">
                    <textarea class="note-input" id="note-input-chinese-skullcap" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('chinese-skullcap')">Save Note</button>
                </div>
        </div>
    </div>

	<div class="plant-card" data-name="green-tea" data-type="Leaf" data-medicinal-uses="Antioxidant, boosts metabolism, improves brain function" data-region="China, Japan, worldwide">
        <img src="green_tea.jpg" alt="Green Tea Plant">
        <div class="plant-info">
            <h3>Green Tea (Camellia sinensis) <button class="share-button" onclick="sharePlant('Green Tea')">🔗</button> </h3>
            <p><strong>Known For:</strong> Rich in antioxidants, particularly catechins.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Supports weight loss and boosts metabolism.</li>
                <li>Promotes heart health and brain function.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Green Tea:</strong></p>
                <ul>
                    <li><strong>Heart Health:</strong> May lower LDL cholesterol levels and improve blood pressure.</li>
                    <li><strong>Brain Function:</strong> The combination of caffeine and L-theanine enhances focus and cognitive function.</li>
                    <li><strong>Weight Management:</strong> May boost metabolism and promote fat burning.</li>
                    <li><strong>Oral Health:</strong> Can inhibit the growth of bacteria linked to tooth decay and bad breath.</li>
                </ul>
                <p><strong>Note:</strong> Green tea also has anti-inflammatory properties and may benefit skin health due to its antioxidant content, but excessive consumption can lead to side effects like caffeine jitters or stomach upset. </p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Green Tea', 'Camellia sinensis', 'green-tea')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-green-tea" style="display:none;">
                    <textarea class="note-input" id="note-input-green-tea" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('green-tea')">Save Note</button>
                </div>
        </div>
    </div>
	
    <div class="plant-card" data-name="shiso" data-type="Herb" data-medicinal-uses="Anti-inflammatory, aids digestion, antioxidant" data-region="China, Japan">
        <img src="shiso.jpg" alt="Shiso Plant">
        <div class="plant-info">
            <h3>Shiso (Perilla frutescens) <button class="share-button" onclick="sharePlant('Shiso')">🔗</button> </h3>
            <p><strong>Known For:</strong> Anti-inflammatory and antioxidant properties.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Relieves allergies and improves respiratory health.</li>
                <li>Supports digestion and reduces nausea.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Shiso Leaves:</strong></p>
                <ul>
                    <li><strong>Cancer-Fighting:</strong> Contain properties that may help fight cancer.</li>
                    <li><strong>Heart Health:</strong> Rich in omega-3 fatty acids, promoting cardiovascular health.</li>
                    <li><strong>Bone and Teeth Health:</strong> Provide calcium, essential for strong bones and teeth.</li>
                    <li><strong>Stress Reduction:</strong> May help reduce stress and promote relaxation.</li>
                </ul>
                <p><strong>Note:</strong> Shiso leaves can be enjoyed as tea, infused in water, added to salads and soups, or used as shiso oil, providing a plant-based source of omega-3 fatty acids.</p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Shiso', 'Perilla frutescens', 'shiso')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-shiso" style="display:none;">
                    <textarea class="note-input" id="note-input-shiso" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('shiso')">Save Note</button>
                </div>
        </div>
    </div>

    <div class="plant-card" data-name="kudzu" data-type="Vine" data-medicinal-uses="Relieves hangovers, reduces inflammation, treats migraines" data-region="China, Japan, Korea">
        <img src="kudzu.jpg" alt="Kudzu Plant">
        <div class="plant-info">
            <h3>Kudzu (Pueraria montana) <button class="share-button" onclick="sharePlant('Kudzu')">🔗</button> </h3>
            <p><strong>Known For:</strong> Traditionally used to reduce alcohol cravings and improve liver health.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Alleviates headaches and migraines.</li>
                <li>Promotes liver health and helps with alcohol dependence.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Kudzu Root:</strong></p>
                <ul>
                    <li><strong>Blood Sugar Regulation:</strong> May help regulate blood glucose levels and prevent surges.</li>
                    <li><strong>Cardiovascular Health:</strong> Traditionally used to support heart health.</li>
                    <li><strong>Skin Regeneration:</strong> Isoflavonoids may aid in skin healing and regeneration.</li>
                    <li><strong>Alcoholism Treatment:</strong> Used to reduce alcohol intake and assist with alcohol intoxication.</li>
                </ul>
                <p><strong>Note:</strong> Kudzu is a leguminous vine native to Southeast Asia, with edible roots, flowers, and leaves used in traditional medicine for thousands of years.</p>
            </div>
			<div style="height: 5px;"></div>
			 <button class="bookmark-btn" onclick="bookmarkPlant('Kudzu', 'Pueraria montana', 'kudzu')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-kudzu" style="display:none;">
                    <textarea class="note-input" id="note-input-kudzu" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('kudzu')">Save Note</button>
                </div>
        </div>
    </div>

    <div class="plant-card" data-name="shiitake-mushroom" data-type="Fungus" data-medicinal-uses="Boosts immunity, lowers cholesterol, antioxidant" data-region="East Asia">
        <img src="shiitake-mushroom.png" alt="Shiitake Mushroom">
        <div class="plant-info">
            <h3>Shiitake Mushroom (Lentinula edodes) <button class="share-button" onclick="sharePlant('Shiitake Mushroom')">🔗</button> </h3>
            <p><strong>Known For:</strong> Immune support and cholesterol-lowering properties.</p>
            <h4>Medicinal Uses:</h4>
            <ul>
                <li>Boosts the immune system and supports heart health.</li>
                <li>Contains compounds that may reduce cholesterol levels.</li>
            </ul>
            <a href="javascript:void(0);" class="benefits-link" onclick="toggleBenefits(this)">Benefits</a>
            <div class="plant-benefits" style="display: none;">
                <p><strong>Additional Benefits of Shiitake:</strong></p>
                <ul>
                    <li><strong>Immune System Support:</strong> Contains compounds that enhance the body's immune response and may improve vaccine efficacy.</li>
                    <li><strong>Heart Health:</strong> Helps reduce cholesterol absorption and overall cholesterol levels.</li>
                    <li><strong>Cancer Prevention:</strong> Exhibits properties that may help in preventing tumor growth and promoting cancer cell death.</li>
                    <li><strong>Bone Health:</strong> Rich in vitamin D, crucial for maintaining healthy bones.</li>
                    <li><strong>Oral Health:</strong> Can reduce harmful bacteria in the mouth without affecting beneficial species.</li>
                </ul>
                <p><strong>Note:</strong> Shiitake mushrooms are safe to eat when cooked and are generally safe in food amounts or in doses of 4.5 to 6 grams daily for up to 6 months, or 3 grams daily for up to 9 years. However, more clinical studies are needed to confirm these benefits in humans.</p>
            </div>
			<div style="height: 5px;"></div>
			    <button class="bookmark-btn" onclick="bookmarkPlant('Shiitake Mushroom', 'Lentinula edodes', 'shiitake-mushroom')">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
                <div id="note-shiitake-mushroom" style="display:none;">
                    <textarea class="note-input" id="note-input-shiitake-mushroom" placeholder="Add a note..."></textarea>
                    <button onclick="saveNote('shiitake-mushroom')">Save Note</button>
                </div>
        </div>
    </div>
        
	</section>
	
	<script src="scripts.js"></script>

    <footer>
        <p>© 2024 Virtual Herbal Garden | All Rights Reserved</p>
    </footer>
	
	<div style="height: 50px;"></div>

</body>
</html>