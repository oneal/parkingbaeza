<?php
header("Content-Type: text/xml");
echo "<?xml version='1.0' encoding='iso-8859-1' ?>
<urlset xmlns='https://www.sitemaps.org/schemas/sitemap/0.9'>";

echo "<url>
    <loc>".config('app.url')."</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "<url>
    <loc>".config('app.url')."/donde-estamos</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "<url>
    <loc>".config('app.url')."/galeria</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "<url>
    <loc>".config('app.url')."/reserva-tu-plaza</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "<url>
    <loc>".config('app.url')."/tarifas</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "<url>
    <loc>".config('app.url')."/contacto</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>";

echo "</urlset>";
?>
