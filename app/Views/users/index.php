<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="bar"><h1>User accounts</h1><a class="btn" href="<?= site_url('users/new') ?>">New user</a></div>
<table>
  <tr><th></th><th>Username</th><th>Full name</th><th></th></tr>
  <?php foreach ($rows as $r): ?>
  <tr>
    <td><img class="av" alt="" src="<?= $r['avatar'] ? base_url('uploads/avatars/thumbs/' . $r['avatar']) : base_url('assets/placeholder.svg') ?>"></td>
    <td><?= esc($r['username']) ?></td><td><?= esc($r['full_name']) ?></td>
    <td><a href="<?= site_url("users/{$r['id']}/edit") ?>">Edit</a></td>
  </tr>
  <?php endforeach ?>
</table>
<?= $this->endSection() ?>
