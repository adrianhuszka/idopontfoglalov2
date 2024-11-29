function setThemeOnLoad() {
    if (
        localStorage.getItem("theme") === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
}

function switchTheme(to) {
    let choosenTheme = to;
    if (to === "dark") {
        document.body.classList.add("dark");
        localStorage.setItem("theme", "dark");
        choosenTheme = "dark";
    } else if (to === "light") {
        document.body.classList.remove("dark");
        localStorage.setItem("theme", "light");
        choosenTheme = "light";
    } else if (
        to === "system" &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
        document.body.classList.add("dark");
        localStorage.setItem("theme", "dark");
        choosenTheme = "dark";
    } else {
        document.body.classList.remove("dark");
        localStorage.setItem("theme", "light");
        choosenTheme = "light";
    }

    return choosenTheme;
}

export { setThemeOnLoad, switchTheme };
