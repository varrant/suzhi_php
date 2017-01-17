;(function(window) {

  var svgSprite = '<svg>' +
    '' +
    '<symbol id="icon-wode" viewBox="0 0 1024 1024">' +
    '' +
    '<path d="M830.439074 859.58437c-18.325367-131.954311-107.8708-232.498238-231.726665-264.730337C685.350628 560.119951 746.543316 475.371778 746.543316 376.320854c0-129.98547-105.374956-235.360426-235.360426-235.360426-129.984447 0-235.360426 105.374956-235.360426 235.360426 0 99.105159 61.260226 183.894264 147.97417 218.591507C299.338041 627.394147 209.584877 728.884632 191.995267 861.889879c-0.440022 1.455141-0.681522 2.996241-0.681522 4.594645 0 8.760524 7.100722 15.861246 15.861246 15.861246s15.861246-7.100722 15.861246-15.861246c0-0.873903-0.089028-1.726318-0.225127-2.562359C243.302817 722.902384 364.666932 614.574167 511.367085 614.574167c147.59043 0 269.553179 109.640096 288.935622 251.910357l0.00921 0c0 8.760524 7.100722 15.861246 15.861246 15.861246s15.861246-7.100722 15.861246-15.861246C832.035432 864.008122 831.451124 861.672938 830.439074 859.58437zM306.52165 376.320854c0-107.379613 97.281627-204.66124 204.66124-204.66124 107.380636 0 204.66124 97.281627 204.66124 204.66124 0 107.380636-97.280604 204.66124-204.66124 204.66124C403.803277 580.982094 306.52165 483.70149 306.52165 376.320854z"  ></path>' +
    '' +
    '</symbol>' +
    '' +
    '<symbol id="icon-renwu" viewBox="0 0 1024 1024">' +
    '' +
    '<path d="M727.62 86.394h-93.452v-9.359c0-11.74-13.981-21.257-31.235-21.257h-187.491c-17.255 0-31.244 9.517-31.244 21.257v9.359h-88.289c-69.935 0-126.628 56.693-126.628 126.63v628.256c0 69.942 56.693 126.637 126.628 126.637h431.709c69.942 0 126.63-56.693 126.63-126.637v-628.257c0.001-69.935-56.686-126.628-126.628-126.628zM831.75 841.278c0 57.427-46.711 104.139-104.13 104.139h-431.709c-57.419 0-104.13-46.711-104.13-104.139v-628.256c0-57.419 46.711-104.13 104.13-104.13h88.289v10.659c0 11.74 13.988 21.258 31.244 21.258h187.491c17.254 0 31.235-9.518 31.235-21.258v-10.659h93.452c57.419 0 104.13 46.711 104.13 104.13v628.256z"  ></path>' +
    '' +
    '<path d="M316.688 624.222l-20.098-16.661-11.526 13.907 34.003 28.212 46.147-55.653-13.915-11.535z"  ></path>' +
    '' +
    '<path d="M316.688 446.367l-20.098-16.666-11.526 13.907 34.003 28.208 46.147-55.649-13.915-11.535z"  ></path>' +
    '' +
    '<path d="M316.688 268.512l-20.098-16.667-11.526 13.909 34.003 28.207 46.147-55.649-13.915-11.535z"  ></path>' +
    '' +
    '<path d="M316.688 802.081l-20.098-16.662-11.526 13.902 34.003 28.21 46.147-55.646-13.915-11.543z"  ></path>' +
    '' +
    '<path d="M731.049 249.587h-290.075c-4.095 0-7.412 4.827-7.412 10.782s3.317 10.78 7.412 10.78h290.075c4.101 0 7.411-4.827 7.411-10.78s-3.31-10.782-7.411-10.782z"  ></path>' +
    '' +
    '<path d="M731.049 427.443h-290.075c-4.095 0-7.412 4.818-7.412 10.78 0 5.948 3.317 10.782 7.412 10.782h290.075c4.101 0 7.411-4.834 7.411-10.782-0.001-5.962-3.31-10.78-7.411-10.78z"  ></path>' +
    '' +
    '<path d="M731.049 605.297h-290.075c-4.095 0-7.412 4.82-7.412 10.782 0 5.948 3.317 10.782 7.412 10.782h290.075c4.101 0 7.411-4.834 7.411-10.782-0.001-5.962-3.31-10.782-7.411-10.782z"  ></path>' +
    '' +
    '<path d="M731.049 783.156h-290.075c-4.095 0-7.412 4.82-7.412 10.782 0 5.948 3.317 10.782 7.412 10.782h290.075c4.101 0 7.411-4.834 7.411-10.782-0.001-5.962-3.31-10.782-7.411-10.782z"  ></path>' +
    '' +
    '</symbol>' +
    '' +
    '<symbol id="icon-shouyeshouye" viewBox="0 0 1024 1024">' +
    '' +
    '<path d="M949.082218 519.343245 508.704442 107.590414 68.326667 518.133697c-8.615215 8.03193-9.096169 21.538549-1.043772 30.144554 8.043187 8.599865 21.566178 9.085936 30.175253 1.035586l411.214573-383.337665 411.232992 384.505257c4.125971 3.854794 9.363252 5.760191 14.5903 5.760191 5.690606 0 11.384281-2.260483 15.58393-6.757914C958.138478 540.883841 957.695387 527.388479 949.082218 519.343245L949.082218 519.343245zM949.082218 519.343245M814.699602 527.800871c-11.787464 0-21.349237 9.555633-21.349237 21.327748l0 327.037405L622.552373 876.166023 622.552373 648.662543 394.824789 648.662543l0 227.503481L224.032938 876.166023 224.032938 549.128619c0-11.772115-9.55154-21.327748-21.348214-21.327748-11.802814 0-21.35333 9.555633-21.35333 21.327748l0 369.691877 256.19494 0L437.526333 691.318038l142.329613 0 0 227.502457 256.1888 0L836.044746 549.128619C836.045769 537.356504 826.481949 527.800871 814.699602 527.800871L814.699602 527.800871zM814.699602 527.800871M665.254941 222.095307l128.095423 0 0 113.74867c0 11.789511 9.562796 21.332864 21.349237 21.332864 11.783371 0 21.346167-9.543354 21.346167-21.332864L836.045769 179.439812 665.254941 179.439812c-11.789511 0-21.35333 9.538237-21.35333 21.327748C643.900587 212.554 653.464407 222.095307 665.254941 222.095307L665.254941 222.095307zM665.254941 222.095307"  ></path>' +
    '' +
    '</symbol>' +
    '' +
    '</svg>'
  var script = function() {
    var scripts = document.getElementsByTagName('script')
    return scripts[scripts.length - 1]
  }()
  var shouldInjectCss = script.getAttribute("data-injectcss")

  /**
   * document ready
   */
  var ready = function(fn) {
    if (document.addEventListener) {
      if (~["complete", "loaded", "interactive"].indexOf(document.readyState)) {
        setTimeout(fn, 0)
      } else {
        var loadFn = function() {
          document.removeEventListener("DOMContentLoaded", loadFn, false)
          fn()
        }
        document.addEventListener("DOMContentLoaded", loadFn, false)
      }
    } else if (document.attachEvent) {
      IEContentLoaded(window, fn)
    }

    function IEContentLoaded(w, fn) {
      var d = w.document,
        done = false,
        // only fire once
        init = function() {
          if (!done) {
            done = true
            fn()
          }
        }
        // polling for no errors
      var polling = function() {
        try {
          // throws errors until after ondocumentready
          d.documentElement.doScroll('left')
        } catch (e) {
          setTimeout(polling, 50)
          return
        }
        // no errors, fire

        init()
      };

      polling()
        // trying to always fire before onload
      d.onreadystatechange = function() {
        if (d.readyState == 'complete') {
          d.onreadystatechange = null
          init()
        }
      }
    }
  }

  /**
   * Insert el before target
   *
   * @param {Element} el
   * @param {Element} target
   */

  var before = function(el, target) {
    target.parentNode.insertBefore(el, target)
  }

  /**
   * Prepend el to target
   *
   * @param {Element} el
   * @param {Element} target
   */

  var prepend = function(el, target) {
    if (target.firstChild) {
      before(el, target.firstChild)
    } else {
      target.appendChild(el)
    }
  }

  function appendSvg() {
    var div, svg

    div = document.createElement('div')
    div.innerHTML = svgSprite
    svgSprite = null
    svg = div.getElementsByTagName('svg')[0]
    if (svg) {
      svg.setAttribute('aria-hidden', 'true')
      svg.style.position = 'absolute'
      svg.style.width = 0
      svg.style.height = 0
      svg.style.overflow = 'hidden'
      prepend(svg, document.body)
    }
  }

  if (shouldInjectCss && !window.__iconfont__svg__cssinject__) {
    window.__iconfont__svg__cssinject__ = true
    try {
      document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>");
    } catch (e) {
      console && console.log(e)
    }
  }

  ready(appendSvg)


})(window)