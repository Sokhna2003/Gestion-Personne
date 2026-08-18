<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter une personne</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
</head>

<body class="min-h-screen bg-gray-100">

    <div class="flex min-h-screen items-center justify-center px-4 py-10">

        <div class="w-full max-w-lg rounded-2xl bg-white p-8 shadow-lg">

            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800">
                    Ajouter une personne
                </h1>

                <p class="mt-2 text-gray-500">
                    Remplissez les informations ci-dessous
                </p>
            </div>

            <form
                action=""
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >

                <!-- Nom -->
                <div>
                    <label
                        for="nom"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Nom
                    </label>

                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        placeholder="Entrez le nom"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3
                               text-gray-700 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    >
                </div>

                <!-- Prénom -->
                <div>
                    <label
                        for="prenom"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Prénom
                    </label>

                    <input
                        type="text"
                        id="prenom"
                        name="prenom"
                        placeholder="Entrez le prénom"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3
                               text-gray-700 outline-none transition
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    >
                </div>

                <!-- Photo -->
                <div>
                    <label
                        for="photo"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Photo
                    </label>

                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        required
                        class="w-full cursor-pointer rounded-lg border border-gray-300
                               bg-gray-50 px-4 py-3 text-sm text-gray-600
                               transition hover:bg-gray-100"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        Formats acceptés : JPG, JPEG, PNG, WEBP
                    </p>
                </div>

                <!-- Bouton -->
                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3
                           font-semibold text-white transition
                           hover:bg-blue-700
                           focus:outline-none focus:ring-2
                           focus:ring-blue-300"
                >
                    Ajouter la personne
                </button>

            </form>

        </div>

    </div>

</body>

</html>
