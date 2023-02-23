<nav class="navbar navbar-expand-sm navbar-dark border-bottom" id="nav">
        <div class="container-fluid">
            <a href="../home/index.php" class="navbar-brand">AMT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#AMTHome">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="AMTHome">
                <ul class="navbar-nav me-auto" id="nav-links">
                    <li class="nav-item">
                        <a href="../market/market.php" class="nav-link" active>Markets</a>
                    </li>

                    <li class="nav-item">
                        <a href="../Editor/index.php" class="nav-link">Automation</a>
                    </li>

                    <li class="nav-item">
                        <a href="faq.html" class="nav-link">FAQs</a>
                    </li>
                </ul>

                <form class="d-flex" action="apiCalls.php" method="POST">
                    <input class="form-control mr-sm-2" type="text" name="stock" style="margin-right: 1vw;" placeholder="Search" aria-label="Search">
                    <input class="btn btn-primary" id="search" type="submit" value="Search" name="search"/>
                </form>

            </div>
        </div>
    </nav>