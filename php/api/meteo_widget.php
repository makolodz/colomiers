<?php include __DIR__ . '/meteo.php'; ?>
<link rel="stylesheet" href="./css/meteo.css">
<div class="meteo-widget">
    <strong>Météo - <?php echo ($ville) ?></strong>
    <div class="meteo-day">
        <div><?= ($jour['desc']) ?></div>
        <div><?= $jour['temp'] ?>°C</div>
        <img src="https://openweathermap.org/img/wn/<?= $jour['icon'] ?>.png" alt="">
    </div>
</div>