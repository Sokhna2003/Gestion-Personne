<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des personnes</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>

</head>

<body class="min-h-screen bg-gray-100">

    <div class="flex min-h-screen items-center justify-center px-4">

        <div class="w-full max-w-2xl">

            <!-- Présentation -->
            <div class="mb-10 text-center">

                <div
                    class="mx-auto mb-5 flex h-16 w-16 items-center
                           justify-center rounded-2xl bg-blue-600
                           text-2xl font-bold text-white shadow-lg"
                >
                    GP
                </div>

                <h1 class="text-4xl font-bold text-gray-800">
                    Gestion des personnes
                </h1>

                <p class="mx-auto mt-3 max-w-lg text-gray-500">
                    Ajoutez et consultez les personnes enregistrées
                    dans votre application.
                </p>

            </div>

            <!-- Actions -->
            <div class="grid gap-6 sm:grid-cols-2">

                <!-- Ajouter -->
                <a
                    href="../views/personnes/ajouter.php"
                    class="group rounded-2xl bg-white p-8 shadow-md
                           transition duration-300
                           hover:-translate-y-1 hover:shadow-xl"
                >

                    <div
                        class="mb-5 flex h-12 w-12 items-center
                               justify-center rounded-xl bg-blue-100
                               text-blue-600"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15"
                            />
                        </svg>
                    </div>

                    <h2 class="text-xl font-bold text-gray-800">
                        Ajouter une personne
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-gray-500">
                        Enregistrer une nouvelle personne avec son nom,
                        son prénom et sa photo.
                    </p>

                    <span
                        class="mt-5 inline-block font-semibold text-blue-600
                               transition group-hover:translate-x-1"
                    >
                        Ajouter →
                    </span>

                </a>

                <!-- Liste -->
                <a
                    href="../views/personnes/lister.php"
                    class="group rounded-2xl bg-white p-8 shadow-md
                           transition duration-300
                           hover:-translate-y-1 hover:shadow-xl"
                >

                    <div
                        class="mb-5 flex h-12 w-12 items-center
                               justify-center rounded-xl bg-green-100
                               text-green-600"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                    </div>

                    <h2 class="text-xl font-bold text-gray-800">
                        Liste des personnes
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-gray-500">
                        Consulter toutes les personnes enregistrées
                        avec leurs photos.
                    </p>

                    <span
                        class="mt-5 inline-block font-semibold text-green-600
                               transition group-hover:translate-x-1"
                    >
                        Voir la liste →
                    </span>

                </a>

            </div>

            <!-- Footer -->
            <p class="mt-10 text-center text-sm text-gray-400">
                Application PHP & MySQL
            </p>

        </div>

    </div>

</body>

</html>
