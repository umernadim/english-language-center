const vocabList = document.getElementById("vocabList");
const searchForm = document.getElementById("searchForm");
const searchInput = document.getElementById("searchInput");
const filterButtons = document.querySelectorAll(".filter-btn");
const recentWordsList = document.getElementById("recentWords");
const wordOfDayElement = document.getElementById("wordOfDay");
const loadMoreBtn = document.getElementById("loadMoreBtn"); // optional button

// ✅ API Configuration
const DICTIONARY_API = "https://api.dictionaryapi.dev/api/v2/entries/en";
const RANDOM_WORD_API = "https://random-word-api.vercel.app/api?words="; // fixed CORS-safe API

// Current state
let currentCategory = "all";
let searchedWords = new Set();

// Initialize
document.addEventListener("DOMContentLoaded", () => {
  loadWordOfTheDay();
  loadSampleWords();
  setupEventListeners();
  loadRecentSearches();
});

// Setup event listeners
function setupEventListeners() {
  // ✅ Search Form
  searchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const searchTerm = searchInput.value.trim().toLowerCase();
    if (searchTerm) searchWord(searchTerm);
  });

  // ✅ Filter Buttons (if used)
  filterButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      filterButtons.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");
      currentCategory = this.dataset.category;
    });
  });

  // ✅ Recent Words
  recentWordsList.addEventListener("click", (e) => {
    e.preventDefault();
    if (e.target.tagName === "A") {
      const word = e.target.dataset.word;
      if (word) {
        searchInput.value = word;
        searchWord(word);
      }
    }
  });

  // ✅ Load More Button (check before using)
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", loadSampleWords);
  }
}

// ✅ Fetch random words
async function fetchWordList(count = 15) {
  const response = await fetch(`${RANDOM_WORD_API}${count}`);
  if (!response.ok) throw new Error("Failed to fetch word list");
  return response.json();
}

// ✅ Load initial random words
async function loadSampleWords() {
  vocabList.innerHTML = `
    <div class="loading">
      <div class="loading-spinner"></div>
      <p>Loading vocabulary words...</p>
    </div>
  `;

  try {
    const randomWords = await fetchWordList(15);

    const wordPromises = randomWords.map(async (word) => {
      try {
        const res = await fetch(`${DICTIONARY_API}/${word}`);
        if (!res.ok) return null;
        return await res.json();
      } catch {
        return null;
      }
    });

    const wordsData = (await Promise.all(wordPromises)).flat().filter(Boolean);

    if (wordsData.length === 0) {
      vocabList.innerHTML = `<div class="error-message"><p>No valid words loaded. Try again.</p></div>`;
      return;
    }

    displayWords(wordsData);
  } catch (err) {
    console.error("Error loading words:", err);
    vocabList.innerHTML = `<div class="error-message"><p>Error loading words. Please try later.</p></div>`;
  }
}

// ✅ Search for a word
async function searchWord(word) {
  vocabList.innerHTML = `
    <div class="loading">
      <div class="loading-spinner"></div>
      <p>Searching for "${word}"...</p>
    </div>
  `;

  try {
    const res = await fetch(`${DICTIONARY_API}/${word}`);
    if (!res.ok) throw new Error("Not found");
    const wordData = await res.json();

    displayWords(wordData);
    addToRecentSearches(word);
    searchInput.value = "";
  } catch (error) {
    vocabList.innerHTML = `
      <div class="error-message">
        <p>No definitions found for "${word}".</p>
      </div>
    `;
  }
}

// ✅ Load word of the day
async function loadWordOfTheDay() {
  const today = new Date().getDate();
  const randomWord = (await fetchWordList(10))[today % 10];

  try {
    const res = await fetch(`${DICTIONARY_API}/${randomWord}`);
    const data = await res.json();
    displayWordOfDay(data);
  } catch (error) {
    wordOfDayElement.innerHTML = `
      <h3><i class="ri-lightbulb-flash-line"></i> Word of the Day</h3>
      <div class="error-message"><p>Unable to load word of the day.</p></div>
    `;
  }
}

// ✅ Display word of the day
function displayWordOfDay(data) {
  if (!data || !data.length) return;
  const word = data[0];
  const def = word.meanings[0].definitions[0];
  wordOfDayElement.innerHTML = `
    <h3><i class="ri-lightbulb-flash-line"></i> Word of the Day</h3>
    <div class="vocab-header">
      <div>
        <div class="vocab-word">${word.word}</div>
        <div class="vocab-phonetic">${word.phonetic || ""}</div>
      </div>
    </div>
    <div class="vocab-definition">${def.definition}</div>
    ${def.example ? `<div class="vocab-example">"${def.example}"</div>` : ""}
  `;
}

// ✅ Display list of words
function displayWords(wordsData) {
  vocabList.innerHTML = wordsData
    .map((word) => {
      const meaning = word.meanings[0];
      const def = meaning.definitions[0];
      const synonyms = def.synonyms || [];
      return `
        <div class="vocab-card">
          <div class="vocab-header">
            <div>
              <div class="vocab-word">${word.word}</div>
              <div class="vocab-phonetic">${word.phonetic || ""}</div>
            </div>
            <div class="vocab-type">${meaning.partOfSpeech}</div>
          </div>
          <div class="vocab-definition">${def.definition}</div>
          ${
            def.example
              ? `<div class="vocab-example">"${def.example}"</div>`
              : ""
          }
          ${
            synonyms.length > 0
              ? `<div class="vocab-synonyms"><strong>Synonyms: </strong>${synonyms
                  .slice(0, 5)
                  .map(
                    (s) =>
                      `<a href="#" class="synonym-tag" data-word="${s}">${s}</a>`
                  )
                  .join(", ")}</div>`
              : ""
          }
        </div>
      `;
    })
    .join("");

  // ✅ Synonym click search
  document.querySelectorAll(".synonym-tag").forEach((tag) => {
    tag.addEventListener("click", (e) => {
      e.preventDefault();
      const w = tag.dataset.word;
      searchInput.value = w;
      searchWord(w);
    });
  });
}

// ✅ Manage recent searches
function addToRecentSearches(word) {
  searchedWords.add(word);
  const list = Array.from(searchedWords).slice(-5);
  updateRecentSearchesUI(list);
  localStorage.setItem("recentVocabSearches", JSON.stringify(list));
}

function loadRecentSearches() {
  const saved = localStorage.getItem("recentVocabSearches");
  if (saved) {
    const list = JSON.parse(saved);
    searchedWords = new Set(list);
    updateRecentSearchesUI(list);
  }
}

function updateRecentSearchesUI(list) {
  recentWordsList.innerHTML = list
    .map(
      (w) => `
    <li class="recent-word">
      <a href="#" data-word="${w}">
        <span>${w.charAt(0).toUpperCase() + w.slice(1)}</span>
      </a>
    </li>`
    )
    .join("");
}
