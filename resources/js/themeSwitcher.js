const currentUrl = "http://localhost:8000";
const themeSwitcher = document.getElementById("theme-switcher");
const themeSwitcherIcon = document.getElementById("theme-switcher-icon");

if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add("dark");
  if(themeSwitcher)
  {
    themeSwitcher.setAttribute("data-theme", "light");
    themeSwitcherIcon.setAttribute("src", currentUrl+"/sun.svg");
  }
} else {
  document.documentElement.classList.remove("dark");
  if(themeSwitcher)
  {
    themeSwitcher.setAttribute("data-theme", "dark");
    themeSwitcherIcon.setAttribute("src", currentUrl+"/moon.png");
  }
}

function setDarkTheme() {
  document.documentElement.classList.add("dark");
  localStorage.theme = "dark";
  themeSwitcher.setAttribute("data-theme", "light");
  themeSwitcherIcon.setAttribute("src", currentUrl+"/sun.svg");
};

function setLightTheme() {
  document.documentElement.classList.remove("dark");
  localStorage.theme = "light";
  themeSwitcher.setAttribute("data-theme", "dark");
  themeSwitcherIcon.setAttribute("src", currentUrl+"/moon.png");
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