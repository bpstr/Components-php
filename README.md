# components-php
PHP classes for Bootstrap HTML Components



## Charts implemented
* Line
* Bar
* Radar
* Polar Area
* Pie & Doughnut


## How to use
Include Chart.js and chart.js-php.js before the end of your body (change src according to your project)
```` php
require_once("Components.php"); 
````
It is possible to use inside any class or with PHP blocks.
```html
<html>
  <body>
    <!-- Using inside PHP blocks -->
    <?php echo new Component(); ?>
  </body>
</html>
```

Load ChartJS-PHP classes or use an autoloader
```php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
```

Then, create your charts using PHP. 
```php
$Line = new ChartJS_Line('example', 500, 500);
$Line->addLine(array(1, 2, 3, 4));
$Line->addLabels(array('A label', 'Another', 'Another one', 'The last one'));

// Echo your line
echo $Line;
?>
```

Finally, load these charts with a small piece of javascript when your document is ready
```js
// Pure JS document.ready
(function() {
  loadChartJsPhp();
})();
```

## Advanced use (colors, etc)
Have a look at the wiki (soon)

## Full example
```php
<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';

$Line = new ChartJS_Line('example', 500, 500);
$Line->addLine(array(1, 2, 3, 4));
$Line->addLabels(array('A label', 'Another', 'Another one', 'The last one'));

?><!DOCTYPE html>
<html>
  <head>
    <title>Chart.js-PHP</title>
  </head>
  <body>
    <?php
      echo $Line;
    ?>		
    <script src="Chart.js"></script>
    <script src="chart.js-php.js"></script>
    <script>
      (function() {
        loadChartJsPhp();
      })();
    </script>
  </body>
</html>
```

## Contributing
Do not hesitate to edit or improve my code with bugfix and new functionnalities !