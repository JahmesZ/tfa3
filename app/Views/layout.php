<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= esc($title ?? 'POS') ?> · Ledger POS</title>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Playfair+Display:wght@600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
<header>
  <a class="brand" href="<?= site_url('customers') ?>">Ledger POS</a>
  <nav><a href="<?= site_url('customers') ?>">Customers</a><a href="<?= site_url('users') ?>">Users</a></nav>
</header>
<main>
  <?php if (session('ok')): ?><p class="flash"><?= esc(session('ok')) ?></p><?php endif ?>
  <?= $this->renderSection('content') ?>
</main>
</body>
</html>
