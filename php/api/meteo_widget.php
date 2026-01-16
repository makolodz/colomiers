<?php include __DIR__ . '/meteo.php'; ?>
<link rel="stylesheet" href="./css/meteo.css">
<div class="meteo-widget">
    <strong>Météo - <?php echo ($ville) ?></strong>
    <div class="meteo-days">
        <?php foreach (array_slice($previsions, 0, 3) as $jour): ?>
            <div class="meteo-day">
                <div><?= date('d/m', strtotime($jour['date'])) ?></div>
                <img src="https://openweathermap.org/img/wn/<?= $jour['icon'] ?>.png" alt="">
                <div><?= $jour['temp'] ?>°C</div>
                <small><?= ($jour['desc']) ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</div>