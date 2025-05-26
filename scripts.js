// Scroll to a specific section
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    section.scrollIntoView({ behavior: 'smooth' });
}

// Load the Plants page dynamically
function loadPlantsPage() {
    //const plantsSection = document.getElementById('plants');
    //plantsSection.style.display = 'block';

    // Hide other sections
   // document.getElementById('diseases').style.display = 'none';
    //document.getElementById('search-results').style.display = 'none';
	window.location.href = 'plants.html';  // Redirects to plants page
}

// Load the Diseases page dynamically
function loadDiseasesPage() {
	window.location.href = 'plants.html';  // Redirects to plants page
	
}

function searchPlants() {
    const input = document.getElementById("search-input").value.toLowerCase();
    const plantCards = document.querySelectorAll(".plant-card");

    plantCards.forEach(card => {
        const plantName = card.getAttribute("data-name").toLowerCase();
        const plantType = card.getAttribute("data-type").toLowerCase();
        const medicinalUses = card.getAttribute("data-medicinal-uses").toLowerCase();
        const region = card.getAttribute("data-region").toLowerCase();

        // Check if the input matches any of the attributes
        if (plantName.includes(input) || plantType.includes(input) || medicinalUses.includes(input) || region.includes(input)) {
            card.style.display = "block";  // Show the card if any match is found
        } else {
            card.style.display = "none";   // Hide the card if no match is found
        }
    });
}


function searchDiseases() {
    const input = document.getElementById("search-input").value.toLowerCase();
    const diseaseCards = document.querySelectorAll(".disease-card");

    diseaseCards.forEach(card => {
        const diseaseName = card.getAttribute("data-name").toLowerCase();
        if (diseaseName.includes(input)) {
            card.style.display = "block"; // Show the card
        } else {
            card.style.display = "none"; // Hide the card
        }
    });
}

//Traditional healing system
function toggleDetails(detailsId) {
        const details = document.getElementById(detailsId);
        // Toggle visibility
        if (details.style.display === "none" || details.style.display === "") {
            details.style.display = "block";
        } else {
            details.style.display = "none";
        }
    }

//plants benefits
function toggleBenefits(element) {
    const benefits = element.nextElementSibling;
    
    // Toggle display of the benefits section
    if (benefits.style.display === "none" || benefits.style.display === "") {
        benefits.style.display = "block";
        element.textContent = "Hide Benefits";
    } else {
        benefits.style.display = "none";
        element.textContent = "Show Benefits"; // Use "Show Benefits" for clarity
    }
}

 // Function to toggle the visibility of the diseases herbal cures  section
        function toggleBenefits(element) {
            var benefitsSection = element.nextElementSibling;
            if (benefitsSection.style.display === "none" || benefitsSection.style.display === "") {
                benefitsSection.style.display = "block";
            } else {
                benefitsSection.style.display = "none";
            }
        }
		
		
function showPlantModel() {
    const models = document.querySelectorAll('.model-frame');
    const message = document.getElementById('no-selection-message');
    
    models.forEach(model => model.style.display = 'none');
    
    const selectedPlant = document.getElementById('plant-models').value;
    
    if (selectedPlant !== 'select') {
        const modelToShow = document.getElementById(`model-${selectedPlant}`);
        if (modelToShow) {
            modelToShow.style.display = 'block';
            message.style.display = 'none'; // Hide message when a model is shown
        }
    } else {
        message.style.display = 'block'; // Show message when no plant is selected
    }
}


// Function to toggle the visibility of the bookmarks list
        function toggleBookmarks() {
            const bookmarkList = document.getElementById('bookmark-list');
            bookmarkList.style.display = bookmarkList.style.display === 'block' ? 'none' : 'block';
        }

        // Store the bookmarked plants and their notes
        const bookmarks = {};

        // Add a plant to bookmarks with a note
        function bookmarkPlant(name, scientificName, id) {
            const noteInput = document.getElementById('note-input-' + id);
            const noteBox = document.getElementById('note-' + id);
            
            noteBox.style.display = noteBox.style.display === 'none' ? 'block' : 'none';
            
            if (noteBox.style.display === 'block') {
                // Clear previous note if any
                noteInput.value = '';
            } else {
                // Save the note when it is hidden
                bookmarks[name] = {
                    scientificName: scientificName,
                    note: noteInput.value
                };
                
                updateBookmarkList();
            }
        }

        // Save the note for the plant
        function saveNote(id) {
            const noteInput = document.getElementById('note-input-' + id);
            const noteBox = document.getElementById('note-' + id);
            
            if (noteInput.value.trim()) {
                bookmarks[id] = {
                    note: noteInput.value.trim()
                };
            }
            noteBox.style.display = 'none'; // Hide the note box after saving
            updateBookmarkList();
        }

        // Update the list of bookmarks in the header
        function updateBookmarkList() {
            const bookmarkList = document.getElementById('bookmark-list');
            bookmarkList.innerHTML = '';
            for (const name in bookmarks) {
                const bookmark = bookmarks[name];
                const listItem = document.createElement('div');
                listItem.className = 'bookmark-item';
                listItem.innerHTML = `
                    <strong>${name}</strong> - ${bookmark.scientificName || ''}
                    <p>${bookmark.note || 'No note added yet.'}</p>
                    <button class="delete-btn" onclick="deleteBookmark('${name}')">Delete</button>
                `;
                bookmarkList.appendChild(listItem);
            }
        }

        // Delete a bookmark
        function deleteBookmark(name) {
            delete bookmarks[name];
            updateBookmarkList();
        }	
	
function toggleVideo() {
        const videoContainer = document.getElementById('video-container');
        videoContainer.style.display = videoContainer.style.display === 'none' ? 'block' : 'none';
    }
	
function sharePlant(plantName) {
    if (navigator.share) {
        navigator.share({
            title: `Learn about ${plantName}`,
            text: `Check out the amazing benefits of ${plantName}!`,
            url: window.location.href
        }).catch((error) => console.error('Error sharing', error));
    } else {
        alert('Sharing not supported on this browser.');
    }
}

	