<?php

include 'db.php';

$stmt = $pdo->query("SELECT * FROM secure_files ORDER BY uploaded_at DESC");
$files = $stmt->fetchAll();

?>

<h2>Uploaded Files</h2>
<ul>
    <?php foreach($files as $file): ?>
        <li>
            <a href="download.php?file=<?=urlencode($file['filename']) ?>">
                <?= htmlspecialchars($file['filename']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>