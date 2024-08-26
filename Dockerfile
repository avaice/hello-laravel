# 基盤となるイメージを指定
FROM php:8.3-fpm

# 作業ディレクトリを設定
WORKDIR /var/www/html

# 必要なPHP拡張機能をインストール
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Composerをインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravelプロジェクトをコピー
COPY . .

# 必要なパーミッションを設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Composerで依存関係をインストール
RUN composer install --optimize-autoloader --no-dev

# ポートを指定
EXPOSE 9000

# 起動コマンド
CMD ["php-fpm"]
