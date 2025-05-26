<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbal Remedies for Diseases</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c7a7b;
            color: white;
            padding: 10px;
            text-align: center;
			margin-bottom: 20px;
        }
		
		
        .disease-list {
            display: block; /* Change from flex to block */
            margin: 0; /* Remove any margins */
            padding: 10px; /* Add some padding */
        }

        .disease-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .disease-card img {
            max-width: 300px;
            border-radius: 20px;
            margin-right: 20px;
        }

        .disease-info {
            max-width: 70%;
        }
        .disease-info h3 {
            margin: 0 0 10px 0;
            color: #2c3e50;
        }
        .disease-info p {
            margin: 5px 0;
            color: #34495e;
        }
        .disease-info ul {
            padding-left: 20px;
        }
        .disease-info ul li {
            list-style-type: square;
            color: #16a085;
        }
		.learn-more {
            display: inline-block;
            margin-top: 10px;
            color: #e67e22;
            text-decoration: underline;
            cursor: pointer;
        }
        .learn-more:hover {
            color: #d35400;
        }
        .disease-learn-more {
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
        background-color: #2c7a7b;
        color: white;
        text-align: center;
        padding: 10px 0;
        margin-top: 20px;
    }

    </style>
</head>
<body>
    <header>
        <h1>Herbal Remedies for Diseases</h1>
		
		<!-- Search Bar -->
        <section class="search-section">
            <input type="text" id="search-input" placeholder="Search for" onkeyup="searchDiseases()">
        </section>
		
        <a href="index.php">Go Back to Home</a>
    </header>
	
    <div style="height: 100px";></div>
	
    <section class="diseases-section" id="diseases-section">

        <!-- Disease Card for Arthritis -->
        <div class="disease-card" data-name="arthritis">
            <img src="arthritis.png" alt="Arthritis">
            <div class="disease-info">
                <h3>Arthritis</h3>
                <p><strong>Symptoms:</strong> Joint pain, swelling, stiffness.</p>
                <p><strong>Herbal Treatment:</strong> Boswellia, Ginger, Turmeric.</p>
                <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
                <!-- Hidden Information -->
                <div class="disease-learn-more">
                    <p><strong>Herbal Treatments for Arthritis:</strong></p>
                    <ul>
                        <li><strong>Boswellia:</strong> Known for its anti-inflammatory properties, Boswellia can help reduce swelling and stiffness in the joints.</li>
                        <li><strong>Ginger:</strong> Contains compounds that have anti-inflammatory effects, helping to ease pain and stiffness.</li>
                        <li><strong>Turmeric:</strong> Curcumin, the active ingredient in turmeric, has powerful anti-inflammatory and antioxidant properties that help reduce joint pain.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Disease Card for Diabetes -->
        <div class="disease-card" data-name="diabetes">
            <img src="diabetes.jpg" alt="Diabetes">
            <div class="disease-info">
                <h3>Diabetes</h3>
                <p><strong>Symptoms:</strong> High blood sugar, frequent urination.</p>
                <p><strong>Herbal Treatment:</strong> Bitter Melon, Fenugreek, Cinnamon.</p>
                <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
                <!-- Hidden Information -->
                <div class="disease-learn-more">
                    <p><strong>Herbal Treatments for Diabetes:</strong></p>
                    <ul>
                        <li><strong>Bitter Melon:</strong> Contains compounds that help lower blood sugar levels by mimicking insulin.</li>
                        <li><strong>Fenugreek:</strong> Fenugreek seeds may improve insulin sensitivity and reduce blood sugar levels.</li>
                        <li><strong>Cinnamon:</strong> Cinnamon has been shown to improve insulin sensitivity and lower blood sugar levels.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Disease Card for Hypertension -->
        <div class="disease-card" data-name="hypertension">
            <img src="hypertension.jpg" alt="Hypertension">
            <div class="disease-info">
                <h3>Hypertension</h3>
                <p><strong>Symptoms:</strong> High blood pressure, headaches.</p>
                <p><strong>Herbal Treatment:</strong> Garlic, Hibiscus, Basil.</p>
                <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
                <!-- Hidden Information -->
                <div class="disease-learn-more">
                    <p><strong>Herbal Treatments for Hypertension:</strong></p>
                    <ul>
                        <li><strong>Garlic:</strong> Garlic helps relax blood vessels and lower blood pressure.</li>
                        <li><strong>Hibiscus:</strong> Hibiscus tea can help reduce systolic blood pressure levels and promote overall cardiovascular health.</li>
                        <li><strong>Basil:</strong> Basil contains antioxidants and essential oils that can help lower blood pressure.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Disease Card for Common Cold -->
        <div class="disease-card" data-name="common-cold">
            <img src="common_cold.jpg" alt="Common Cold">
            <div class="disease-info">
                <h3>Common Cold</h3>
                <p><strong>Symptoms:</strong> Coughing, sore throat, congestion.</p>
                <p><strong>Herbal Treatment:</strong> Echinacea, Peppermint, Ginger.</p>
                <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
                <!-- Hidden Information -->
                <div class="disease-learn-more">
                    <p><strong>Herbal Treatments for the Common Cold:</strong></p>
                    <ul>
                        <li><strong>Echinacea:</strong> Boosts the immune system and reduces the duration of cold symptoms.</li>
                        <li><strong>Peppermint:</strong> Helps relieve a sore throat and reduce nasal congestion.</li>
                        <li><strong>Ginger:</strong> Acts as an anti-inflammatory and soothes the throat while boosting immunity.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Disease Card for Insomnia -->
        <div class="disease-card" data-name="insomnia">
            <img src="insomnia.webp" alt="Insomnia">
            <div class="disease-info">
                <h3>Insomnia</h3>
                <p><strong>Symptoms:</strong> Difficulty sleeping, restlessness.</p>
                <p><strong>Herbal Treatment:</strong> Valerian, Chamomile, Lavender.</p>
                <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
                <!-- Hidden Information -->
                <div class="disease-learn-more">
                    <p><strong>Herbal Treatments for Insomnia:</strong></p>
                    <ul>
                        <li><strong>Valerian:</strong> Has sedative properties that help improve sleep quality.</li>
                        <li><strong>Chamomile:</strong> Known for its calming effects that promote relaxation and sleep.</li>
                        <li><strong>Lavender:</strong> Lavender oil helps reduce anxiety and improve sleep quality.</li>
                    </ul>
                </div>
            </div>
        </div>
         <!-- Psoriasis -->
    <div class="disease-card" data-name="psoriasis">
        <img src="psoriasis.jpg" alt="Psoriasis">
        <div class="disease-info">
            <h3>Psoriasis</h3>
            <p><strong>Symptoms:</strong> Scaly skin, redness, itching.</p>
            <p><strong>Herbal Treatment:</strong> Aloe Vera, Turmeric, Oregano Oil.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Psoriasis:</strong></p>
                <ul>
                    <li><strong>Aloe Vera:</strong> Known for its cooling and anti-inflammatory properties, it can soothe irritated skin and reduce redness.</li>
                    <li><strong>Turmeric:</strong> Contains curcumin, which has anti-inflammatory effects that may help reduce symptoms of psoriasis.</li>
                    <li><strong>Oregano Oil:</strong> Contains compounds that have anti-inflammatory and antimicrobial effects, helping to alleviate psoriasis symptoms.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Migraine -->
    <div class="disease-card" data-name="migraine">
        <img src="migraine.jpg" alt="Migraine">
        <div class="disease-info">
            <h3>Migraine</h3>
            <p><strong>Symptoms:</strong> Severe headaches, sensitivity to light.</p>
            <p><strong>Herbal Treatment:</strong> Feverfew, Butterbur, Peppermint.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Migraine:</strong></p>
                <ul>
                    <li><strong>Feverfew:</strong> Traditionally used to reduce the frequency and severity of migraines.</li>
                    <li><strong>Butterbur:</strong> Shown to help reduce the frequency of migraines and alleviate symptoms.</li>
                    <li><strong>Peppermint:</strong> Known for its ability to relax muscles and improve blood circulation, which can help relieve migraine symptoms.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Eczema -->
    <div class="disease-card" data-name="eczema">
        <img src="Eczema.jpg" alt="Eczema">
        <div class="disease-info">
            <h3>Eczema</h3>
            <p><strong>Symptoms:</strong> Dry, itchy skin, inflammation.</p>
            <p><strong>Herbal Treatment:</strong> Calendula, Chamomile, Witch Hazel.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Eczema:</strong></p>
                <ul>
                    <li><strong>Calendula:</strong> Known for its anti-inflammatory and soothing effects, Calendula can help relieve skin irritation.</li>
                    <li><strong>Chamomile:</strong> Has anti-inflammatory and calming properties that may help alleviate eczema flare-ups.</li>
                    <li><strong>Witch Hazel:</strong> Known for its astringent and anti-inflammatory properties, it can help soothe itching and redness.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Digestive Disorders -->
    <div class="disease-card" data-name="digestive-disorders">
        <img src="digestive_disorders.png" alt="Digestive Disorders">
        <div class="disease-info">
            <h3>Digestive Disorders</h3>
            <p><strong>Symptoms:</strong> Indigestion, bloating, gas.</p>
            <p><strong>Herbal Treatment:</strong> Peppermint, Ginger, Fennel.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Digestive Disorders:</strong></p>
                <ul>
                    <li><strong>Peppermint:</strong> Known for its ability to relieve bloating, indigestion, and gas by relaxing the digestive tract muscles.</li>
                    <li><strong>Ginger:</strong> Helps with nausea and indigestion and has anti-inflammatory properties to aid digestion.</li>
                    <li><strong>Fennel:</strong> Helps with bloating, indigestion, and gas by improving digestion and relaxing the stomach muscles.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Asthma -->
    <div class="disease-card" data-name="asthma">
        <img src="asthma.png" alt="Asthma">
        <div class="disease-info">
            <h3>Asthma</h3>
            <p><strong>Symptoms:</strong> Shortness of breath, wheezing, chest tightness.</p>
            <p><strong>Herbal Treatment:</strong> Turmeric, Ginkgo Biloba, Garlic.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Asthma:</strong></p>
                <ul>
                    <li><strong>Turmeric:</strong> Contains curcumin, which has anti-inflammatory properties that may help reduce asthma symptoms.</li>
                    <li><strong>Ginkgo Biloba:</strong> Known for improving lung function and reducing asthma-related inflammation.</li>
                    <li><strong>Garlic:</strong> Helps relax the airways and reduce inflammation, providing relief from asthma symptoms.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Depression -->
    <div class="disease-card" data-name="depression">
        <img src="depression.jpg" alt="Depression">
        <div class="disease-info">
            <h3>Depression</h3>
            <p><strong>Symptoms:</strong> Persistent sadness, loss of interest, fatigue.</p>
            <p><strong>Herbal Treatment:</strong> St. John's Wort, Saffron, Lavender.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Depression:</strong></p>
                <ul>
                    <li><strong>St. John's Wort:</strong> Known for its antidepressant properties and used to alleviate mild to moderate depression.</li>
                    <li><strong>Saffron:</strong> Has been shown to improve mood and reduce symptoms of depression.</li>
                    <li><strong>Lavender:</strong> Known for its calming and mood-stabilizing properties, lavender helps reduce stress and anxiety.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Acne -->
    <div class="disease-card" data-name="acne">
        <img src="acne.png" alt="Acne">
        <div class="disease-info">
            <h3>Acne</h3>
            <p><strong>Symptoms:</strong> Pimples, blackheads, inflammation.</p>
            <p><strong>Herbal Treatment:</strong> Tea Tree Oil, Neem, Aloe Vera.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Acne:</strong></p>
                <ul>
                    <li><strong>Tea Tree Oil:</strong> Known for its antimicrobial properties, it helps fight acne-causing bacteria.</li>
                    <li><strong>Neem:</strong> Has antibacterial properties that can help clear acne and prevent future breakouts.</li>
                    <li><strong>Aloe Vera:</strong> Soothes skin irritation and reduces inflammation, helping heal acne spots faster.</li>
                </ul>
            </div>
        </div>
    </div>

        <div class="disease-card" data-name="obesity">
        <img src="obesity.jpg" alt="Obesity">
        <div class="disease-info">
            <h3>Obesity</h3>
            <p><strong>Symptoms:</strong> Excessive body weight, increased fat tissue.</p>
            <p><strong>Herbal Treatment:</strong> Green Tea, Garcinia Cambogia, Ginger.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Obesity:</strong></p>
                <ul>
                    <li><strong>Green Tea:</strong> Known to boost metabolism and fat burning due to its high antioxidant content, especially catechins.</li>
                    <li><strong>Garcinia Cambogia:</strong> Contains hydroxycitric acid, which may help reduce appetite and block fat production.</li>
                    <li><strong>Ginger:</strong> Has thermogenic properties that may help increase calorie burning and support digestion.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="disease-card" data-name="irritable-bowel">
        <img src="irritable_bowel_syndrome.jpg" alt="Irritable Bowel Syndrome (IBS)">
        <div class="disease-info">
            <h3>Irritable Bowel Syndrome (IBS)</h3>
            <p><strong>Symptoms:</strong> Abdominal pain, bloating, constipation, diarrhea.</p>
            <p><strong>Herbal Treatment:</strong> Peppermint Oil, Chamomile, Fennel.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for IBS:</strong></p>
                <ul>
                    <li><strong>Peppermint Oil:</strong> Known for its ability to relax the muscles in the intestines, which helps alleviate cramping and bloating.</li>
                    <li><strong>Chamomile:</strong> Helps soothe digestive issues and reduce inflammation in the gut, often used to calm upset stomachs.</li>
                    <li><strong>Fennel:</strong> Aids in relieving bloating and indigestion, and may help reduce symptoms of constipation.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="disease-card" data-name="pcos">
        <img src="pcos.jpg" alt="Polycystic Ovary Syndrome (PCOS)">
        <div class="disease-info">
            <h3>Polycystic Ovary Syndrome (PCOS)</h3>
            <p><strong>Symptoms:</strong> Irregular periods, excess hair, weight gain.</p>
            <p><strong>Herbal Treatment:</strong> Spearmint, Cinnamon, Flaxseed.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for PCOS:</strong></p>
                <ul>
                    <li><strong>Spearmint:</strong> Known for its anti-androgenic properties, spearmint tea may help reduce hirsutism (excess hair growth) in women with PCOS.</li>
                    <li><strong>Cinnamon:</strong> Helps regulate insulin levels, which is a key factor in managing PCOS and controlling symptoms.</li>
                    <li><strong>Flaxseed:</strong> Contains lignans that can help balance hormone levels and improve reproductive health in women with PCOS.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="disease-card" data-name="stomach-ulcers">
        <img src="stomach-ulcers.png" alt="Stomach Ulcers">
        <div class="disease-info">
            <h3>Stomach Ulcers</h3>
            <p><strong>Symptoms:</strong> Burning pain in the stomach, bloating, heartburn.</p>
            <p><strong>Herbal Treatment:</strong> Licorice, Mastic Gum, Garlic.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Stomach Ulcers:</strong></p>
                <ul>
                    <li><strong>Licorice:</strong> Known for its ability to soothe the stomach lining and help heal ulcers by promoting the production of mucus.</li>
                    <li><strong>Mastic Gum:</strong> Used to promote the healing of stomach ulcers and reduce symptoms of indigestion.</li>
                    <li><strong>Garlic:</strong> Has antimicrobial properties that may help combat the bacteria (Helicobacter pylori) that contribute to the formation of ulcers.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="disease-card" data-name="anxiety">
        <img src="anxiety.jpg" alt="Anxiety">
        <div class="disease-info">
            <h3>Anxiety</h3>
            <p><strong>Symptoms:</strong> Restlessness, excessive worry, tension.</p>
            <p><strong>Herbal Treatment:</strong> Ashwagandha, Kava, Passionflower.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Anxiety:</strong></p>
                <ul>
                    <li><strong>Ashwagandha:</strong> Known for its ability to reduce stress and anxiety by balancing the body's cortisol levels.</li>
                    <li><strong>Kava:</strong> Often used for its calming effects, kava helps reduce anxiety and promote relaxation.</li>
                    <li><strong>Passionflower:</strong> Can help reduce anxiety symptoms and improve sleep, often used as a mild sedative.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="disease-card" data-name="liver-disease">
        <img src="liver_disease.jpg" alt="Liver Disease">
        <div class="disease-info">
            <h3>Liver Disease</h3>
            <p><strong>Symptoms:</strong> Fatigue, jaundice, abdominal pain.</p>
            <p><strong>Herbal Treatment:</strong> Milk Thistle, Dandelion, Licorice Root.</p>
            <a href="javascript:void(0);" class="learn-more" onclick="toggleBenefits(this)">Herbal cures</a>
            <!-- Hidden Information -->
            <div class="disease-learn-more">
                <p><strong>Herbal Treatments for Liver Disease:</strong></p>
                <ul>
                    <li><strong>Milk Thistle:</strong> Contains silymarin, which has antioxidant properties and helps protect liver cells from damage.</li>
                    <li><strong>Dandelion:</strong> Known for its ability to support liver detoxification and improve bile flow, helping to detox the liver.</li>
                    <li><strong>Licorice Root:</strong> Can help protect the liver and reduce inflammation in the liver caused by chronic disease.</li>
                </ul>
            </div>
        </div>
    </div>
    </section>

    <script src="scripts.js"></script>
	
    <footer>
        <p>© 2024 Herbal Remedies | All Rights Reserved</p>
    </footer>

</body>
</html>
