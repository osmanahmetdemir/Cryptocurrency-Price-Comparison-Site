<!-- resources/views/crypto.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binance Crypto Prices</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- CSS dosyasını dahil etmek için -->
</head>
<body>
    <h1>Binance Crypto Prices</h1>

    <div class="crypto-container">
        <div class="crypto-table">
            <h2>BTCUSDT Prices</h2>
            @if(count($btcPrices) > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pair</th>
                        <th>Exchange</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1 @endphp
                    @foreach($btcPrices as $index => $rowData)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>BTC/USDT</td>
                        <td>{{ $rowData[1] }}</td>
                        <td class="price">{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $rowData[2]))), 2, '.', ',') }} USDT</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No BTC data available.</p>
            @endif
        </div>

        <div class="crypto-table">
            <h2>ETHUSDT Prices</h2>
            @if(count($ethPrices) > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pair</th>
                        <th>Exchange</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1 @endphp
                    @foreach($ethPrices as $index => $rowData)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>ETH/USDT</td>
                        <td>{{ $rowData[1] }}</td>
                        <td class="price">{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $rowData[2]))), 2, '.', ',') }} USDT</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No ETH data available.</p>
            @endif
        </div>

        <div class="crypto-table">
            <h2>BNBUSDT Prices</h2>
            @if(count($bnbPrices) > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pair</th>
                        <th>Exchange</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1 @endphp
                    @foreach($bnbPrices as $index => $rowData)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>BNB/USDT</td>
                        <td>{{ $rowData[1] }}</td>
                        <td class="price">{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $rowData[2]))), 2, '.', ',') }} USDT</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No BNB data available.</p>
            @endif
        </div>
    </div>

    <h2 style="text-align: center; margin-top: 40px;">Minimum and Maximum Prices</h2>
    <div class="min-max-table-container">
        <table class="min-max-table">
            <thead>
                <tr>
                    <th>Crypto Pair</th>
                    <th>Minimum Price</th>
                    <th>Maximum Price</th>
                    <th>Exchange for Minimum Price</th>
                    <th>Exchange for Maximum Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>BTCUSDT</td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $btcMinMax['minPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $btcMinMax['maxPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td>{{ $btcMinMax['minExchange'] }}</td>
                    <td>{{ $btcMinMax['maxExchange'] }}</td>
                </tr>
                <tr>
                    <td>ETHUSDT</td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $ethMinMax['minPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $ethMinMax['maxPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td>{{ $ethMinMax['minExchange'] }}</td>
                    <td>{{ $ethMinMax['maxExchange'] }}</td>
                </tr>
                <tr>
                    <td>BNBUSDT</td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $bnbMinMax['minPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td><b>{{ number_format(floatval(str_replace(',', '.', str_replace('.', '', $bnbMinMax['maxPrice']))), 2, '.', ',') }} USDT</b></td>
                    <td>{{ $bnbMinMax['minExchange'] }}</td>
                    <td>{{ $bnbMinMax['maxExchange'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
