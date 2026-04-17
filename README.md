專案說明
========

本專案為競賽試題解題範例，主要內容集中在子資料夾 `00_module_d`，該資料夾為一個 Laravel 應用程式。

根目錄結構
---------

- `00_module_d/`：Laravel 10 應用程式專案目錄
- `README.md`：本說明文件

00_module_d 專案內容
----------------

`00_module_d` 是本工作區的主要專案，內含 Laravel 10 應用程式架構：

- `app/`：應用程式核心程式（Models、HTTP Controllers、Middleware、Providers）
- `bootstrap/`：框架啟動程式、快取檔案
- `config/`：設定檔
- `database/`：資料庫 migration、seed、factory
- `public/`：Web 根目錄入口（`index.php`）
- `resources/`：Blade、前端資源、CSS/JS
- `routes/`：路由設定 (`web.php`, `api.php`, `channels.php`, `console.php`)
- `storage/`：快取、session、檔案上傳、view 快取
- `tests/`：測試程式
- `vendor/`：Composer 相依套件

系統版本與相依性
---------------

- Laravel 框架：`laravel/framework` 版本 10.x
- PHP：`^8.1`
- 前端工具：Vite
- Node 套件：`axios`, `laravel-vite-plugin`, `vite`

快速啟動
-------

請先切換到 `00_module_d` 目錄：

```bash
cd 00_module_d
```

1. 安裝 PHP 相依套件

```bash
composer install
```

2. 安裝 Node 相依套件（如果需要編譯前端資源）

```bash
npm install
```

3. 建立環境設定檔

如果尚未有 `.env`，請複製範例檔：

```bash
cp .env.example .env
```

4. 產生應用程式金鑰

```bash
php artisan key:generate
```

5. 設定資料庫

請在 `.env` 中設定 `DB_CONNECTION`、`DB_HOST`、`DB_PORT`、`DB_DATABASE`、`DB_USERNAME`、`DB_PASSWORD`。

6. 執行 migration 建立資料表

```bash
php artisan migrate
```

7. 啟動開發伺服器

```bash
php artisan serve
```

預設會在 `http://127.0.0.1:8000` 啟動。

常用指令
-------

- 產生 Model、Migration、Controller：

```bash
php artisan make:model {名稱} -mcr
```

- 清除快取：

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

- 編譯前端資源（開發模式）：

```bash
npm run dev
```

- 編譯前端資源（正式版）：

```bash
npm run build
```

- 執行測試：

```bash
phpunit
```

補充說明
-------

- `00_module_d` 為本專案的主要 Laravel 應用程式，其他目錄目前無專案內容。
- 若執行 `composer install` 後出現 `.env` 缺失，請先執行 `cp .env.example .env`。
- 若資料庫連線或 migration 失敗，請先檢查 `.env` 的資料庫設定與 MySQL / MariaDB 是否已啟動。
- 若要開發前端功能，請使用 `npm run dev` 或 `npm run build`。
