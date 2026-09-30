# TFA3 · Ledger POS (CodeIgniter 4)

Forms, validation, edit workflow, and avatar upload for customers and users.

## Run on XAMPP
1. Extract this folder to `C:\xampp\htdocs\tfa3-pos` (keep the folder name, or update `app.baseURL` in `.env`).
2. Start Apache and MySQL, open phpMyAdmin, and import `database.sql`.
3. Visit http://localhost/tfa3-pos/public/

Needs PHP 8.2+ with the `intl`, `mbstring`, and `gd` extensions (all on by default in current XAMPP).

## Pages
`/customers`, `/customers/new`, `/customers/{id}/edit`, `/users`, `/users/new`, `/users/{id}/edit`

Avatars: JPG or PNG up to 2MB. A 150x150 thumbnail goes to `public/uploads/avatars/thumbs/`, the original to `public/uploads/avatars/`, and only the filename is stored in `users.avatar`.

## GitHub Pages demo
`docs/index.html` is a static, browser-only demo. In the repo go to Settings > Pages > Deploy from branch > `main` / `/docs`.
