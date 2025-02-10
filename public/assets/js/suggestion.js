document.addEventListener("DOMContentLoaded", () => {
  function getSuggestions(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return [];

    return Array.from(container.querySelectorAll("p")).map((p) =>
      p.textContent.trim()
    );
  }

  function enableAutoSuggestion(inputId, containerId) {
    const input = document.getElementById(inputId);
    const suggestions = getSuggestions(containerId);
    if (!input || suggestions.length === 0) return;

    const suggestionBox = document.createElement("div");
    suggestionBox.classList.add("suggested");
    suggestionBox.style.display = "none";
    suggestionBox.style.position = "absolute";
    suggestionBox.style.background = "#fff";
    suggestionBox.style.border = "1px solid #ccc";
    suggestionBox.style.zIndex = "1000";
    suggestionBox.style.width = `${input.offsetWidth}px`;
    input.parentNode.appendChild(suggestionBox);

    input.addEventListener("input", () => {
      const query = input.value.toLowerCase();
      suggestionBox.innerHTML = "";
      if (query.length === 0) {
        suggestionBox.style.display = "none";
        return;
      }

      const filteredSuggestions = suggestions.filter((loc) =>
        loc.toLowerCase().includes(query)
      );

      if (filteredSuggestions.length === 0) {
        suggestionBox.style.display = "none";
        return;
      }

      filteredSuggestions.forEach((suggestion) => {
        const p = document.createElement("p");
        p.textContent = suggestion;
        p.classList.add("suggestion-item");
        p.style.padding = "5px";
        p.style.cursor = "pointer";
        p.addEventListener("click", () => {
          input.value = suggestion;
          suggestionBox.style.display = "none";
        });
        suggestionBox.appendChild(p);
      });

      suggestionBox.style.display = "block";
    });

    document.addEventListener("click", (event) => {
      if (
        !input.contains(event.target) &&
        !suggestionBox.contains(event.target)
      ) {
        suggestionBox.style.display = "none";
      }
    });

    input.addEventListener("focus", () => {
      if (input.value.length > 0) {
        suggestionBox.style.display = "block";
      }
    });
  }

  enableAutoSuggestion("country", "suggestedCountries");
  enableAutoSuggestion("place_of_birth", "suggestedPlace");
  enableAutoSuggestion("id_issue_place", "suggested_issue_place");
  enableAutoSuggestion("state", "suggestedRegion");
  enableAutoSuggestion("city", "suggested_city");
});
