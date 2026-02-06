Railway deployment instructions for gestions_voitures

Quick steps

1. Connect your GitHub repo to Railway and choose Docker deploy.
2. In Railway project settings -> Variables, add these env vars (do NOT commit .env):
   - `APP_KEY` (generate locally: `php artisan key:generate --show`)
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=https://<your-app>.up.railway.app`
   - `DB_CONNECTION=mysql` or provide `DATABASE_URL`
   - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (if using Railway MySQL plugin)
   - `SESSION_DRIVER=database`
   - `QUEUE_CONNECTION=database`

3. Deploy: Railway will build the Dockerfile. Ensure `PORT` is set by Railway (container will listen on it).

4. After first deploy, run (Railway "Run"):
```
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
```

Notes
- Keep `.env` out of the repo. Use Railway environment variables.
- If you prefer, decompose `DATABASE_URL` into DB_HOST/DB_USERNAME/etc.
- Monitor logs via Railway to debug runtime errors.
