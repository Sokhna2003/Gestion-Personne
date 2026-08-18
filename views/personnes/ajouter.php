<?php

require_once __DIR__ . "/../../controllers/PersonneController.php";

$message = "";
$typeMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"] ?? "");
    $prenom = trim($_POST["prenom"] ?? "");

    if ($nom === "" || $prenom === "") {

        $message = "Veuillez remplir tous les champs.";
        $typeMessage = "error";

    } elseif (!isset($_FILES["photo"]) || $_FILES["photo"]["error"] !== UPLOAD_ERR_OK) {

        $message = "Veuillez sélectionner une photo valide.";
        $typeMessage = "error";

    } else {

        $photo = $_FILES["photo"];

        // Taille maximale : 5 Mo
        $tailleMax = 5 * 1024 * 1024;

        // Types MIME autorisés
        $typesAutorises = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];

        // Vérification de la taille
        if ($photo["size"] > $tailleMax) {

            $message = "La photo ne doit pas dépasser 5 Mo.";
            $typeMessage = "error";

        // Vérification du type réel du fichier
        } elseif (!in_array($photo["type"], $typesAutorises, true)) {

            $message = "Format de photo non autorisé. Utilisez JPG, PNG ou WEBP.";
            $typeMessage = "error";

        } else {

            // Vérification supplémentaire du contenu de l'image
            $imageInfo = getimagesize($photo["tmp_name"]);

            if ($imageInfo === false) {

                $message = "Le fichier sélectionné n'est pas une image valide.";
                $typeMessage = "error";

            } else {

                $photoData = file_get_contents($photo["tmp_name"]);

                $controller = new PersonneController();

                $resultat = $controller->ajouter(
                    $nom,
                    $prenom,
                    $photoData
                );

                if ($resultat) {

                    $message = "La personne a été ajoutée avec succès.";
                    $typeMessage = "success";

                } else {

                    $message = "Une erreur est survenue lors de l'ajout.";
                    $typeMessage = "error";
                }
            }
        }
    }
}

?>

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

            <?php if ($message !== ""): ?>

                <div
                    class="mb-6 rounded-lg px-4 py-3 text-sm font-medium
                    <?= $typeMessage === "success"
                        ? "bg-green-100 text-green-700"
                        : "bg-red-100 text-red-700" ?>"
                >
                    <?= htmlspecialchars($message) ?>
                </div>

            <?php endif; ?>

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
                        value="<?= htmlspecialchars($_POST["nom"] ?? "") ?>"
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
                        value="<?= htmlspecialchars($_POST["prenom"] ?? "") ?>"
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
