<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $err = session('errors') ?? []; $action = $row ? "customers/{$row['id']}/update" : 'customers/create'; ?>
<h1><?= esc($title) ?></h1>
<form method="post" action="<?= site_url($action) ?>" novalidate>
  <?= csrf_field() ?>
  <?php foreach (['full_name' => 'Full name', 'email' => 'Email', 'phone' => 'Phone (optional)'] as $f => $label): ?>
  <label><?= $label ?>
    <input name="<?= $f ?>" value="<?= esc(old($f, $row[$f] ?? '')) ?>" class="<?= isset($err[$f]) ? 'bad' : '' ?>">
    <?php if (isset($err[$f])): ?><small><?= esc($err[$f]) ?></small><?php endif ?>
  </label>
  <?php endforeach ?>
  <button class="btn"><?= $row ? 'Save changes' : 'Add customer' ?></button>
  <a href="<?= site_url('customers') ?>">Cancel</a>
</form>
<?= $this->endSection() ?>
