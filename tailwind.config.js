import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./resources/views/welcome.blade.php",
        "./resources/views/partials/**/*.blade.php",
        "./resources/views/components/**/*.blade.php",
        "./resources/views/livewire/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#f0f9ff",
                    100: "#e0f2fe",
                    200: "#bae6fd",
                    300: "#7dd3fc",
                    400: "#38bdf8",
                    500: "#0ea5e9",
                    600: "#0284c7",
                    700: "#0369a1",
                    800: "#075985",
                    900: "#0c4a6e",
                    950: "#082f49",
                },
            },
            transitionProperty: {
                height: "height",
                spacing: "margin, padding",
            },
        },
        fontFamily: {
            body: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
            sans: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
        },
    },
    plugins: [
        // Using import syntax for ES modules
        function () {
            return {
                handler: function () {
                    // Flowbite plugin configuration
                },
                config: {
                    theme: {
                        extend: {
                            // Flowbite-specific theme extensions
                        },
                    },
                },
            };
        },
        // Typewriter plugin
        function () {
            return {
                handler: function () {
                    // Typewriter plugin configuration
                },
                config: {
                    theme: {
                        extend: {
                            // Typewriter configuration
                            wordsets: {
                                hero: {
                                    words: [
                                        "Ada Gangguan Jaringan?",
                                        "Butuh Konsultasi Teknis?",
                                        "Laporkan Sekarang!",
                                    ],
                                    repeat: -1,
                                    writeSpeed: 0.1,
                                    eraseSpeed: 0.05,
                                    delay: 0.5,
                                    pauseBetween: 1,
                                    caret: "|",
                                    caretClassName: "caret",
                                    lineBreak: false,
                                },
                            },
                            loop: true,
                            deleteSpeed: 0.05,
                            pauseTime: 1,
                            nextWordDelay: 0,
                            startDelay: 0.5,
                        },
                    },
                },
            };
        },
    ],
};
