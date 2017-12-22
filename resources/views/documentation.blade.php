<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>How to Test</title>
</head>
<body>
<div class="container">

    <div class="page-header">
        <h1 class="title">API Guide</h1>
    </div>
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h2>Requirements</h2>
                <p>
                    &bull; PHP 5.4 or higher
                    <br/>
                    <br/>
                    &bull; Apache Server
                    <br/>
                    <br/>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h2>About</h2>
                <p>This application was developed using the Laravel Framework in version 5.4 and implemented using Repository Pattern.</p>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h2>How to use</h2>
                <h3>Products <span class="badge badge-success">GET</span></h3>
                <pre class=" language-none"><code class="language-none">http://localhost/api/products</code></pre>
            </div>
            <div class="col-xs-12">
                <h3>
                    Attributes
                </h3>
                <ul class="method-list-group">
                    <li class="method-list-item" id="errors-type">
                        <h3>
                            q
                        </h3>
                        <p class="method-list-item-description">
                            This attribute is used to filter products by their specifications. If it is necessary to send more than 1 specification the values can be separated by <code class="highlighter-rouge">+</code>
                        </p>
                        <pre class=" language-none"><code class="language-none">http://localhost/api/products?q=vegan+lactose-free</code></pre>
                    </li>
                    <li class="method-list-item" id="errors-message">
                        <h3>
                            order
                        </h3>
                        <p class="method-list-item-description">
                            This attribute is used to set the order of products at the price. The values that can be used are <code class="highlighter-rouge">ASC</code> and <code class="highlighter-rouge">DESC</code>
                        </p>
                        <pre class=" language-none"><code class="language-none">http://localhost/api/products?order=asc</code></pre>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br/>





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>