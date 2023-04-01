const chartElement = document.getElementById('chart');
const symbolInput = document.getElementById('symbol-input');
const searchButton = document.getElementById('search-button');

let symbol = 'AAPL';
let interval = '1d';
let range = '5y';

searchButton.addEventListener('click', () => {
  symbol = symbolInput.value.toUpperCase();
  fetchData();
});

document.getElementById('1d-button').addEventListener('click', () => {
  interval = '1m';
  range = '3d';
  fetchData();
});

document.getElementById('1w-button').addEventListener('click', () => {
  interval = '5m';
  range = '1mo';
  fetchData();
});

document.getElementById('1m-button').addEventListener('click', () => {
  interval = '15m';
  range = '1mo';
  fetchData();
});

document.getElementById('3m-button').addEventListener('click', () => {
  interval = '1d';
  range = '7y';
  fetchData();
});

document.getElementById('1y-button').addEventListener('click', () => {
  interval = '1wk';
  range = '10y';
  fetchData();
});

function fetchData() {
  const url = `https://query1.finance.yahoo.com/v8/finance/chart/${symbol}?interval=${interval}&range=${range}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const ohlcData = data.chart.result[0].indicators.quote[0];

      const timestamps = data.chart.result[0].timestamp.map(t => t * 1000);
      const openValues = ohlcData.open;
      const highValues = ohlcData.high;
      const lowValues = ohlcData.low;
      const closeValues = ohlcData.close;

      plotChart(timestamps, openValues, highValues, lowValues, closeValues);
    });
}

function plotChart(timestamps, openValues, highValues, lowValues, closeValues) {
    chartElement.innerHTML = '';
  
    const chart = LightweightCharts.createChart(chartElement, {
      width: chartElement.clientWidth,
      height: 500,
    });
  
    const candlestickSeries = chart.addCandlestickSeries();
  
    const data = [];
    for (let i = 0; i < timestamps.length; i++) {
      data.push({
        time: timestamps[i],
        open: openValues[i],
        high: highValues[i],
        low: lowValues[i],
        close: closeValues[i],
      });
    }
  
    candlestickSeries.setData(data);
  
    const crosshair = chart.addCrosshair();
    ({
      horzLine: {
        visible: false,
      },
      vertLine: {
        visible: true,
        color: 'rgba(255, 0, 0, 0.5)',
        width: 1,
        style: 0,
      },
    });

    
  }

  const crosshairElement = document.getElementById('crosshair');
crosshairElement.innerHTML = '<div class="crosshair"></div>';

  
  
  
