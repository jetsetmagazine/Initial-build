(function (f, g, b, e, c, d, z) { /*! Jssor */
    $Jssor$ = f.$Jssor$ = f.$Jssor$ || {};
    new(function () {});
    var n = function () {
        var b = this,
            a = {};
        b.$On = b.addEventListener = function (b, c) {
            if (typeof c != "function") return;
            if (!a[b]) a[b] = [];
            a[b].push(c)
        };
        b.$Off = b.removeEventListener = function (e, d) {
            var b = a[e];
            if (typeof d != "function") return;
            else if (!b) return;
            for (var c = 0; c < b.length; c++)
                if (d == b[c]) {
                    b.splice(c, 1);
                    return
                }
        };
        b.q = function (e) {
            var c = a[e],
                d = [];
            if (!c) return;
            for (var b = 1; b < arguments.length; b++) d.push(arguments[b]);
            for (var b = 0; b < c.length; b++) try {
                c[b].apply(f, d)
            } catch (g) {}
        }
    }, h;
    (function () {
        h = function (a, b) {
            this.x = typeof a == "number" ? a : 0;
            this.y = typeof b == "number" ? b : 0
        };
    })();
    var m = f.$JssorEasing$ = {
        $EaseLinear: function (a) {
            return a
        },
        $EaseGoBack: function (a) {
            return 1 - b.abs(2 - 1)
        },
        $EaseSwing: function (a) {
            return -b.cos(a * b.PI) / 2 + .5
        },
        $EaseInQuad: function (a) {
            return a * a
        },
        $EaseOutQuad: function (a) {
            return -a * (a - 2)
        },
        $EaseInOutQuad: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a : -1 / 2 * (--a * (a - 2) - 1)
        },
        $EaseInCubic: function (a) {
            return a * a * a
        },
        $EaseOutCubic: function (a) {
            return (a -= 1) * a * a + 1
        },
        $EaseInOutCubic: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a : 1 / 2 * ((a -= 2) * a * a + 2)
        },
        $EaseInQuart: function (a) {
            return a * a * a * a
        },
        $EaseOutQuart: function (a) {
            return -((a -= 1) * a * a * a - 1)
        },
        $EaseInOutQuart: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a * a : -1 / 2 * ((a -= 2) * a * a * a - 2)
        },
        $EaseInQuint: function (a) {
            return a * a * a * a * a
        },
        $EaseOutQuint: function (a) {
            return (a -= 1) * a * a * a * a + 1
        },
        $EaseInOutQuint: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a * a * a : 1 / 2 * ((a -= 2) * a * a * a * a + 2)
        },
        $EaseInSine: function (a) {
            return 1 - b.cos(a * b.PI / 2)
        },
        $EaseOutSine: function (a) {
            return b.sin(a * b.PI / 2)
        },
        $EaseInOutSine: function (a) {
            return -1 / 2 * (b.cos(b.PI * a) - 1)
        },
        $EaseInExpo: function (a) {
            return a == 0 ? 0 : b.pow(2, 10 * (a - 1))
        },
        $EaseOutExpo: function (a) {
            return a == 1 ? 1 : -b.pow(2, -10 * a) + 1
        },
        $EaseInOutExpo: function (a) {
            return a == 0 || a == 1 ? a : (a *= 2) < 1 ? 1 / 2 * b.pow(2, 10 * (a - 1)) : 1 / 2 * (-b.pow(2, -10 * --a) + 2)
        },
        $EaseInCirc: function (a) {
            return -(b.sqrt(1 - a * a) - 1)
        },
        $EaseOutCirc: function (a) {
            return b.sqrt(1 - (a -= 1) * a)
        },
        $EaseInOutCirc: function (a) {
            return (a *= 2) < 1 ? -1 / 2 * (b.sqrt(1 - a * a) - 1) : 1 / 2 * (b.sqrt(1 - (a -= 2) * a) + 1)
        },
        $EaseInElastic: function (a) {
            if (!a || a == 1) return a;
            var c = .3,
                d = .075;
            return -(b.pow(2, 10 * (a -= 1)) * b.sin((a - d) * 2 * b.PI / c))
        },
        $EaseOutElastic: function (a) {
            if (!a || a == 1) return a;
            var c = .3,
                d = .075;
            return b.pow(2, -10 * a) * b.sin((a - d) * 2 * b.PI / c) + 1
        },
        $EaseInOutElastic: function (a) {
            if (!a || a == 1) return a;
            var c = .45,
                d = .1125;
            return (a *= 2) < 1 ? -.5 * b.pow(2, 10 * (a -= 1)) * b.sin((a - d) * 2 * b.PI / c) : b.pow(2, -10 * (a -= 1)) * b.sin((a - d) * 2 * b.PI / c) * .5 + 1
        },
        $EaseInBack: function (a) {
            var b = 1.70158;
            return a * a * ((b + 1) * a - b)
        },
        $EaseOutBack: function (a) {
            var b = 1.70158;
            return (a -= 1) * a * ((b + 1) * a + b) + 1
        },
        $EaseInOutBack: function (a) {
            var b = 1.70158;
            return (a *= 2) < 1 ? 1 / 2 * a * a * (((b *= 1.525) + 1) * a - b) : 1 / 2 * ((a -= 2) * a * (((b *= 1.525) + 1) * a + b) + 2)
        },
        $EaseInBounce: function (a) {
            return 1 - m.$EaseOutBounce(1 - a)
        },
        $EaseOutBounce: function (a) {
            return a < 1 / 2.75 ? 7.5625 * a * a : a < 2 / 2.75 ? 7.5625 * (a -= 1.5 / 2.75) * a + .75 : a < 2.5 / 2.75 ? 7.5625 * (a -= 2.25 / 2.75) * a + .9375 : 7.5625 * (a -= 2.625 / 2.75) * a + .984375
        },
        $EaseInOutBounce: function (a) {
            return a < 1 / 2 ? m.$EaseInBounce(a * 2) * .5 : m.$EaseOutBounce(a * 2 - 1) * .5 + .5
        },
        $EaseInWave: function (a) {
            return 1 - b.cos(a * b.PI * 2)
        },
        $EaseOutWave: function (a) {
            return b.sin(a * b.PI * 2)
        },
        $EaseOutJump: function (a) {
            return 1 - ((a *= 2) < 1 ? (a = 1 - a) * a * a : (a -= 1) * a * a)
        },
        $EaseInJump: function (a) {
            return (a *= 2) < 1 ? a * a * a : (a = 2 - a) * a * a
        }
    }, i = {
            $TO_LEFT: 1,
            $TO_RIGHT: 2,
            $TO_TOP: 4,
            $TO_BOTTOM: 8,
            $HORIZONTAL: 3,
            $VERTICAL: 12,
            Fe: function (a) {
                return (~a & 3) + (a & 12)
            },
            He: function (a) {
                return (~a & 12) + (a & 3)
            },
            Tc: function (a) {
                return (a & 3) == 1
            },
            Uc: function (a) {
                return (a & 3) == 2
            },
            Vc: function (a) {
                return (a & 12) == 4
            },
            Qc: function (a) {
                return (a & 12) == 8
            },
            Rc: function (a) {
                return (a & 3) > 0
            },
            Sc: function (a) {
                return (a & 12) > 0
            }
        }, q = {
            je: 37,
            ee: 39
        }, p, o = {
            qf: 0,
            rf: 1,
            mf: 2,
            nf: 3,
            of: 4,
            lf: 5
        }, y = 1,
        u = 2,
        w = 3,
        v = 4,
        x = 5,
        l, a = new function () {
            var i = this,
                l = o.qf,
                k = 0,
                r = 0,
                N = 0,
                cb = navigator.appName,
                q = navigator.userAgent;

            function U() {
                if (!l && cb == "Microsoft Internet Explorer" && !! f.attachEvent && !! f.ActiveXObject) {
                    var a = q.indexOf("MSIE");
                    l = o.rf;
                    r = parseFloat(q.substring(a + 5, q.indexOf(";", a))); /*@cc_on N=@_jscript_version@*/ ;
                    k = g.documentMode || r
                }
            }

            function P() {
                var a = /(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(q);
                if (a) {
                    l = o.lf;
                    k = parseFloat(a[2])
                }
            }

            function E() {
                if (!l && cb == "Netscape" && !! f.addEventListener) {
                    var b = q.indexOf("Firefox"),
                        a = q.indexOf("Safari"),
                        c = q.indexOf("Chrome");
                    if (b >= 0) {
                        l = o.mf;
                        k = parseFloat(q.substring(b + 8))
                    } else if (a >= 0) {
                        var d = q.substring(0, a).lastIndexOf("/");
                        l = c >= 0 ? o.of : o.nf;
                        k = parseFloat(q.substring(d + 1, a))
                    }
                }
            }

            function m() {
                U();
                return l == y
            }

            function A() {
                return m() && (k < 6 || g.compatMode == "BackCompat")
            }

            function S() {
                E();
                return l == u
            }

            function X() {
                E();
                return l == w
            }

            function W() {
                E();
                return l == v
            }

            function ib() {
                P();
                return l == x
            }

            function fb() {
                return X() && k >= 5.1 && k < 6
            }

            function s() {
                return m() && k < 9
            }
            var K;

            function J(a) {
                !K && n(["transform", "WebkitTransform", "msTransform", "MozTransform", "OTransform"], function (b) {
                    if (!i.ld(a.style[b])) {
                        K = b;
                        return c
                    }
                });
                return K
            }

            function ab(a) {
                return Object.prototype.toString.call(a)
            }
            var G;

            function n(a, c) {
                if (ab(a) == "[object Array]") {
                    for (var b = 0; b < a.length; b++)
                        if (c(a[b], b, a)) break
                } else
                    for (var d in a)
                        if (c(a[d], d, a)) break
            }

            function jb() {
                if (!G) {
                    G = {};
                    n(["Boolean", "Number", "String", "Function", "Array", "Date", "RegExp", "Object"], function (a) {
                        G["[object " + a + "]"] = a.toLowerCase()
                    })
                }
                return G
            }

            function t(a) {
                return a == e ? String(a) : jb()[ab(a)] || "object"
            }

            function bb(b, a) {
                setTimeout(b, a || 0)
            }

            function C(b, d, c) {
                var a = !b || b == "inherit" ? "" : b;
                n(d, function (c) {
                    var b = c.exec(a);
                    if (b) {
                        var d = a.substr(0, b.index),
                            e = a.substr(b.lastIndex + 1, a.length - (b.lastIndex + 1));
                        a = d + e
                    }
                });
                a = c + (a.indexOf(" ") != 0 ? " " : "") + a;
                return a
            }

            function T(b, a) {
                if (k < 9) b.style.filter = a
            }

            function gb(b, a, c) {
                if (N < 9) {
                    var e = b.style.filter,
                        g = new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),
                        f = a ? "progid:DXImageTransform.Microsoft.Matrix(M11=" + a[0][0] + ", M12=" + a[0][1] + ", M21=" + a[1][0] + ", M22=" + a[1][1] + ", SizingMethod='auto expand')" : "",
                        d = C(e, [g], f);
                    T(b, d);
                    i.wd(b, c.y);
                    i.sd(b, c.x)
                }
            }
            i.pf = m;
            i.Ab = S;
            i.vd = X;
            i.Ob = W;
            i.Ve = ib;
            i.Pb = s;
            i.Ue = function () {
                return r || k
            };
            i.$Delay = bb;
            i.S = function (a) {
                if (i.Cc(a)) a = g.getElementById(a);
                return a
            };
            i.Rb = function (a) {
                return a ? a : f.event
            };
            i.vc = function (a) {
                a = i.Rb(a);
                var b = new h;
                if (a.type == "DOMMouseScroll" && S() && k < 3) {
                    b.x = a.screenX;
                    b.y = a.screenY
                } else if (typeof a.pageX == "number") {
                    b.x = a.pageX;
                    b.y = a.pageY
                } else if (typeof a.clientX == "number") {
                    b.x = a.clientX + g.body.scrollLeft + g.documentElement.scrollLeft;
                    b.y = a.clientY + g.body.scrollTop + g.documentElement.scrollTop
                }
                return b
            };
            i.wc = function (b) {
                if (m() && r < 9) {
                    var a = /opacity=([^)]*)/.exec(b.style.filter || "");
                    return a ? parseFloat(a[1]) / 100 : 1
                } else return parseFloat(b.style.opacity || "1")
            };
            i.pb = function (c, a, f) {
                if (m() && r < 9) {
                    var h = c.style.filter || "",
                        i = new RegExp(/[\s]*alpha\([^\)]*\)/g),
                        e = b.round(100 * a),
                        d = "";
                    if (e < 100 || f) d = "alpha(opacity=" + e + ") ";
                    var g = C(h, [i], d);
                    T(c, g)
                } else c.style.opacity = a == 1 ? "" : b.round(a * 100) / 100
            };

            function M(d, a) {
                var h = W() ? 10 : 100,
                    g = b.round((a.$Rotate || 0) * h) / h,
                    c = b.round((a.qc == 0 ? 0 : a.qc || 1) * 100) / 100;
                if (s()) {
                    var j = i.Xe(g / 180 * b.PI, c, c);
                    gb(d, !g && c == 1 ? e : j, i.Qe(j, a.gb, a.jb))
                } else {
                    var m = "rotate(" + g % 360 + "deg) scale(" + c + ")",
                        f = J(d),
                        l = d.style[f],
                        n = new RegExp(/[\s]*rotate\(.*?\)/g),
                        o = new RegExp(/[\s]*scale\(.*?\)/g),
                        k = C(l, [n, o], m);
                    if (f) d.style[f] = k
                }
            }
            i.Pe = function (b, a) {
                if (fb()) bb(i.s(e, M, b, a));
                else M(b, a)
            };
            i.Re = function (b, c) {
                var a = J(b);
                if (a) b.style[a + "Origin"] = c
            };
            i.Te = function (a, c) {
                if (m() && r < 9 || r < 10 && A()) a.style.zoom = c == 1 ? "" : c;
                else {
                    var b = J(a);
                    if (b) {
                        var f = "scale(" + c + ")",
                            e = a.style[b],
                            g = new RegExp(/[\s]*scale\(.*?\)/g),
                            d = C(e, [g], f);
                        a.style[b] = d
                    }
                }
            };
            i.f = function (a, c, d, b) {
                a = i.S(a);
                if (a.addEventListener) {
                    c == "mousewheel" && a.addEventListener("DOMMouseScroll", d, b);
                    a.addEventListener(c, d, b)
                } else if (a.attachEvent) {
                    a.attachEvent("on" + c, d);
                    b && a.setCapture && a.setCapture()
                }
            };
            i.Ze = function (a, c, d, b) {
                a = i.S(a);
                if (a.removeEventListener) {
                    c == "mousewheel" && a.removeEventListener("DOMMouseScroll", d, b);
                    a.removeEventListener(c, d, b)
                } else if (a.detachEvent) {
                    a.detachEvent("on" + c, d);
                    b && a.releaseCapture && a.releaseCapture()
                }
            };
            i.gf = function (b, a) {
                i.f(s() ? g : f, "mouseup", b, a)
            };
            i.sb = function (a) {
                a = i.Rb(a);
                a.preventDefault && a.preventDefault();
                a.cancel = c;
                a.returnValue = d
            };
            i.s = function (d, c) {
                for (var b = [], a = 2; a < arguments.length; a++) b.push(arguments[a]);
                return function () {
                    for (var e = b.concat([]), a = 0; a < arguments.length; a++) e.push(arguments[a]);
                    return c.apply(d, e)
                }
            };
            i.hf = function (a, c) {
                var b = g.createTextNode(c);
                i.uc(a);
                a.appendChild(b)
            };
            i.uc = function (a) {
                a.innerHTML = ""
            };
            i.Gb = function (c) {
                for (var b = [], a = c.firstChild; a; a = a.nextSibling) a.nodeType == 1 && b.push(a);
                return b
            };

            function I(a, c, b, f) {
                if (!b) b = "u";
                for (a = a ? a.firstChild : e; a; a = a.nextSibling)
                    if (a.nodeType == 1) {
                        if (a.getAttribute(b) == c) return a;
                        if (f) {
                            var d = I(a, c, b, f);
                            if (d) return d
                        }
                    }
            }
            i.x = I;

            function O(a, c, d) {
                for (a = a ? a.firstChild : e; a; a = a.nextSibling)
                    if (a.nodeType == 1) {
                        if (a.tagName == c) return a;
                        if (d) {
                            var b = O(a, c, d);
                            if (b) return b
                        }
                    }
            }
            i.af = O;

            function Q(a, d, g) {
                var b = [];
                for (a = a ? a.firstChild : e; a; a = a.nextSibling)
                    if (a.nodeType == 1) {
                        (!d || a.tagName == d) && b.push(a);
                        if (g) {
                            var f = Q(a, d, c);
                            if (f.length) b = b.concat(f)
                        }
                    }
                return b
            }
            i.Ec = Q;
            i.cf = function (b, a) {
                return b.getElementsByTagName(a)
            };
            i.g = function (c) {
                for (var b = 1; b < arguments.length; b++) {
                    var a = arguments[b];
                    if (a)
                        for (var d in a) c[d] = a[d]
                }
                return c
            };
            i.ld = function (a) {
                return t(a) == "undefined"
            };
            i.Gc = function (a) {
                return t(a) == "function"
            };
            i.zb = Array.isArray || function (a) {
                return t(a) == "array"
            };
            i.Cc = function (a) {
                return t(a) == "string"
            };
            i.hc = function (a) {
                return !isNaN(parseFloat(a)) && isFinite(a)
            };
            i.d = n;
            i.Ib = function (a) {
                return i.Ac("DIV", a)
            };
            i.df = function (a) {
                return i.Ac("SPAN", a)
            };
            i.Ac = function (b, a) {
                a = a || g;
                return a.createElement(b)
            };
            i.W = function () {};
            i.dc = function (a, b) {
                return a.getAttribute(b)
            };
            i.xc = function (b, c, a) {
                b.setAttribute(c, a)
            };
            i.zc = function (a) {
                return a.className
            };
            i.Fc = function (b, a) {
                b.className = a ? a : ""
            };
            i.Wd = function (b, a) {
                b.style.cursor = a
            };
            i.ae = function (a) {
                return a.style.display
            };
            i.Mb = function (b, a) {
                b.style.display = a
            };
            i.Y = function (b, a) {
                b.style.overflow = a
            };
            i.db = function (a) {
                return a.parentNode
            };
            i.nb = function (a) {
                i.Mb(a, "none")
            };
            i.v = function (a, b) {
                i.Mb(a, b == d ? "none" : "")
            };
            i.Qd = function (a) {
                return a.style.position
            };
            i.z = function (b, a) {
                b.style.position = a
            };
            i.pc = function (a) {
                return parseInt(a.style.top, 10)
            };
            i.u = function (a, b) {
                a.style.top = b + "px"
            };
            i.Wb = function (a) {
                return parseInt(a.style.left, 10)
            };
            i.t = function (a, b) {
                a.style.left = b + "px"
            };
            i.m = function (a) {
                return parseInt(a.style.width, 10)
            };
            i.J = function (c, a) {
                c.style.width = b.max(a, 0) + "px"
            };
            i.l = function (a) {
                return parseInt(a.style.height, 10)
            };
            i.K = function (c, a) {
                c.style.height = b.max(a, 0) + "px"
            };
            i.md = function (a) {
                return a.style.cssText
            };
            i.Xb = function (b, a) {
                b.style.cssText = a
            };
            i.jd = function (b, a) {
                b.removeAttribute(a)
            };
            i.sd = function (b, a) {
                b.style.marginLeft = a + "px"
            };
            i.wd = function (b, a) {
                b.style.marginTop = a + "px"
            };
            i.mb = function (a) {
                return parseInt(a.style.zIndex) || 0
            };
            i.ab = function (c, a) {
                c.style.zIndex = b.ceil(a)
            };
            i.od = function (b, a) {
                b.style.backgroundColor = a
            };
            i.Ld = function () {
                return m() && k < 10
            };
            i.Md = function (d, c) {
                if (c) d.style.clip = "rect(" + b.round(c.$Top) + "px " + b.round(c.$Right) + "px " + b.round(c.$Bottom) + "px " + b.round(c.$Left) + "px)";
                else {
                    var g = i.md(d),
                        f = [new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i), new RegExp(/[\s]*cliptop: .*?[;]?/i), new RegExp(/[\s]*clipright: .*?[;]?/i), new RegExp(/[\s]*clipbottom: .*?[;]?/i), new RegExp(/[\s]*clipleft: .*?[;]?/i)],
                        e = C(g, f, "");
                    a.Xb(d, e)
                }
            };
            i.y = function () {
                return +new Date
            };
            i.p = function (b, a) {
                b.appendChild(a)
            };
            i.Pd = function (b, a) {
                n(a, function (a) {
                    i.p(b, a)
                })
            };
            i.ud = function (c, b, a) {
                c.insertBefore(b, a)
            };
            i.rb = function (b, a) {
                b.removeChild(a)
            };
            i.Nd = function (b, a) {
                n(a, function (a) {
                    i.rb(b, a)
                })
            };
            i.Td = function (a) {
                i.Nd(a, i.Gb(a))
            };
            i.Zd = function (b, a) {
                return parseInt(b, a || 10)
            };
            i.Pc = function (a) {
                return parseFloat(a)
            };
            i.Nc = function (b, a) {
                var c = g.body;
                while (a && b != a && c != a) try {
                    a = a.parentNode
                } catch (e) {
                    return d
                }
                return b == a
            };
            i.A = function (b, a) {
                return b.cloneNode(a)
            };

            function L(b, a, c) {
                a.onload = e;
                a.abort = e;
                b && b(a, c)
            }
            i.Hb = function (f, d) {
                var b = new Image;
                b.onload = a.s(e, L, d, b);
                b.onabort = a.s(e, L, d, b, c);
                b.src = f;
                i.Ve() && k < 11.6 && L(d, b)
            };
            i.ed = function (d, k, j, i) {
                if (i) d = a.A(d, c);
                for (var h = a.cf(d, k), f = h.length - 1; f > -1; f--) {
                    var b = h[f],
                        e = a.A(j, c);
                    a.Fc(e, a.zc(b));
                    a.Xb(e, a.md(b));
                    var g = a.db(b);
                    a.ud(g, e, b);
                    a.rb(g, b)
                }
                return d
            };
            var B;

            function lb(b, o) {
                var h = this,
                    j, f, l, g;

                function e() {
                    var c = j;
                    if (f) c += "dn";
                    else if (g) c += "hv";
                    else if (l) c += "av";
                    a.Fc(b, c)
                }

                function q() {
                    g = c;
                    e()
                }

                function r() {
                    g = d;
                    e()
                }

                function p() {
                    B.push(h);
                    f = c;
                    e()
                }
                h.be = function () {
                    f = d;
                    e()
                };
                h.dd = function (a) {
                    l = a;
                    e()
                };
                b = i.S(b);
                if (!B) {
                    i.gf(function () {
                        var a = B;
                        B = [];
                        n(a, function (a) {
                            a.be()
                        })
                    });
                    B = []
                }
                j = i.zc(b);
                a.f(b, "mousedown", p);
                if (o && m() && (k < 7 || A())) {
                    a.f(b, "mouseover", q);
                    a.f(b, "mouseout", r)
                }
            }
            i.Kb = function (b, a) {
                return new lb(b, a)
            };
            var Z = {
                $Opacity: i.wc,
                $Top: i.pc,
                $Left: i.Wb,
                E: i.m,
                C: i.l,
                L: i.Qd,
                xb: i.ae,
                $ZIndex: i.mb
            }, j;

            function F() {
                if (!j) {
                    j = {
                        $Opacity: i.pb,
                        $Top: i.u,
                        $Left: i.t,
                        E: i.J,
                        C: i.K,
                        xb: i.Mb,
                        $Clip: i.Md,
                        gd: i.sd,
                        fd: i.wd,
                        vb: i.Pe,
                        L: i.z,
                        $ZIndex: i.ab
                    };
                    j.$Opacity = j.$Opacity;
                    j.$Top = j.$Top;
                    j.$Left = j.$Left;
                    j.E = j.E;
                    j.C = j.C;
                    j.xb = j.xb;
                    j.$Clip = j.$Clip;
                    j.gd = j.gd;
                    j.fd = j.fd;
                    j.$ZIndex = j.$ZIndex
                }
                return j
            }

            function R() {
                F();
                j.vb = j.vb;
                return j
            }
            i.Kd = F;
            i.zd = R;
            i.Bd = function (c, b) {
                F();
                var a = {};
                n(b, function (d, b) {
                    if (Z[b]) a[b] = Z[b](c)
                });
                return a
            };
            i.I = function (c, b) {
                var a = F();
                n(b, function (d, b) {
                    a[b] && a[b](c, d)
                })
            };
            i.Ad = function (b, a) {
                R();
                i.I(b, a)
            };
            p = new function () {
                var a = this;

                function b(d, g) {
                    for (var j = d[0].length, i = d.length, h = g[0].length, f = [], c = 0; c < i; c++)
                        for (var k = f[c] = [], b = 0; b < h; b++) {
                            for (var e = 0, a = 0; a < j; a++) e += d[c][a] * g[a][b];
                            k[b] = e
                        }
                    return f
                }
                a.Cb = function (d, c) {
                    var a = b(d, [
                        [c.x],
                        [c.y]
                    ]);
                    return new h(a[0][0], a[1][0])
                }
            };
            i.Xe = function (d, a, c) {
                var e = b.cos(d),
                    f = b.sin(d);
                return [[e * a, -f * c], [f * a, e * c]]
            };
            i.Qe = function (d, c, a) {
                var e = p.Cb(d, new h(-c / 2, -a / 2)),
                    f = p.Cb(d, new h(c / 2, -a / 2)),
                    g = p.Cb(d, new h(c / 2, a / 2)),
                    i = p.Cb(d, new h(-c / 2, a / 2));
                return new h(b.min(e.x, f.x, g.x, i.x) + c / 2, b.min(e.y, f.y, g.y, i.y) + a / 2)
            }
        };
    l = function (l, r, g, O, C, y) {
        l = l || 0;
        var f = this,
            q, n, o, w, z = 0,
            B, M, L, D, j = 0,
            x = 0,
            E, k = l,
            s = l + r,
            i, h, p, t = [],
            A;

        function I(b) {
            i += b;
            h += b;
            k += b;
            s += b;
            a.d(t, function (a) {
                a, a.$Shift(b)
            })
        }

        function N(a, b) {
            var c = a - i + l * b;
            I(c);
            return h
        }

        function v(v, G) {
            var m = v;
            if (p && (m >= h || m <= i)) m = ((m - i) % p + p) % p + i;
            if (!E || w || G || j != m) {
                var o = b.min(m, h);
                o = b.max(o, i);
                if (!E || w || G || o != x) {
                    if (y) {
                        var s = (o - k) / r;
                        if (g.Qg) s = b.round(s * r / 16) / r * 16;
                        if (g.$Reverse) s = 1 - s;
                        var d = {};
                        for (var n in y) {
                            var R = M[n] || 1,
                                J = L[n] || [0, 1],
                                l = (s - J[0]) / J[1];
                            l = b.min(b.max(l, 0), 1);
                            l = l * R;
                            var H = b.floor(l);
                            if (l != H) l -= H;
                            var Q = B[n] || B.B,
                                I = Q(l),
                                q, K = C[n],
                                F = y[n];
                            if (a.hc(F)) q = K + (F - K) * I;
                            else {
                                q = a.g({
                                    F: {}
                                }, C[n]);
                                a.d(F.F, function (c, b) {
                                    var a = c * I;
                                    q.F[b] = a;
                                    q[b] += a
                                })
                            }
                            d[n] = q
                        }
                        if (C.$Zoom) d.vb = {
                            $Rotate: d.$Rotate || 0,
                            qc: d.$Zoom,
                            gb: g.gb,
                            jb: g.jb
                        };
                        if (y.$Clip && g.$Move) {
                            var u = d.$Clip.F,
                                D = (u.$Top || 0) + (u.$Bottom || 0),
                                z = (u.$Left || 0) + (u.$Right || 0);
                            d.$Left = (d.$Left || 0) + z;
                            d.$Top = (d.$Top || 0) + D;
                            d.$Clip.$Left -= z;
                            d.$Clip.$Right -= z;
                            d.$Clip.$Top -= D;
                            d.$Clip.$Bottom -= D
                        }
                        if (d.$Clip && a.Ld() && !d.$Clip.$Top && !d.$Clip.$Left && d.$Clip.$Right == g.gb && d.$Clip.$Bottom == g.jb) d.$Clip = e;
                        a.d(d, function (b, a) {
                            A[a] && A[a](O, b)
                        })
                    }
                    f.Yc(x - k, o - k)
                }
                x = o;
                a.d(t, function (b, c) {
                    var a = v < j ? t[t.length - c - 1] : b;
                    a.fb(v, G)
                });
                var P = j,
                    N = v;
                j = m;
                E = c;
                f.kc(P, N)
            }
        }

        function F(a, c) {
            c && a.Bb(h, 1);
            h = b.max(h, a.Fd());
            t.push(a)
        }

        function H() {
            if (q) {
                var d = a.y(),
                    f = b.min(d - z, 80),
                    c = j + f * o;
                z = d;
                if (c * o >= n * o) c = n;
                v(c);
                if (!w && c * o >= n * o) {
                    J(D);
                    D = e
                } else a.$Delay(H, g.$Interval)
            }
        }

        function u(d, e, g) {
            if (!q) {
                q = c;
                w = g;
                D = e;
                d = b.max(d, i);
                d = b.min(d, h);
                n = d;
                o = n < j ? -1 : 1;
                f.ad();
                z = a.y();
                H()
            }
        }

        function J(a) {
            if (q) {
                w = q = d;
                f.Zc();
                a && a()
            }
        }
        f.$Play = function (a, b, c) {
            u(a ? j + a : h, b, c)
        };
        f.Dd = function (b, a, c) {
            u(b, a, c)
        };
        f.Jd = function (a, b) {
            u(i, a, b)
        };
        f.Id = function (a, b) {
            u(h, a, b)
        };
        f.$Stop = function () {
            J()
        };
        f.Ed = function (a) {
            u(a)
        };
        f.Hd = function () {
            return j
        };
        f.yd = function () {
            return n
        };
        f.tc = function () {
            return x
        };
        f.fb = v;
        f.Mc = function () {
            v(i, c)
        };
        f.td = function () {
            v(h, c)
        };
        f.$Move = function (a) {
            v(j + a)
        };
        f.Rd = function () {
            return q
        };
        f.Od = function () {
            return j > k && j <= s
        };
        f.Yd = function (a) {
            p = a
        };
        f.Bb = N;
        f.$Shift = I;
        f.lb = function (a) {
            F(a, 0)
        };
        f.Vd = function (a) {
            F(a, 1)
        };
        f.Fd = function () {
            return h
        };
        f.kc = a.W;
        f.ad = a.W;
        f.Zc = a.W;
        f.Yc = a.W;
        f.Ub = a.y();
        g = a.g({
            $Interval: 10
        }, g);
        p = g.Ud;
        A = a.g({}, a.Kd(), g.pd);
        i = k = l;
        h = s = l + r;
        var M = g.$Round || {}, L = g.$During || {};
        B = a.g({
            B: a.Gc(g.$Easing) && g.$Easing || m.$EaseSwing
        }, g.$Easing)
    };
    var r, j = f.$JssorSlideshowFormations$ = {};
    new function () {
        var p = 0,
            o = 1,
            v = 2,
            u = 3,
            I = 1,
            H = 2,
            J = 4,
            G = 8,
            O = 256,
            P = 512,
            N = 1024,
            M = 2048,
            z = M + I,
            y = M + H,
            E = P + I,
            C = P + H,
            D = O + J,
            A = O + G,
            B = N + J,
            F = N + G;

        function S(a) {
            return (a & H) == H
        }

        function T(a) {
            return (a & J) == J
        }

        function x(b, a, c) {
            c.push(a);
            b[a] = b[a] || [];
            b[a].push(c)
        }
        j.$FormationStraight = function (f) {
            for (var d = f.$Cols, e = f.$Rows, k = f.$Assembly, l = f.ib, j = [], a = 0, b = 0, h = d - 1, i = e - 1, g = l - 1, c, b = 0; b < e; b++)
                for (a = 0; a < d; a++) {
                    switch (k) {
                    case z:
                        c = g - (a * e + (i - b));
                        break;
                    case B:
                        c = g - (b * d + (h - a));
                        break;
                    case E:
                        c = g - (a * e + b);
                    case D:
                        c = g - (b * d + a);
                        break;
                    case y:
                        c = a * e + b;
                        break;
                    case A:
                        c = b * d + (h - a);
                        break;
                    case C:
                        c = a * e + (i - b);
                        break;
                    default:
                        c = b * d + a
                    }
                    x(j, c, [b, a])
                }
            return j
        };
        j.$FormationSwirl = function (e) {
            var l = e.$Cols,
                m = e.$Rows,
                r = e.$Assembly,
                k = e.ib,
                q = [],
                n = [],
                i = 0,
                a = 0,
                b = 0,
                f = l - 1,
                g = m - 1,
                h, d, j = 0;
            switch (r) {
            case z:
                a = f;
                b = 0;
                d = [v, o, u, p];
                break;
            case B:
                a = 0;
                b = g;
                d = [p, u, o, v];
                break;
            case E:
                a = f;
                b = g;
                d = [u, o, v, p];
                break;
            case D:
                a = f;
                b = g;
                d = [o, u, p, v];
                break;
            case y:
                a = 0;
                b = 0;
                d = [v, p, u, o];
                break;
            case A:
                a = f;
                b = 0;
                d = [o, v, p, u];
                break;
            case C:
                a = 0;
                b = g;
                d = [u, p, v, o];
                break;
            default:
                a = 0;
                b = 0;
                d = [p, v, o, u]
            }
            i = 0;
            while (i < k) {
                h = b + "," + a;
                if (a >= 0 && a < l && b >= 0 && b < m && !n[h]) {
                    n[h] = c;
                    x(q, i++, [b, a])
                } else switch (d[j++ % d.length]) {
                case p:
                    a--;
                    break;
                case v:
                    b--;
                    break;
                case o:
                    a++;
                    break;
                case u:
                    b++
                }
                switch (d[j % d.length]) {
                case p:
                    a++;
                    break;
                case v:
                    b++;
                    break;
                case o:
                    a--;
                    break;
                case u:
                    b--
                }
            }
            return q
        };
        j.$FormationZigZag = function (d) {
            var k = d.$Cols,
                l = d.$Rows,
                n = d.$Assembly,
                j = d.ib,
                h = [],
                i = 0,
                a = 0,
                b = 0,
                e = k - 1,
                f = l - 1,
                m, c, g = 0;
            switch (n) {
            case z:
                a = e;
                b = 0;
                c = [v, o, u, o];
                break;
            case B:
                a = 0;
                b = f;
                c = [p, u, o, u];
                break;
            case E:
                a = e;
                b = f;
                c = [u, o, v, o];
                break;
            case D:
                a = e;
                b = f;
                c = [o, u, p, u];
                break;
            case y:
                a = 0;
                b = 0;
                c = [v, p, u, p];
                break;
            case A:
                a = e;
                b = 0;
                c = [o, v, p, v];
                break;
            case C:
                a = 0;
                b = f;
                c = [u, p, v, p];
                break;
            default:
                a = 0;
                b = 0;
                c = [p, v, o, v]
            }
            i = 0;
            while (i < j) {
                m = b + "," + a;
                if (a >= 0 && a < k && b >= 0 && b < l && typeof h[m] == "undefined") {
                    x(h, i++, [b, a]);
                    switch (c[g % c.length]) {
                    case p:
                        a++;
                        break;
                    case v:
                        b++;
                        break;
                    case o:
                        a--;
                        break;
                    case u:
                        b--
                    }
                } else {
                    switch (c[g++ % c.length]) {
                    case p:
                        a--;
                        break;
                    case v:
                        b--;
                        break;
                    case o:
                        a++;
                        break;
                    case u:
                        b++
                    }
                    switch (c[g++ % c.length]) {
                    case p:
                        a++;
                        break;
                    case v:
                        b++;
                        break;
                    case o:
                        a--;
                        break;
                    case u:
                        b--
                    }
                }
            }
            return h
        };
        j.$FormationStraightStairs = function (h) {
            var l = h.$Cols,
                m = h.$Rows,
                e = h.$Assembly,
                k = h.ib,
                i = [],
                j = 0,
                c = 0,
                d = 0,
                f = l - 1,
                g = m - 1,
                o = k - 1;
            switch (e) {
            case z:
            case C:
            case E:
            case y:
                var a = 0,
                    b = 0;
                break;
            case A:
            case B:
            case D:
            case F:
                var a = f,
                    b = 0;
                break;
            default:
                e = F;
                var a = f,
                    b = 0
            }
            c = a;
            d = b;
            while (j < k) {
                if (T(e) || S(e)) x(i, o - j++, [d, c]);
                else x(i, j++, [d, c]);
                switch (e) {
                case z:
                case C:
                    c--;
                    d++;
                    break;
                case E:
                case y:
                    c++;
                    d--;
                    break;
                case A:
                case B:
                    c--;
                    d--;
                    break;
                case F:
                case D:
                default:
                    c++;
                    d++
                }
                if (c < 0 || d < 0 || c > f || d > g) {
                    switch (e) {
                    case z:
                    case C:
                        a++;
                        break;
                    case A:
                    case B:
                    case E:
                    case y:
                        b++;
                        break;
                    case F:
                    case D:
                    default:
                        a--
                    }
                    if (a < 0 || b < 0 || a > f || b > g) {
                        switch (e) {
                        case z:
                        case C:
                            a = f;
                            b++;
                            break;
                        case E:
                        case y:
                            b = g;
                            a++;
                            break;
                        case A:
                        case B:
                            b = g;
                            a--;
                            break;
                        case F:
                        case D:
                        default:
                            a = 0;
                            b++
                        }
                        if (b > g) b = g;
                        else if (b < 0) b = 0;
                        else if (a > f) a = f;
                        else if (a < 0) a = 0
                    }
                    d = b;
                    c = a
                }
            }
            return i
        };
        j.$FormationSquare = function (h) {
            var a = h.$Cols || 1,
                c = h.$Rows || 1,
                i = [],
                d, e, f, g, j;
            f = a < c ? (c - a) / 2 : 0;
            g = a > c ? (a - c) / 2 : 0;
            j = b.round(b.max(a / 2, c / 2)) + 1;
            for (d = 0; d < a; d++)
                for (e = 0; e < c; e++) x(i, j - b.min(d + 1 + f, e + 1 + g, a - d + f, c - e + g), [e, d]);
            return i
        };
        j.$FormationRectangle = function (f) {
            var d = f.$Cols || 1,
                e = f.$Rows || 1,
                g = [],
                a, c, h;
            h = b.round(b.min(d / 2, e / 2)) + 1;
            for (a = 0; a < d; a++)
                for (c = 0; c < e; c++) x(g, h - b.min(a + 1, c + 1, d - a, e - c), [c, a]);
            return g
        };
        j.$FormationRandom = function (d) {
            for (var e = [], a, c = 0; c < d.$Rows; c++)
                for (a = 0; a < d.$Cols; a++) x(e, b.ceil(1e5 * b.random()) % 13, [c, a]);
            return e
        };
        j.$FormationCircle = function (d) {
            for (var e = d.$Cols || 1, f = d.$Rows || 1, g = [], a, h = e / 2 - .5, i = f / 2 - .5, c = 0; c < e; c++)
                for (a = 0; a < f; a++) x(g, b.round(b.sqrt(b.pow(c - h, 2) + b.pow(a - i, 2))), [a, c]);
            return g
        };
        j.$FormationCross = function (d) {
            for (var e = d.$Cols || 1, f = d.$Rows || 1, g = [], a, h = e / 2 - .5, i = f / 2 - .5, c = 0; c < e; c++)
                for (a = 0; a < f; a++) x(g, b.round(b.min(b.abs(c - h), b.abs(a - i))), [a, c]);
            return g
        };
        j.$FormationRectangleCross = function (f) {
            for (var g = f.$Cols || 1, h = f.$Rows || 1, i = [], a, d = g / 2 - .5, e = h / 2 - .5, j = b.max(d, e) + 1, c = 0; c < g; c++)
                for (a = 0; a < h; a++) x(i, b.round(j - b.max(d - b.abs(c - d), e - b.abs(a - e))) - 1, [a, c]);
            return i
        };

        function Q(a) {
            var b = a.$Formation(a);
            return a.$Reverse ? b.reverse() : b
        }

        function K(f) {
            var e = {
                $Interval: 40,
                $Duration: 1,
                $Delay: 0,
                $Cols: 1,
                $Rows: 1,
                $Opacity: 0,
                $Zoom: 0,
                $Clip: 0,
                $Move: d,
                $SlideOut: d,
                $FlyDirection: 0,
                $Reverse: d,
                $Formation: j.$FormationRandom,
                $Assembly: F,
                $ChessMode: {
                    $Column: 0,
                    $Row: 0
                },
                $Easing: m.$EaseSwing,
                $Round: {},
                Db: [],
                $During: {}
            };
            a.g(e, f);
            e.ib = e.$Cols * e.$Rows;
            if (a.Gc(e.$Easing)) e.$Easing = {
                B: e.$Easing
            };
            e.Dc = b.ceil(e.$Duration / e.$Interval);
            e.yc = R(e);
            e.bf = function (b, a) {
                b /= e.$Cols;
                a /= e.$Rows;
                var f = b + "x" + a;
                if (!e.Db[f]) {
                    e.Db[f] = {
                        E: b,
                        C: a
                    };
                    for (var c = 0; c < e.$Cols; c++)
                        for (var d = 0; d < e.$Rows; d++) e.Db[f][d + "," + c] = {
                            $Top: d * a,
                            $Right: c * b + b,
                            $Bottom: d * a + a,
                            $Left: c * b
                        }
                }
                return e.Db[f]
            };
            if (e.$Brother) {
                e.$Brother = K(e.$Brother);
                e.$SlideOut = c
            }
            return e
        }

        function R(d) {
            var c = d.$Easing;
            if (!c.B) c.B = m.$EaseSwing;
            var e = d.Dc,
                f = c.$Cache;
            if (!f) {
                var g = a.g({}, d.$Easing, d.$Round);
                f = c.$Cache = {};
                a.d(g, function (n, l) {
                    var g = c[l] || c.B,
                        j = d.$Round[l] || 1;
                    if (!a.zb(g.$Cache)) g.$Cache = [];
                    var h = g.$Cache[e] = g.$Cache[e] || [];
                    if (!h[j]) {
                        h[j] = [0];
                        for (var k = 1; k <= e; k++) {
                            var i = k / e * j,
                                m = b.floor(i);
                            if (i != m) i -= m;
                            h[j][k] = g(i)
                        }
                    }
                    f[l] = h
                })
            }
            return f
        }

        function L(C, k, f, x, m, l) {
            var A = this,
                u, w = {}, n = {}, v = [],
                h, g, r, p = f.$ChessMode.$Column || 0,
                q = f.$ChessMode.$Row || 0,
                j = f.bf(m, l),
                o = Q(f),
                D = o.length - 1,
                t = f.$Duration + f.$Delay * D,
                y = x + t,
                s = f.$SlideOut,
                z;
            y += a.Ob() ? 260 : 50;
            A.Jc = y;
            A.Eb = function (c) {
                c -= x;
                var d = c < t;
                if (d || z) {
                    z = d;
                    if (!s) c = t - c;
                    var e = b.ceil(c / f.$Interval);
                    a.d(n, function (d, f) {
                        var c = b.max(e, d.jf);
                        c = b.min(c, d.length - 1);
                        d[c] && a.Ad(v[f], d[c])
                    })
                }
            };
            k = a.A(k, c);
            if (a.Pb()) {
                var E = !k["no-image"],
                    B = a.Ec(k, e, c);
                a.d(B, function (b) {
                    (E || b["jssor-slider"]) && a.pb(b, a.wc(b), c)
                })
            }
            a.d(o, function (e, k) {
                a.d(e, function (N) {
                    var S = N[0],
                        R = N[1],
                        z = S + "," + R,
                        v = d,
                        x = d,
                        A = d;
                    if (p && R % 2) {
                        if (i.Rc(p)) v = !v;
                        if (i.Sc(p)) x = !x;
                        if (p & 16) A = !A
                    }
                    if (q && S % 2) {
                        if (i.Rc(q)) v = !v;
                        if (i.Sc(q)) x = !x;
                        if (q & 16) A = !A
                    }
                    f.$Top = f.$Top || f.$Clip & 4;
                    f.$Bottom = f.$Bottom || f.$Clip & 8;
                    f.$Left = f.$Left || f.$Clip & 1;
                    f.$Right = f.$Right || f.$Clip & 2;
                    var G = x ? f.$Bottom : f.$Top,
                        D = x ? f.$Top : f.$Bottom,
                        F = v ? f.$Right : f.$Left,
                        E = v ? f.$Left : f.$Right;
                    f.$Clip = G || D || F || E;
                    r = {};
                    g = {
                        $Top: 0,
                        $Left: 0,
                        $Opacity: 1,
                        E: m,
                        C: l
                    };
                    h = a.g({}, g);
                    u = a.g({}, j[z]);
                    if (f.$Opacity) g.$Opacity = 2 - f.$Opacity;
                    if (f.$ZIndex) {
                        g.$ZIndex = f.$ZIndex;
                        h.$ZIndex = 0
                    }
                    var Q = f.$Cols * f.$Rows > 1 || f.$Clip;
                    if (f.$Zoom || f.$Rotate) {
                        var P = c;
                        if (a.pf() && a.Ue() < 9)
                            if (f.$Cols * f.$Rows > 1) P = d;
                            else Q = d;
                        if (P) {
                            g.$Zoom = f.$Zoom ? f.$Zoom - 1 : 1;
                            h.$Zoom = 1;
                            if (a.Pb()) g.$Zoom = b.min(g.$Zoom, 2);
                            else if (a.Ab()) g.$Zoom = b.min(g.$Zoom, 3);
                            var K = f.$Rotate;
                            if (K == c) K = 1;
                            g.$Rotate = K * 360 * (A ? -1 : 1);
                            h.$Rotate = 0
                        }
                    }
                    if (Q) {
                        if (f.$Clip) {
                            var y = f.$ScaleClip || 1,
                                o = u.F = {};
                            if (G && D) {
                                o.$Top = j.C / 2 * y;
                                o.$Bottom = -o.$Top
                            } else if (G) o.$Bottom = -j.C * y;
                            else if (D) o.$Top = j.C * y;
                            if (F && E) {
                                o.$Left = j.E / 2 * y;
                                o.$Right = -o.$Left
                            } else if (F) o.$Right = -j.E * y;
                            else if (E) o.$Left = j.E * y
                        }
                        r.$Clip = u;
                        h.$Clip = j[z]
                    }
                    if (f.$FlyDirection) {
                        var t = f.$FlyDirection;
                        if (!v) t = i.Fe(t);
                        if (!x) t = i.He(t);
                        var M = f.$ScaleHorizontal || 1,
                            O = f.$ScaleVertical || 1;
                        if (i.Tc(t)) g.$Left += m * M;
                        else if (i.Uc(t)) g.$Left -= m * M;
                        if (i.Vc(t)) g.$Top += l * O;
                        else if (i.Qc(t)) g.$Top -= l * O
                    }
                    a.d(g, function (b, c) {
                        if (a.hc(b))
                            if (b != h[c]) r[c] = b - h[c]
                    });
                    w[z] = s ? h : g;
                    var L = b.round(k * f.$Delay / f.$Interval);
                    n[z] = new Array(L);
                    n[z].jf = L;
                    for (var C = f.Dc, J = 0; J <= C; J++) {
                        var e = {};
                        a.d(r, function (g, c) {
                            var m = f.yc[c] || f.yc.B,
                                l = m[f.$Round[c] || 1],
                                k = f.$During[c] || [0, 1],
                                d = (J / C - k[0]) / k[1] * C;
                            d = b.round(b.min(C, b.max(d, 0)));
                            var j = l[d];
                            if (a.hc(g)) e[c] = h[c] + g * j;
                            else {
                                var i = e[c] = a.g({}, h[c]);
                                i.F = [];
                                a.d(g.F, function (c, b) {
                                    var a = c * j;
                                    i.F[b] = a;
                                    i[b] += a
                                })
                            }
                        });
                        if (h.$Zoom) e.vb = {
                            $Rotate: e.$Rotate || 0,
                            qc: e.$Zoom,
                            gb: m,
                            jb: l
                        };
                        if (e.$Clip && f.$Move) {
                            var B = e.$Clip.F,
                                I = (B.$Top || 0) + (B.$Bottom || 0),
                                H = (B.$Left || 0) + (B.$Right || 0);
                            e.$Left = (e.$Left || 0) + H;
                            e.$Top = (e.$Top || 0) + I;
                            e.$Clip.$Left -= H;
                            e.$Clip.$Right -= H;
                            e.$Clip.$Top -= I;
                            e.$Clip.$Bottom -= I
                        }
                        e.$ZIndex = e.$ZIndex || 1;
                        e.xb = "";
                        n[z].push(e)
                    }
                })
            });
            o.reverse();
            a.d(o, function (b) {
                a.d(b, function (d) {
                    var g = d[0],
                        f = d[1],
                        e = g + "," + f,
                        b = k;
                    if (f || g) b = a.A(k, c);
                    a.I(b, w[e]);
                    a.Y(b, "hidden");
                    a.z(b, "relative");
                    C.ff(b);
                    v[e] = b;
                    a.v(b, s)
                })
            })
        }
        f.$JssorSlideshowRunner$ = function (r, l, u, f, p, o, x, D, m) {
            f = K(f);
            var g = this,
                i, n = c,
                h = d,
                s = d,
                q, k, j, w;

            function z() {
                var d = l ? l.Ic : x,
                    c = u.Ic;
                d["no-image"] = !l || !l.lc;
                c["no-image"] = !u.lc;
                var e = d,
                    g = c,
                    i = f,
                    a = f.$Brother || K({});
                if (!f.$SlideOut) {
                    e = c;
                    g = d
                }
                var h = a.$Shift || 0;
                k = new L(r, g, a, b.max(h - a.$Interval, 0), p, o);
                j = new L(r, e, i, b.max(a.$Interval - h, 0), p, o);
                k.Eb(0);
                j.Eb(0);
                w = b.max(k.Jc, j.Jc)
            }

            function A() {
                if (n && !h) {
                    var b = a.y() - i;
                    n = b < w;
                    j.Eb(b);
                    k.Eb(b)
                }
                return n
            }

            function B(c) {
                function b() {
                    if (!s)
                        if (h || A()) a.$Delay(b, c);
                        else y()
                }
                a.$Delay(b, c)
            }
            var t;

            function y() {
                if (!t) {
                    t = c;
                    m && m();
                    m = e
                }
            }
            g.$Stop = function () {
                if (!q) {
                    q = c;
                    i -= 2e6;
                    return c
                }
            };
            g.$Play = function () {
                i = a.y();
                B(f.$Interval)
            };
            g.Se = function () {
                z()
            };
            var v;
            g.Hc = function () {
                if (!h) {
                    h = c;
                    v = a.y() - i
                }
            };
            g.Ye = function () {
                s = c
            };
            g.We = function () {
                if (h) {
                    i = a.y() - v;
                    h = d
                }
            };
            g.bb = f
        };

        function w(j, Jb) {
            function Wb() {
                var c = 0;
                if (xb) {
                    var d = H.length;
                    if (d > B && (a.Ob() || a.vd() || a.Ab())) d -= d % B;
                    c = Ub++ % d
                } else c = b.floor(b.random() * H.length);
                H[c] && (H[c].M = c);
                return H[c]
            }

            function Fb(d, c) {
                var b = t > 0 ? t : i.$PlayOrientation;
                a.t(d, gb * c * (b & 1));
                a.u(d, hb * c * (b >> 1 & 1))
            }

            function sb(b) {
                W && a.sb(b)
            }

            function Vb() {
                var c = this,
                    b = ib();
                a.ab(b, 0);
                c.$Elmt = b;
                c.ff = function (c) {
                    a.p(b, c)
                };
                c.Jb = function () {
                    a.uc(b)
                }
            }
            var Rb = 1;

            function bc(w, g, D) {
                var b = this;
                l.call(b, -z, z + 1, {});
                var m, k, h, p, o, q, f, u, j, r;

                function x(j, m) {
                    r = c;
                    var g = m.width,
                        e = m.height;
                    if (g && e && i.$FillMode) {
                        var h = d,
                            n = C / G * e / g;
                        if (i.$FillMode & 1) h = n > 1;
                        else if (i.$FillMode & 2) h = n < 1;
                        var l = h ? g * G / e : C,
                            k = h ? G : e * C / g,
                            q = (G - k) / 2,
                            p = (C - l) / 2;
                        a.z(f, "relative");
                        a.J(f, l);
                        a.K(f, k);
                        a.u(f, q);
                        a.t(f, p)
                    }
                    a.nb(o);
                    j && j(b)
                }

                function y() {
                    h.Rd();
                    b.Vb()
                }

                function A() {}

                function n() {
                    k && k.Qb();
                    m && m.Qb();
                    m = new v.$Class(g, v, 1);
                    k = new v.$Class(g, v);
                    Rb++;
                    m.Mc();
                    h = m;
                    return m
                }
                b.M = D;
                b.Hb = function (c) {
                    if (f)
                        if (!r) {
                            var d = f.src;
                            a.v(o);
                            return a.Hb(d, a.s(e, x, c))
                        }
                    c && c(b)
                };
                b.oe = function (b) {
                    a.d(q, function (c) {
                        a.ab(c, a.mb(c) + 1);
                        a.f(c, "click", b)
                    })
                };
                b.pe = function () {
                    a.nb(g)
                };
                b.Sb = function () {
                    a.v(g)
                };
                b.Vb = function () {
                    h && h.$Stop()
                };
                b.ne = function () {};
                b.le = function (d, c) {
                    c && b.Sb();
                    var a = h = h || n();
                    if (a.Ub < v.Ub && !a.Od()) a = n();
                    a.Id(d)
                };
                b.me = function (a) {
                    if (v.$PlayOutMode & 1 && !(v.$PlayOutMode & 4)) {
                        k.td();
                        k.Jd(a);
                        h = k
                    } else a && a()
                };
                b.te = function () {
                    b.Vb();
                    n();
                    b.Sb()
                };
                b.Yc = function (c, b) {
                    var a = z - b;
                    Fb(p, a)
                };
                var s = a.x(g, "thumb");
                if (s) {
                    b.ue = a.A(s, c);
                    a.nb(s)
                }
                a.v(g);
                o = a.A(E, c);
                q = a.Ec(g, e, c);
                f = a.x(g, "image");
                if (f) {
                    if (f.tagName == "A") {
                        u = f;
                        a.I(u, K);
                        j = a.A(f, d);
                        a.f(j, "click", sb);
                        a.I(j, K);
                        a.Mb(j, "block");
                        a.pb(j, 0);
                        a.od(j, "#000");
                        f = a.af(f, "IMG")
                    }
                    f.border = 0;
                    if (!i.$FillMode) a.I(f, K);
                    else a.z(f, "relative")
                }
                b.lc = f;
                b.se = j;
                b.Ic = g;
                b.cb = p = g;
                a.p(p, o);
                b.Hb(a.W);
                n();
                w.$On(21, A);
                w.$On(22, y)
            }

            function ac() {
                var q = this;
                n.call(q);
                var r = ib(),
                    k = [],
                    j, s, T, nb = "mousedown",
                    B = "mousemove",
                    rb = "mouseup",
                    kb = "mouseup";
                n.call(q);

                function Ub(b) {
                    if (!O && Zb()) Tb(b);
                    else !U && a.sb(b)
                }
                var v, Q, tb;

                function Tb(b) {
                    var h = A;
                    a.y();
                    Q = y;
                    tb = u.yd();
                    u.$Stop();
                    if (!Q) t = 0;
                    W = d;
                    A = c;
                    if (j) {
                        L();
                        j.Hc();
                        D = c
                    }
                    if (U) {
                        var f = b.touches[0];
                        ob = f.clientX;
                        pb = f.clientY
                    } else {
                        var e = a.vc(b);
                        ob = e.x;
                        pb = e.y;
                        a.sb(b)
                    }
                    I = 0;
                    v = S.tc();
                    !h && a.f(g, B, Hb);
                    q.q(22)
                }

                function Hb(g) {
                    var c;
                    if (U) {
                        var f = g.touches;
                        if (f && f.length > 0) c = new h(f[0].clientX, f[0].clientY)
                    } else c = a.vc(g); if (c) {
                        var d = c.x - ob,
                            e = c.y - pb;
                        if (!t) {
                            if (db == 3)
                                if (b.abs(d) >= b.abs(e)) t = 1;
                                else t = 2;
                                else {
                                    t = db;
                                    if (U && (b.abs(e) - b.abs(d)) * (t == 1 ? 1 : -1) > 3) t = -1
                                }
                            if (b.floor(v) != v) t = i.$PlayOrientation
                        }
                        if (t == 1) {
                            T = v - d / gb;
                            I = d
                        } else {
                            T = v - e / hb;
                            I = e
                        } if (t > 0) {
                            a.sb(g);
                            if (!y) u.qe(v);
                            else u.re(T)
                        }
                    }
                }

                function Kb() {
                    Xb();
                    if (A) {
                        a.y();
                        a.Ze(g, B, Hb);
                        W = I;
                        u.$Stop();
                        if (!W && Q) u.Ed(tb);
                        else {
                            var f = p;
                            if (f == -1) f = 0;
                            var e = S.Hd(),
                                c = f;
                            if (!I) c = e;
                            else if (b.abs(I) >= i.$MinDragOffsetToSlide) {
                                c = b.floor(e);
                                if (I < 0) c += 1
                            }
                            u.qd(e, c, b.abs(c - e) * Db)
                        }
                        A = d
                    }
                }

                function ub(a) {
                    vb = p;
                    p = F(a);
                    Cb = k[p];
                    Gb(p);
                    return p
                }

                function H(h, n, l) {
                    if (yb) {
                        u.$Stop();
                        J.nd();
                        var c = l;
                        if (!c) c = Db;
                        var m = S.kd();
                        if (m.L || !eb(h)) {
                            var i = F(h),
                                j = a.s(e, Nb, i, k[i], n),
                                d = S.tc(),
                                f = h,
                                g = d == f ? 0 : c * b.abs(f - d);
                            g = b.min(g, c * z * 1.5);
                            u.qd(d, f, g, j)
                        }
                    }
                }

                function fb(a) {
                    if (jb)
                        if (!Bb) {
                            Bb = c;
                            cb = 0
                        } else cb = a || Sb;
                        else cb = 6e8
                }

                function Lb(b, h, f, g) {
                    t = 0;
                    if (eb(b) && j && D) {
                        L(Qb(b) && D && j.bb.$Outside);
                        j.We()
                    } else {
                        ub(b);
                        J.Jb();
                        Y = c;
                        V = 0;
                        D = d
                    }
                    J.nd();
                    if (!eb(f)) k[f] && k[f].te();
                    h.le(a.s(e, Rb, b), g);
                    q.q(21, b, f)
                }

                function Rb(a) {
                    o.q(201, a);
                    fb();
                    Y = d
                }

                function Nb(c, b, a) {
                    a && a()
                }

                function Gb(b, c) {
                    a.d(P, function (a) {
                        a.oc(F(b), c)
                    })
                }

                function xb() {
                    Y = d;
                    var a = p;
                    if (a == -1) a = i.$StartIndex || 0;
                    else a += 1; if (X && R) {
                        D = d;
                        V = 1;
                        J.de(F(a))
                    } else {
                        if (p != -1) a += Ab - 1;
                        H(a)
                    }
                }

                function Ob() {
                    Y = c;
                    if (p == -1) xb();
                    else k[p].me(xb, X)
                }

                function Mb() {
                    if (!A && !y && (R && jb && !Y && !O && (!V || D) || p == -1)) {
                        cb -= 60;
                        cb < 0 && (!Eb || ab) && Ob()
                    }
                    a.$Delay(Mb, 60)
                }

                function Jb() {
                    if (X || g.readyState === "complete") Mb();
                    else a.$Delay(Jb, 30)
                }

                function dc(e) {
                    var d = this,
                        f = e.length;
                    l.call(d, 0, 0, {
                        Ud: f
                    });
                    d.ib = f;
                    d.kd = function () {
                        var a = d.tc(),
                            g = b.floor(a),
                            f = e[g].M,
                            c = a - b.floor(a);
                        return {
                            M: f,
                            L: c
                        }
                    };
                    d.kc = function (e, a) {
                        var d = b.floor(a);
                        if (d != a && a > e) d++;
                        Gb(d, c)
                    };
                    a.d(e, function (a) {
                        a.Yd(f);
                        d.Vd(a);
                        a.$Shift(zb / (i.$PlayOrientation == 1 ? gb : hb))
                    })
                }

                function cc() {
                    var b = this,
                        f = new Vb,
                        h = f.$Elmt,
                        d;
                    l.call(b, -1, 2, {
                        $Easing: m.$EaseLinear,
                        pd: {
                            L: Fb
                        }
                    }, h, {
                        L: 1
                    }, {
                        L: -1
                    });

                    function n(c, b, h, k, g) {
                        if (R && jb && !A && !y && !O) {
                            var d = a.s(e, i, c, b, h);
                            j = new mb(f, k, b, g, C, G, E, M, d);
                            j.Se();
                            p = F(c);
                            j.$Play()
                        }
                    }

                    function i(e, d, a) {
                        b.Jb();
                        Lb(e, d, a, c)
                    }

                    function g() {
                        if (!s) {
                            s = ib();
                            a.od(s, "#000");
                            a.pb(s, 0);
                            a.p(r, s)
                        }
                        var b = d && d.se,
                            c = Ib < 2 || !V || y || A || !b;
                        a.Td(s);
                        if (!c) a.p(s, b);
                        a.v(s, V == 1 || D)
                    }
                    b.cb = h;
                    b.de = function (c) {
                        var f = Wb();
                        if (!f) return H(c);
                        d = k[c];
                        d.ne();
                        var h = c;
                        b.Bb(h, 1);
                        b.fb(h);
                        var i = p,
                            j = Cb;
                        L(f.$Outside);
                        d.pe();
                        u.xd(h);
                        ub(c);
                        g();
                        d.Hb(a.s(e, n, c, d, i, j, f))
                    };
                    b.Jb = function () {
                        if (j) {
                            j.Ye();
                            d.Sb();
                            f.Jb();
                            j = e
                        }
                    };
                    b.nd = g;
                    L()
                }

                function Pb(m, n) {
                    var a = this,
                        g, h, i, b, j, f;
                    l.call(a, -1e8, 2e8);
                    a.ad = function () {
                        y = c
                    };
                    a.Zc = function () {
                        y = d;
                        j = d;
                        var a = m.kd();
                        a.L == 0 && Lb(a.M, k[a.M], p)
                    };
                    a.kc = function (d, c) {
                        var a;
                        if (j) a = f;
                        else {
                            a = h;
                            if (i) a = c / i * (h - g) + g
                        }
                        b.fb(a)
                    };
                    a.qd = function (c, d, b, e) {
                        k[p] && k[p].Vb();
                        g = c;
                        h = d;
                        i = b;
                        a.fb(0);
                        a.Dd(b, e)
                    };
                    a.qe = function (b) {
                        j = c;
                        f = b;
                        a.$Play(b, e, c)
                    };
                    a.re = function (a) {
                        f = a
                    };
                    a.xd = function (a) {
                        !y && b.fb(a)
                    };
                    b = new l(-1e8, 2e8);
                    b.lb(m);
                    b.lb(n)
                }
                q.ce = function (a, c, b) {
                    if (!A && !eb(a)) {
                        if (j) {
                            L();
                            j.Hc()
                        }
                        H(a, c, b)
                    }
                };
                q.ke = function () {
                    fb(1)
                };
                q.ie = k;
                q.ge = function () {
                    jb = c;
                    fb(1);
                    Jb()
                };
                J = new cc;
                a.p(N, J.cb);
                q.$Elmt = r;
                if (i.$PlayOrientation == 1) a.J(r, gb * z - Z);
                else a.K(r, hb * z - Z);
                a.Y(r, "hidden");
                for (var K = 0; K < bb.length; K++) {
                    var ac = bb[K],
                        qb = new bc(q, ac, K);
                    qb.oe(sb);
                    a.p(r, qb.cb);
                    k.push(qb)
                }
                S = new dc(k);
                u = new Pb(S, J);
                u.xd(0);
                a.Wd(r, "move");
                a.p(x, r);
                if (Yb) {
                    if (f.navigator.msPointerEnabled) {
                        nb = "MSPointerDown";
                        B = "MSPointerMove";
                        rb = "MSPointerUp";
                        kb = "MSPointerCancel";
                        if (i.$DragOrientation) {
                            var lb = "none";
                            if (i.$DragOrientation == 1) lb = "pan-y";
                            else if (i.$DragOrientation == 2) lb = "pan-x";
                            a.xc(r.style, "-ms-touch-action", lb)
                        }
                    } else if ("ontouchstart" in f || "createTouch" in g) {
                        U = c;
                        nb = "touchstart";
                        B = "touchmove";
                        rb = "touchend";
                        kb = "touchcancel"
                    }
                    a.f(r, nb, Ub);
                    a.f(g, rb, Kb);
                    a.f(g, kb, Kb)
                }
            }
            var o = this;
            n.call(o);
            var j = a.S(j),
                i = a.g({
                    $FillMode: 0,
                    $AutoPlay: d,
                    $AutoPlaySteps: 1,
                    $AutoPlayInterval: 3e3,
                    $SlideDuration: 400,
                    $MinDragOffsetToSlide: 20,
                    $SlideSpacing: 0,
                    $DisplayPieces: 1,
                    $ParkingPosition: 0,
                    $UISearchMode: 1,
                    $PlayOrientation: 1,
                    $DragOrientation: 1
                }, Jb),
                M = i.$SlideshowOptions,
                v = a.g({
                    $Class: s,
                    $PlayInMode: 1,
                    $PlayOutMode: 1
                }, i.$CaptionSliderOptions),
                nb = i.$NavigatorOptions,
                kb = i.$DirectionNavigatorOptions,
                lb = i.$ThumbnailNavigatorOptions,
                fb = i.$UISearchMode,
                r, x = a.x(j, "slides", e, fb),
                E = a.x(j, "loading", e, fb) || a.Ib(g),
                ub = a.x(j, "navigator", e, fb),
                rb = a.x(j, "thumbnavigator", e, fb),
                Pb = a.m(x),
                Ob = a.l(x);
            if (i.$DisplayPieces > 1 || i.$ParkingPosition) i.$DragOrientation &= i.$PlayOrientation;
            var K, bb = a.Gb(x),
                Bb, Cb, B = bb.length,
                C = i.$SlideWidth || Pb,
                G = i.$SlideHeight || Ob,
                Z = i.$SlideSpacing,
                gb = C + Z,
                hb = G + Z,
                z = i.$DisplayPieces,
                vb, p = -1,
                N, Q, t, db, U, P = [],
                Hb, tb, wb, Ib, R, Ab, Eb = i.Me,
                Sb = i.$AutoPlayInterval,
                Db = i.$SlideDuration,
                mb, xb, H, X, zb, yb = z < B,
                Yb = yb && i.$DragOrientation,
                W, Ub = 0,
                ab = 1,
                jb, cb = 0,
                V, D, y, O, Y, A, ob = 0,
                pb = 0,
                I, S, J, u;

            function Zb() {
                var a = w.Wc || 0;
                w.Wc |= i.$DragOrientation;
                return db = i.$DragOrientation & ~a
            }

            function Xb() {
                w.Wc &= ~db
            }

            function ib() {
                var b = a.Ib();
                a.I(b, K);
                a.z(b, "static");
                return b
            }

            function F(a) {
                return (a % B + B) % B
            }

            function eb(a) {
                return F(a) == p
            }

            function Qb(a) {
                return F(a) == vb
            }

            function T(c, b, a) {
                Q.ce(c, b, a)
            }

            function Nb(a) {
                T(a)
            }

            function qb() {
                a.d(P, function (a) {
                    a.bc(a.Lb.$ChanceToShow > ab)
                })
            }

            function Lb(b) {
                b = a.Rb(b);
                var c = b.target ? b.target : b.srcElement,
                    d = b.relatedTarget ? b.relatedTarget : b.toElement;
                if (!a.Nc(j, c) || a.Nc(j, d)) return;
                ab = 1;
                qb()
            }

            function Kb() {
                ab = 0;
                qb()
            }

            function L(b) {
                a.Y(N, b ? "" : "hidden")
            }

            function Mb() {
                K = {
                    E: C,
                    C: G,
                    $Top: 0,
                    $Left: 0
                };
                a.d(bb, function (b) {
                    a.I(b, K);
                    a.z(b, "absolute"); /* thumb slider positions */
                    a.Y(b, "hidden");
                    a.nb(b)
                });
                E && a.I(E, K)
            }

            function Tb(a, b) {
                o.q(21, a, b)
            }
            o.$Elmt = j;
            o.$GoTo = T;
            o.$Next = function (a) {
                T(p + 1, a)
            };
            o.$Prev = function (a) {
                T(p - 1, a)
            };
            o.$Stop = function () {
                R = d
            };
            var Gb;
            o.$Play = function (d) {
                var b = Gb = a.y();
                a.$Delay(function () {
                    if (b == Gb) {
                        R = c;
                        Q.ke()
                    }
                }, d || 0)
            };
            o.$SetSlideshowTransitions = function (a) {
                H = i.$Transitions = a
            };
            o.$SetCaptionTransitions = function (b) {
                if (v) {
                    v.$CaptionTransitions = b;
                    v.Ub = a.y()
                }
            };
            o.ze = function () {
                return W
            };
            o.xe = function () {
                O = !y && !A && (!Eb || ab);
                return O
            };
            o.ve = function () {
                O = d
            };
            o.$GetSlidesCount = function () {
                return bb.length
            };
            o.$GetOriginalWidth = function () {
                return a.m(r || j)
            };
            o.$GetOriginalHeight = function () {
                return a.l(r || j)
            };
            o.$GetScaleWidth = function () {
                return a.m(j)
            };
            o.$GetScaleHeight = function () {
                return a.l(j)
            };
            o.$SetScaleWidth = function (e) {
                if (!r) {
                    var b = a.A(j, d);
                    a.jd(b, "id");
                    a.z(b, "relative");
                    a.u(b, 0);
                    a.t(b, 0);
                    r = a.A(j, d);
                    a.jd(r, "id");
                    a.Xb(r, "");
                    a.z(r, "relative");
                    a.u(r, 0);
                    a.t(r, 0);
                    a.J(r, a.m(j));
                    a.K(r, a.l(j));
                    a.Re(r, "0 0");
                    a.p(r, b);
                    var f = a.Gb(j);
                    a.p(j, r);
                    a.Pd(b, f);
                    a.v(b);
                    a.v(r)
                }
                var c = e / a.m(r);
                a.Te(r, c);
                a.J(j, e);
                a.K(j, c * a.l(r))
            };
            Ab = i.$AutoPlaySteps;
            R = i.$AutoPlay;
            o.Lb = Jb;
            Mb();
            N = ib();
            j["jssor-slider"] = c;
            a.ab(j, a.mb(j));
            a.t(N, a.Wb(x));
            a.ab(x, a.mb(x));
            a.u(N, a.pc(x));
            a.ud(a.db(x), N, x);
            if (M) {
                Ib = M.$ShowLink;
                mb = M.$Class;
                xb = M.$TransitionsOrder;
                H = M.$Transitions;
                X = z == 1 && B > 1 && mb
            }
            zb = X || z >= B ? 0 : i.$ParkingPosition;
            E && a.v(E, d);
            Q = new ac;
            Q.$On(21, Tb);
            if (ub && nb) {
                Hb = new nb.$Class(ub, nb);
                P.push(Hb)
            }
            if (kb) {
                tb = new kb.$Class(j, kb, i.$UISearchMode);
                P.push(tb)
            }
            if (rb && lb) {
                wb = new lb.$Class(rb, lb);
                P.push(wb)
            }
            a.d(P, function (a) {
                a.Yb(B, Q.ie, E);
                a.$On(k.ub, Nb)
            });
            a.f(j, "mouseout", Lb);
            a.f(j, "mouseover", Kb);
            qb();
            i.$ArrowKeyNavigation && a.f(g, "keydown", function (a) {
                if (a.keyCode == q.je) T(p - 1);
                else a.keyCode == q.ee && T(p + 1)
            });
            o.$SetScaleWidth(o.$GetOriginalWidth());
            Q.ge()
        }
        w.$ASSEMBLY_BOTTOM_LEFT = z;
        w.$ASSEMBLY_BOTTOM_RIGHT = y;
        w.$ASSEMBLY_TOP_LEFT = E;
        w.$ASSEMBLY_TOP_RIGHT = C;
        w.$ASSEMBLY_LEFT_TOP = D;
        w.$ASSEMBLY_LEFT_BOTTOM = A;
        w.$ASSEMBLY_RIGHT_TOP = B;
        w.$ASSEMBLY_RIGHT_BOTTOM = F;
        w.$EVENT_PARK = 21;
        f.$JssorSlider$ = r = w;
        f.jQuery && (jQuery.fn.jssorSlider = function (a) {
            return this.each(function () {
                return jQuery(this).data("jssorSlider") || jQuery(this).data("jssorSlider", new w(this, a))
            })
        })
    };
    var k = {
        ub: 1,
        ic: 2,
        jc: 3
    };
    f.$JssorNavigator$ = function (d, B) {
        var g = this;
        n.call(g);
        d = a.S(d);
        var s, t, r, q, l = 0,
            f, m, j, x, y, i, h, p, o, A = [],
            z = [];

        function w(a) {
            a != -1 && z[a].dd(a == l)
        }

        function u(a) {
            g.q(k.ub, a * m)
        }
        g.$Elmt = d;
        g.oc = function (a) {
            if (a != q) {
                var d = l,
                    c = b.floor(a / m);
                l = c;
                q = a;
                w(d);
                w(c);
                g.q(k.ic, a)
            }
        };
        g.bc = function (b) {
            a.v(d, b)
        };
        var v;
        g.Yb = function (G) {
            if (!v) {
                s = b.ceil(G / m);
                l = 0;
                var B = p + x,
                    D = o + y,
                    w = b.ceil(s / j) - 1;
                t = p + B * (!i ? w : j - 1);
                r = o + D * (i ? w : j - 1);
                a.J(d, t);
                a.K(d, r);
                f.$AutoCenter & 1 && a.t(d, (a.m(a.db(d)) - t) / 2);
                f.$AutoCenter & 2 && a.u(d, (a.l(a.db(d)) - r) / 2);
                for (var n = 0; n < s; n++) {
                    var F = a.df();
                    a.hf(F, n + 1);
                    var q = a.ed(h, "NumberTemplate", F, c);
                    a.z(q, "relative");
                    var E = n % (w + 1);
                    a.t(q, !i ? B * E : n % j * B);
                    a.u(q, i ? D * E : b.floor(n / (w + 1)) * D);
                    a.p(d, q);
                    A[n] = q;
                    f.$ActionMode & 1 && a.f(q, "click", a.s(e, u, n));
                    f.$ActionMode & 2 && a.f(q, "mouseover", a.s(e, u, n));
                    z[n] = a.Kb(q, c)
                }
                g.q(k.jc);
                v = c
            }
        };
        g.Lb = f = a.g({
            $SpacingX: 0,
            $SpacingY: 0,
            $Orientation: 1,
            $ActionMode: 1
        }, B);
        h = a.x(d, "prototype");
        p = a.m(h);
        o = a.l(h);
        a.rb(d, h);
        m = f.$Steps || 1;
        j = f.$Lanes || 1;
        x = f.$SpacingX;
        y = f.$SpacingY;
        i = f.$Orientation - 1
    };
    f.$JssorDirectionNavigator$ = function (i, t, p) {
        var b = this;
        n.call(b);
        var d = a.x(i, "arrowleft", e, p),
            f = a.x(i, "arrowright", e, p),
            g, h, j, o = a.m(i),
            m = a.l(i),
            r = a.m(d),
            q = a.l(d);

        function l(a) {
            b.q(k.ub, g + a)
        }
        b.oc = function (a) {
            g = a;
            b.q(k.ic, a)
        };
        b.bc = function (b) {
            a.v(d, b);
            a.v(f, b)
        };
        var s;
        b.Yb = function (i) {
            g = 0;
            if (!s) {
                if (h.$AutoCenter & 1) {
                    a.t(d, (o - r) / 2);
                    a.t(f, (o - r) / 2)
                }
                if (h.$AutoCenter & 2) {
                    a.u(d, (m - q) / 2);
                    a.u(f, (m - q) / 2)
                }
                a.f(d, "click", a.s(e, l, -j));
                a.f(f, "click", a.s(e, l, j));
                a.Kb(d, c);
                a.Kb(f, c)
            }
            b.q(k.jc)
        };
        b.Lb = h = a.g({
            $Steps: 1
        }, t);
        j = h.$Steps
    };
    f.$JssorThumbnailNavigator$ = function (g, C) {
        var f = this,
            z, s, j, d, v = [],
            A, y, t, m, o, q, p, h, u, w, l, e, i;
        n.call(f);
        g = a.S(g);

        function B(o, e) {
            var g = this,
                b, n, m;

            function p() {
                n.dd(j == e)
            }

            function h() {
                !l.ze() && f.q(k.ub, e)
            }
            g.M = e;
            g.bd = p;
            m = o.ue || o.lc || a.Ib();
            g.cb = b = a.ed(i, "ThumbnailTemplate", m, c);
            n = a.Kb(b, c);
            d.$ActionMode & 1 && a.f(b, "click", h);
            d.$ActionMode & 2 && a.f(b, "mouseover", h)
        }
        f.oc = function (a, c) {
            var b = j;
            j = a;
            b != -1 && v[b].bd();
            v[a].bd();
            if (!c && l.xe()) {
                l.$GoTo(a % s);
                l.ve()
            }
            f.q(k.ic, a)
        };
        f.bc = function (b) {
            a.v(g, b)
        };
        var x;
        f.Yb = function (I, H) {
            if (!x) {
                z = I;
                s = b.ceil(z / t);
                j = -1;
                h = b.min(h, H.length);
                var i = d.$Orientation & 1,
                    E = q + (q + m) * (t - 1) * (1 - i),
                    D = p + (p + o) * (t - 1) * i,
                    G = E + (E + m) * (h - 1) * i,
                    F = D + (D + o) * (h - 1) * (1 - i);
                a.z(e, "relative");
                a.Y(e, "hidden");
                d.$AutoCenter & 1 && a.t(e, (A - G) / 2);
                d.$AutoCenter & 2 && a.u(e, (y - F) / 2);
                a.J(e, G);
                a.K(e, F);
                var n = [];
                a.d(H, function (j, f) {
                    var g = new B(j, f),
                        d = g.cb,
                        c = f % s,
                        h = b.floor(f / s);
                    a.t(d, (q + m) * h * (1 - i));
                    a.u(d, (p + o) * h * i);
                    if (!n[c]) {
                        n[c] = a.Ib();
                        a.p(e, n[c])
                    }
                    a.p(n[c], d);
                    v.push(g)
                });
                var C = {
                    $SlideWidth: E,
                    $SlideHeight: D,
                    $SlideSpacing: m * i + o * (1 - i),
                    $DisplayPieces: h,
                    $MinDragOffsetToSlide: 12,
                    $SlideDuration: 200,
                    Me: c,
                    $PlayOrientation: d.$Orientation,
                    $DragOrientation: d.$DisableDrag ? 0 : d.$Orientation
                };
                if (w) C.$ParkingPosition = w;
                if (u) C.$DirectionNavigatorOptions = u;
                l = new r(g, C);
                x = c
            }
            f.q(k.jc)
        };
        f.Lb = d = a.g({
            $SpacingX: 3,
            $SpacingY: 3,
            $DisplayPieces: 1,
            $Orientation: 1,
            $AutoCenter: 3,
            $ActionMode: 1
        }, C);
        A = a.m(g);
        y = a.l(g);
        e = a.x(g, "slides");
        i = a.x(e, "prototype");
        a.rb(e, i);
        t = d.$Lanes || 1;
        m = d.$SpacingX;
        o = d.$SpacingY;
        q = a.m(i);
        p = a.l(i);
        h = d.$DisplayPieces;
        w = d.$ParkingPosition;
        u = d.$DirectionNavigatorOptions
    };

    function s() {
        l.call(this, 0, 0);
        this.Qb = a.W
    }
    f.$JssorCaptionSlider$ = function (p, f, n) {
        var e = this,
            h, g = f.$CaptionTransitions,
            o = {
                bb: "t",
                $Delay: "d",
                $Duration: "du",
                $ScaleHorizontal: "x",
                $ScaleVertical: "y",
                $Rotate: "r",
                $Zoom: "z",
                $Opacity: "f",
                O: "b"
            }, d = {
                B: function (b, a) {
                    if (!isNaN(a.Q)) b = a.Q;
                    else b *= a.Ae;
                    return b
                },
                $Opacity: function (b, a) {
                    return this.B(b - 1, a)
                }
            };
        d.$Zoom = d.$Opacity;
        l.call(e, 0, 0);

        function k(r, m) {
            var l = [],
                i, j = [],
                c = [];

            function h(d, e) {
                var c = {};
                a.d(o, function (i, j) {
                    var g = a.dc(d, i + (e || ""));
                    if (g) {
                        var h = {};
                        if (i == "t") {
                            if ((a.Ob() || a.vd() || a.Ab()) && g == "*") {
                                g = b.floor(b.random() * f.$CaptionTransitions.length);
                                a.xc(d, i + (e || ""), g)
                            }
                            h.Q = g
                        } else if (g.indexOf("%") + 1) h.Ae = a.Pc(g) / 100;
                        else h.Q = a.Pc(g);
                        c[j] = h
                    }
                });
                return c
            }

            function p() {
                return g[b.floor(b.random() * g.length)]
            }

            function e(f) {
                var h;
                if (f == "*") h = p();
                else if (f) {
                    var d = g[a.Zd(f)] || g[f];
                    if (a.zb(d)) {
                        if (f != i) {
                            i = f;
                            c[f] = 0;
                            j[f] = d[b.floor(b.random() * d.length)]
                        } else c[f]++;
                        d = j[f];
                        if (a.zb(d)) {
                            d = d.length && d[c[f] % d.length];
                            if (a.zb(d)) d = d[b.floor(b.random() * d.length)]
                        }
                    }
                    h = d;
                    if (a.Cc(h)) h = e(h)
                }
                return h
            }
            var q = a.Gb(r);
            a.d(q, function (b) {
                var c = [];
                c.$Elmt = b;
                var g = a.dc(b, "u") == "caption";
                a.d(n ? [0, 3] : [2], function (o, p) {
                    if (g) {
                        var l, i;
                        if (o != 2 || !a.dc(b, "t3")) {
                            i = h(b, o);
                            if (o == 2 && !i.bb) {
                                i.$Delay = i.$Delay || {
                                    Q: 0
                                };
                                i = a.g(h(b, 0), i)
                            }
                        }
                        if (i && i.bb) {
                            l = e(i.bb.Q);
                            if (l) {
                                var j = a.g({
                                    $Delay: 0,
                                    $ScaleHorizontal: 1,
                                    $ScaleVertical: 1
                                }, l);
                                a.d(i, function (c, a) {
                                    var b = (d[a] || d.B).apply(d, [j[a], i[a]]);
                                    if (!isNaN(b)) j[a] = b
                                });
                                if (!p)
                                    if ((n ? f.$PlayInMode : f.$PlayOutMode) & 2) j.O = 0;
                                    else if (i.O) c.O = i.O.Q || 0
                            }
                        }
                        c.push(j)
                    }
                    if (m % 2 && !p) c.Be = k(b, m + 1)
                });
                l.push(c)
            });
            return l
        }

        function m(D, d, E) {
            var g = {
                $Easing: d.$Easing,
                $Round: d.$Round,
                $During: d.$During,
                $Reverse: !E
            }, h = D,
                x = a.db(D),
                n = a.m(h),
                m = a.l(h),
                t = a.m(x),
                s = a.l(x),
                e = {}, j = {}, k = d.$ScaleClip || 1;
            if (d.$Opacity) e.$Opacity = 2 - d.$Opacity;
            g.gb = n;
            g.jb = m;
            if (d.$Zoom || d.$Rotate) {
                e.$Zoom = d.$Zoom ? d.$Zoom - 1 : 1;
                if (a.Pb()) e.$Zoom = b.min(e.$Zoom, 2);
                else if (a.Ab()) e.$Zoom = b.min(e.$Zoom, 3);
                j.$Zoom = 1;
                var r = d.$Rotate || 0;
                if (r == c) r = 1;
                e.$Rotate = r * 360;
                j.$Rotate = 0
            } else if (d.$Clip) {
                var y = {
                    $Top: 0,
                    $Right: n,
                    $Bottom: m,
                    $Left: 0
                }, C = a.g({}, y),
                    f = C.F = {}, B = d.$Clip & 4,
                    u = d.$Clip & 8,
                    z = d.$Clip & 1,
                    w = d.$Clip & 2;
                if (B && u) {
                    f.$Top = m / 2 * k;
                    f.$Bottom = -f.$Top
                } else if (B) f.$Bottom = -m * k;
                else if (u) f.$Top = m * k;
                if (z && w) {
                    f.$Left = n / 2 * k;
                    f.$Right = -f.$Left
                } else if (z) f.$Right = -n * k;
                else if (w) f.$Left = n * k;
                g.$Move = d.$Move;
                e.$Clip = C;
                j.$Clip = y
            }
            var o = d.$FlyDirection,
                p = 0,
                q = 0,
                v = d.$ScaleHorizontal,
                A = d.$ScaleVertical;
            if (i.Tc(o)) p -= t * v;
            else if (i.Uc(o)) p += t * v;
            if (i.Vc(o)) q -= s * A;
            else if (i.Qc(o)) q += s * A;
            if (p || q || g.$Move) {
                e.$Left = p + a.Wb(h);
                e.$Top = q + a.pc(h)
            }
            var F = d.$Duration;
            j = a.g(j, a.Bd(h, e));
            g.pd = a.zd();
            return new l(d.$Delay, F, g, h, j, e)
        }

        function j(b, c) {
            a.d(c, function (c) {
                var f, i = c.$Elmt,
                    d = c[0],
                    k = c[1];
                if (d) {
                    f = m(i, d);
                    b = f.Bb(a.ld(d.O) ? b : d.O, 1)
                }
                b = j(b, c.Be);
                if (k) {
                    var g = m(i, k, 1);
                    g.Bb(b, 1);
                    e.lb(g);
                    h.lb(g)
                }
                f && e.lb(f)
            });
            return b
        }
        e.Qb = function () {
            e.td();
            h.Mc()
        };
        h = new l(0, 0);
        j(0, k(p, 1))
    }
})(window, document, Math, null, true, false)