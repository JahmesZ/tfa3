<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="bar"><h1>Customers</h1><a class="btn" href="<?= site_url('customers/new') ?>">New customer</a></div>
<table>
  <tr><th>ID</th><th>Full name</th><th>Email</th><th>Phone</th><th></th></tr>
  <?php foreach ($rows as $r): ?>
  <tr><td><?= $r['id'] ?></td><td><?= esc($r['full_name']) ?></td><td><?= esc($r['email']) ?></td><td><?= esc($r['phone'] ?? '') ?></td>
      <td><a href="<?= site_url("customers/{$r['id']}/edit") ?>">Edit</a></td></tr>
  <?php endforeach ?>
</table>
<?= $this->endSection() ?>
