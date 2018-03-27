[![Build Status](https://travis-ci.org/mnshankar/UtilityBehaviors.png)](https://travis-ci.org/mnshankar/UtilityBehaviors)
[![Coverage Status](https://coveralls.io/repos/mnshankar/UtilityBehaviors/badge.png?branch=master)](https://coveralls.io/r/mnshankar/UtilityBehaviors?branch=master)
[![Total Downloads](https://poser.pugx.org/mnshankar/utility_behaviors/d/total.png)](https://packagist.org/packages/mnshankar/utility_behaviors)
[![Latest Stable Version](https://poser.pugx.org/mnshankar/utility_behaviors/v/stable.png)](https://packagist.org/packages/mnshankar/utility_behaviors)

Simple Linear Regression
========================

This package is used to compute simple linear regression parameters using PHP.
It can be used to closely mimic the output of excel regression computation add-in.
(Here is a good how-to and intro if you are unfamiliar with this feature: http://www.excel-easy.com/examples/regression.html)

Installation
------------

Add the LinearRegression package as a dependency to your composer.json file:

```javascript
{
    "require": {
        "mnshankar/LinearRegression": "1.0.*"
    }
}
```

Using the tool
--------------
The unit tests (in the tests folder) contain a wealth of information regarding the API.
Basically, you load up the X and Y columns (from arrays or a CSV) and run the compute() method
to generate all the regression parameters :-)
```php
$reg = new \mnshankar\LinearRegression\Regression();
$reg->setX($this->getXForTesting());
$reg->setY($this->getYForTesting());
$reg->Compute();
```
Note: To account for the intercept, the first element of all X arrays is forced to be 1. 

Please refer to the Excel workbook named "Regression_Verification.xlsx" in the tests folder. 
The worksheet named "Calculated Values" contains all parameters generated by the excel add-in 
using data in the worksheet named "Raw Data". 

The unit tests for regression computation (RegressionTest.php) verifies that this 
same data is generated by the PHP package.