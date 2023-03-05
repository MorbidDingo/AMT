  <?php
    include('../home/head.php');
    include('../home/header.php');
?>
    <style>

        *
        {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .gradient-background {
  
}

@keyframes gradient-animation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
        body {
  /* display: grid; */
  place-content: center;
  margin: 0;
  height: 100vh;
  font-family: system-ui, sans-serif;
  background: linear-gradient(296deg,#10be6e,#d0cedb,#881dfc,#89cc11, rgb(30, 16, 228));
  background-size: 300% 300%;
  animation: gradient-animation 15s ease infinite;
  
}

        .buttons {
  margin-left: 40%;
  margin-top: 20%;
  width: 380px;
  gap: 10px;
  --b: 5px;   /* the border thickness */
  --h: 1.8em; /* the height */
}

.buttons button {
  --_c: #88C100;
  flex: calc(1.25 + var(--_s,0));
  min-width: 0;
  font-size: 40px;
  font-weight: bold;
  height: var(--h);
  cursor: pointer;
  color: var(--_c);
  border: var(--b) solid var(--_c);
  background: 
    conic-gradient(at calc(100% - 1.3*var(--b)) 0,var(--_c) 209deg, #0000 211deg) 
    border-box;
  clip-path: polygon(0 0,100% 0,calc(100% - 0.577*var(--h)) 100%,0 100%);
  padding: 0 calc(0.288*var(--h)) 0 0;
  margin: 0 calc(-0.288*var(--h)) 0 0;
  box-sizing: border-box;
  transition: flex .4s;
}
.buttons button + button {
  --_c: #FF003C;
  flex: calc(.75 + var(--_s,0));
  background: 
    conic-gradient(from -90deg at calc(1.3*var(--b)) 100%,var(--_c) 119deg, #0000 121deg) 
    border-box;
  clip-path: polygon(calc(0.577*var(--h)) 0,100% 0,100% 100%,0 100%);
  margin: 0 0 0 calc(-0.288*var(--h));
  padding: 0 0 0 calc(0.288*var(--h));
}
.buttons button:focus-visible {
  outline-offset: calc(-2*var(--b));
  outline: calc(var(--b)/2) solid #000;
  background: none;
  clip-path: none;
  margin: 0;
  padding: 0;
}
.buttons button:focus-visible + button {
  background: none;
  clip-path: none;
  margin: 0;
  padding: 0;
}
.buttons button:has(+ button:focus-visible) {
  background: none;
  clip-path: none;
  margin: 0;
  padding: 0;
}
button:hover,
button:active:not(:focus-visible) {
  --_s: .75;
}
button:active {
  box-shadow: inset 0 0 0 100vmax var(--_c);
  color: #fff;
  background-color: green !important;
}
    </style>
</head>
<body>
    <div class="buttons">
        <button><a href="../Editor/automater.php">Automater</a></button>
        <button><a href="../Editor/index.php">Editor</a></button>
      </div>    
</body>
</html>