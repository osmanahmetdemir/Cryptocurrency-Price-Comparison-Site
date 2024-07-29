<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class CryptoPriceController extends Controller
{
    public function scrapeCryptoData()
    {
        $btcUrl = 'https://tr.tradingview.com/symbols/BTCUSDT/markets/?exchange=BINANCE';
        $ethUrl = 'https://tr.tradingview.com/symbols/ETHUSDT/markets/?exchange=BINANCE';
        $bnbUrl = 'https://tr.tradingview.com/symbols/BNBUSDT/markets/?exchange=BINANCE';

        // BTC için verileri çekme
        $btcPrices = $this->fetchPrices($btcUrl);

        // ETH için verileri çekme
        $ethPrices = $this->fetchPrices($ethUrl);

        // BNB için verileri çekme
        $bnbPrices = $this->fetchPrices($bnbUrl);

        // En yüksek ve en düşük fiyatları ve borsalarını bulma
        $btcMinMax = $this->findMinMaxPrice($btcPrices);
        $ethMinMax = $this->findMinMaxPrice($ethPrices);
        $bnbMinMax = $this->findMinMaxPrice($bnbPrices);

        return view('crypto-price', [
            'btcPrices' => $btcPrices,
            'ethPrices' => $ethPrices,
            'bnbPrices' => $bnbPrices,
            'btcMinMax' => $btcMinMax,
            'ethMinMax' => $ethMinMax,
            'bnbMinMax' => $bnbMinMax,
        ]);
    }

    private function fetchPrices($url)
    {
        // Goutte kullanarak TradingView sayfasını çekme
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $prices = [];

        // TradingView'den çekilen tablodaki her tr elementini al
        $crawler->filterXPath('//*[@id="js-category-content"]/div[2]/div/div[2]/div[2]/div[2]/div/div/table/tbody/tr')->each(function ($row) use (&$prices) {
            $rowData = [];

            // Sadece ilk üç td elementini al (Column 1, Column 2, Column 3)
            $row->filter('td')->slice(0, 3)->each(function ($td) use (&$rowData) {
                $rowData[] = $td->text();
            });

            // $prices dizisine her satırı ekle
            $prices[] = $rowData;
        });

        return $prices;
    }

    private function findMinMaxPrice($prices)
    {
        $minPrice = null;
        $maxPrice = null;
        $minExchange = '';
        $maxExchange = '';

        foreach ($prices as $priceData) {
            $price = $priceData[2];
            $exchange = $priceData[1];

            if ($minPrice === null || $price < $minPrice) {
                $minPrice = $price;
                $minExchange = $exchange;
            }
            if ($maxPrice === null || $price > $maxPrice) {
                $maxPrice = $price;
                $maxExchange = $exchange;
            }
        }

        return [
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'minExchange' => $minExchange,
            'maxExchange' => $maxExchange,
        ];
    }
}
