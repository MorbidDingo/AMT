import yfinance as yf
tick = yf.Ticker('AAPL')
print(tick.history(period='1d' interval='15m'))
