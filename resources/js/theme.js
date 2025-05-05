// Esta función se usa para aplicar automáticamente el tema oscuro al cargar la página,
// según lo guardado en localStorage o la preferencia del sistema operativo.
function setThemeOnLoad() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}


// alternar entre modo claro y modo oscuro,
// usando localStorage y detectando si el usuario prefiere un esquema de color oscuro por defecto en su sistema operativo.
function switchTheme() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
    } else {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
    }
}

export { setThemeOnLoad, switchTheme };
