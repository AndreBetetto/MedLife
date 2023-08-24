if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add("dark");
  document.querySelector("#theme-switcher").setAttribute("data-theme", "light");
  document.querySelector("#theme-switcher-text").textContent="Light";
  document.querySelector("#theme-switcher-icon").setAttribute("src", "sun.png");
} else {
  document.documentElement.classList.remove("dark");
  document.querySelector("#theme-switcher").setAttribute("data-theme", "dark");
  document.querySelector("#theme-switcher-text").textContent="Dark";
  document.querySelector("#theme-switcher-icon").setAttribute("src", "moon.png");
}

function setDarkTheme() {
  document.documentElement.classList.add("dark");
  localStorage.theme = "dark";
  document.querySelector("#theme-switcher").setAttribute("data-theme", "light");
  document.querySelector("#theme-switcher-text").textContent="Light";
  document.querySelector("#theme-switcher-icon").setAttribute("src", "sun.png");
};

function setLightTheme() {
  document.documentElement.classList.remove("dark");
  localStorage.theme = "light";
  document.querySelector("#theme-switcher").setAttribute("data-theme", "dark");
  document.querySelector("#theme-switcher-text").textContent="Dark";
  document.querySelector("#theme-switcher-icon").setAttribute("src", "moon.png");
};

function onThemeSwitcherItemClick(event) {
  const theme = event.target.dataset.theme;

  if (theme === "system") {
    localStorage.removeItem("theme");
    setSystemTheme();
  } else if (theme === "dark") {
    setDarkTheme();
  } else {
    setLightTheme();
  }
};

const themeSwitcherItems = document.querySelectorAll("#theme-switcher");
themeSwitcherItems.forEach((item) => {
  item.addEventListener("click", onThemeSwitcherItemClick);
});