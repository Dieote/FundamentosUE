<?php

declare(strict_types=1);

$apiUrl = 'https://fakestoreapi.com/products';
$products = [];
$errorMessage = null;

// Tiempo limite de la peticion a la API
$context = stream_context_create([
    'http' => [
        'timeout' => 8,
        'header' => "Accept: application/json\r\n",
    ],
]);

$response = @file_get_contents($apiUrl, false, $context);

if ($response === false) {
    $errorMessage = 'No se pudo conectar con la tienda. Inténtalo de nuevo más tarde.';
} else {
    try {
        $apiProducts = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($apiProducts)) {
            throw new UnexpectedValueException('La respuesta de la API no es una lista.');
        }

        $products = $apiProducts;
    } catch (JsonException | UnexpectedValueException $exception) {
        $errorMessage = 'La respuesta de la tienda no se pudo leer correctamente.';
    }
}

// MOdifica los valores antes de incluirlos en el HTML
$escape = static fn(mixed $value): string => htmlspecialchars(
    (string) $value,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Catálogo de productos de nuestra tienda educativa.">
    <title>Falsa Tienda | Catálogo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="container header-content">
            <a class="brand" href="index.php" aria-label="Falsa Tienda, inicio">
                <span class="brand-mark" aria-hidden="true">F</span>
                <span>Falsa Tienda</span>
            </a>
            <p class="header-note">Una selección para descubrir</p>
        </div>
    </header>

    <main class="container">
        <section class="catalog" aria-labelledby="catalog-title">
            <div class="catalog-heading">
                <div>
                    <p class="eyebrow">CATÁLOGO</p>
                    <h1 id="catalog-title">Encuentra algo especial</h1>
                </div>
                <?php if ($errorMessage === null): ?>
                    <p class="product-count">
                        <?= count($products) ?> productos
                    </p>
                <?php endif; ?>
            </div>

            <?php if ($errorMessage !== null): ?>
                <p class="status-message" role="alert">
                    <?= $escape($errorMessage) ?>
                </p>
            <?php elseif ($products === []): ?>
                <p class="status-message">Todavía no hay productos para mostrar.</p>
            <?php else: ?>
                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                        <article class="product-card">
                            <div class="product-image-wrap">
                                <img
                                    class="product-image"
                                    src="<?= $escape($product['image'] ?? '') ?>"
                                    alt="<?= $escape($product['title'] ?? 'Producto') ?>"
                                    loading="lazy"
                                    decoding="async">
                            </div>
                            <div class="product-details">
                                <p class="product-category">
                                    <?= $escape($product['category'] ?? 'General') ?>
                                </p>
                                <h2 class="product-title">
                                    <?= $escape($product['title'] ?? 'Producto sin título') ?>
                                </h2>
                                <div class="product-footer">
                                    <p class="product-price">
                                        $<?= number_format((float) ($product['price'] ?? 0), 2, '.', ',') ?>
                                    </p>
                                    <?php if (isset($product['rating']['rate'])): ?>
                                        <p class="product-rating" aria-label="Valoración">
                                            <span aria-hidden="true">★</span>
                                            <?= $escape($product['rating']['rate']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>Proyecto educativo · Productos proporcionados por FakeStoreAPI</p>
        </div>
    </footer>
</body>

</html>