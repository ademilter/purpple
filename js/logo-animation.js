/*
 * Animate svg filter
 */

var animRq, animateFilter, blurElement, defaults, easeOutExpo, matrixElement, timeout, toggle;
blurElement = document.getElementById('blur-element');
matrixElement = document.getElementById('matrix-element');
animRq = null;

easeOutExpo = function (t, b, c, d) {
  return c * (-Math.pow(2, -10 * t / d) + 1) + b;
};

animateFilter = function (duration) {
  var animationStart, blurChange, blurStart, doAnimation, matrixAlphaChange, matrixLightnessChange, matrixValueAlpha, matrixValueLightness, matrixValues;
  blurStart = parseInt(blurElement.getAttribute('stdDeviation'), 10);
  matrixValues = matrixElement.getAttribute('values').split(' ');
  animationStart = +new Date();
  matrixValueAlpha = parseInt(matrixValues[18], 10);
  matrixValueLightness = parseInt(matrixValues[19], 10);
  blurChange = -blurStart;
  matrixAlphaChange = 1 - matrixValueAlpha;
  matrixLightnessChange = -matrixValueLightness;
  doAnimation = function () {
    var newBlur, newMatrixAlpha, newMatrixLightness, now, step;
    now = +new Date();
    if (now >= animationStart + duration) {
      blurElement.setAttribute('stdDeviation', 0);
      matrixValues[18] = 1;
      matrixValues[19] = 0;
      matrixElement.setAttribute('values', matrixValues.join(' '));
      return;
    }
    step = now - animationStart;
    newBlur = Math.floor(easeOutExpo(step, blurStart, blurChange, duration) * 10000) / 10000;
    newMatrixAlpha = Math.floor(easeOutExpo(step, matrixValueAlpha, matrixAlphaChange, duration) * 10000) / 10000;
    newMatrixLightness = Math.floor(easeOutExpo(step, matrixValueLightness, matrixLightnessChange, duration) * 10000) / 10000;
    blurElement.setAttribute('stdDeviation', newBlur);
    matrixValues[18] = newMatrixAlpha;
    matrixValues[19] = newMatrixLightness;
    matrixElement.setAttribute('values', matrixValues.join(' '));
    return animRq = requestAnimationFrame(doAnimation);
  };
  return requestAnimationFrame(doAnimation);
};

///////////

setTimeout(function () {
  animateFilter(1500);
  document.body.classList.toggle('OynatUgurcum');
}, 600);