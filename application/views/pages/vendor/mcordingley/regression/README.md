# Regression

[![Build Status](https://api.travis-ci.org/repositories/mcordingley/Regression.svg)](https://travis-ci.org/mcordingley/Regression)
[![Code Climate](https://codeclimate.com/github/mcordingley/Regression/badges/gpa.svg)](https://codeclimate.com/github/mcordingley/Regression)
[![Code Climate](https://codeclimate.com/github/mcordingley/Regression/badges/coverage.svg)](https://codeclimate.com/github/mcordingley/Regression)

## What Is This All About?

This is a library for regression analysis of data. That is, it attempts to find the line of best fit to describe a relationship within the data. It takes in a series of training observations, each consisting of features and an outcome, and finds how much each feature contributes to the outcome.

As a concrete example, consider house prices. Square footage, the number of bathrooms, the age of the house, and whether or not the house has a finished basement may all affect the final sale price of a home. For thoroughly contrived reasons, you want to start pricing houses in your area. You'd find a bunch of homes that had already sold and enter their square footage, etc. as features and their sale prices as outcomes and then run a regression with that data. You'd get on the other end of the process how much each square foot is worth, each bathroom is worth, etc. With that information, you could then start to predict the price of new homes that come onto the market and have not sold. If your model is solid, you'll find out which houses are overpriced or underpriced!

This library also handles logistic regression, in which the outcomes are booleans. In this case, the regression would give you how much each feature contributes to the probability of the outcome and the prediction process would give you the probability of the outcome for a given new example.

## Quick Start

As always, start with Composer:

    composer require mcordingley/Regression

For those who cannot or do not want to use Composer in a given project, you can pull down a copy of this library and run
`composer install` followed by `php build-phar.php` to generate a PHAR archive that can be included into your project.

Your first step in running a regression will be to load your data into an `Observations` object. This can be done either
with individual training examples with `$observations->add($exampleFeatures, $outcome);` or in bulk with
`Observations::fromArray($arrayOfExampleFeatures, $arrayOfOutcomes)`. For most uses, you will want to add one additional
feature to the beginning of your feature list for each training example. This will be the number `1.0`, which represents
the y-intercept term. If omitted, the regression line will be forced through the origin. Note that you can also create
derived features, such as the square or log of some feature, if its contribution to the outcome is non-linear.

You then can create an instance of `LeastSquares` and call `regress` on it with your collection of observations.
Depending on the size of your dataset, this make take some time to execute, but it will return an array of coefficients
representing the relative effect of each feature on the outcomes. If you included `1.0` as your first feature for each
training example, then the first coefficient will be the y-intercept. Pass these coefficients into a `Predictor` object
to immediately start predicting the outcomes for new data or store them for later use.

**Warning:** Regression can be computationally expensive, especially if you're using gradient descent. Always run your
regressions off-line, either as nightly batch jobs or through some queue service. Predictions are cheap and can be done
on-line with the coefficients generated by an off-line regression.

Putting it all together:

```php
use MCordingley\Regression\Algorithm\LeastSquares;
use MCordingley\Regression\Observations;
use MCordingley\Regression\Predictor\Linear;

$observations = new Observations;

// Load the data
foreach ($data as $datum) {
    // Note addition of a constant for the first feature.
    $observations->add(array_merge([1.0], $datum->features), $datum->outcome);
}

$algorithm = new LeastSquares;
$coefficients = $algorithm->regress($observations);

$predictor = new Linear($coefficients);
$predictedOutcome = $predictor->predict(array_merge([1.0], $hypotheticalFeatures));
```

## Gathering Regression Statistics

For linear regression, it's possible to obtain detailed statistics about how well the regression fits the data. Doing so
is relatively simple and best if done immediately after performing a regression. Details on what each term means and how
to interpret them is a bigger subject than can be covered in this documentation, but the there is
[an entry](http://blog.minitab.com/blog/adventures-in-statistics/regression-analysis-tutorial-and-examples) on the
Minitab blog that provides a good start on interpreting your regression.

```php
use MCordingley\StatisticsGatherer\Linear;

$gatherer = new Linear($observations, $coefficients, $predictor);

$gatherer->getFStatistic(); // etc.
```

## Logistic Regression

Logistic regression is implemented by way of gradient descent, which is detailed below. The key things when doing a
logistic regression are that you use an instance of the `GradientDescent` algorithm with the `Logistic` gradient to
perform the regression. Your `Schedule` and `StoppingCriteria` should be picked to best match your data and which
descent algorithm you've chosen.

Given below is an example with what should be your default setup. This configuration is appropriate for most
logistic regressions. Note that you will want to normalize your features before feeding them in.

```php
use MCordingley\Regression\Algorithm\GradientDescent\Batch;
use MCordingley\Regression\Algorithm\GradientDescent\Schedule\Adam;
use MCordingley\Regression\Algorithm\GradientDescent\Gradient\Logistic as LogisticGradient;
use MCordingley\Regression\Algorithm\GradientDescent\StoppingCriteria\GradientNorm;
use MCordingley\Regression\Observations;
use MCordingley\Regression\Predictor\Logistic as LogisticPredictor;

$algorithm = new Batch(new LogisticGradient, new Adam, new GradientNorm);
$coefficients = $algorithm->regress(Observations::fromArray($features, $outcomes));

$predictor = new LogisticPredictor($coefficients);
$predictedOutcomeProbability = $predictor->predict($novelFeatures);
```

## Gradient Descent

Sometimes, LeastSquares regression is not a viable option. This can happen if the data set becomes too large to be run
through LeastSquares in a reasonable amount of time or if performing logistic regression, though certainly other, more
esoteric, reasons may exist. In these cases, we find an approximate solution through an iterative numeric process called
"gradient descent". Putting together an effective descent regression can be a complicated process with many different
options. These options are detailed below.

### Normalizing Features

Most of the time, you will want to normalize your features before feeding them in to the `Observations` class. What this
means is altering your data so that each feature has an average of zero and unit variance. Intuitively, this
"straightens" the path of the descent process, leading to a much quicker convergence on a result. Sometimes, this can be
the difference between a rapid convergence and a regression that fails to converge.

While it isn't necessary to have the average and variance brought exactly to zero and one, respectively, it helps to
bring them within an order of magnitude of these values. In the GradientDescent tests, for example, the GRE scores are divided
by 100 to bring them within the range of zero to ten. Boolean features are allowed to remain as `0.0` or `1.0`, as those
values are very close, as is.

Fully normalizing a feature can be achieved by this formula: `($value - $averageOfValue) / $standardDeviationOfValue`,
though if calculating the standard deviation is too much trouble, then
`($value - $averageOfValue) / ($maxOfValue - $minOfValue)` can work just as well. More details can be found on
[this blog post](http://www.benetzkorn.com/2011/11/data-normalization-and-standardization/).

### Choice of Algorithm

Currently, there are three main descent algorithms to choose from: `Batch`, `Stochastic`, and `MiniBatch`. `Batch` will
go through all of the data for each iteration. This can take longer, but leads to much more stable descent processes and
should be your default choice. `Stochastic` uses just a single, randomly-drawn example from the training data for each
iteration. For very large data sets, this can lead to faster convergence than the `Batch` process, but
has the disadvantage of being much noisier on a per-iteration basis. `MiniBatch` is a blend of the other two approaches
in which random batches of a specified size are drawn from the set of training data. This leads to somewhat more stable
data on each iteration than `Stochastic`, but still avoids having to deal with the entire data set with each iteration.

The `Adam` step schedule is a good default for all gradient descents. The `GradientNorm` stopping criteria works well
for `Batch` descents. Convergence is considerably trickier for `Stochastic` and `MiniBatch` descents. Right now, the
recommendation is to run enough iterations to bring the descent close to convergence and then halt it with
`MaxIterations`. To get the descent to settle as it converges, wrap your descent schedule with `ExponentialDecay`,
giving it the same value for its scale as you did for the max iterations. The logistic test data used to test `Batch`
settles near convergence after 10,000,000 iterations with the `Stochastic` descent and the recommended schedule.

When starting with a new project, it helps to tinker with the different options to find the best fit for your data. The
`DescentSpy` stopping criteria is supplied to aid in this process. It decorates another stopping criteria and will call
a specified callback on each iteration before delegating to the decorated stopping criteria. There is an example use of
this class in the GradientDescent test folder with the `DescentDebugger` trait used to tune the descent test cases.

## Over-Fitting and Regularization

It's possible for a regression to select coefficients that more accurately describe the training data at the cost of
accuracy against novel data from the same process being modeled. This is known as "over-fitting". There are a few
different ways to combat this. One method is "cross-validation" in which a portion of the training data is kept aside
from the regression and is used to check how accurately the resulting regression model describes novel data.

Another tool to fight over-fitting is called "regularization" and involves building a penalty against each coefficient
that scales with how far the coefficient strays from zero. The `Regularized` class decorates another `Gradient` instance
and provides this functionality to the gradient descent process. Pass `1` into its constructor for L1 regularization or
`2` for L2 regularization. Regularization for LeastSquares is planned for when an elegant implementation can be found
that works for both L1 and L2 regularization.

L2 regularization spreads the penalty across coefficients, penalizing larger coefficients more heavily than small ones.
This is good at reducing overall over-fitting and should be the default choice. L1 regularization penalizes coefficients
equally no matter their size. This tends to drive the coefficients for unneeded features down to zero.

These concepts are discussed in more detail [on MSDN](https://msdn.microsoft.com/magazine/dn904675.aspx). Scroll down to
"Understanding Regularization".

## Extending the Library

The entire library is written against interfaces
with as much functionality as possible pulled out into collaborating objects. This means that you can easily swap in
your own classes in place of the provided ones. In particular, the `Gradient`, `Schedule`, and `StoppingCriteria`
interfaces are intended points of extension. If you have written an implementation of one of these that you think would
be of use to others, please submit it with accompanying tests in a pull request.

## Change Log

2.2.0

- Extract interfaces from `Observations` and `Observation`.

2.1.0

- Add InverseRootDecay
- Add ExponentialDecay

2.0.0

- Require PHP 7.0 or higher.
- Require LinearAlgebra version 2.
- Capitalize namespaces.
- Add scalar and return type hints.
- Make setters on `Observations` fluent.

1.1.0

- Add `Adam` update schedule.
- Tweak default values for `RmpsProp`.
- Add `NthIteration` criteria decorator.
- Add `SteppedCriteria` criteria decorator.

1.0.0

- First stable release.
