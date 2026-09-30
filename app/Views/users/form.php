<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $err = session('errors') ?? []; $action = $row ? "users/{$row['id']}/update" : 'users/create'; ?>
<h1><?= esc($title) ?></h1>
<form method="post" action="<?= site_url($action) ?>" enctype="multipart/form-data" novalidate>
  <?= csrf_field() ?>
  <?php foreach (['username' => 'Username', 'full_name' => 'Full name'] as $f => $label): ?>
  <label><?= $label ?>
    <input name="<?= $f ?>" value="<?= esc(old($f, $row[$f] ?? '')) ?>" class="<?= isset($err[$f]) ? 'bad' : '' ?>">
    <?php if (isset($err[$f])): ?><small><?= esc($err[$f]) ?></small><?php endif ?>
  </label>
  <?php endforeach ?>
  <?php if ($row): ?>
  <label>Profile picture (JPG or PNG, max 2MB)
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png" class="<?= isset($err['avatar']) ? 'bad' : '' ?>">
    <?php if (isset($err['avatar'])): ?><small><?= esc($err['avatar']) ?></small><?php endif ?>
  </label>
  <img class="av big" alt="" src="<?= $row['avatar'] ? base_url('uploads/avatars/thumbs/' . $row['avatar']) : base_url('assets/placeholder.svg') ?>">
  <?php endif ?>
  <button class="btn"><?= $row ? 'Save changes' : 'Add user' ?></button>
  <a href="<?= site_url('users') ?>">Cancel</a>
</form>
<?= $this->endSection() ?>
