<nav class="navbar navbar-expand-sm navbar-dark" id="nav">
        <div class="container-fluid">
            <a href="../home/index.php" class="navbar-brand animate__animated animate__slideInDown">AMT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#AMTHome">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="AMTHome">
                <ul class="navbar-nav me-auto" id="nav-links" style="text-align: center;">
                    <li class="nav-item">
                        <a href="../market/market.php" class="nav-link" active>Markets</a>
                    </li>

                    <li class="nav-item">
                        <a href="../Editor/enterAutomation.php" class="nav-link">Automation</a>
                    </li>

                    <li class="nav-item">
                        <a href="faq.html" class="nav-link">FAQs</a>
                    </li>
                </ul>

                <a class="btn btn-primary" href="../funds/displaytable.php" role="button">Funds +</a>
                <form action="../login/destroy.php" method="post">
                    <input type="submit" class="btn btn-primary" name="destroy" value="Logout" style="margin-left: 1rem;">
                </form>
            </div>
        </div>
    </nav>