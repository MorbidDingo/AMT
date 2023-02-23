import yfinance as yf

tick = yf.Ticker('AETHER.NS')
print(tick.history(MAX))