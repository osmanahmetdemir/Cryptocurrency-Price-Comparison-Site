# Crypto Price Comparison Site

This project is a simple Laravel application that compares the prices of Ethereum (ETH), Binance Coin (BNB), and Bitcoin (BTC) across different exchanges using data scraped from TradingView. The site displays the lowest and highest prices for each cryptocurrency, helping users identify the best exchange for trading.

## Features

- Laravel framework for backend and frontend integration.
- Web scraping with TradingView to fetch real-time cryptocurrency prices.
- Comparison of prices from various exchanges.
- Display of the lowest and highest prices for ETH, BNB, and BTC.

![Screenshot 1](https://github.com/osmanahmetdemir/Cryptocurrency-Price-Comparison-Site/blob/main/1.jpg)
![Screenshot 2](https://github.com/osmanahmetdemir/Cryptocurrency-Price-Comparison-Site/blob/main/2.jpg)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/crypto-price-comparison-site.git
    cd crypto-price-comparison-site
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Set up your database and update the `.env` file with your database credentials.

5. Run the database migrations:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

1. Access the site at `http://localhost:8000/scrape/crypto-data`.
2. The homepage will display the current prices of ETH, BNB, and BTC across different exchanges.
3. The lowest and highest prices for each cryptocurrency will be highlighted.


