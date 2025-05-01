# 📘 1行日記 - One Line Diary (Laravel 12)

Laravel 12 で構築されたシンプルな日記投稿サイトです。  
画像付きで1行の日記を投稿・編集・削除・一覧表示できます。

---

## 📦 機能一覧

- 日記の新規投稿（画像付き）
- 投稿済み日記の編集・削除
- 一覧ページに5件ずつページネーション
- 日記ごとに1枚の画像（JPG）アップロード
- 一覧ページに画像サムネイル表示

---

## 🚀 セットアップ手順

### 1. リポジトリをクローン

```bash
git clone https://github.com/fullstack-senior27/diary-app.git
cd diary-app
```

### 2. 環境構築（PHP/Laravel）

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. データベース設定
.env ファイル内の以下を自身の環境に合わせて編集してください。

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diary_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. マイグレーション & ストレージリンク

```bash
php artisan migrate
php artisan storage:link
```

### 5. フロントエンド構築（Tailwind CSS + Vite）

```bash
npm install
npm run dev
```

### 6. アプリケーションの起動

```bash
php artisan serve
```

ブラウザでアクセス：
```bash
http://127.0.0.1:8000/diaries
```