class DarkModeToggle {
    private themeToggleBtn: HTMLButtonElement | null;
    public themeToggleDarkIcon: HTMLElement | null;
    public themeToggleLightIcon: HTMLElement | null;

    constructor(themeToggleBtn: HTMLButtonElement) {
        // Receives the btn element responsible of toggling the dark mode
        this.themeToggleBtn = themeToggleBtn;
        this.themeToggleDarkIcon = this.themeToggleBtn.querySelector(
            ".theme-toggle-dark-icon"
        );
        this.themeToggleLightIcon = this.themeToggleBtn.querySelector(
            ".theme-toggle-light-icon"
        );
        this.onPageLoadIcons();
        this.themeToggleBtn.addEventListener(
            "click",
            this.themeToggle.bind(this)
        );
    }

    public themeToggle() {
        // toggle icons inside button
        this.themeToggleDarkIcon?.classList.toggle("hidden");
        this.themeToggleLightIcon?.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    }
    public onPageLoadIcons() {
        if (
            localStorage.getItem("color-theme") === "dark" ||
            (!("color-theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            this.themeToggleLightIcon?.classList.remove("hidden");
        } else {
            this.themeToggleDarkIcon?.classList.remove("hidden");
        }
    }
    static onPageLoad() {
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (
            localStorage.getItem("color-theme") === "dark" ||
            (!("color-theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    }
}

function initDarkModes() {
    DarkModeToggle.onPageLoad();

    document
        .querySelectorAll('[arena-component="dark-mode-toggle"]')
        .forEach((button) => {
            new DarkModeToggle(button as HTMLButtonElement);
        });
}

export default initDarkModes;
