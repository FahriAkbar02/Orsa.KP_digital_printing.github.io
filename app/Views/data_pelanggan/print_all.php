<!-- File: app/Views/path_to_your_view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ringkasan Item</title>
</head>

<body>

    <h1>Ringkasan Item</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemSummary as $itemName => $details) : ?>
                <tr>
                    <td><?= esc($itemName); ?></td>
                    <td><?= esc($details['jumlah']); ?></td>
                    <td>Rp<?= number_format($details['harga_total'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>